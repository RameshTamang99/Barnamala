<div class="modal fade" id="addLitCat" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <h5 class="modal-title">Add Literature Category</h5>
            <div class="modal-body">
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('literatureCategory.store') }}" enctype="multipart/form-data" >
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    @error('name')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                    <h5>Name<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="name" class="form-control"
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
                                            <div class="col-md-12">
                                                @error('icon_image')
                                                    <div class="error">{{ $message }}</div>
                                                @enderror
                                                <h5>Icon Image</h5>
                                                <div class="form-group">
                                                    <div class="panel-content">
                                                        <input type="file" name="icon_image">
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
                                                @error('bg_image_details')
                                                    <div class="error">{{ $message }}</div>
                                                @enderror
                                                <h5>Background Image Details</h5>
                                                <div class="form-group">
                                                    <div class="panel-content">
                                                        <input type="file" name="bg_image_details">
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
                                                @error('back_button_details')
                                                    <div class="error">{{ $message }}</div>
                                                @enderror
                                                <h5>Back Button Details Image</h5>
                                                <div class="form-group">
                                                    <div class="panel-content">
                                                        <input type="file" name="back_button_details">
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
                                                @error('card_button_details')
                                                    <div class="error">{{ $message }}</div>
                                                @enderror
                                                <h5>Card Button Details Image</h5>
                                                <div class="form-group">
                                                    <div class="panel-content">
                                                        <input type="file" name="card_button_details">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info mb-5" value="submit">
                                </div>
                            </form>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>

        </div>
    </div>
</div>
