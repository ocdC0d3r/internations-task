<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Repositories\Group\GroupRepository;
use App\Group;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{
    public $groupRepository;

    public function __construct(GroupRepository $groupRepository)
    {
        $this->groupRepository = $groupRepository;
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->groupRepository->store($request['name']);
        } catch (QueryException $exception) {
            die('Something went wrong');
        } finally {
            return Response::json(['Success']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $groupId
     * @return \Illuminate\Http\Response
     */
    public function destroy($groupId)
    {
        try {
            $this->groupRepository->destroy($groupId);
        } catch (QueryException $exception) {
            die('Something went wrong');
        } catch (ModelNotFoundException $exception) {
            die('Group does not exist or has members');
        } finally {
            return Response::json(['Success']);
        }
    }
}
