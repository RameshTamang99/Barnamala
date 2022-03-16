@extends('admin.admin_master')
@section('admin')

    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->

            <div class="content-header">
                <!-- Main content -->
                <section class="content">
                    <!-- Basic Forms -->
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Update Literature Category Details</h4>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form method="post" action="{{ route('literatureCategoryDetails.update', $respEditData->id) }}"  enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    @error('category_id')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                    <div class="controls">
                                                        <input type="hidden" name="category_id" value="{{$respLitCatId}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('title_name')
                                                                <div class="error">{{ $message }}</div>
                                                            @enderror
                                                            <h5>Title Name<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="title_name" class="form-control"
                                                                    require="" value="{{$respEditData->title_name}}">
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
                                                        @error('thumbnail_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Thumbnail Image</h5>
                                                        @if($respEditData->thumbnail_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage"
                                                            src="{{ (!empty($respEditData->thumbnail_image)) ? url('public/uploads/literature_category_details_thumbnail_image/'.$respEditData->thumbnail_image) : url('public/uploads/literature_category_details_thumbnail_image/'.$respEditData->thumbnail_image) }}" height="70px" width="70px">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="thumbnail_image" id="image">
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
                                                        @error('vimeo_id')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Video</h5>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="vimeo_id">
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
