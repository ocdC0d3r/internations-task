<?php

namespace App\Contracts\Repositories\Group;

interface GroupRepository
{
    public function store(string $name);

    public function destroy(int $id);
}