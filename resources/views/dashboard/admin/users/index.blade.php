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
                                            <th>Last Name</th>
                                            <th>Name</th>
                                            <th>email</th>
                                            <th>Department</th>
                                            <th>Position</th>
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

    <!-- Add and Edit customer modal -->
    <div class="modal fade" id="crud-modal" aria-hidden="true" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="crudModal"></h4>
                </div>
                <div class="modal-body">
                    <form id="add-form">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username" value="" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email Address" value="" type="email" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn" style="background-color: maroon;color: white;" value="Register Now">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
                    {data: 'lname', name: 'lname'},
                    {data: 'fname', name: 'fname'},
                    {data: 'email', name: 'email'},
                    {data: 'department', name: 'department'},
                    {data: 'position', name: 'position', orderable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            /* When click Add User */
            $('#new-data').click(function () {
                $('#add-data').val("Create").attr('data-id', 1);
                $('#crudModal').html("Add New User");
                $('#name').keyup(function() {
                    var str = $('#name').val();
                    str = str.replace(/\W+(?!$)/g, '-').toLowerCase();
                    $('#slug').attr('value', str);
                });
                $('#crud-modal').modal('show');
            });

            /* Add data */
            $('#add-form').on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{{ url('dashboard/admin/users') }}",
                    data: $('#add-form').serialize(),
                    success: function (data) {
                        table.ajax.reload();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });

                $("#crud-modal").modal('hide');
            });

            /* Delete customer */
            $('body').on('click', '#delete-data', function () {
                var item_id = $(this).data('id');
                var token = $("meta[name='csrf-token']").attr("content");

                $('.swal2-confirm').attr('class', 'btn btn-danger swal2-confirm');

                Swal.fire({
                    title: "Are you sure you want to DELETE this user?",
                    icon: 'warning',
                    showDenyButton: true,
                    confirmButtonText: `DELETE`,
                    denyButtonText: `NO`,
                }).then((result) => {

                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ url('dashboard/admin/users') }}/" + item_id,
                            method: 'POST',
                            data: {
                                _method: 'DELETE',
                                "id": item_id,
                                "_token": token,
                            },
                            success: function (data) {
                                table.ajax.reload();
                                Swal.fire('User deleted!', '', 'success')
                            },
                            error: function (data) {
                                console.log('Error:', data);
                            }
                        });
                    } else if (result.isDenied) {
                        Swal.fire('No changes made!', '', 'info')
                    }
                })

            });
        })
    </script>
@endsection
