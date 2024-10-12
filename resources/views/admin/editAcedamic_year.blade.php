@extends('admin.layout')



@section('content')

<div class="content-wrapper">

  <section class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1> Acedamic Year / Update</h1>
              </div>
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                      <li class="breadcrumb-item active">Acedamic Year</li>
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
                          <h3 class="card-title">Update Acedamic Year</h3>
                      </div>


                      <form action="{{route('admin.acedamic_yearUpdate', $acedamic_year->id)}}" method="post">
                        @csrf  
                        <input type="hidden" name="_method" value="put">
                          <div class="card-body">
                              <div class="form-group">
                                  <label for="exampleInputEmail1"> Enter Year </label>
                                  <input type="text" class="form-control" name="name_year" id="exampleInputEmail1" value = "{{old('name_year', $acedamic_year->name_year)}}">
                              </div>
                         
                              <div class="form-check">
                                  <input type="checkbox" name = "status" class="form-check-input" id="exampleCheck1" {{$acedamic_year->status == 1 ? 'checked' : ''}}>
                                  <label class="form-check-label" for="exampleCheck1">Publish</label>
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
