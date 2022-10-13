<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostViewsTest extends TestCase
{
    use DatabaseTransactions;

    public function test_post_views_increase_when_user_visits_post_page() {
        User::factory()->create();
        $category = Category::factory()->create();
        $post = Post::factory()->create(['category_id' => $category->id]);

        $post->loadCount('views');

        $this->assertSame(0,$post->views_count);

        $this->get(route('post',['category' => $category->name,'post' => $post->slug]));

        $post->loadCount('views');

        $this->assertSame(1,$post->views_count);

        $this->get(route('post',['category' => $category->name,'post' => $post->slug]));

        $post->loadCount('views');

        $this->assertSame(2,$post->views_count);



    }
}
