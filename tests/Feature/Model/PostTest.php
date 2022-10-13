<?php

namespace Tests\Feature\Model;

use Carbon\Carbon;
use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use DatabaseTransactions;
    /** @test */
    public function slug_is_auto_generated() {
        $time = now();

        Carbon::setTestNow($time);

        $post = new Post(['title' => 'the title']);

        $slug = Str::slug($post->title . '-' . now());

        $this->assertSame($post->slug,$slug);
    }

    /** @test */
    public function default_thumbnail_returned_when_post_has_no_thumbnail_in_database() {
        $post = new Post(['title' => 'the title']);

        $this->assertSame($post->thumbnail,config('app.default_thumbnail'));
    }

    /** @test */
    public function created_at_displayed_as_expected() {
        $time = now();

        Carbon::setTestNow($time);

        Category::factory()->create();

        User::factory()->create();

        $post = Post::factory()->create();

        $expected = Carbon::createFromFormat('Y-m-d H:i:s', $time)->format('M d Y');

        $this->assertSame($post->created_at,$expected);
    }

    /** @test */
    public function get_next_post_within_the_category() {
        User::factory()->create();

        $category = Category::factory(2)->create();

       $first_post = Post::factory()->create(['category_id' => $category->first()->id]);

       Post::factory(5)->create(['category_id' => $category->last()->id]);

       $second_post = Post::factory()->create(['category_id' => $category->first()->id]);


       $this->assertSame($first_post->getNextPost()->id,$second_post->id);
    }

    /** @test */
    public function get_next_post_from_any_category_when_there_is_no_next_post_in_the_category() {
        User::factory()->create();

        $category = Category::factory(2)->create();

       $first_post = Post::factory()->create(['category_id' => $category->first()->id]);

       $second_post = Post::factory()->create(['category_id' => $category->last()->id]);


       $this->assertSame($first_post->getNextPost()->id,$second_post->id);
    }

     /** @test */
     public function get_previous_post_within_the_category() {
        User::factory()->create();

        $category = Category::factory(2)->create();

        $first_post = Post::factory()->create(['category_id' => $category->first()->id]);

        Post::factory(5)->create(['category_id' => $category->last()->id]);

        $second_post = Post::factory()->create(['category_id' => $category->first()->id]);


        $this->assertSame($second_post->getPreviousPost()->id,$first_post->id);
    }

     /** @test */
    public function get_previous_post_from_any_category_when_no_previous_post_in_the_category() {
        User::factory()->create();

        $category = Category::factory(2)->create();

        $first_post = Post::factory()->create(['category_id' => $category->first()->id]);

        $second_post = Post::factory()->create(['category_id' => $category->last()->id]);


        $this->assertSame($second_post->getPreviousPost()->id,$first_post->id);
    }

     /** @test */
    public function comments_count_displayed_as_expected() {
        User::factory()->create();
        Category::factory()->create();

        $post = Post::factory()->create();

        $this->assertSame('No comments yet',$post->commentsCount());

        Comment::factory()->create(['post_id' => $post->id]);

        $post->load('comments');

        $this->assertSame('One comment',$post->commentsCount());

        Comment::factory()->create(['post_id' => $post->id]);

        $post->load('comments');

        $this->assertSame('2 comments',$post->commentsCount());


    }

     /** @test */
    public function post_has_short_description() {

        $post = new Post(['description' => fake()->paragraph(40)]);

        $this->assertSame(Str::words($post->content,20),$post->shortDescription());
    }
}
