<div class="modal fade" id="addInfoMenu" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <h5 class="modal-title">Add Information Menu</h5>
            <div class="modal-body">
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('infoMenu.store') }}" enctype="multipart/form-data" >
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
                                                            require="" placeholder="Enter Name">
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
                                                    @error('description')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                    <h5>Descriptions<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="description" placeholder="Enter Description" required="" cols="50" rows="10"></textarea>
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
                                                @error('background')
                                                    <div class="error">{{ $message }}</div>
                                                @enderror
                                                <h5>Background Image</h5>
                                                <div class="form-group">
                                                    <div class="panel-content">
                                                        <input type="file" name="background">
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
                                                @error('back_icon')
                                                    <div class="error">{{ $message }}</div>
                                                @enderror
                                                <h5>Back Icon</h5>
                                                <div class="form-group">
                                                    <div class="panel-content">
                                                        <input type="file" name="back_icon">
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
                                                @error('card_image')
                                                    <div class="error">{{ $message }}</div>
                                                @enderror
                                                <h5>Card Image</h5>
                                                <div class="form-group">
                                                    <div class="panel-content">
                                                        <input type="file" name="card_image">
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
