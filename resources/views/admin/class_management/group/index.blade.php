@extends('admin.master')
@section('index')
    <div class="row">
        <div class="col-12">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Class</h3>
                    <a href="{{ route('group.add') }}" class="btn btn-info float-right">ADD GROUP</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Group</th>
                                    <th style="width: 20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1;
                                
                                ?>
                                @foreach ($groups as $group)
                                    <tr>
                                        <th>{{ $i++ }}</th>
                                        <th>{{ $group->group }}</th>
                                        <th>
                                            <a href="" class="btn btn-success">view</a>
                                            <a href="" class="btn btn-danger">delete</a>
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Group</th>
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
