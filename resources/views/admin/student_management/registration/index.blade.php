@extends('admin.master')
@section('index')
    <div class="row">
        <div class="col-12">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Student List</h3>
                    <a href="{{ route('registration.create') }}" class="btn btn-info float-right">Assign Student</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Class</th>
                                    <th>Roll</th>
                                    <th>Group</th>
                                    <th>Year</th>
                                    <th style="width: 20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                               @foreach ($students as $student)
                                   <tr>
                                    <th>{{ $i++ }}</th>
                                    <th>
                                        <img src="{{ asset('storage/student_images/'.$student->user->profile_photo_path) }}" alt="" width="100">
                                    </th>
                                    <th>{{ $student->user->name }}</th>
                                    <th>{{ $student->class->name }}</th>
                                    <th>{{ $student->user->id_no }}</th>
                                    <th>{{ $student->group->group }}</th>
                                    <th>{{ $student->year->year }}</th>
                                    <th>
                                        <a href="" class="btn btn-warning">Edit</a>
                                        <a href="{{ route('registration.promote',$student->id) }}" class="btn btn-primary">Promote</a>
                                    </th>
                                   </tr>
                               @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Class</th>
                                    <th>Roll</th>
                                    <th>Group</th>
                                    <th>Year</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
