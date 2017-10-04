<?php

namespace App\Repositories\User;

use App\Constants\Role;
use App\Contracts\Repositories\User\UserRepository;
use App\Repositories\DbRepository;
use App\User;
use Illuminate\Support\Facades\DB;

class EloquentUserRepository implements UserRepository
{
    public $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function store(array $data)
    {
        DB::transaction(function() use ($data) {
            $user = $this->model->create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt(date('YMldHisv'))
            ]);

            $user->assignRole(Role::MEMBER);

            return $user;
        });
    }

    public function destroy(int $id)
    {
        $user = $this->model->findOrFail($id);

        DB::transaction(function() use ($user) {
            $user->roles()->detach();

            return $user->destroy($user->id);
        });
    }

    public function toggleGroupMembership(int $userId, int $groupId)
    {
        $user = $this->model->findOrFail($userId);

        return $user->groups()->toggle($groupId);
    }
}