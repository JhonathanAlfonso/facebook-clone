<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostToTimeLineTest extends TestCase
{

    use RefreshDatabase;

    /**
     * @test
     */
    public function aUserCanPostATextPost()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();

        $this->actingAs($user, 'api');

        $response = $this->post('api/post', [
            'data' => [
                'type' => 'posts',
                'attributes' => [
                    'body' => 'testing body'
                ]
            ]
        ]);

        $post = Post::first();

        $this->assertCount(1, Post::all());
        $this->assertEquals($user->id, $post->user_id);
        $this->assertEquals('testing body', $post->body);

        $response->assertStatus(201)
            ->assertJson([
                'data' => [
                    'type' => 'posts',
                    'post_id' => $post->id,
                    'attributes' => [
                        'body' => 'testing body',
                        'posted_by' => [
                            'data' => [
                                'attributes' => [
                                    'name' => $user->name
                                ]
                            ]
                        ],
                    ]
                ],
                'links' => [
                    'self' => url('/posts/' . $post->id),
                ]
            ]);
    }
}

