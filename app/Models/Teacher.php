<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname'
    ];

    /**
     * get schedules from teacher_id.
     *
     * @return mixed
     */
    public function Schedule()
    {
        return $this->hasMany(Schedule::class,'teacher_id');
    }
}
