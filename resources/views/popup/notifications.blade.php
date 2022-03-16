<div class="modal fade" id="sendNotifications" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <h5 class="modal-title">Send Notification</h5>
            <div class="modal-body">
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('notification.send') }}">
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
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    @error('description')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                    <h5>Description<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="description" class="form-control"
                                                            require="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info mb-5" value="Send">
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



