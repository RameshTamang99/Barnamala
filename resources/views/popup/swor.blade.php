<div class="modal fade" id="addSwor" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <h5 class="modal-title">Add Swor</h5>
            <div class="modal-body">
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('swor.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    @error('swor_name')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                    <h5>Swor Name<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="swor_name" class="form-control"
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
                                                @error('swor_audio')
                                                    <div class="error">{{ $message }}</div>
                                                @enderror
                                                <h5>Swor Audio</h5>
                                                <div class="form-group">
                                                    <div class="panel-content">
                                                        <input type="file" name="swor_audio">
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



