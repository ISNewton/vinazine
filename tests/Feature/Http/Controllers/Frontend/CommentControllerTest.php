<?php

namespace Tests\Feature\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\Comment;
use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentController extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function user_can_post_a_comment() {

        $user = User::factory()->create();

        $this->be(User::find($user->id));

        $category = Category::factory()->create();

        $post = Post::factory()->create();

        $this->post(route('postComment',$post->slug),['comment' => 'This is just a comment'])
        ->assertSessionHasNoErrors()
        ->assertRedirect();

        $this->get(route('post',['category' => $category->name,'post' => $post->slug]))
        ->assertSeeText('This is just a comment');
    }

    /** @test */
    public function user_can_delete_their_comment() {
        $user = User::factory()->create();

        Category::factory()->create();

        Post::factory()->create();

        $comment = Comment::factory()->create(['user_id' => $user->id]);

        $this->delete(route('deleteComment',$comment))
        ->assertSessionHasNoErrors();
    }

    /** @test */
    public function user_can_not_delete_others_comments() {
        Category::factory()->create();

        [$first_user , $second_user] = User::factory(2)->create();

        Post::factory()->create();

        $comment = Comment::factory()->create(['user_id' => $first_user->id]);

        $this->be($second_user);

        $this->delete(route('deleteComment',$comment))
        ->assertForbidden();
    }

    /** @test */
    public function unauthunticated_user_can_not_post_a_comment() {

        $user = User::factory()->create();
        $category = Category::factory()->create();
        $post = Post::factory()->create();


        $this->post(route('postComment',$post->slug),['comment' => 'This is just a comment'])
        ->assertRedirect(route('login'));
    }

}
