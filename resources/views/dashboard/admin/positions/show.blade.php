@extends('dashboard.layouts.main')


@section('page_css')
    <!-- Tagsinput -->
    <link rel="stylesheet" href="{{ url('/') }}/dist/tagsinput/bootstrap-tagsinput.css">

    <!-- Data Tables -->
    <link href="{{ url('/') }}/plugins/DataTables/datatables.min.css" rel="stylesheet">
@endsection

@section('main-content')
    <section class="content">
        <row>
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit {{ $leaves }}</h3>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body">
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
                                            <table class="table table-bordered data-table" width="100%">
                                                <thead>
                                                <tr id="">
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
                    <!-- /.box-body -->

                </div>
            </div>
        </row>
    </section>
@endsection

@section('page_js')
    <!-- Tagsinput -->
    <script src="{{ url('/') }}/dist/tagsinput/bootstrap-tagsinput.js"></script>

    <!-- Data Tables -->
    <script src="{{ url('/') }}/plugins/DataTables/datatables.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            var table = $('.data-table').DataTable({
                bInfo: false,
                serverSide: true,
                responsive: true,
                ajax: "{{ url('dashboard/admin/pages') }}",
                columns: [
                    {data: 'tick', name: 'tick'},
                    {data: 'name', name: 'name'},
                    {data: 'permissionB', name: 'permissionB'},
                ]
            });

            var item_id =  '{{ $position->id }}';
            $('#add-data').attr('data-id', 0);
            $.get(item_id+'/edit', function (data) {
                console.log(data);

                $('#crudModal').html("Edit Position");
                $('#add-data').val("Update");
                $('#crud-modal').modal('show');
                $('#item_id').val(data[0].id);
                $('#name').val(data[0].name);
                $('#slug').val(data[0].slug);
                $('#edit').val(item_id);
                $('#additional').html('<input type="hidden" id="edit" value="'+ item_id +'">\n' +
                    '                        <input type="hidden" id="meth" name="_method" value="PATCH">');

                jQuery.each(data[1], function(i,val){
                    $(".checkPag"+val.id).attr('checked',true);
                });

                jQuery.each(data[2], function(i,valB){
                    console.log(valB.pivot.page_id+"-"+valB.id)
                    $(".checkPerm"+valB.pivot.page_id+"-"+valB.id).attr('checked',true);
                });
            });


            /* Edit data */
            $('body').on('click', '#edit-data', function () {
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

                    jQuery.each(data[1], function(i,val){
                        $(".checkPag"+val.id).attr('checked',true);
                    });

                    jQuery.each(data[2], function(i,valB){
                        console.log(valB.pivot.page_id+"-"+valB.id)
                        $(".checkPerm"+valB.pivot.page_id+"-"+valB.id).attr('checked',true);
                    });
                });
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
