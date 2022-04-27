@extends('admin.master')

@section('index')
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Years</h4>
                </div>
                <!-- /.box-header -->
                <form class="form" method="POST" action="{{ route('fee_amount.store') }}">
                    @csrf
                    <div class="box-body">
                        <h4 class="box-title text-info"><i class="ti-user mr-15"></i> Class Info</h4>
                        <hr class="my-15">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Fee Categories</label>
                                    <select class="form-control" name="fee_categories" id="fee_categories">
                                        <option value="0">Fee Categories</option>
                                        @foreach ($fee_categories as $fee_category)
                                            <option value="{{ $fee_category->id }}">{{ $fee_category->fee_category }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2" style="display: flex;align-items:center;margin-top:10px;">
                                <a class="btn btn-success add_button">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Classes</label>
                                    <select class="form-control" name="classes" id="classes">
                                        <option value="0">Classes</option>
                                        @foreach ($classes as $class)
                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Fee Amount</label>
                                    <input type="text" class="form-control" placeholder="Fee Amount" name="fee_amount">
                                </div>
                                @error('fee_amount')
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
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Classes</label>
                        <select class="form-control" name="classes" id="classes">
                            <option value="0">Classes</option>
                            @foreach ($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Fee Amount</label>
                        <input type="text" class="form-control" placeholder="Fee Amount" name="fee_amount">
                    </div>
                    @error('fee_amount')
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
