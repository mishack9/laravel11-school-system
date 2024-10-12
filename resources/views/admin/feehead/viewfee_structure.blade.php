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
                  <h1>Fee structure</h1>
              </div>
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                      <li class="breadcrumb-item active">Fee struture</li>
                  </ol>
              </div>
          </div>
      </div>
  </section>

  <section class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-12">
              

                  <div class="card">
                      <div class="card-header">
                          <h3 class="card-title">Fee Struture</h3>
                      </div>

                      <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                  <tr>
                                      <th>ID</th>
                                      <th>Class</th>
                                      <th>Fee_Head</th>
                                      <th>Acedamic_Year</th>
                                      <th>October</th>
                                      <th>November</th>
                                      <th>December</th>
                                      <th>January</th>
                                      <th>February</th>
                                      <th>March</th>
                                      <th>April</th>
                                      <th>May</th>
                                      <th>June</th>
                                      <th>July</th>
                                      <th>August</th>
                                      <th>September</th>
                                      <th>Created_Time</th>
                                      <th>Edith</th>
                                      <th>Delete</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach($fee_structure as $item)
                                  <tr>
                                      <td>{{$item->id}}</td>
                                      <td>{{$item->Class->class_title}}
                                      </td>
                                      <td>{{$item->Feehead->fee_title}}</td>
                                      <td>{{$item->Acedamic_Year->name_year}}</td>
                                      <td>{{$item->october}}</td>
                                      <td>{{$item->november}}</td>
                                      <td>{{$item->december}}</td>
                                      <td>{{$item->january}}</td>
                                      <td>{{$item->february}}</td>
                                      <td>{{$item->march}}</td>
                                      <td>{{$item->april}}</td>
                                      <td>{{$item->may}}</td>
                                      <td>{{$item->june}}</td>
                                      <td>{{$item->july}}</td>
                                      <td>{{$item->august}}</td>
                                      <td>{{$item->september}}</td>
                                      <td>{{$item->created_at}}</td>
                                      <td><a href="{{route('admin.feeStructure_edith', $item->id)}}" class = "btn btn-primary">Edith</a></td>
                                      <td><a href="{{route('admin.feeStructure_delete', $item->id)}}" class="btn btn-danger" onclick = "confirmation(event)">Delete</a></td>
                                  </tr>
                                @endforeach
                              </tbody>
                              <tfoot>
                                  <tr>
                                      <th>ID</th>
                                      <th>Class</th>
                                      <th>Fee_Head</th>
                                      <th>Acedamic_Year</th>
                                      <th>October</th>
                                      <th>November</th>
                                      <th>December</th>
                                      <th>January</th>
                                      <th>February</th>
                                      <th>March</th>
                                      <th>April</th>
                                      <th>May</th>
                                      <th>June</th>
                                      <th>July</th>
                                      <th>August</th>
                                      <th>September</th>
                                      <th>Created_Time</th>
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
@endsection