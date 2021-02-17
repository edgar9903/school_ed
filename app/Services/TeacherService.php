<?php

namespace App\Services;

use App\Repositories\TeacherRepository;
use Exception;
use Illuminate\Support\Facades\Auth;

class TeacherService
{
    /**
     * @var teacherRepository
     */
    protected $teacherRepository;

    /**
     *  Construct.
     * @param $teacherRepository
     * @return void
     */
    public function __construct(
        TeacherRepository $teacherRepository
    )
    {
        $this->teacherRepository = $teacherRepository;
    }

    /**
       * Get all teachers.
       * @return mixed
    */
    public function all(){
        return $this->teacherRepository->orderBy('id','desc')->all();
    }

    /**
     * find teacher from id.
     * @param int $id
     * @return mixed
    */
    public function find(int $id){

        return $this->teacherRepository->find($id);
    }

    /**
     * Create teacher.
     * @param array $data
     * @return mixed
     */
    public function create(array $data){

        return $this->teacherRepository->create($data);
    }

    /**
     * Update teacher.
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function update(array $data,int $id)
    {
        if($this->teacherRepository->whereOne(['id' => $id])) {

            return $this->teacherRepository->update($data, ['id' => $id]);
        }
        return false;
    }

    /**
     * delete teacher.
     * @param int $id
     * @return mixed
     */
    public function delete(int $id){
        if($this->teacherRepository->whereOne(['id' => $id])) {

            return $this->teacherRepository->delete(['id' => $id]);
        }

        return false;
    }


}
