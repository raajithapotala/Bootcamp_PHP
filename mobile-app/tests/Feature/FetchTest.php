<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Users;

class FetchTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function test_getUsers()
    {
        //$this->assertTrue(true);

        $response = $this->json('GET', '/api/users');

        $response
            ->assertStatus(200);
    }
    public function test_getUserByEmail()
    {
        //$this->assertTrue(true);

        $user = Users::create(['name'=>'raajitha', 'contactNo'=>'5555565555', 'email' =>'raajitha@gmail.com']);
        $response = $this->json('GET', '/api/users/search/byEmail/raajitha@gmail.com');

        $response
            ->assertStatus(200);
    }
    public function test_getUserByName()
    {
        //$this->assertTrue(true);

        Users::create(['name'=>'raajitha', 'contactNo'=>'5555565555', 'email' =>'raajitha@gmail.com']);
        $response = $this->json('GET', '/api/users/search/byName/raajitha');

        $response
            ->assertStatus(200);
    }
    public function test_getUserByPhoneNo()
    {
        //$this->assertTrue(true);

        $user=Users::create(['name'=>'raajitha', 'contactNo'=>'5555565555', 'email' =>'raajitha@gmail.com']);
        $response = $this->json('GET', '/api/users/search/bycontactNo/5555565555');

        $response
            ->assertStatus(200);
    }
}
