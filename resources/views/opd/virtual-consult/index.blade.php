@extends('dashboard.layouts.main')


@section('page_css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('/') }}/dash/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endsection

@section('main-content')
    <section class="content">
        <row>
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">@if ($leaves)
                            {{ $leaves }}
                        @elseif ($twig)
                            {{ $twig }}
                        @elseif ($branch)
                            {{ $branch }}
                        @elseif ($tree)
                            {{ $tree }}
                        @endif List</h3>
                    @if ($create)
                        <div class="box-tools">
                            <a id="new-data" data-toggle="modal" class="btn btn-info">Add {{ $leaves }}</a>
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
                                            <th>Status</th>
                                            <th>Created</th>
                                            <th width="20%">Actions</th>
                                        @else
                                            <th width="5%">No</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Created</th>
                                        @endif
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

                <!-- /.box-body -->
            </div>
        </row>
    </section>

    @if($create || $update)
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
                                    <label for="lname">Last Name</label>
                                    <input type="text" name="lname" id="lname" class="form-control" placeholder="last name" value="" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="fname">First Name</label>
                                    <input type="text" name="fname" id="fname" class="form-control" placeholder="first name" value="" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="mname">Middle Name</label>
                                    <input type="text" name="mname" id="mname" class="form-control" placeholder="middle name" value="" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="age">Age</label>
                                    <input type="number" name="age" id="age" class="form-control" placeholder="edad" value="" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="birthday">Birthday</label>
                                    <input type="date" name="birthday" id="birthday" class="form-control" placeholder="birthday" value="" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="sex">Sex</label>
                                    <select class="form-control" name="sex" id="sex">
                                        <option value="Male">Male</option>
                                        <option value="Male">Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" id="address" class="form-control" placeholder="address" value="" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="contactnum">Contact Info(cellphone number preferred)</label>
                                    <input type="text" name="contactnum" id="contactnum" class="form-control" placeholder="contact number" value="" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="oldnew">Patient Status</label>
                                    <select class="form-control" name="oldnew" id="oldnew">
                                        <option value="Old">Old</option>
                                        <option value="New">New</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="hospitalnumber">Hospital Number</label>
                                    <input type="text" name="hospitalnumber" id="hospitalnumber" class="form-control" placeholder="hospital number" value="" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="chiefcomplaint">Chief Complaint</label>
                                    <textarea type="text" name="chiefcomplaint" id="chiefcomplaint" class="form-control" placeholder="chief complaint" value="" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="department">Department</label>
                                    <input type="text" name="department" id="department" class="form-control" placeholder="department" value="" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="rdepartment">Referred to Department</label>
                                    <input type="text" name="rdepartment" id="rdepartment" class="form-control" placeholder="department" value="" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="disposition">Disposition</label>
                                    <textarea type="text" name="disposition" id="disposition" class="form-control" placeholder="disposition" value="" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="remarks">Remarks</label>
                                    <textarea type="text" name="remarks" id="remarks" class="form-control" placeholder="remarks" value="" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="link">Link</label>
                                    <textarea type="text" name="link" id="link" class="form-control" placeholder="video call link" value="" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="Pending">Pending</option>
                                        <option value="Scheduled">Scheduled</option>
                                        <option value="Done">Done</option>
                                    </select>
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
        <!-- Show Patient Modal -->
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
                ajax: "{{ url('opd/virtual-consult') }}",
                columns: [
                    @if(in_array($read||$update||$delete, $permArray))
                        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                        {data: 'name', name: 'name'},
                        {data: 'status', name: 'status'},
                        {data: 'created', name: 'created'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    @else
                        {data: 'name', name: 'name'},
                        {data: 'status', name: 'status'},
                        {data: 'created', name: 'created'},
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
                $('#add-data').val("Add").attr('data-id', 1);
                $('#crudModal').html("Add New OPD Patient");
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
                    var url = "{{ url('opd/virtual-consult') }}/" + edit;

                }else if (item_id ==1){
                    var url = "{{ url('opd/virtual-consult') }}";
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
                $.get('virtual-consult/'+item_id+'/edit', function (data) {
                    $('#crudModal').html("Edit Department");
                    $('#add-data').val("Update Patient");
                    $('#crud-modal').modal('show');
                    $('#item_id').val(data.id);

                    $('#lname').val(data.lname);
                    $('#fname').val(data.fname);
                    $('#mname').val(data.mname);
                    $('#age').val(data.age);
                    $('#birthday').val(data.birthday);
                    $('#address').val(data.address);
                    $('#contactnum').val(data.contactnum);
                    $('#hospitalnumber').val(data.hospitalnumber);
                    $('#chiefcomplaint').val(data.chiefcomplaint);
                    $('#department').val(data.department);
                    $('#rdepartment').val(data.rdepartment);
                    $('#disposition').val(data.disposition);
                    $('#status').val(data.status);
                    $('#remarks').val(data.remarks);
                    $('#link').val(data.link);
                    $('#edit').val(item_id);
                    $('#additional').html('<input type="hidden" id="edit" value="'+ item_id +'">\n' +
                        '                        <input type="hidden" id="meth" name="_method" value="PATCH">');

                })
            });
            @endif

            {{--@if ($read)--}}
            {{--/* Read Data */--}}
            {{--$('body').on('click', '#show-data', function () {--}}
                {{--var item_id = $(this).data('id');--}}
                {{--$.get('departments/'+item_id, function (data) {--}}

                    {{--$('#rname').val(data.name);--}}
                    {{--$('#rslug').val(data.slug);--}}
                    {{--$('.edit-data').attr('data-id', data.id);--}}

                {{--})--}}
                {{--$('#userCrudModal-show').html("Page Details");--}}
                {{--$('#crud-modal-show').modal('show');--}}
            {{--});--}}
            {{--@endif--}}

            {{--@if ($delete)--}}
            {{--/* Delete customer */--}}
            {{--$('body').on('click', '#delete-data', function () {--}}
                {{--var item_id = $(this).data('id');--}}
                {{--var token = $("meta[name='csrf-token']").attr("content");--}}
                {{--Swal.fire({--}}
                    {{--title: "Are you sure you want to delete this department?",--}}
                    {{--icon: 'warning',--}}
                    {{--showDenyButton: true,--}}
                    {{--denyButtonText: `No`,--}}
                    {{--confirmButtonText: `Yes`,--}}
                {{--}).then((result) => {--}}
                    {{--/* Read more about isConfirmed, isDenied below */--}}
                    {{--if (result.isConfirmed) {--}}
                        {{--$.ajax({--}}
                            {{--url: "{{ url('dashboard/admin/departments') }}/" + item_id,--}}
                            {{--method: 'POST',--}}
                            {{--data: {--}}
                                {{--_method: 'DELETE',--}}
                                {{--"id": item_id,--}}
                                {{--"_token": token,--}}
                            {{--},--}}
                            {{--success: function (data) {--}}
                                {{--table.ajax.reload();--}}
                                {{--Swal.fire('Permission deleted!', '', 'success')--}}
                            {{--},--}}
                            {{--error: function (data) {--}}
                                {{--console.log('Error:', data);--}}
                            {{--}--}}
                        {{--});--}}
                    {{--} else if (result.isDenied) {--}}
                        {{--Swal.fire('No changes made!', '', 'info')--}}
                    {{--}--}}
                {{--})--}}

            {{--});--}}
            {{--@endif--}}

        });
    </script>
@endsection
