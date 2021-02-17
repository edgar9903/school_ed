@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Schedule create</div>

                    <div class="card-body">
                        <form action="{{ route('admin.schedule.store') }}" method="post">
                            @csrf
                            @if (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="form-group row">
                                <label for="weekdays" class="col-md-3 col-form-label text-md-right">Weekdays</label>

                                <div class="col-md-7">
                                    <select name="weekdays" id="weekdays" class="form-control @error('weekdays') is-invalid @enderror" name="weekdays" required autofocus>
                                        <option value="">Select Weekday</option>
                                        <option value="1" {{ old('weekdays') == 1?'selected':'' }}>MONDAY</option>
                                        <option value="2" {{ old('weekdays') == 2?'selected':'' }}>TUESDAY</option>
                                        <option value="3" {{ old('weekdays') == 3?'selected':'' }}>WEDNESDAY</option>
                                        <option value="4" {{ old('weekdays') == 4?'selected':'' }}>THURSDAY</option>
                                        <option value="5" {{ old('weekdays') == 5?'selected':'' }}>FRIDAY</option>
                                    </select>
                                    @error('weekdays')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="teacher" class="col-md-3 col-form-label text-md-right">Teacher</label>
                                <div class="col-md-7">
                                    <select name="teacher" id="teacher" class="form-control @error('teacher') is-invalid @enderror" name="teacher" required>
                                        <option value="">Select Teacher</option>
                                        @foreach($data['teachers'] as $teacher)
                                            <option value="{{$teacher->id}}" {{ old('teacher') == $teacher->id?'selected':'' }}>{{$teacher->name}} {{$teacher->surname}}</option>
                                        @endforeach
                                    </select>
                                    @error('teacher')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="classroom" class="col-md-3 col-form-label text-md-right">Teacher</label>
                                <div class="col-md-7">
                                    <select name="classroom" id="classroom" class="form-control @error('classroom') is-invalid @enderror" name="classroom" required>
                                        <option value="">Select Classroom</option>
                                        @foreach($data['classrooms'] as $classroom)
                                            <option value="{{$classroom->id}}" {{ old('classroom') == $classroom->id?'selected':'' }}>{{$classroom->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('classroom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lesson" class="col-md-3 col-form-label text-md-right">Teacher</label>
                                <div class="col-md-7">
                                    <select name="lesson" id="lesson" class="form-control @error('lesson') is-invalid @enderror" name="lesson" required>
                                        <option value="">Select Lesson</option>
                                        @foreach($data['lessons'] as $lesson)
                                            <option value="{{$lesson->id}}" {{ old('lesson') == $lesson->id?'selected':'' }}>{{$lesson->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('lesson')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="start" class="col-md-3 col-form-label text-md-right">Start</label>

                                <div class="col-md-7">
                                    <input id="start" type="time" class="form-control @error('start') is-invalid @enderror" name="start" value="{{ old('start') }}" required autocomplete="start">

                                    @error('start')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="end" class="col-md-3 col-form-label text-md-right">End</label>

                                <div class="col-md-7">
                                    <input id="end" type="time" class="form-control @error('end') is-invalid @enderror" name="end" value="{{ old('end') }}" required autocomplete="end">

                                    @error('end')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-3">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
