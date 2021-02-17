@extends('layouts.admin')

@section('content')
    <div class="container">
        <a href="{{ route('admin.schedule.create')}}" class="btn btn-outline-success float-right">Create</a>
        <div class="row">
            @foreach($schedules as $schedule)
                <div class="col-md-3 p-2">
                    <div class="border p-3">
                        <a href="{{ route('admin.schedule.show',$schedule->id)}}">
                            <p>Teacher: {{$schedule->teacher->name}} {{$schedule->teacher->surname}}</p>
                            <p>Lesson: {{$schedule->lesson->name}}</p>
                            <p>Classroom: {{$schedule->lesson->name}}</p>
                            <span class="text-center">Start: {{ \Carbon\Carbon::parse($schedule->start)->format('H:i') }} End: {{ \Carbon\Carbon::parse($schedule->end)->format('H:i') }}</span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
