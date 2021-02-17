<?php

namespace App\Repositories\Contracts;

interface ScheduleRepositoryInterface
{
    /**
     *  check time for schedule record in the database.
     *
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function checkTime(array $data,$id = null);
}
