<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserPermissionsTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function blocked_user_can_not_login() {
        $user = User::factory()->create(['is_blocked' => true , 'password' => 'password']);

        $this->post(route('PostLogin',['email' => $user->email,'password' => 'password']))
        ->assertRedirect()
        ->assertSee('This account is suspended at the moment');
    }

    /** @test */
    public function a_user_can_not_see_dashboard() {
        $this->be(User::factory()->create());

        $this->get(route('dashboard'))
        ->assertNotFound();
    }

    /** @test */
    public function an_author_can_see_dashboard() {
        $this->be(User::factory()->create(['user_type' => User::ROLE_AUTHOR]));

        $this->get(route('dashboard'))
        ->assertSuccessful();
    }

    /** @test */
    public function an_author_can_not_see_categories() {
        $this->be(User::factory()->create(['user_type' => User::ROLE_AUTHOR]));

        $this->get(route('dashboard'))
        ->assertDontSeeText('categories');

        $this->get(route('categories.index'))
        ->assertNotFound();
    }

    /** @test */
    public function an_author_can_not_see_users() {
        $this->be(User::factory()->create(['user_type' => User::ROLE_AUTHOR]));

        $this->get(route('dashboard'))
        ->assertDontSeeText('categories');

        $this->get(route('users.index'))
        ->assertNotFound();
    }

    /** @test */
    public function an_admin_can_see_dashboard() {
        $this->be(User::factory()->create(['user_type' => User::ROLE_ADMIN]));

        $this->get(route('dashboard'))
        ->assertSuccessful()
        ->assertDontSeeText('posts')
        ->assertDontSeeText('categories')
        ->assertDontSeeText('users');

    }
}
