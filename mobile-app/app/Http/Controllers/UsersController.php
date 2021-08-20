<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Services;


class UsersController extends Controller
{
    protected $service;

    public function __construct(Services $service)
    {
        $this->service = $service;
    }

    public function createUser(Request $request){
        return $this->service->Create($request);
    }

    public function fetchUserByName($username){
        return $this->service->fetchbyName($username);
    }

    public function fetchUsersByEmail($email){
        return $this->service->fetchbyEmail($email);
    }

    public function fetchUserByContactNo($contactNo){
        return $this->service->fetchbyContactNo($contactNo);
    }

    public function fetchAllUsers(){
        return $this->service->fetchAll();
    }

    public function deleteUserByName($username): \Illuminate\Http\JsonResponse
    {
        return $this->service->deletebyName($username);
    }

    public function deleteUserByEmail($email): \Illuminate\Http\JsonResponse
    {
        return $this->service->deletebyEmail($email);
    }

    public function deleteUserByContactNo($contactNo): \Illuminate\Http\JsonResponse
    {
        return $this->service->deleteByContactNo($contactNo);
    }

}
