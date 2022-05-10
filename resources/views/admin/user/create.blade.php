@extends('admin.master')

@section('index')
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">ADD USER</h4>
                </div>
                <!-- /.box-header -->
                <form class="form" method="POST" action="{{ route('user.store') }}">
                    @csrf
                    <div class="box-body">
                        <h4 class="box-title text-info"><i class="ti-user mr-15"></i> Class Info</h4>
                        <hr class="my-15">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="form-control @error('role') is-invalid @enderror"
                                        name="role" id="role">
                                        <option value="">Select Option</option>
                                        <option value="admin">Admin</option>
                                        <option value="operator">Operator</option>
                                    </select>
                                    @error('role')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" placeholder="Name" name="name">
                                </div>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="eamil" class="form-control" placeholder="Email" name="email">
                                </div>
                                @error('email')
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
