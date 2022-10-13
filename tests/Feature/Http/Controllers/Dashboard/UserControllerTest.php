<?php

namespace Tests\Feature\Http\Controllers\Dashboard;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserControllerTest extends TestCase
{
    use DatabaseTransactions;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['user_type' => User::ROLE_ADMIN]);

        $this->be(User::find($user->id));

    }

    public function test_index_works() {
        $user = User::factory()->create();

        $this->get(route('users.index'))
            ->assertSuccessful()
            ->assertSeeText($user->email);
    }

    public function test_create_works()
    {
        $this->get(route('users.create'))
            ->assertSuccessful();
    }

    public function test_store_works()
    {
        $user  = [
            'name' => 'New User ',
            'email' => 'email@email.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];

        $this->post(route('users.store'), $user)
            ->assertRedirect(route('users.index'))
        ;
    }

    public function test_show_works() {
        $user = User::factory()->create();

        $this->get(route('users.show',$user))
            ->assertSuccessful()
        ;
    }

    public function test_edit_works()
    {
        $user = User::factory()->create();

        $this->get(route('users.edit', $user))
            ->assertSuccessful();
    }

    public function test_update_works()
    {
        $user = User::factory()->create();
        $new_user = User::factory()->make();

        $this->put(route('users.update', $user), $new_user->toArray())
            ->assertRedirect(route('users.index'));
    }

    public function test_destroy_works()
    {
        $user = User::factory()->create();

        $this->delete(route('users.destroy',$user))
        ->assertRedirect(route('users.index'))
        ;

        $this->assertDatabaseMissing('users',['id' => $user->id]);
    }
}
