<?php

namespace App\Services;

use App\Repositories\LessonRepository;
use Illuminate\Support\Facades\Auth;

class LessonService
{
    /**
     * @var lessonRepository
     */
    protected $lessonRepository;

    /**
     *  Construct.
     * @param $ClassroomRepository
     * @return void
     */
    public function __construct(
        LessonRepository $lessonRepository
    )
    {
        $this->lessonRepository = $lessonRepository;
    }

    /**
       * Get all teachers.
       * @return mixed
    */
    public function all(){
        return $this->lessonRepository->orderBy('id','desc')->all();
    }

    /**
     * find teacher from id.
     * @param int $id
     * @return mixed
    */
    public function find(int $id){

        return $this->lessonRepository->find($id);
    }

    /**
     * Create teacher.
     * @param array $data
     * @return mixed
     */
    public function create(array $data){

        return $this->lessonRepository->create($data);
    }

    /**
     * Update teacher.
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function update(array $data,int $id)
    {
        if($this->lessonRepository->whereOne(['id' => $id])) {

            return $this->lessonRepository->update($data, ['id' => $id]);
        }
        return false;
    }

    /**
     * delete teacher.
     * @param int $id
     * @return mixed
     */
    public function delete(int $id){
        if($this->lessonRepository->whereOne(['id' => $id])) {

            return $this->lessonRepository->delete(['id' => $id]);
        }

        return false;
    }


}
