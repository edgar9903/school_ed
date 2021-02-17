<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends Repository
{
    /**
     * @var User
     */
    protected $model;
    /**
     *  Construct.
     *
     * @param $user
     * @return void
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }
}
