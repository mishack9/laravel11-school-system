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
                        <h1>Manage_Student's</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Manage_Student's</li>
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

                                <div class="mt-3">
                                    <form action="">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"> Section </label>
                                                    <select name="section_id" class="form-control">
                                                        <option value="" disabled selected>--Select section--</option>
                                                        @foreach ($section_data as $data)
                                                            <option value="{{ $data->id }}">{{ $data->section }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"> Acedamic_year </label>
                                                    <select name="acedamic_year_id" class="form-control">
                                                        <option value="" disabled selected>--Select acedamic_year--
                                                        </option>
                                                        @foreach ($acedamic_data as $data)
                                                            <option value="{{ $data->id }}">{{ $data->name_year }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"> Course </label>
                                                    <select name="course_id" class="form-control">
                                                        <option value="" disabled selected>--Select course--</option>
                                                        @foreach ($course_data as $data)
                                                            <option value="{{ $data->id }}">{{ $data->course_title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"> Class </label>
                                                    <select name="class_id" class="form-control">
                                                        <option value="" disabled selected>--Select class--</option>
                                                        @foreach ($class_data as $data)
                                                            <option value="{{ $data->id }}">{{ $data->class_title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-outline-dark mx-auto"><i
                                                            class="fa fa-filter ml-4 mr-4" aria-hidden="true"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>

                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Student_firstname</th>
                                            <th>Student_middlename</th>
                                            <th>Student_lastname</th>
                                            <th>Student_email</th>
                                            <th>DOB</th>
                                            <th>Gender</th>
                                            <th>Class</th>
                                            <th>Course</th>
                                            <th>Section</th>
                                            <th>Admission_number</th>
                                            <th>Acedamic_year</th>
                                            <th>Parent_firstname</th>
                                            <th>Parent_lastname</th>
                                            <th>Parent_email</th>
                                            <th>Registration_date</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Edith</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($student_data as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->s_firstname }}</td>
                                                <td>{{ $item->s_middlename }}</td>
                                                <td>{{ $item->s_lastname }}</td>
                                                <td>{{ $item->s_email }}</td>
                                                <td>{{ $item->dob }}</td>
                                                <td>{{ $item->gender }}</td>
                                                <td>{{ $item->class->class_title }}</td>
                                                <td>{{ $item->course->course_title }}</td>
                                                <td>{{ $item->Section->section }}</td>
                                                <td>{{ $item->admission_number }}</td>
                                                <td>{{ $item->acedamic_year->name_year }}</td>
                                                <td>{{ $item->parent->name }}</td>
                                                <td>{{ $item->parent->lastname }}</td>
                                                <td>{{ $item->parent->email }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td><img src="/student_image/{{ $item->image }}" alt="" style = "height:50px; width:75px; border-radius:5px 4px 5px; box-shadow:5px 3px 3px; border:1px solid light-coral"></td>
                                                <td>{{ $item->status == 'Publish' ? 'Published' : 'Hidden' }}</td>
                                                <td><a href="{{ route('admin.student_edith', $item->id) }}"
                                                        class = "btn btn-primary">Edith</a></td>
                                                <td><a href="{{ route('admin.student_delete', $item->id) }}"
                                                        class="btn btn-danger" onclick = "confirmation(event)">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Student_firstname</th>
                                            <th>Student_middlename</th>
                                            <th>Student_lastname</th>
                                            <th>Student_email</th>
                                            <th>DOB</th>
                                            <th>Gender</th>
                                            <th>Class</th>
                                            <th>Course</th>
                                            <th>Section</th>
                                            <th>Admission_number</th>
                                            <th>Acedamic_year</th>
                                            <th>Parent_firstname</th>
                                            <th>Parent_lastname</th>
                                            <th>Parent_email</th>
                                            <th>Registration_date</th>
                                            <th>Image</th>
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
@endsection
