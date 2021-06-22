{{--Controller for NIMS version 1.0--}}
{{--lastEditDate="06-14-2021"--}}
{{--lastEditBy="Roland Lagos"--}}
{{--note--}}
{{---Position should be not as per employment designation rather as a collective designation example (OB-Nurse, OR-Nursing Attendant)--}}



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
                        <a id="new-data" data-toggle="modal" class="btn btn-info">Add Position</a>
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
                                        <th>Position</th>
                                        <th>Slug</th>
                                        <th>Page</th>
                                        <th>Permission</th>
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
                            <div class="form-group">
                                <label for="pages">Pages</label>
                            </div>
                            <div id="table_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered data-table-2">
                                            <thead>
                                                <tr>
                                                    <th>Tick</th>
                                                    <th>Pages</th>
                                                    <th>Permissions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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

    <!-- Show user modal -->
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
                ajax: "{{ url('dashboard/admin/positions') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'slug', name: 'slug'},
                    {data: 'page', name: 'name', orderable: false, searchable: false},
                    {data: 'permission', name: 'permission', orderable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            var tableB = $('.data-table-2').DataTable({
                serverSide: true,
                responsive: true,
                lengthChange: false,
                paging: false,
                scrollY: "500px",
                scrollCollapse: true,
                ajax: "{{ url('dashboard/admin/pages') }}",
                columns: [
                    {data: 'tick', name: 'tick'},
                    {data: 'name', name: 'name'},
                    {data: 'permissionB', name: 'permissionB', orderable: false, searchable: false},
                ]
            });

            /* Reset modal fields */
            $('#crud-modal').on('hidden.bs.modal', function () {
                $('#crud-modal form')[0].reset();
                $('input:checkbox').removeAttr('checked');
            });

            /* When click New Position */
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
                var item_id = $('#add-data').attr('data-id');
                var edit = $('#edit').val();

                if(item_id == 0){
                    var url = "{{ url('dashboard/admin/positions') }}/" + edit;

                }else if (item_id ==1){
                    var url = "{{ url('dashboard/admin/positions') }}";
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

            /* Edit data */
            $('body').on('click', '#edit-data', function () {
                tableB.ajax.reload();
                var item_id = $(this).data('id');
                $('#add-data').attr('data-id', 0);
                $.get('positions/'+item_id+'/edit', function (data) {

                    $('#crudModal').html("Edit Position");
                    $('#add-data').val("Update");
                    $('#crud-modal').modal('show');
                    $('#item_id').val(data[0].id);
                    $('#name').val(data[0].name);
                    $('#slug').val(data[0].slug);
                    $('#edit').val(item_id);
                    $('#additional').html('<input type="hidden" id="edit" value="'+ item_id +'">\n' +
                        '                        <input type="hidden" id="meth" name="_method" value="PATCH">');

                    function qPagPer(){
                        jQuery.each(data[1], function(i,val){
                            $(".checkPag"+val.id).attr('checked',true);
                        });

                        var qB = jQuery.each(data[2], function(i,valB){
                            $(".checkPerm"+valB.pivot.page_id+"-"+valB.id).attr('checked',true);
                        });
                    }

                    qPagPer();


                    $('.data-table-2').on('draw.dt', function() {
                        qPagPer();
                    });

                })
            });

            /* Read Data */
            $('body').on('click', '#show-data', function () {
                var item_id = $(this).data('id');
                $.get('dashboard/admin/positions/'+item_id, function (data) {

                    $('#sname').html(data.name);
                    $('#semail').html(data.slug);

                })
                $('#userCrudModal-show').html("Page Details");
                $('#crud-modal-show').modal('show');
            });

            /* Delete customer */
            $('body').on('click', '#delete-data', function () {
                var item_id = $(this).data('id');
                var token = $("meta[name='csrf-token']").attr("content");
                Swal.fire({
                    title: "Are you sure you want to delete this permission?",
                    icon: 'warning',
                    showDenyButton: true,
                    denyButtonText: `No`,
                    confirmButtonText: `Yes`,
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ url('dashboard/admin/positions') }}/" + item_id,
                            method: 'POST',
                            data: {
                                _method: 'DELETE',
                                "id": item_id,
                                "_token": token,
                            },
                            success: function (data) {
                                table.ajax.reload();
                                Swal.fire('Page deleted!', '', 'success')
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

        });

    </script>
@endsection
