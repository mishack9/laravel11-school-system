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
                        <h1>Update Subject </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Subject</li>
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
                                <h3 class="card-title">Update Subject</h3>
                            </div>


                            <form action="{{ route('admin.subjectUpdate',$subject_data->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="put">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"> Update Subject Title </label>
                                        <input type="text" class="form-control" name="subject_title"
                                            id="exampleInputEmail1" placeholder="" value="{{old('subject_title',$subject_data->subject_title)}}">
                                    </div>
                                </div>

                                <div class="form-group ml-3">
                                    <label for="exampleInputEmail1">Update Course_id </label>
                                    <select class="form-control" name="course_id" id="" style="width:300px">
                                        <option value="" disabled selected>--Select Course--</option>
                                        @foreach ($course_data as $item)
                                            <option value="{{ $item->id }}" {{$subject_data->course_id == $item->id ? "selected" : null}}>{{ $item->course_title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-check ml-4 mb-3">
                                    <input type="checkbox" name = "status" class="form-check-input" id="exampleCheck1" {{$subject_data->status == "Publish" ? "checked" : ""}}>
                                    <label class="form-check-label" for="exampleCheck1">Publish</label>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update Subject </button>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- sweet alert script -->
    <script type="text/javascript">
        function confirmation(ev) {

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

                .then((willCancel) => {

                    if (willCancel) {
                        window.location.href = urlToRedirect;
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
