@extends('admin.master')

@section('index')
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Student Promotion</h4>
                </div>
                <!-- /.box-header -->
                <form class="form" method="POST"
                    action="{{ route('registration.promote.update', $assign_students[0]['id']) }}">
                    @csrf
                    <div class="box-body">
                        <div class="box-title d-flex justify-content-between">
                            <h4 class="text-info">
                                <i class="ti-user mr-15"></i> Info
                            </h4>
                            <div class="form-group">
                                <img src="" alt="" id="showImg" style="width: 100px">
                            </div>
                        </div>
                        <hr class="my-15">
                        {{-- row start --}}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Year</label>
                                    <select class="form-control" name="year" id="">
                                        <option value="">Select Option</option>
                                        @foreach ($years as $year)
                                            <option value="{{ $year->id }}"
                                                {{ $assign_students[0]['year_id'] == $year->id ? 'selected' : '' }}>
                                                {{ $year->year }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('year')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Class</label>
                                    <select class="form-control" name="class" id="">
                                        <option value="">Select Option</option>
                                        @foreach ($classes as $class)
                                            <option value="{{ $class->id }}"
                                                {{ $assign_students[0]['class_id'] == $class->id ? 'selected' : '' }}>
                                                {{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('class')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Group</label>
                                    <select class="form-control" name="group" id="">
                                        <option value="">Select Option</option>
                                        @foreach ($groups as $group)
                                            <option value="{{ $group->id }}"
                                                {{ $assign_students[0]['group_id'] == $group->id ? 'selected' : '' }}>
                                                {{ $group->group }}</option>
                                        @endforeach
                                    </select>
                                    @error('group')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        {{-- row end --}}
                        {{-- row start --}}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Discount</label>
                                    <input type="text" placeholder="Discount" name="discount"
                                        value="{{ $assign_students[0]['discount']['discount'] }}"
                                        class="form-control @error('discount')  @enderror">
                                    @error('discount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        {{-- row end --}}
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <input type="submit" class="btn btn-rounded btn-primary btn-outline" value="Promote">
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
