@extends('admin.layout')



@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Section </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Section</li>
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
                                <h3 class="card-title">Section Update</h3>
                            </div>
                            <form action="{{route('admin.section_update', $section_data->id)}}" method="post">
                                @csrf
                                <input type="hidden" name = "_method" value="put">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"> Enter Section </label>
                                        <input type="text" class="form-control" name="section" id="exampleInputEmail1"
                                            value="{{ old('section', $section_data->section) }}">
                                    </div>
                                   
                                    <div class="form-check">
                                        <input type="checkbox" name = "status" class="form-check-input" id="exampleCheck1"
                                            {{ $section_data->status == 'Publish' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="exampleCheck1">Publish</label>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update Section</button>
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
