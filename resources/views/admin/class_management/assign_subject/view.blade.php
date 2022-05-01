@extends('admin.master')
@section('index')
    <div class="row">
        <div class="col-12">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ $allData[0]->class->name }}</h3>
                    <a href="{{ route('assign_subject.create') }}" class="btn btn-info float-right">Assign Subject</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Subject</th>
                                    <th>Full Mark</th>
                                    <th>Pass Mark</th>
                                    <th>Subjective Mark</th>
                                    <th style="width: 20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($allData as $item)
                                    <tr>
                                        <th>{{ $i++ }}</th>
                                        <th>{{ $item->subject->subjects }}</th>
                                        <th>{{ $item->full_mark }}</th>
                                        <th>{{ $item->pass_mark }}</th>
                                        <th>{{ $item->subjective_mark }}</th>
                                        <th>
                                            <a href="" class="btn btn-success">edit</a>
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Subject</th>
                                    <th>Full Mark</th>
                                    <th>Pass Mark</th>
                                    <th>Subjective Mark</th>
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
