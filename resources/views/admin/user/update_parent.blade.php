@extends('admin.layout')



@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Update_Parent / Spause </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active"> Update_Parent / Spause </li>
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
                                <h3 class="card-title"> Update_Parent / Spause </h3>
                            </div>


                            <form action="{{ route('admin.updateParent.update',$parent_data->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="put">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> First_name </label>
                                                <input type="text" class="form-control" name="name"
                                                    id="exampleInputEmail1"  value="{{old('name',$parent_data->name)}}">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Email </label>
                                                <input type="text" class="form-control" name="email"
                                                    id="exampleInputEmail1"  value="{{old('email',$parent_data->email)}}">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Last_name </label>
                                                <input type="text" class="form-control" name="lastname"
                                                    id="exampleInputEmail1" value="{{old('lastname',$parent_data->lastname)}}">
                                            </div>

                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Country </label>
                                                <input type="text" class="form-control" name="country"
                                                    id="exampleInputEmail1" value="{{old('country',$parent_data->country)}}">
                                            </div>

                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> State </label>
                                                <input type="text" class="form-control" name="state"
                                                    id="exampleInputEmail1" value="{{old('state',$parent_data->state)}}">
                                            </div>

                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Phone_number </label>
                                                <input type="number" class="form-control" name="phone_number"
                                                    id="exampleInputEmail1" value="{{old('phone_number',$parent_data->phone_number)}}">
                                            </div>

                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Address </label>
                                                <input type="text" class="form-control" name="address"
                                                    id="exampleInputEmail1" value="{{old('address',$parent_data->address)}}">
                                            </div>

                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Mother_firstname </label>
                                                <input type="text" class="form-control" name="mother_firstname"
                                                    id="exampleInputEmail1" value="{{old('mother_firstname',$parent_data->mother_firstname)}}">
                                            </div>

                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Mother_lastname </label>
                                                <input type="text" class="form-control" name="mother_lastname"
                                                    id="exampleInputEmail1" value="{{old('mother_lastname',$parent_data->mother_lastname)}}">
                                            </div>

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
