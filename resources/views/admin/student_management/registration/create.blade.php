@extends('admin.master')

@section('index')
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Student Registration</h4>
                </div>
                <!-- /.box-header -->
                <form class="form" method="POST" action="{{ route('registration.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="box-title d-flex justify-content-between">
                            <h4 class="text-info">
                                <i class="ti-user mr-15"></i> Student Info
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
                                    <label>Email</label>
                                    <input type="email" placeholder="Email" name="email" value="{{ old('email') }}"
                                        class="form-control @error('email')  @enderror">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Student Name</label>
                                    <input type="text" placeholder="Student Name" name="name" value="{{ old('name') }}"
                                        class="form-control @error('name')  @enderror">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Father's Name</label>
                                    <input type="text" placeholder="Father's Name" name="fname" value="{{ old('fname') }}"
                                        class="form-control @error('fname')  @enderror">
                                    @error('fname')
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
                                    <label>Mothers's Name</label>
                                    <input type="text" placeholder="Mothers's Name" name="mname"
                                        value="{{ old('mname') }}" class="form-control @error('mname')  @enderror">
                                    @error('mname')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" placeholder="Address" name="address" value="{{ old('address') }}"
                                        class="form-control @error('address')  @enderror">
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select class="form-control" name="gender" id="">
                                        <option value="">Select Option</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    @error('gender')
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
                                    <label>Mobile Number</label>
                                    <input type="text" placeholder="Mobile Number" name="mobile"
                                        value="{{ old('mobile') }}" class="form-control @error('mobile')  @enderror">
                                    @error('mobile')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Religion</label>
                                    <input type="text" placeholder="Religion" name="religion"
                                        value="{{ old('religion') }}" class="form-control @error('religion')  @enderror">
                                    @error('religion')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Date of Birth</label>
                                    <input type="date" placeholder="Date of Birth" name="dob" value="{{ old('dob') }}"
                                        class="form-control @error('dob')  @enderror">
                                    @error('dob')
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
                                    <label>Year</label>
                                    <select class="form-control" name="year" id="">
                                        <option value="">Select Option</option>
                                        @foreach ($years as $year)
                                            <option value="{{ $year->id }}">{{ $year->year }}</option>
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
                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
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
                                            <option value="{{ $group->id }}">{{ $group->group }}</option>
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
                                    <label>Image</label>
                                    <input type="file" name="image" id="image">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Discount</label>
                                    <input type="text" placeholder="Discount" name="discount"
                                        value="{{ old('discount') }}" class="form-control @error('discount')  @enderror">
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
                        <input type="submit" class="btn btn-rounded btn-primary btn-outline" value="Save">
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImg').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            })
        })
    </script>
@endsection
