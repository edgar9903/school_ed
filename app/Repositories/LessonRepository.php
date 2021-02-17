<?php

namespace App\Repositories;

use App\Models\Lesson;

class LessonRepository extends Repository
{
    /**
     * @var Lesson
     */
    protected $model;
    /**
     *  Construct.
     *
     * @param $lesson
     * @return void
     */
    public function __construct(Lesson $lesson)
    {
        $this->model = $lesson;
    }
}
