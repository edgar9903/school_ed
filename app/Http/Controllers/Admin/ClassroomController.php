<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Classroom\CreateRequest;
use App\Http\Requests\Admin\Classroom\UpdateRequest;
use App\Services\ClassroomService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ClassroomController extends Controller
{
    protected $classroomService;

    /**
     *  Construct.
     *
     * @param $classroomService
     * @return void
     */
    public function __construct(
        ClassroomService $classroomService
    )
    {
        $this->classroomService = $classroomService;
    }

    /**
     * Display a listing of the classroom.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $classrooms = $this->classroomService->all();

        return view('admin.classroom.index',compact('classrooms'));
    }

    /**
     * Show the form for creating a new classroom.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.classroom.create');
    }

    /**
     * Store a newly created classroom in database.
     *
     * @param  \App\Http\Requests\Admin\classroom\CreateRequest  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateRequest $request)
    {
        $data = $request->only('name');
        $classroom = $this->classroomService->create($data);

        return Redirect(route('admin.classroom.show',$classroom->id));
    }

    /**
     * Display the specified classroom.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $classroom = $this->classroomService->find($id);

        return view('admin.classroom.show',compact('classroom'));
    }

    /**
     * Show the form for editing the specified classroom.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $classroom = $this->classroomService->find($id);

        return view('admin.classroom.edit',compact('classroom'));
    }

    /**
     * Update the specified classroom in database.
     *
     * @param  \App\Http\Requests\Admin\classroom\UpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->only('name');
        if($this->classroomService->update($data,$id)){

            return Redirect(route('admin.classroom.show',$id));
        }

        return Redirect::back();
    }

    /**
     * Remove the specified classroom from database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        if($this->classroomService->delete($id)) {

            return Redirect(route('admin.classroom.index'));
        }

        return Redirect::back();
    }
}
