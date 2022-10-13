<?php

namespace Tests\Feature\Http\Controllers\Frontend;

use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FrontendControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function test_home_page_works()
    {
        User::factory()->create();
        Category::factory()->create();
        Post::factory(100)->create();

        $this->get(route('home'))
            ->assertSuccessful();
    }

    public function test_category_page_works()
    {
        User::factory()->create();

        $category = Category::factory()->create();

        Category::factory(10)->create();

        Post::factory(10)->create(['category_id' => $category->id]);

        $this->get(route('category', $category))
            ->assertSuccessful();
    }

    public function test_post_page_works()
    {
        User::factory()->create();

        Category::factory(10)->create();

        $category = Category::factory()->create();

        $post = Post::factory()->create();

        $this->get(route('post', [
            'category' => $category->name,
            'post' => $post->slug,
        ]))
            ->assertSuccessful();
    }

    public function test_profile_page_works() {
        $user = User::factory()->create();
        $this->be($user);

        $this->get(route('profile',$user->username))
        ->assertSuccessful()
        ->assertSeeText($user->name);
    }
}
