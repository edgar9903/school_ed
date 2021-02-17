<?php

namespace App\Services;

use App\Repositories\ClassroomRepository;
use Illuminate\Support\Facades\Auth;

class ClassroomService
{
    /**
     * @var classroomRepository
     */
    protected $classroomRepository;

    /**
     *  Construct.
     * @param $classroomRepository
     * @return void
     */
    public function __construct(
        ClassroomRepository $classroomRepository
    )
    {
        $this->classroomRepository = $classroomRepository;
    }

    /**
       * Get all teachers.
       * @return mixed
    */
    public function all(){
        return $this->classroomRepository->orderBy('id','desc')->all();
    }

    /**
     * find teacher from id.
     * @param int $id
     * @return mixed
    */
    public function find(int $id){

        return $this->classroomRepository->find($id);
    }

    /**
     * Create teacher.
     * @param array $data
     * @return mixed
     */
    public function create(array $data){

        return $this->classroomRepository->create($data);
    }

    /**
     * Update teacher.
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function update(array $data,int $id)
    {
        if($this->classroomRepository->whereOne(['id' => $id])) {

            return $this->classroomRepository->update($data, ['id' => $id]);
        }
        return false;
    }

    /**
     * delete teacher.
     * @param int $id
     * @return mixed
     */
    public function delete(int $id){
        if($this->classroomRepository->whereOne(['id' => $id])) {

            return $this->classroomRepository->delete(['id' => $id]);
        }

        return false;
    }


}
