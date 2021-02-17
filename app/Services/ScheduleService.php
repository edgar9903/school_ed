<?php

namespace App\Services;

use App\Repositories\ClassroomRepository;
use App\Repositories\LessonRepository;
use App\Repositories\ScheduleRepository;
use App\Repositories\TeacherRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;

class ScheduleService
{
    /**
     * @var teacherRepository
     * @var classroomRepository
     * @var lessonRepository
     * @var scheduleRepository
     */
    protected $teacherRepository;
    protected $classroomRepository;
    protected $lessonRepository;
    protected $scheduleRepository;

    /**
     *  Construct.
     * @param $teacherRepository
     * @param $classroomRepository
     * @param $lessonRepository
     * @param $scheduleRepository
     * @return void
     */
    public function __construct(
        TeacherRepository $teacherRepository,
        ClassroomRepository $classroomRepository,
        LessonRepository $lessonRepository,
        ScheduleRepository $scheduleRepository
    )
    {
        $this->teacherRepository = $teacherRepository;
        $this->classroomRepository = $classroomRepository;
        $this->lessonRepository = $lessonRepository;
        $this->scheduleRepository = $scheduleRepository;
    }

    /**
       * Get all teachers.
       * @return mixed
    */
    public function all(){
        return $this->scheduleRepository->orderBy('id','desc')->all();
    }

    /**
     * find teacher from id.
     * @param int $id
     * @return mixed
    */
    public function find(int $id){

        return $this->scheduleRepository->find($id);
    }

    /**
     * Create teacher.
     * @param array $data
     * @return mixed
     */
    public function create(array $data){

        $record = $this->scheduleRepository->checkTime($data);

        if ($record) {
            $create = [
                'teacher_id' => $data['teacher'],
                'lesson_id' => $data['lesson'],
                'classroom_id' => $data['classroom'],
                'weekdays' => $data['weekdays'],
                'start' => $data['start'],
                'end' => $data['end']
            ];

            return $this->scheduleRepository->create($create);
        } else {
            return false;
        }
    }

    /**
     * Update teacher.
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function update(array $data,int $id)
    {
        if($this->scheduleRepository->whereOne(['id' => $id])) {
            $record = $this->scheduleRepository->checkTime($data,$id);

            if ($record) {

                $update = [
                    'teacher_id' => $data['teacher'],
                    'lesson_id' => $data['lesson'],
                    'classroom_id' => $data['classroom'],
                    'weekdays' => $data['weekdays'],
                    'start' => $data['start'],
                    'end' => $data['end']
                ];

                return $this->scheduleRepository->update($update, ['id' => $id]);
            }
        }
        return false;
    }

    /**
     * delete teacher.
     * @param int $id
     * @return mixed
     */
    public function delete(int $id){
        if($this->scheduleRepository->whereOne(['id' => $id])) {

            return $this->scheduleRepository->delete(['id' => $id]);
        }

        return false;
    }

    /**
     * get all data.
     * @return mixed
     */
    public function allData(){
        $data['teachers'] = $this->teacherRepository->all();
        $data['lessons'] = $this->lessonRepository->all();
        $data['classrooms'] = $this->classroomRepository->all();

        return $data;
    }



}
