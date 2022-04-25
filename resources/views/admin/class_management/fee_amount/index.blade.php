@extends('admin.master')
@section('index')
    <div class="row">
        <div class="col-12">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Class</h3>
                    <a href="{{ route('fee_amount.create') }}" class="btn btn-info float-right">ADD AMOUNT</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fee Category</th>
                                    <th>Class</th>
                                    <th>Fee Amount</th>
                                    <th style="width: 20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1;
                                
                                ?>
                                @foreach ($amounts as $amount)
                                    <tr>
                                        <th>{{ $i++ }}</th>
                                        <th>{{ $amount->fee_category_id }}</th>
                                        <th>{{ $amount->class_id }}</th>
                                        <th>{{ $amount->amount }}</th>
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
                                    <th>Fee Category</th>
                                    <th>Class</th>
                                    <th>Fee Amount</th>
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
