<?php

namespace App\Repositories;

use App\Models\Classroom;

class ClassroomRepository extends Repository
{
    /**
     * @var Classroom
     */
    protected $model;
    /**
     *  Construct.
     *
     * @param $classroom
     * @return void
     */
    public function __construct(Classroom $classroom)
    {
        $this->model = $classroom;
    }
}
