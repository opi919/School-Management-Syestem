@extends('admin.master')

@section('index')
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Assign Subject</h4>
                </div>
                <!-- /.box-header -->
                <form class="form" method="POST" action="{{ route('assign_subject.store') }}">
                    @csrf
                    <div class="box-body">
                        <h4 class="box-title text-info"><i class="ti-user mr-15"></i> Class Info</h4>
                        <hr class="my-15">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Class Name</label>
                                    <select class="form-control" name="classes" id="classes">
                                        <option value="">Select Option</option>
                                        @foreach ($classes as $class)
                                            <option value="{{ $class->id }}">{{ $class->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('classes')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2" style="display: flex;align-items:center;margin-top:10px;">
                                <a class="btn btn-success add_button">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Subject List</label>
                                    <select class="form-control" name="subjects[]" id="">
                                        <option value="">Select Option</option>
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->subjects }}</option>
                                        @endforeach
                                    </select>
                                    @error('subjects.*')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Full Mark</label>
                                    <input type="text" class="form-control" placeholder="Full Mark" name="full_mark[]">
                                </div>
                                @error('full_mark.*')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Pass Mark</label>
                                    <input type="text" class="form-control" placeholder="Pass Mark" name="pass_mark[]">
                                </div>
                                @error('pass_mark.*')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Subjective Mark</label>
                                    <input type="text" class="form-control" placeholder="Subjective Mark"
                                        name="subjective_mark[]">
                                </div>
                                @error('subjective_mark.*')
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
    <div class="" style="visibility: hidden">
        <div class="add_item">
            <div class="row delete_item">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Subject List</label>
                        <select class="form-control" name="subjects[]" id="subjects">
                            <option value="">Select Option</option>
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->subjects }}</option>
                            @endforeach
                        </select>
                        @error('subjects.*')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Full Mark</label>
                        <input type="text" class="form-control" placeholder="Full Mark" name="full_mark[]">
                    </div>
                    @error('full_mark.*')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Pass Mark</label>
                        <input type="text" class="form-control" placeholder="Pass Mark" name="pass_mark[]">
                    </div>
                    @error('pass_mark.*')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Subjective Mark</label>
                        <input type="text" class="form-control" placeholder="Subjective Mark" name="subjective_mark[]">
                    </div>
                    @error('subjective_mark.*')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-2" style="display: flex;align-items:center;margin-top:10px;">
                    <a class="btn btn-danger remove_btn">
                        <i class="fa fa-minus"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.add_button').on('click', function() {
                var item = $('.add_item').html();
                $('.box-body').append(item);
            });
            console.log($('.remove_btn'))
            $('.box-body').on('click', '.remove_btn', function() {
                $(this).closest('.delete_item').remove();
            })
        })
    </script>
@endsection
