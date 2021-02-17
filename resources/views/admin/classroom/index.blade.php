@extends('layouts.admin')

@section('content')
    <div class="container">
        <a href="{{ route('admin.classroom.create')}}" class="btn btn-outline-success float-right">Create</a>
        <div class="row">
            @foreach($classrooms as $classroom)
                <div class="col-md-3 p-2">
                    <div class="border p-3">
                        <a href="{{ route('admin.classroom.show',$classroom->id)}}">
                            <h5 class="text-center">{{ $classroom->name }}</h5>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
