<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewABlogTest extends TestCase
{
    /**
     * Test to see if a blog post can be seen.
     *
     * @return void
     */
    public function testCanViewABlogPost()
    {
        // Arrangement
        // create a blog post
        $post = Post::create([
            'title' => 'Swalla la le everyday',
            'body'  => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis dolorum ullam facere repellendus earum fuga reiciendis'
        ]);

        // Action
        // visit the view post route
        $res = $this->get("/post/{$post->id}");

        // Assert
        // reponse code 200
        $res->assertStatus(200);
        // that we see blog title
        $res->assertSee($post->title);
        // that we see blog body
        $res->assertSee($post->body);
        // that we see published date
        $res->assertSee($post->created_at);
    }
}
