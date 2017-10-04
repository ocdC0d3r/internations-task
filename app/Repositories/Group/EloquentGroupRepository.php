<?php

namespace App\Repositories\Group;

use App\Contracts\Repositories\Group\GroupRepository;
use App\Group;

class EloquentGroupRepository implements GroupRepository
{
    public $model;

    public function __construct(Group $model)
    {
        $this->model = $model;
    }

    public function store(string $name)
    {
        return $this->model->create([
            'name' => strtolower($name)
        ]);
    }

    public function destroy(int $id)
    {
        return $this->model->destroy($id);
    }
}