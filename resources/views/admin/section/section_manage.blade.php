@extends('admin.layout')

@section('customCss')
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">   
@endsection

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
                      <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                      <li class="breadcrumb-item active">Section</li>
                  </ol>
              </div>
          </div>
      </div>
  </section>

  <section class="content">
      <div class="container-fluid">
          <div class="row">

              <div class="col-md-3">

                  <div class="card card-primary">
                      <div class="card-header">
                          <h3 class="card-title">Add Section</h3>
                      </div>


                      <form action="{{route('admin.sectionCreate')}}" method="post">
                        @csrf  
                          <div class="card-body">
                              <div class="form-group">
                                  <label for="exampleInputEmail1"> Enter Section </label>
                                  <input type="text" class="form-control" name="section" id="exampleInputEmail1"
                                      placeholder="Section G" style="@error('section')
                                          border-color:red
                                      @enderror">
                              </div>
                            @error('section')
                                <p class = "text-danger"> * {{ $message }}</p>
                            @enderror
                             
                          </div>
                          <div class="form-check ml-4">
                            <input type="checkbox" name = "status" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Publish</label>
                        </div>
                          <div class="card-footer">
                              <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                      </form>
                  </div>
              </div>

              <div class="col-md-9">
              

                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title">Section Lists</h3>
                    </div>

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Section</th>
                                    <th>Created Time</th>
                                    <th>Status</th>
                                    <th>Edith</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($section as $item) 
                                <tr>
                                    <td> {{$item->id}} </td>
                                    <td> {{$item->section}} </td>
                                    <td> {{$item->created_at}} </td>
                                    <td>  {{$item->status == 'Publish' ? 'Published' : 'Hidden'}} </td>
                                    <td><a href="{{route('admin.section_edith', $item->slug)}}" class = "btn btn-primary">Edith</a></td>
                                    <td><a href="{{route('admin.section_delete', $item->id)}}" class="btn btn-danger" onclick = "confirmation(event)">Delete</a></td>
                                </tr>
                              @endforeach 
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Section</th>
                                    <th>Created Time</th>
                                    <th>Status</th>
                                    <th>Edith</th>
                                    <th>Delete</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>

            </div>

          </div>

      </div>
  </section>

</div>

@endsection


@section('customJs')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" 
crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- sweet alert script -->
<script type="text/javascript">

  function confirmation(ev)
  {

    ev.preventDefault();
    var urlToRedirect = ev.currentTarget.getAttribute('href');
    console.log(urlToRedirect);

    swal({
     
          title: "Are You Sure You Want To Delete This Record ?",
          text: "This Data Will Permanently Delete",
          icon: "warning",
          buttons: true,
          dangerMode: true,

    })

              .then((willCancel)=>{

                  if(willCancel)
                    {
                      window.location.href=urlToRedirect;
                    }

              });

  }

</script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="dist/js/adminlte.min2167.js?v=3.2.0"></script>

<script src="dist/js/demo.js"></script>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script> 

<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
  
@endsection
