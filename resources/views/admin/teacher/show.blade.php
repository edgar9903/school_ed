@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ $teacher->name }} {{ $teacher->surname }}</h5>
                        <form action="{{ route('admin.teacher.destroy',$teacher->id) }}" method="POST" class="float-right">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                        <a href="{{ route('admin.teacher.edit',$teacher->id) }}" class="float-right btn btn-warning mr-2">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
