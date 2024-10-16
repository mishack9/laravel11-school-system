@extends('admin.layout')



@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Add_Parent / Spause </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active"> Add_Parent / Spause </li>
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
                                <h3 class="card-title"> Add_Parent / Spause </h3>
                            </div>


                            <form action="{{ route('admin.addParent.store') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> First_name </label>
                                                <input type="text" class="form-control" name="name"
                                                    id="exampleInputEmail1" placeholder="Enter parent first name"
                                                    style="@error('name')
                                                    border-color:red
                                                @enderror" value="{{old('name')}}">
                                            </div>
                                            @error('name')
                                                <p class = "text-danger"> * {{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Email </label>
                                                <input type="text" class="form-control" name="email"
                                                    id="exampleInputEmail1" placeholder="@example.com"
                                                    style="@error('email')
                                                    border-color:red
                                                @enderror" value="{{old('email')}}">
                                            </div>
                                            @error('email')
                                                <p class = "text-danger"> * {{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Last_name </label>
                                                <input type="text" class="form-control" name="lastname"
                                                    id="exampleInputEmail1" placeholder="Enter parent last name" value="{{old('lastname')}}">
                                            </div>

                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Country </label>
                                                <input type="text" class="form-control" name="country"
                                                    id="exampleInputEmail1" placeholder="Enter parent country" value="{{old('country')}}">
                                            </div>

                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> State </label>
                                                <input type="text" class="form-control" name="state"
                                                    id="exampleInputEmail1" placeholder="Enter parent state" value="{{old('state')}}">
                                            </div>

                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Phone_number </label>
                                                <input type="number" class="form-control" name="phone_number"
                                                    id="exampleInputEmail1" placeholder="+12345566" value="{{old('phone_number')}}">
                                            </div>

                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Address </label>
                                                <input type="text" class="form-control" name="address"
                                                    id="exampleInputEmail1" placeholder="Enter parent address" value="{{old('address')}}">
                                            </div>

                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Mother_firstname </label>
                                                <input type="text" class="form-control" name="mother_firstname"
                                                    id="exampleInputEmail1" placeholder="Enter Mother first name" value="{{old('mother_firstname')}}">
                                            </div>

                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Mother_lastname </label>
                                                <input type="text" class="form-control" name="mother_lastname"
                                                    id="exampleInputEmail1" placeholder="Enter Mother last name" value="{{old('mother_lastname')}}">
                                            </div>

                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Genrate_password </label>
                                                <input type="password" class="form-control" name="password"
                                                    id="exampleInputEmail1" placeholder="Enter password"
                                                    style="@error('password')
                                                    border-color:red
                                                @enderror">
                                            </div>
                                            @error('password')
                                                <p class = "text-danger"> * {{ $message }}</p>
                                            @enderror
                                        </div>

                                        {{--   <div class="col-md-4">
                                            <div class="form-check">
                                                <input type="checkbox" name = "status" class="form-check-input"
                                                    id="exampleCheck1">
                                                <label class="form-check-label" for="exampleCheck1">Publish</label>
                                            </div>
                                        </div> --}}

                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
