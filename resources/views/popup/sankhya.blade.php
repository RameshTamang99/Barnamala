<div class="modal fade" id="addSankhya" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <h5 class="modal-title">Add Sankhya</h5>
            <div class="modal-body">
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('sankhya.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    @error('sankhya_name')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                    <h5>Sankhya Name<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="sankhya_name" class="form-control"
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
                                                @error('sankhya_audio')
                                                    <div class="error">{{ $message }}</div>
                                                @enderror
                                                <h5>Sankhya Audio</h5>
                                                <div class="form-group">
                                                    <div class="panel-content">
                                                        <input type="file" name="sankhya_audio">
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



