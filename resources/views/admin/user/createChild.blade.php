@extends('admin.layout')



@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Register Student </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active"> Register Student </li>
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
                                <h3 class="card-title"> Register Student </h3>
                            </div>


                            <form action="{{ route('admin.addStudent.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name = "parent_id" value="{{$parent_data->id}}">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Parent_firstname </label>
                                                <input type="text" class="form-control" name="name"
                                                    id="exampleInputEmail1" readonly value="{{$parent_data->name}}">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Parent_lastname </label>
                                                <input type="text" class="form-control" name="email"
                                                    id="exampleInputEmail1" readonly value="{{$parent_data->lastname}}">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Parent_email </label>
                                                <input type="text" class="form-control" name="lastname"
                                                    id="exampleInputEmail1"  readonly value="{{$parent_data->email}}">
                                            </div>

                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Student_firstname </label>
                                                <input type="text" class="form-control" name="s_firstname"
                                                    id="exampleInputEmail1" placeholder="Enter Student First_name" value="{{old('s_firstname')}}" style="@error('s_firstname')
                                                    border-color:red
                                                @enderror">
                                            </div>
                                            @error('s_firstname')
                                            <p class = "text-danger"> * {{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Student_middlename </label>
                                                <input type="text" class="form-control" name="s_middlename"
                                                    id="exampleInputEmail1" placeholder="Enter Student Middlename" value="{{old('s_middlename')}}" style="@error('s_middlename')
                                                    border-color:red
                                                @enderror">
                                            </div>
                                            @error('s_middlename')
                                            <p class = "text-danger"> * {{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Student_lastname </label>
                                                <input type="text" class="form-control" name="s_lastname"
                                                    id="exampleInputEmail1" placeholder="Enter Student Lastname" value="{{old('s_lastname')}}" style="@error('s_lastname')
                                                    border-color:red
                                                @enderror">
                                            </div>
                                            @error('s_lastname')
                                            <p class = "text-danger"> * {{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Student_email </label>
                                                <input type="text" class="form-control" name="s_email"
                                                    id="exampleInputEmail1" placeholder="@example@gamil.com" value="{{old('s_email')}}" style="@error('s_email')
                                                    border-color:red
                                                @enderror">
                                            </div>
                                            @error('s_email')
                                            <p class = "text-danger"> * {{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> DOB </label>
                                                <input type="date" class="form-control" name="s_dob"
                                                    id="exampleInputEmail1" placeholder="DOB" value="{{old('s_dob')}}" style="@error('s_dob')
                                                    border-color:red
                                                @enderror">
                                            </div>
                                            @error('s_dob')
                                            <p class = "text-danger"> * {{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Gender </label>
                                                <select name="gender" class ="form-control" id="" style="@error('gender')
                                                border-color:red
                                            @enderror">
                                                    <option value="" disabled selected>--Select gender--</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="custom">Custom</option>
                                                </select>
                                            </div>
                                            @error('gender')
                                            <p class = "text-danger"> * {{ $message }}</p>
                                            @enderror
                                      </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> File_photo </label>
                                                <input type="file" class="form-control" name="image"
                                                    id="exampleInputEmail1" style="@error('image')
                                                    border-color:red
                                                @enderror">
                                            </div>
                                            @error('image')
                                            <p class = "text-danger"> * {{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Acedamic_year </label>
                                               <select name="acedamic_year_id" class="form-control" style="@error('acedamic_year_id')
                                               border-color:red
                                           @enderror">
                                                <option value="" disabled selected>--Select year--</option>
                                                @foreach ($acedamic_data as $data)
                                                   <option value="{{$data->id}}">{{ $data->name_year }}</option>
                                                @endforeach
                                               </select>
                                            </div>
                                            @error('acedamic_year_id')
                                                <p class = "text-danger"> * {{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Class </label>
                                               <select name="class_id" class="form-control" style="@error('class_id')
                                               border-color:red
                                           @enderror">
                                                <option value="" disabled selected>--Select class--</option>
                                                @foreach ($class_data as $data)
                                                   <option value="{{$data->id}}">{{ $data->class_title }}</option>
                                                @endforeach
                                               </select>
                                            </div>
                                            @error('class_id')
                                                <p class = "text-danger"> * {{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Course </label>
                                               <select name="course_id" class="form-control" style="@error('course_id')
                                               border-color:red
                                           @enderror">
                                                <option value="" disabled selected>--Select course--</option>
                                                @foreach ($course_data as $data)
                                                  <option value="{{$data->id}}">{{ $data->course_title }}</option>
                                                @endforeach
                                               </select>
                                            </div>
                                            @error('course_id')
                                                <p class = "text-danger"> * {{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Section </label>
                                               <select name="section_id" class="form-control" style="@error('section_id')
                                               border-color:red
                                           @enderror">
                                                <option value="" disabled selected>--Select section--</option>
                                                @foreach ($section_data as $data)
                                                  <option value="{{$data->id}}">{{ $data->section }}</option>
                                                @endforeach
                                               </select>
                                            </div>
                                            @error('section_id')
                                                <p class = "text-danger"> * {{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Generate_password </label>
                                                <input type="text" class="form-control" name="password"
                                                    id="exampleInputEmail1" placeholder="************" value="{{old('password')}}" style="@error('password')
                                                    border-color:red
                                                @enderror">
                                            </div>
                                            @error('password')
                                            <p class = "text-danger"> * {{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Admission_date </label>
                                                <input type="date" class="form-control" name="admission_date"
                                                    id="exampleInputEmail1" placeholder="************" value="{{old('admission_date')}}" style="@error('admission_date')
                                                    border-color:red
                                                @enderror">
                                            </div>
                                            @error('admission_date')
                                            <p class = "text-danger"> * {{ $message }}</p>
                                            @enderror
                                        </div>

                                          <div class="col-md-4 mt-5">
                                            <div class="form-check">
                                                <input type="checkbox" name = "status" class="form-check-input"
                                                    id="exampleCheck1">
                                                <label class="form-check-label" for="exampleCheck1">Publish</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Register</button>
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
