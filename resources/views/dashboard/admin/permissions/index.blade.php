<!-- Blade for NIMS version 1.0 -->
<!-- lastEditDate="3-10-2021" -->
<!-- lastEditBy="Roland Lagos" -->
<!-- lastEditMade
        -Used AdminLTE dataTables css and js
        -refined code
        -checked if CRUD is working as expected
-->

@extends('dashboard.layouts.main')

@section('page_css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('/') }}/dash/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

    <style>
        .swal2-styled.swal2-confirm {
            background-color: red;
            color: white;
        }
    </style>
@endsection

@section('main-content')
    <section class="content">
        <row>
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ $leaves }} List</h3>
                    @if ($create) // check if this allowed to create
                    <div class="box-tools">
                        <a id="new-data" data-toggle="modal" class="btn btn-info">Add Permission</a>
                    </div>
                    @endif
                </div>
                <!-- /.box-header -->

                <div class="box-body">
                    <div id="table_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered data-table" width="100%">
                                    <thead>
                                        <tr id="">
                                            @if(in_array($read||$update||$delete, $permArray))
                                                <th width="5%">No</th>
                                                <th>Name</th>
                                                <th>Slug</th>
                                                <th width="10%">Actions</th>
                                            @else
                                                <th width="5%">No</th>
                                                <th>Name</th>
                                                <th>Slug</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                <!-- /.table -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </row>
    </section>

    @if($create||$update)
    <!-- Add and Edit Permission Modal -->
    <div class="modal fade" id="crud-modal" aria-hidden="true" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="crudModal"></h4>
                </div>
                <div class="modal-body">
                    <form id="add-form">
                        @csrf
                        <div id="additional"></div>
                        <div class="box-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="name">{{ $leaves }} Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="{{ $leaves }}" value="" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" name="slug" id="slug" class="form-control" placeholder="slug" value="" required>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="form-group">
                                <input type="submit" name="role-submit" id="add-data" tabindex="4" class="form-control btn btn-info" data-id="" value="">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if($read)
    <!-- Show Permission Modal -->
    <div class="modal fade" id="crud-modal-show" aria-hidden="true" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="userCrudModal-show"></h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">{{ $leaves }} Name</label>
                            <input type="text" name="name" id="rname" class="form-control" placeholder="{{ $leaves }}" value="" autocomplete="off" readonly>
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" id="rslug" class="form-control" placeholder="slug" value="" readonly>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="edit-data" data-id="" class="btn btn-warning edit-data">Edit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
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
                bLengthChange: false,
                ajax: "{{ url('dashboard/admin/permissions') }}",
                columns: [
                    @if(in_array($read||$update||$delete, $permArray))
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'slug', name: 'slug'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                    @else
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'slug', name: 'slug'},
                    @endif
                ]
            });

            /* Reset modal fields */
            $('#crud-modal').on('hidden.bs.modal', function () {
                $('#crud-modal form')[0].reset();
            });

            @if($create)
            /* When click New customer data button */
            $('#new-data').click(function () {
                $('#add-data').val("Create").attr('data-id', 1);
                $('#crudModal').html("Add New Permission");
                /* slug generator */
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
                var item_id = $('#add-data').attr('data-id');

                var edit = $('#edit').val();

                if(item_id == 0){
                    var url = "{{ url('dashboard/admin/permissions') }}/" + edit;

                }else if (item_id == 1){
                    var url = "{{ url('dashboard/admin/permissions') }}";
                }

                $.ajax({
                    type: "POST",
                    url: url,
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
            @endif

            @if ($update)
            /* Edit data */
            $('body').on('click', '#edit-data', function () {
                $("#crud-modal-show").modal('hide');
                var item_id = $(this).data('id');
                $('#add-data').attr('data-id', 0);
                $.get('permissions/'+item_id+'/edit', function (data) {
                    $('#crudModal').html("Edit Permission");
                    $('#add-data').val("Update Permission");
                    $('#crud-modal').modal('show');
                    $('#item_id').val(data.id);
                    $('#name').val(data.name).keyup(function() {
                        var str = $('#name').val();
                        str = str.replace(/\W+(?!$)/g, '-').toLowerCase();
                        $('#slug').attr('value', str);
                    });
                    $('#slug').val(data.slug);
                    $('#edit').val(item_id);
                    $('#additional').html('<input type="hidden" id="edit" value="'+ item_id +'">\n' +
                        '                        <input type="hidden" id="meth" name="_method" value="PATCH">');

                })
            });
            @endif

            @if ($read)
            /* Read Data */
            $('body').on('click', '#show-data', function () {
                var item_id = $(this).data('id');
                $.get('permissions/'+item_id, function (data) {

                    $('#rname').val(data.name);
                    $('#rslug').val(data.slug);
                    $('.edit-data').attr('data-id', data.id);

                })
                $('#userCrudModal-show').html("Page Details");
                $('#crud-modal-show').modal('show');
            });
            @endif

            @if ($delete)
            /* Delete customer */
            $('body').on('click', '#delete-data', function () {
                var item_id = $(this).data('id');
                var token = $("meta[name='csrf-token']").attr("content");
                Swal.fire({
                    title: "Are you sure you want to DELETE this permission?",
                    icon: 'warning',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: `Yes`,
                    denyButtonText: `No`,
                    customClass: {
                        cancelButton: 'order-1 right-gap',
                        confirmButton: 'order-2',
                        denyButton: 'order-3',
                    }
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ url('dashboard/admin/permissions') }}/" + item_id,
                            method: 'POST',
                            data: {
                                _method: 'DELETE',
                                "id": item_id,
                                "_token": token,
                            },
                            success: function (data) {
                                console.log(data);
                                table.ajax.reload();
                                Swal.fire('Permission deleted!', '', 'success')
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
            @endif

        });
    </script>
@endsection
