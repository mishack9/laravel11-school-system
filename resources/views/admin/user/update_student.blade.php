@extends('admin.layout')



@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Update Student </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active"> Update Student </li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"> Update Student </h3>
                            </div>


                            <form action="{{ route('admin.updateStudent.update', $student_data->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="_method" value="put">
                                <input type="hidden" name="parent_id" value="{{ $student_data->parent_id }}"
                                    id="">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Student_firstname </label>
                                                <input type="text" class="form-control" name="s_firstname"
                                                    id="exampleInputEmail1"
                                                    value="{{ old('s_firstname', $student_data->s_firstname) }}">
                                            </div>

                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Student_middlename </label>
                                                <input type="text" class="form-control" name="s_middlename"
                                                    id="exampleInputEmail1"
                                                    value="{{ old('s_middlename', $student_data->s_middlename) }}">
                                            </div>

                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Student_lastname </label>
                                                <input type="text" class="form-control" name="s_lastname"
                                                    id="exampleInputEmail1"
                                                    value="{{ old('s_lastname', $student_data->s_lastname) }}">
                                            </div>

                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Student_email </label>
                                                <input type="text" class="form-control" name="s_email"
                                                    id="exampleInputEmail1"
                                                    value="{{ old('s_email', $student_data->s_email) }}">
                                            </div>

                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> DOB </label>
                                                <input type="date" class="form-control" name="dob"
                                                    id="exampleInputEmail1" value="{{ old('dob', $student_data->dob) }}">
                                            </div>

                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Gender </label>
                                                <select name="gender" class ="form-control" id="">
                                                    <option value="" disabled selected>--Select gender--</option>
                                                    <option value="male"
                                                        {{ $student_data->gender === 'male' ? 'selected' : '' }}>Male
                                                    </option>
                                                    <option value="female"
                                                        {{ $student_data->gender === 'female' ? 'selected' : '' }}>Female
                                                    </option>
                                                    <option value="custom"
                                                        {{ $student_data->gender === 'custom' ? 'selected' : '' }}>Custom
                                                    </option>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> File_photo </label>
                                                <input type="file" class="form-control" name="image"
                                                    id="exampleInputEmail1">
                                            </div>

                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Acedamic_year </label>
                                                <select name="acedamic_year_id" class="form-control">
                                                    <option value="" disabled selected>--Select year--</option>
                                                    @foreach ($acedamic_data as $data)
                                                        <option value="{{ $data->id }}"
                                                            {{ $student_data->acedamic_year_id == $data->id ? 'selected' : null }}>
                                                            {{ $data->name_year }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Class </label>
                                                <select name="class_id" class="form-control">
                                                    <option value="" disabled selected>--Select class--</option>
                                                    @foreach ($class_data as $data)
                                                        <option value="{{ $data->id }}"
                                                            {{ $student_data->class_id == $data->id ? 'selected' : null }}>
                                                            {{ $data->class_title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Course </label>
                                                <select name="course_id" class="form-control">
                                                    <option value="" disabled selected>--Select course--</option>
                                                    @foreach ($course_data as $data)
                                                        <option value="{{ $data->id }}"
                                                            {{ $student_data->course_id == $data->id ? 'selected' : null }}>
                                                            {{ $data->course_title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Section </label>
                                                <select name="section_id" class="form-control">
                                                    <option value="" disabled selected>--Select section--</option>
                                                    @foreach ($section_data as $data)
                                                        <option value="{{ $data->id }}"
                                                            {{ $student_data->section_id == $data->id ? 'selected' : null }}>
                                                            {{ $data->section }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col-md-4 mt-5">
                                            <div class="form-check">
                                                <input type="checkbox" name = "status" class="form-check-input"
                                                    id="exampleCheck1"
                                                    {{ $student_data->status == 'Publish' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="exampleCheck1">
                                                    Publish</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </div>
@endsection


@section('customJs')
    <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endsection
