<?php

namespace Tests\Feature\Model;

use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use DatabaseTransactions;
    /** @test */
    public function default_avatar_returned_when_user_has_no_avatar_in_database() {
        $user = User::factory()->create();

        $this->assertSame(config('app.default_avatar'),$user->avatar);
    }

    /** @test */
    public function password_is_auto_hashed() {
        $user = new User(['password' => 'password']);

        $this->assertTrue(Hash::check('password',$user->password));
    }

    /** @test */
    public function username_is_auto_generated() {
        $user = new User(['name' => 'Ashraf Alhaj']);

        $this->assertMatchesRegularExpression('/^ashraf-alhaj-[a-z0-9]{13}/',$user->username);

    }

    /** @test */
    public function comments_count_displayed_as_expected() {
        $user = User::factory()->create();
        Category::factory()->create();
        Post::factory()->create();

        $user->load('comments');

        $this->assertSame('No comments',$user->commentsCount());

        Comment::factory()->create(['user_id' => $user->id]);

        $user->load('comments');

        $this->assertSame('One comment',$user->commentsCount());

        Comment::factory()->create(['user_id' => $user->id]);

        $user->load('comments');

        $this->assertSame('2 comments',$user->commentsCount());
    }

    /** @test */
    public function posts_count_displayed_as_expected() {
        $user = User::factory()->create();
        Category::factory()->create();

        $user->load('posts');

        $this->assertSame('No posts',$user->postsCount());

        Post::factory()->create(['user_id' => $user->id]);

        $user->load('posts');

        $this->assertSame('One post',$user->postsCount());

        Post::factory()->create(['user_id' => $user->id]);

        $user->load('posts');

        $this->assertSame('2 posts',$user->postsCount());
    }
}
