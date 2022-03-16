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
                            <h4 class="box-title">Update Quiz </h4>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form method="post" action="{{ route('quiz.update', $respData2->id) }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    @error('menu_id')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                    <div class="controls">
                                                        <input type="hidden" name="quiz_cat_code" value="{{$respCatCode}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('question')
                                                                <div class="error">{{ $message }}</div>
                                                            @enderror
                                                            <h5>Question<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="question" class="form-control"
                                                                    require="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('option_1')
                                                                <div class="error">{{ $message }}</div>
                                                            @enderror
                                                            <h5>Option 1<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="option_1" class="form-control"
                                                                    require="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('option_2')
                                                                <div class="error">{{ $message }}</div>
                                                            @enderror
                                                            <h5>Option 2<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="option_2" class="form-control"
                                                                    require="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('option_3')
                                                                <div class="error">{{ $message }}</div>
                                                            @enderror
                                                            <h5>Option 3<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="option_3" class="form-control"
                                                                    require="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('option_4')
                                                                <div class="error">{{ $message }}</div>
                                                            @enderror
                                                            <h5>Option 4<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="option_4" class="form-control"
                                                                    require="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('right_option')
                                                                <div class="error">{{ $message }}</div>
                                                            @enderror
                                                            <h5>Right Option<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="right_option" class="form-control"
                                                                    require="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('question_level')
                                                                <div class="error">{{ $message }}</div>
                                                            @enderror
                                                            <h5>Question Type<span class="text-danger">*</span></h5>
                                                            <select class="custom-select" name="question_level">
                                                                <option selected>Select Question Types </option>
                                                                <option value="sajilo">Sajilo</option>
                                                                <option value="madhyama">Madhyama</option>
                                                                <option value="gaaro">Gaaro</option>
                                                            </select>
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
