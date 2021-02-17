@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <p>Teacher: {{$schedule->teacher->name}} {{$schedule->teacher->surname}}</p>
                        <p>Lesson: {{$schedule->lesson->name}}</p>
                        <p>Classroom: {{$schedule->lesson->name}}</p>
                        <span class="text-center">Start: {{ \Carbon\Carbon::parse($schedule->start)->format('H:i') }} End: {{ \Carbon\Carbon::parse($schedule->end)->format('H:i') }}</span>
                        <form action="{{ route('admin.schedule.destroy',$schedule->id) }}" method="POST" class="float-right">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                        <a href="{{ route('admin.schedule.edit',$schedule->id) }}" class="float-right btn btn-warning mr-2">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
