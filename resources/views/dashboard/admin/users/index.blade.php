@extends('dashboard.layouts.main')

@section('page_css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('/') }}/dash/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endsection

@section('main-content')
    <section class="content">
        <row>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ $leaves }} List</h3>
                    <div class="box-tools">
                        <a id="new-data" data-toggle="modal" class="btn btn-info">Add User</a>
                    </div>
                </div>
                <!-- /.box-header -->

                <div class="box-body">
                    <div id="table_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered data-table" width="100%">
                                    <thead>
                                    <tr id="">
                                        <th width="5%">No</th>
                                        <th>Name</th>
                                        <th>email</th>
                                        <th>Department</th>
                                        <th>Position</th>
                                        <th>Pages</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->

            </div>
        </row>
    </section>
@endsection

@section('page_js')
    <!-- DataTables -->
    <script src="{{ url('/') }}/dash/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ url('/') }}/dash/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

    <script type="text/javascript">

        $(document).ready(function () {

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: "{{ url('dashboard/admin/users') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'fname', name: 'Name'},
                    {data: 'email', name: 'email'},
                    {data: 'area', name: 'area'},
                    {data: 'position', name: 'position', orderable: false, searchable: false},
                    {data: 'page', name: 'page', orderable: false, searchable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        })
    </script>
@endsection
