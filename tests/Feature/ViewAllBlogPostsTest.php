<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Post;

class ViewAllBlogPostsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @group posts
     * @return void
     */
    public function testCanViewAllBlogPosts()
    {
        // arrange
        $post1 = factory(Post::class)->create();
        $post2 = factory(Post::class)->create();

        // act
        $res = $this->get('posts');

        // assert
        $res->assertStatus(200);

        $res->assertSee($post1->title);
        $res->assertSee($post1->body);

        $res->assertSee($post2->title);
        $res->assertSee($post2->body);
        
    }
}
