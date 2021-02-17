@extends('layouts.admin')

@section('content')
    <div class="container">
        <a href="{{ route('admin.lesson.create')}}" class="btn btn-outline-success float-right">Create</a>
        <div class="row">
            @foreach($lessons as $lesson)
                <div class="col-md-3 p-2">
                    <div class="border p-3">
                        <a href="{{ route('admin.lesson.show',$lesson->id)}}">
                            <h5 class="text-center">{{ $lesson->name }}</h5>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
