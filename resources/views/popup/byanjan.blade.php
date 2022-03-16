


<!-- Modal -->
{{-- <div class="modal fade" id="addByanjano" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Byanjan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{ route('byanjan.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('byanjan_name')
                                                                <div class="error">{{ $message }}</div>
                                                            @enderror
                                                            <h5>Byanjan Name<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="byanjan_name" class="form-control">
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
                                                        @error('byanjan_audio')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Byanjan Audio</h5>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="byanjan_audio">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <br>
                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
                                        </div>
                                
                                </div>
                             
                            </div>
                          
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                        <button type="submit" class="btn btn-info">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
      </form>
    </div>
  </div>
</div> --}}



<!-- Modal -->
<div class="modal fade" id="addByanjan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Byanjan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form method="post" action="{{ route('byanjan.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        @error('byanjan_name')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                        <h5>Byanjan Name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="byanjan_name" class="form-control">
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
                                    @error('byanjan_audio')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                    <h5>Byanjan Audio</h5>
                                    <div class="form-group">
                                        <div class="panel-content">
                                            <input type="file" name="byanjan_audio">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
    </form>
    
    </div>
  </div>
</div>


