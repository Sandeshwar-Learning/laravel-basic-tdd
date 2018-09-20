<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Post;

class PostTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * Should have createdAt() which returns formatted created at date
     * 
     * @group post-created-at
     * @return void
     */
    public function testCanGetCreatedAtFormattedDate() 
    {
        // create a post
        $post = Post::create([
            'title' => 'Swalla la le everyday',
            'body'  => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis dolorum ullam facere repellendus earum fuga reiciendis'
        ]);

        // call the method
        $formattedDate = $post->createdAt();

        // match the dates
        $this->assertEquals($post->created_at->toFormattedDateString(), $post->createdAt());
    }
}
