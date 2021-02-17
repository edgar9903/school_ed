<?php

namespace App\Repositories;

use App\Models\Teacher;

class TeacherRepository extends Repository
{
    /**
     * @var Teacher
     */
    protected $model;
    /**
     *  Construct.
     *
     * @param $teacher
     * @return void
     */
    public function __construct(Teacher $teacher)
    {
        $this->model = $teacher;
    }
}
