<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Users;
use PHPUnit\Framework\TestCase;

class DeleteTest extends TestCase
{
    use RefreshDatabase;
    public function test_deleteUserByEmail()
    {
        Users::create(['name'=>'raajitha', 'contactNo'=>'5555565555', 'email' =>'raajitha@gmail.com']);
        $response = $this->json('DELETE', '/api/users/byEmail/raajitha@gmail.com');

        $response
            ->assertStatus(202);
    }

    public function test_deleteUserByName()
    {
        Users::create(['name'=>'raajitha', 'contactNo'=>'5555565555', 'email' =>'raajitha@gmail.com']);
        $response = $this->json('DELETE', '/api/users/byName/raajitha');

        $response
            ->assertStatus(202);
    }

    public function test_deleteUserByPhoneNo()
    {
        Users::create(['name'=>'raajitha', 'contactNo'=>'5555565555', 'email' =>'raajitha@gmail.com']);
        $response = $this->json('DELETE', '/api/users/byContactNo/5555565555');
        $response
            ->assertStatus(202);
    }


}
