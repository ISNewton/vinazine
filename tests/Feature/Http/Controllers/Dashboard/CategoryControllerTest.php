<?php

namespace Tests\Feature\Http\Controllers\Dashboard;

use App\Models\Category;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryControllerTest extends TestCase
{
    use DatabaseTransactions;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['user_type' => User::ROLE_ADMIN]);

        $this->be(User::find($user->id));

    }

    public function test_index_works()
    {
        $category = Category::factory()->create();

        $this->get(route('categories.index'))
            ->assertSuccessful()
            ->assertSeeText($category->name);
    }

    public function test_create_works()
    {
        $this->get(route('categories.create'))
            ->assertSuccessful();
    }

    public function test_store_works()
    {
        $category = Category::factory()->make();
        $this->post(route('categories.store'), $category->toArray())
            ->assertRedirect(route('categories.index'))
        ;
    }

    public function test_show_works() {
        $category = Category::factory()->create();

        $this->get(route('categories.show',$category))
            ->assertSuccessful()
        ;
    }

    public function test_edit_works()
    {
        $category = Category::factory()->create();

        $this->get(route('categories.edit', $category))
            ->assertSuccessful();
    }

    public function test_update_works()
    {
        $category = Category::factory()->create();
        $new_category = Category::factory()->make();

        $this->put(route('categories.update', $category), $new_category->toArray())
            ->assertRedirect(route('categories.index'));
    }

    public function test_destroy_works()
    {
        $category = Category::factory()->create();

        $this->delete(route('categories.destroy',$category))
        ->assertRedirect(route('categories.index'))
        ;

        $this->assertDatabaseMissing('categories',['id' => $category->id]);
    }
}
