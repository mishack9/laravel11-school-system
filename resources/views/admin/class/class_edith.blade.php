@extends('admin.layout')



@section('content')

<div class="content-wrapper">

  <section class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1> Class / Update</h1>
              </div>
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                      <li class="breadcrumb-item active">Class</li>
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
                        <h3 class="card-title">Update Class</h3>
                    </div>


                    <form action="{{route('admin.classUpdate',$class_data->id)}}" method="post">
                      @csrf  
                      <input type="hidden" name="_method" value="put">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Update Class Title </label>
                                <input type="text" class="form-control" value="{{$class_data->class_title}}" name="class_title" id="exampleInputEmail1">
                            </div>
                        </div>

                        <div class="form-check mb-5">
                          <label for="exampleInputEmail1"> Update Section </label>
                          <div>
                
                      <div class="">
                          <label class="form-check-label" for="">{{$class_data->section_id}}</label>
                      </div> 
                                 
                          </div>
                          <div class="form-check mb-5">
                            <div>
                            <?php
                                     $count = 1;
                            ?>
                            @foreach($section_data as $data)
                            <input type="checkbox" id="<?php echo $count++ ?>" value="{{$data->section}}" name = "section_id[]" class="form-check-input mx-1">
                        <div class="">
                            <label class="form-check-label mx-5" for="<?php echo $count++ ?>">{{ $data->section }}</label>
                        </div>
                            @endforeach
                        
                            </div>
                            @error('section_id')
                            <p class = "text-danger"> * {{ $message }}</p>
                            @enderror 
                          </div>
                        </div>


                        <div class="form-check ml-4 mb-3">
                          <input type="checkbox" {{$class_data->status == 'Publish' ? 'checked' : ''}} name = "status" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Publish</label>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update Class</button>
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
