<?php

namespace Tests\Feature;

use App\User;
use App\Category;
use Tests\TestCase;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

         // now re-register all the roles and permissions
        $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->registerPermissions();

        $this->withExceptionHandling();
        $this->seed();

    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_see_all_category()
    {
        $user = factory(User::class)->make();

        $cat = Category::create(['name' => 'Dummy1']);

        $response = $this->actingAs($user)->get(route('category.index'));


        $response->assertStatus(200);
        $response->assertSee($cat->name);

    }
}
