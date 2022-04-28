@extends('admin.master')

@section('index')
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Years</h4>
                </div>
                <!-- /.box-header -->
                <form class="form" method="POST" action="{{ route('exam_type.store') }}">
                    @csrf
                    <div class="box-body">
                        <h4 class="box-title text-info"><i class="ti-user mr-15"></i> Class Info</h4>
                        <hr class="my-15">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Exam Type</label>
                                    <input type="text" class="form-control" placeholder="Exam Type" name="exam_type">
                                </div>
                                @error('exam_type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <input type="submit" class="btn btn-rounded btn-primary btn-outline" value="Save">
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
