<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Service extends Model
{

    public function Create(Request $request): \Illuminate\Http\JsonResponse
    {
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
            $users = DB::table('Users')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'contactNo' => $request->contactNo,
            ]);

            return response()->json([
                "message" => "User $request->name is created successfully!"
            ], 201);
        }

    }

    public function fetchByName($username){

        if (Users::where('name', $username)->exists()) {
            $user = Users::where('name', $username)->get()->toJson(JSON_PRETTY_PRINT);
            return response($user, 200);
        } else {
            return response()->json([
                "message" => "Username doesn't exist!"
            ], 404);
        }

    }

    public function fetchByEmail($e_mail){

        if (Users::where('email', $e_mail)->exists()) {
            $user = Users::where('email', $e_mail)->get()->toJson(JSON_PRETTY_PRINT);
            return response($user, 200);
        } else {
            return response()->json([
                "message" => "User email doesn't exist!"
            ], 404);
        }
    }

    public function fetchByContactNo($phone_no){

        if (Users::where('phoneNo', $phone_no)->exists()) {
            $user = Users::where('phoneNo', $phone_no)->get()->toJson(JSON_PRETTY_PRINT);
            return response($user, 200);
        } else {
            return response()->json([
                "message" => "Phone number doesn't exist!"
            ], 404);
        }
    }

    public function fetchAll(){
        $users = Users::get()->toJson(JSON_PRETTY_PRINT);
        return response($users, 200);
    }

    public function deleteByContactNo($contactNo){
        if(Users::where('phoneNo', $contactNo)->exists()){
            DB::table('users')->where('phoneNo',$contactNo)->delete();
            return response()->json([
                "message" => "User successfully deleted!"
            ], 202);
        } else {
            return response()->json([
                "message" => "Phone number doesn't exist!!"
            ], 404);
        }

    }

    public function deleteByName($username){
        if(Users::where('name', $username)->exists()){
            DB::table('users')->where('name',$username)->delete();
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
        if(Users::where('email', $email)->exists()){
            DB::table('users')->where('email',$email)->delete();
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
