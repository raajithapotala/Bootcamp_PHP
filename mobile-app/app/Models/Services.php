<?php

namespace App\Models;

use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Services extends Model
{

    public function Create(Request $request): \Illuminate\Http\JsonResponse
    {
        Log::info('Creating the profile for user: '.$request->name);
        $rules = array(
            "name"=> "required|min:2|max:25",
            "email" => "required|email",
            "contactNo" => "required|unique:users|digits:10",
        );
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails())
        {
            return response()->json($validator->errors(), 400);
        }

        else {
            try {
                $user = Users::create(['name' => $request->name, 'contactNo' => $request->contactNo, 'email' => $request->email]);
            }
            catch(\PHPUnit\Exception $e){
                echo "\n". "Caught exception: " . $e->getMessage();
            }
            return response()->json([
                "User" => $user,
                "message" => "User $request->name is created successfully!"

            ], 201);
        }

    }

    public function fetchByName($username){
        Log::info('Displaying the profile of given user');
        if (Users::where('name', $username)->exists()) {
            try {
                $user = Users::where('name', $username)->get()->toJson(JSON_PRETTY_PRINT);
            }
            catch(\PHPUnit\Exception $e){
                echo "\n". "Caught exception: " . $e->getMessage();
            }
            return response($user, 200);
        } else {
            return response()->json([
                "message" => "Username doesn't exist!"
            ], 404);
        }

    }

    public function fetchByEmail($e_mail){
        Log::info('Displaying the profile of given user');
        if (Users::where('email', $e_mail)->exists()) {
            try {
                $user = Users::where('email', $e_mail)->get()->toJson(JSON_PRETTY_PRINT);
            }
            catch(\PHPUnit\Exception $e){
                echo "\n". "Caught exception: " . $e->getMessage();
            }

            return response($user, 200);
        } else {
            return response()->json([
                "message" => "User email doesn't exist!"
            ], 404);
        }
    }

    public function fetchByContactNo($phone_no){
        Log::info('Displaying the profile of given user');
        if (Users::where('contactNo', $phone_no)->exists()) {
            try {
                $user = Users::where('contactNo', $phone_no)->get()->toJson(JSON_PRETTY_PRINT);
            }
            catch(\PHPUnit\Exception $e){
                echo "\n". "Caught exception: " . $e->getMessage();
            }
            return response($user, 200);
        } else {
            return response()->json([
                "message" => "Mobile number doesn't exist!"
            ], 404);
        }
    }

    public function fetchAll(){
        Log::info('Displaying the profile of all the users');
        $users = Users::get()->toJson(JSON_PRETTY_PRINT);
        return response($users, 200);
    }

    public function deleteByContactNo($contactNo){
        Log::info('Removing the profile for given user ');
        if(Users::where('contactNo', $contactNo)->exists()){
            DB::table('users')->where('contactNo',$contactNo)->delete();
            return response()->json([
                "message" => "User successfully deleted!"
            ], 202);
        } else {
            return response()->json([
                "message" => "Mobile number doesn't exist!!"
            ], 404);
        }

    }

    public function deleteByName($username){
        Log::info('Removing the profile for given user ');
        if(Users::where('name', $username)->exists()){
            try {
                DB::table('users')->where('name', $username)->delete();
            }
            catch(\PHPUnit\Exception $e){
                echo "\n". "Caught exception: " . $e->getMessage();
            }
            return response()->json([
                "message" => "User successfully deleted!"
            ], 202);
        } else {
            return response()->json([
                "message" => "User name doesn't exist!!"
            ], 404);
        }

    }

    public function deleteByEmail($email){
        Log::info('Removing the profile for given user ');
        if(Users::where('email', $email)->exists()){
            try {
                DB::table('users')->where('email', $email)->delete();
            }
            catch(\PHPUnit\Exception $e){
                echo "\n". "Caught exception: " . $e->getMessage();
            }
            return response()->json([
                "message" => "User successfully deleted!"
            ], 202);
        } else {
            return response()->json([
                "message" => "User email doesn't exist!!"
            ], 404);
        }

    }

}
