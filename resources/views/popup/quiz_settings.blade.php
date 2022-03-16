<div class="modal fade" id="addQuizSettings" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <h5 class="modal-title">Add Quiz Settings</h5>
            <div class="modal-body">
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('quizSettings.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    @error('quiz_questions')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                    <h5>Quiz Questions<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="number" name="quiz_questions" class="form-control"
                                                            required="" placeholder="Question No">
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
                                                    @error('quiz_time')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                    <h5>Quiz Time<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="number" name="quiz_time" class="form-control"
                                                            required="" placeholder="Time in second">
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



