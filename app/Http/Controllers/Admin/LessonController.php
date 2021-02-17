<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Lesson\CreateRequest;
use App\Http\Requests\Admin\Lesson\UpdateRequest;
use App\Services\LessonService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LessonController extends Controller
{
    protected $lessonService;

    /**
     *  Construct.
     *
     * @param $lessonService
     * @return void
     */
    public function __construct(
        LessonService $lessonService
    )
    {
        $this->lessonService = $lessonService;
    }

    /**
     * Display a listing of the lesson.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $lessons = $this->lessonService->all();

        return view('admin.lesson.index',compact('lessons'));
    }

    /**
     * Show the form for creating a new lesson.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.lesson.create');
    }

    /**
     * Store a newly created lesson in database.
     *
     * @param  \App\Http\Requests\Admin\lesson\CreateRequest  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateRequest $request)
    {
        $data = $request->only('name');
        $lesson = $this->lessonService->create($data);

        return Redirect(route('admin.lesson.show',$lesson->id));
    }

    /**
     * Display the specified lesson.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $lesson = $this->lessonService->find($id);

        return view('admin.lesson.show',compact('lesson'));
    }

    /**
     * Show the form for editing the specified lesson.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $lesson = $this->lessonService->find($id);

        return view('admin.lesson.edit',compact('lesson'));
    }

    /**
     * Update the specified lesson in database.
     *
     * @param  \App\Http\Requests\Admin\lesson\UpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->only('name');
        if($this->lessonService->update($data,$id)){

            return Redirect(route('admin.lesson.show',$id));
        }

        return Redirect::back();
    }

    /**
     * Remove the specified lesson from database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        if($this->lessonService->delete($id)) {

            return Redirect(route('admin.lesson.index'));
        }

        return Redirect::back();
    }
}
