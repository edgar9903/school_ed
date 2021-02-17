<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * get schedules from lesson_id.
     *
     * @return mixed
     */
    public function Schedule()
    {
        return $this->hasMany(Schedule::class,'lesson_id');
    }
}
