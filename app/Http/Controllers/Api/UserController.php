<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Repositories\User\UserRepository;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    public $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Request $request)
    {
        try {
            $this->userRepository->store([
                'name' => $request['name'],
                'email' => $request['email']
            ]);
        } catch (QueryException $exception) {
            die('Something went wrong');
        } finally {
            return Response::json(['Success']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->userRepository->destroy($id);
        } catch (QueryException $exception) {
            die('Something went wrong');
        } catch (ModelNotFoundException $exception) {
            die('User does not exist');
        } finally {
            return Response::json(['Success']);
        }
    }

    public function toggleGroupMembership(Request $request)
    {
        try {
            $this->userRepository->toggleGroupMembership($request['user_id'], $request['group_id']);
        } catch (QueryException $exception) {
            die('Something went wrong');
        } finally {
            return Response::json(['Success']);
        }
    }
}