<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    const WEEKDAYS = [
         'SU' => 0,
         'MO' => 1,
         'TU' => 2,
         'WE' => 3,
         'TH' => 4,
         'FR' => 5,
         'SA' => 6,
    ];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'teacher_id',
        'classroom_id',
        'lesson_id',
        'weekdays',
        'start',
        'end'
    ];



    /**
     * get teacher from teacher_id.
     *
     * @return mixed
     */
    public function Teacher()
    {
        return $this->belongsTo(Teacher::class,'teacher_id');
    }

    /**
     * get classroom from classroom_id.
     *
     * @return mixed
     */
    public function Classroom()
    {
        return $this->belongsTo(Classroom::class,'classroom_id');
    }

    /**
     * get lesson from lesson_id.
     *
     * @return mixed
     */
    public function Lesson()
    {
        return $this->belongsTo(Lesson::class,'lesson_id');
    }
}
