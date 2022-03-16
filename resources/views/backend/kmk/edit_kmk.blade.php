@extends('admin.admin_master')
@section('admin')

    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->

            <!-- Content Header (Page header) -->
            <div class="content-header">


                <!-- Main content -->
                <section class="content">

                    <!-- Basic Forms -->
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Update KMK</h4>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form method="post" action="{{ route('kmk.update', $respData2->id) }}"  enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    @error('byanjan_id')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                    <h5>Byanjan Names<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select class="custom-select" name="byanjan_id">
                                                            @foreach($allData as $key => $byanjan)
                                                                <option value="{{ $byanjan->id }}">{{ $byanjan->byanjan_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('kmk_name')
                                                                <div class="error">{{ $message }}</div>
                                                            @enderror
                                                            <h5>Kmk Name<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="kmk_name" class="form-control"
                                                                    require="" value="{{$respData2->kmk_name}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        @error('kmk_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Kmk Image</h5>
                                                        @if($respData2->kmk_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage"
                                                             src="{{ (!empty($respData2->kmk_image)) ? url('public/uploads/kmk_image/'.$respData2->kmk_image) : url('public/uploads/kmk_image/'.$respData2->kmk_image) }}">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="kmk_image" id="image">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        @error('kmk_audio')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Kmk Audio</h5>
                                                        <audio controls>
                                                            <source src="{{asset('public/uploads/kmk_audio/'.$respData2->kmk_audio)}}" type="audio/mpeg">
                                                        </audio>
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="kmk_audio">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                                <div class="text-xs-right">
                                                    <input type="submit" class="btn btn-rounded btn-info mb-5"
                                                        value="Update">
                                                </div>
                                    </form>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                </section>
                <!-- /.content -->
            </div>
        </div>
    </div>





@endsection
