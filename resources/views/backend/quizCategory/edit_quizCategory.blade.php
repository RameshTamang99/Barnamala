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
                            <h4 class="box-title">Update Quiz Category</h4>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form method="post" action="{{ route('quizCategory.update', $respData->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('quiz_cat_name')
                                                                <div class="error">{{ $message }}</div>
                                                            @enderror
                                                            <h5>Quiz Category Name<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="quiz_cat_name" class="form-control"
                                                                    required="" value="{{$respData->quiz_cat_name}}">
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
                                                        @error('quiz_cat_icon')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Icon Image</h5>
                                                        @if($respData->quiz_cat_icon == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage"
                                                            src="{{ (!empty($respData->quiz_cat_icon)) ? url('public/uploads/quiz_cat_icon/'.$respData->quiz_cat_icon) : url('public/uploads/quiz_cat_icon/'.$respData->quiz_cat_icon) }}">
                                                        @endif
                                                             <br>
                                                             <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="quiz_cat_icon" id="image">
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
