@extends('admin.layout')



@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Update Fee Structure </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active"> Update Fee Structure </li>
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
                                <h3 class="card-title">Update Fee Structure Data</h3>
                            </div>


                            <form action="{{ route('admin.feeStructure.update',$fee->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="put">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Class_id </label>
                                                <select class="form-control" name="class_id" id=""
                                                    style="@error('class_id')
                                                border-color:red
                                            @enderror">
                                                    <option value="" disabled selected>--Select Class--</option>
                                                    @foreach ($class_data as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ $fee->class_id == $item->id ? 'selected' : '' }}>
                                                            {{ $item->class_title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Fee_Head_id </label>
                                                <select class="form-control" name="fee_head_id" id=""
                                                    style="@error('fee_head_id')
                                                border-color:red
                                            @enderror">
                                                    <option value="" disabled selected>--Select Fee_Head--</option>
                                                    @foreach ($fee_head_data as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ $fee->fee_head_id == $item->id ? 'selected' : '' }}>
                                                            {{ $item->fee_title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Acedamic_Year_id </label>
                                                <select class="form-control" name="acedamic_year_id" id=""
                                                    style="@error('acedamic_year_id')
                                                border-color:red
                                            @enderror">
                                                    <option value="" disabled selected>--Select Acedami_Year--
                                                    </option>
                                                    @foreach ($acedamic_year_data as $data)
                                                        <option value="{{ $data->id }}"
                                                            {{ $fee->acedamic_year_id == $item->id ? 'selected' : '' }}>
                                                            {{ $data->name_year }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> October fee </label>
                                                <input type="text" class="form-control" name="october"
                                                    id="exampleInputEmail1" placeholder="Enter October Fee" value="{{old('october',$fee->october)}}">
                                            </div>

                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> November fee </label>
                                                <input type="text" class="form-control" name="november"
                                                    id="exampleInputEmail1" placeholder="Enter November Fee" value="{{old('november',$fee->november)}}">
                                            </div>

                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> December fee </label>
                                                <input type="text" class="form-control" name="december"
                                                    id="exampleInputEmail1" placeholder="Enter December Fee" value="{{old('december',$fee->december)}}">
                                            </div>

                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> January fee </label>
                                                <input type="text" class="form-control" name="january"
                                                    id="exampleInputEmail1" placeholder="Enter January Fee" value="{{old('january',$fee->january)}}">
                                            </div>

                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> February fee </label>
                                                <input type="text" class="form-control" name="february"
                                                    id="exampleInputEmail1" placeholder="Enter February Fee" value="{{old('february',$fee->february)}}">
                                            </div>

                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> March fee </label>
                                                <input type="text" class="form-control" name="march"
                                                    id="exampleInputEmail1" placeholder="Enter March Fee" value="{{old('march',$fee->march)}}">
                                            </div>

                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> April fee </label>
                                                <input type="text" class="form-control" name="april"
                                                    id="exampleInputEmail1" placeholder="Enter April Fee" value="{{old('april',$fee->april)}}">
                                            </div>

                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> May fee </label>
                                                <input type="text" class="form-control" name="may"
                                                    id="exampleInputEmail1" placeholder="Enter May Fee" value="{{old('may',$fee->may)}}">
                                            </div>

                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> June fee </label>
                                                <input type="text" class="form-control" name="june"
                                                    id="exampleInputEmail1" placeholder="Enter June Fee" value="{{old('june',$fee->june)}}">
                                            </div>

                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> July fee </label>
                                                <input type="text" class="form-control" name="july"
                                                    id="exampleInputEmail1" placeholder="Enter July Fee" value="{{old('july',$fee->july)}}">
                                            </div>

                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> August fee </label>
                                                <input type="text" class="form-control" name="august"
                                                    id="exampleInputEmail1" placeholder="Enter August Fee" value="{{old('august',$fee->august)}}">
                                            </div>

                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> September fee </label>
                                                <input type="text" class="form-control" name="september"
                                                    id="exampleInputEmail1" placeholder="Enter September Fee" value="{{old('september',$fee->september)}}">
                                            </div>

                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input type="checkbox" name = "status" class="form-check-input"
                                                    id="exampleCheck1">
                                                <label class="form-check-label" for="exampleCheck1">Publish</label>
                                            </div>
                                        </div>

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
