<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
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
     * get schedules from classroom_id.
     *
     * @return mixed
     */
    public function Schedule()
    {
        return $this->hasMany(Schedule::class,'classroom_id');
    }

}
