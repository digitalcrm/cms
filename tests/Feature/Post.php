<?php

namespace Tests\Feature;

use App\Post;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function setup(): void
    {
        parent::setUp();

        $this->withExceptionHandling();

    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_homepage_url()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */

    public function see_all_posts()
    {
        // past/ scene / prepare
        $post = $this->createPost();

        // present / action / act
        $response = $this->get('/posts');

        // future / assertion / assert
        $response->assertStatus(200);
        $response->assertSee($post->title);
    }

    /** @test */
    public function user_can_vist_single_post()
    {
        $post = $this->createPost();

        $res = $this->get('/posts/'. $post->id);

        $res->assertStatus(200);
        $res->assertSee($post->title);


    }

    /** @test */

    public function user_store_the_post()
    {

        $res = $this->post('/posts');

        $res->assertRedirect('/posts');

    }

    protected function createPost($title = null, $body = null, $categoryId = null )
    {
        $title = $title ?? 'first ever blog';
        $body = $body ?? 'description';
        $categoryId = $categoryId ?? 1;
        return Post::create(['title' => $title, 'body' => $body, 'category_id' => $categoryId]);
    }
}
