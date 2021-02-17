<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Schedule\CreateRequest;
use App\Http\Requests\Admin\Schedule\UpdateRequest;
use App\Services\ScheduleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ScheduleController extends Controller
{
    protected $scheduleService;

    /**
     *  Construct.
     *
     * @param $scheduleService
     * @return void
     */
    public function __construct(
        ScheduleService $scheduleService
    )
    {
        $this->scheduleService = $scheduleService;
    }

    /**
     * Display a listing of the schedule.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $schedules = $this->scheduleService->all();

        return view('admin.schedule.index',compact('schedules'));
    }

    /**
     * Show the form for creating a new schedule.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $data = $this->scheduleService->allData();

        return view('admin.schedule.create',compact('data'));
    }

    /**
     * Store a newly created schedule in database.
     *
     * @param  \App\Http\Requests\Admin\schedule\CreateRequest  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateRequest $request)
    {
        $data = $request->all();

        $schedule = $this->scheduleService->create($data);

        if ($schedule) {

            return Redirect(route('admin.schedule.show',$schedule->id));
        }

        Session::flash('error', 'Please select another time');

        return Redirect::back();

    }

    /**
     * Display the specified schedule.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $schedule = $this->scheduleService->find($id);

        return view('admin.schedule.show',compact('schedule'));
    }

    /**
     * Show the form for editing the specified schedule.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $schedule = $this->scheduleService->find($id);

        $data = $this->scheduleService->allData();

        return view('admin.schedule.edit',compact('schedule','data'));
    }

    /**
     * Update the specified schedule in database.
     *
     * @param  \App\Http\Requests\Admin\schedule\UpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->all();
        if($this->scheduleService->update($data,$id)){

            return Redirect(route('admin.schedule.show',$id));
        }

        Session::flash('error', 'Please select another time');
        return Redirect::back();
    }

    /**
     * Remove the specified schedule from database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        if($this->scheduleService->delete($id)) {

            return Redirect(route('admin.schedule.index'));
        }

        return Redirect::back();
    }
}
