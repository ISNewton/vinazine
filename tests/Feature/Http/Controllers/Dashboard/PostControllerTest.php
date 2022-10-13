<?php

namespace Tests\Feature\Http\Controllers\Dashboard;

use App\Models\Category;
use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostControllerTest extends TestCase
{
    use DatabaseTransactions;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['user_type' => User::ROLE_ADMIN]);

        $this->be(User::find($user->id));

        Category::factory()->create();
    }

    public function test_index_works()
    {
        $post = Post::factory()->create();

        $this->get(route('posts.index'))
            ->assertSuccessful()
            ->assertSeeText($post->title);
    }

    public function test_create_works()
    {

        $this->get(route('posts.create'))
            ->assertSuccessful();
    }

    public function test_store_works()
    {
        $post = Post::factory()->make();
        $this->post(route('posts.store'), $post->toArray())
            ->assertRedirect(route('posts.index'))
        ;
    }

    public function test_show_works() {
        $post = Post::factory()->create();

        $this->get(route('posts.show',$post),)
            ->assertSuccessful()
        ;
    }

    public function test_edit_works()
    {
        $post = Post::factory()->create();

        $this->get(route('posts.edit', $post->slug))
            ->assertSuccessful();
    }

    public function test_update_works()
    {
        $post = Post::factory()->create();
        $new_post = Post::factory()->make();

        $this->put(route('posts.update', $post->slug), $new_post->toArray())
            ->assertRedirect(route('posts.index'));
    }

    public function test_destroy_works()
    {
        $post = Post::factory()->create();

        $this->delete(route('posts.destroy',$post->slug))
        ->assertRedirect(route('posts.index'))
        ;

        $this->assertDatabaseMissing('posts',['id' => $post->id]);
    }
}
