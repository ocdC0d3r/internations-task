<?php

namespace App\Contracts\Repositories\User;

interface UserRepository
{
    public function store(array $data);

    public function destroy(int $id);

    public function toggleGroupMembership(int $userId, int $groupId);
}