<?php

namespace App\Repositories;

use App\Models\Schedule;
use App\Repositories\Contracts\ScheduleRepositoryInterface;
use Carbon\Carbon;

class ScheduleRepository extends Repository implements ScheduleRepositoryInterface
{
    /**
     * @var Schedule
     */
    protected $model;
    /**
     *  Construct.
     *
     * @param $schedule
     * @return void
     */
    public function __construct(Schedule $schedule)
    {
        $this->model = $schedule;
    }


    /**
     *  check time for schedule record in the database.
     *
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function checkTime(array $data,$id = null)
    {
        $start = Carbon::parse($data['start'])->subMinute(5)->format('H:i');
        $end = Carbon::parse($data['end'])->addMinute(5)->format('H:i');

        $record = $this->query()
            ->where(function ($query) use($start,$end) {
                $query->where(function($query) use($start,$end){
                    $query->whereBetween('start',[$start,$end]);
                })
                ->orWhere(function($query) use($start,$end){
                    $query->orWhereBetween('end',[$start,$end]);
                });
            })
            ->where('weekdays',$data['weekdays'])
            ->where(function ($query) use($id){
                if (!is_null($id)) {
                    $query->where('id','<>',$id);
                }
            })
            ->first();

        if ($record) {
            return false;
        }
        return true;
    }
}
