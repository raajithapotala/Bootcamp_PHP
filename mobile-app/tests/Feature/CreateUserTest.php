<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class CreateUserTest extends TestCase
{
    use RefreshDatabase;

    public function test_createUserErrorEmailRequired()
    {
        //$this->assertTrue(true);
        $response = $this->json('POST','/api/users',['name'=>'Raajitha', 'contactNo'=>'5555555555']);

        $response
            -> assertStatus(400)
            ->assertJSON([
                "email" => [
                    "The email field is required."
                ]
            ]);
    }

    public function test_createUserErrorNameRequired()
    {
        //$this->assertTrue(true);
        $response = $this->json('POST','/api/users',[ 'phoneNo'=>'5555555555', 'email'=>'raajitha@gmail.com']);
        $response-> assertStatus(400)
            ->assertJSON([
                "name" => [
                    "The name field is required."
                ]
            ]);
    }

    public function test_createUserErrorPhoneNoRequired()
    {
        //$this->assertTrue(true);
        $response = $this->json('POST','/api/users',[ 'name'=>'raajitha', 'email'=>'raajitha@gmail.com']);
        $response
            -> assertStatus(400)
            ->assertJSON([
                "contactNo" => [
                    "The contact no field is required."
                ]
            ]);
    }
    public function test_createUser()
    {
        //$this->assertTrue(true);
        $response = $this->json('POST','/api/users',['name'=>'raajitha', 'contactNo'=>'5555565555', 'email' =>'raajitha@gmail.com']);
        $response
            -> assertStatus(201)
            ->assertJSON([
                "message" => "User raajitha is created successfully!"
            ]);
    }
}
