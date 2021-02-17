<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\TeacherService;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Admin\Teacher\CreateRequest;
use App\Http\Requests\Admin\Teacher\UpdateRequest;

class TeacherController extends Controller
{

    protected $teacherService;

    /**
     *  Construct.
     *
     * @param $teacherService
     * @return void
     */
    public function __construct(
        TeacherService $teacherService
    )
    {
        $this->teacherService = $teacherService;
    }

    /**
     * Display a listing of the teacher.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $teachers = $this->teacherService->all();

        return view('admin.teacher.index',compact('teachers'));
    }

    /**
     * Show the form for creating a new teacher.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.teacher.create');
    }

    /**
     * Store a newly created teacher in database.
     *
     * @param  \App\Http\Requests\Admin\Teacher\CreateRequest  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateRequest $request)
    {
        $data = $request->only('name','surname');
        $teacher = $this->teacherService->create($data);

        return Redirect(route('admin.teacher.show',$teacher->id));
    }

    /**
     * Display the specified teacher.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $teacher = $this->teacherService->find($id);

        return view('admin.teacher.show',compact('teacher'));
    }

    /**
     * Show the form for editing the specified teacher.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $teacher = $this->teacherService->find($id);

        return view('admin.teacher.edit',compact('teacher'));
    }

    /**
     * Update the specified teacher in database.
     *
     * @param  \App\Http\Requests\Admin\Teacher\UpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->only('name','surname');
        if($this->teacherService->update($data,$id)){

            return Redirect(route('admin.teacher.show',$id));
        }

        return Redirect::back();
    }

    /**
     * Remove the specified teacher from database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        if($this->teacherService->delete($id)) {

            return Redirect(route('admin.teacher.index'));
        }

        return Redirect::back();
    }
}
