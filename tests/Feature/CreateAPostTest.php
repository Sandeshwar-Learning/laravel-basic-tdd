<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Post;

class CreateAPostTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test to check if a post can be created
     *
     * @group create-post
     * @return void
     */
    public function testCanCreateAPost()
    {
        $post = new Post();
        $post->title = 'My Post';
        $post->body = 'My Post Body';

        // make post request
        $this->post('/posts', [
            'title' => $post->title,
            'body' => $post->body
        ]);

        $this->assertDatabaseHas('posts', [
            'title' => $post->title,
            'body' => $post->body
        ]);

        $savedPost = Post::where('title', $post->title)->first();

        //fwrite(STDERR, print_r($savedPost->title, TRUE));

        $this->assertEquals($post->title, $savedPost->title);
    }
}
