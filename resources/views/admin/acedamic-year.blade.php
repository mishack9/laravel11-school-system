@extends('admin.layout')



@section('content')

<div class="content-wrapper">

  <section class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1> Acedamic Year </h1>
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
                          <h3 class="card-title">Add Acedamic Year</h3>
                      </div>


                      <form action="{{route('admin.acedamic.store')}}" method="post">
                        @csrf  
                          <div class="card-body">
                              <div class="form-group">
                                  <label for="exampleInputEmail1"> Enter Year </label>
                                  <input type="text" class="form-control" name="name_year" id="exampleInputEmail1"
                                      placeholder="2024-12-2" style="@error('name_year')
                                          border-color:red
                                      @enderror">
                              </div>
                            @error('name_year')
                                <p class = "text-danger"> * {{ $message }}</p>
                            @enderror
                              <div class="form-check">
                                  <input type="checkbox" name = "status" class="form-check-input" id="exampleCheck1">
                                  <label class="form-check-label" for="exampleCheck1">Publish</label>
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
