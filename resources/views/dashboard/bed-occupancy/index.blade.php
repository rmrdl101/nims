<!-- Blade for NIMS version 1.0 -->
<!-- lastEditDate="2-28-2021" -->
<!-- lastEditBy="Roland Lagos" -->
<!-- lastEditMade
        -Removed Tagsinput css and js
        -added box-info as top lining of the main box
-->

@extends('dashboard.layouts.main')

@section('page_css')
    <!-- Data Tables -->
    <link href="{{ url('/') }}/plugins/DataTables/datatables.min.css" rel="stylesheet">
@endsection

@section('main-content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-sm-6">
                    <!-- Default box -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Bed Occupancy</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" id="bedOccupancy">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Area/Department</label>
                                    <select class="form-control ad" name="ad" id="ad">
                                        <option><--select area--></option>
                                        @foreach($departments as $department)
                                        <option value="{{ $department->slug }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Actual Beds</label>
                                    <input type="number" class="form-control" name="a" id="a">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Census</label>
                                    <input type="number" class="form-control cen" name="cen" id="cen">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">May Go Home</label>
                                    <input type="number" class="form-control mgh" name="mgh" id="mgh">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Discharge</label>
                                    <input type="number" class="form-control dis" name="dis" id="dis">
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary nffc">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-sm-6 connectedSortable">
                    <!-- AREA CHART -->
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Areas/Department</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">Dept.</th>
                                    <th>Actual Beds</th>
                                    <th>Census</th>
                                    <th>MGH</th>
                                    <th>Discharge</th>
                                </tr>

                                <tr>
                                    <td>ER</td>
                                    <td id="emergency-room1">0</td>
                                    <td id="emergency-room2">0</td>
                                    <td id="emergency-room3">0</td>
                                    <td id="emergency-room4">0</td>
                                    {{--<td>ER</td>--}}
                                    {{--<td id="ER1">{{ $dataA->val1 }}</td>--}}
                                    {{--<td id="ER2">{{ $dataA->val2 }}</td>--}}
                                    {{--<td id="ER3">{{ $dataA->val3 }}</td>--}}
                                    {{--<td id="ER4">{{ $dataA->val4 }}</td>--}}
                                </tr>

                                <tr>
                                    <td>OR</td>
                                    <td id="operating-room1">0</td>
                                    <td id="operating-room2">0</td>
                                    <td id="operating-room3">0</td>
                                    <td id="operating-room4">0</td>
                                </tr>
                                <tr>
                                    <td>LRDR</td>
                                    <td id="labor-room-delivery-room1">0</td>
                                    <td id="labor-room-delivery-room2">0</td>
                                    <td id="labor-room-delivery-room3">0</td>
                                    <td id="labor-room-delivery-room4">0</td>
                                </tr>
                                <tr>
                                    <td>IMCU</td>
                                    <td id="critical-care-unit1">0</td>
                                    <td id="critical-care-unit2">0</td>
                                    <td id="critical-care-unit3">0</td>
                                    <td id="critical-care-unit4">0</td>
                                </tr>
                                <tr>
                                    <td>PedW</td>
                                    <td id="pediatric-ward1">0</td>
                                    <td id="pediatric-ward2">0</td>
                                    <td id="pediatric-ward3">0</td>
                                    <td id="pediatric-ward4">0</td>
                                </tr>
                                <tr>
                                    <td>MedW</td>
                                    <td id="medical-ward1">0</td>
                                    <td id="medical-ward2">0</td>
                                    <td id="medical-ward3">0</td>
                                    <td id="medical-ward4">0</td>
                                </tr>
                                <tr>
                                    <td>SURGW</td>
                                    <td id="surgical-ward1">0</td>
                                    <td id="surgical-ward2">0</td>
                                    <td id="surgical-ward3">0</td>
                                    <td id="surgical-ward4">0</td>
                                </tr>
                                <tr>
                                    <td>OB HR</td>
                                    <td id="ob-high-risk1">0</td>
                                    <td id="ob-high-risk2">0</td>
                                    <td id="ob-high-risk3">0</td>
                                    <td id="ob-high-risk4">0</td>
                                </tr>
                                <tr>
                                    <td>OB LR</td>
                                    <td id="ob-low-risk1">0</td>
                                    <td id="ob-low-risk2">0</td>
                                    <td id="ob-low-risk3">0</td>
                                    <td id="ob-low-risk4">0</td>
                                </tr>
                                <tr>
                                    <td>OPD</td>
                                    <td id="out-patient-department1">0</td>
                                    <td id="out-patient-department2">0</td>
                                    <td id="out-patient-department3">0</td>
                                    <td id="out-patient-department4">0</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">

                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    <!-- Data Tables -->
    <script src="{{ url('/') }}/plugins/DataTables/datatables.min.js"></script>

    <script type="text/javascript">

        $(document).ready(function () {

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('dashboard/admin/permissions') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'slug', name: 'slug'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            /* Reset modal fields */
            $('#crud-modal').on('hidden.bs.modal', function () {
                $('#crud-modal form')[0].reset();
            })

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

                }else if (item_id ==1){
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
                    // $('#slug').val(data.slug);
                    $('#edit').val(item_id);
                    $('#additional').html('<input type="hidden" id="edit" value="'+ item_id +'">\n' +
                        '                        <input type="hidden" id="meth" name="_method" value="PATCH">');

                })
            });

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
                            url: "{{ url('dashboard/admin/permissions') }}/" + item_id,
                            method: 'POST',
                            data: {
                                _method: 'DELETE',
                                "id": item_id,
                                "_token": token,
                            },
                            success: function (data) {
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

        });
    </script>



    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/8.0.2/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.0.2/firebase-database.js"></script>


    {{--<script src="{{ url('/') }}/js/bed-occupancy.js"></script>--}}
    <script>
        // Initialize Firebase
        firebase.initializeApp({!! $fbConf !!});
        // firebase.initializeApp(fb);

        //initialize
        var dbRef = firebase.database();

        //create table
        var userRef = dbRef.ref('bedvac');


        var fields = '';

        var url = "bed-occupancy";

        {{--$('#ad').change(function(){--}}
            {{--console.log('ok')--}}
            {{--$('#a').val({{ $dataA->val1 }}).fadeIn(300);--}}
            {{--$('#cen').val({{ $dataA->val2 }}).fadeIn(300);--}}
            {{--$('#mgh').val({{ $dataA->val3 }}).fadeIn(300);--}}
            {{--$('#dis').val({{ $dataA->val4 }}).fadeIn(300);--}}
        {{--});--}}

        $('#bedOccupancy').on('submit',function (e) {
            e.preventDefault();

            fields = document.getElementById('ad').value;

            var a = $('input[name = a]').val();
            var cen = $('input[name = cen]').val();
            var mgh = $('input[name = mgh]').val();
            var dis = $('input[name = dis]').val();


            var d1 = (a)? fields+'1' : fields;
            var d2 = (cen)? fields+'2' : fields;
            var d3 = (mgh)? fields+'3' : fields;
            var d4 = (dis)? fields+'4' : fields;

            $.ajax({
                type: "POST",
                url: "bed-occupancy",
                data:  {
                    _token: "{{ csrf_token() }}",
                    auth : "{!! Auth::user()->lname !!}",
                    field : fields,
                    ad : fields,
                    a : a,
                    cen : cen,
                    mgh : mgh,
                    dis : dis
                },

                success: function(response){
                    console.log(response)
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'You have successfully added an updated entry!',
                        // footer: '<a href>Why do I have this issue?</a>'
                    })
                },
                error: function(error) {
                    console.log(error)
                    // console.log(response)
                    Swal.fire(
                        'Error!',
                        'Data has not been save kindly contact the administrator!',
                        'error'
                    )
                }
            });

            // var data = [];
            // data[fields+'1'] = $('input[name = a]').val();
            // data[fields+'2'] = $('input[name = cen]').val();
            // data[fields+'3'] = $('input[name = mgh]').val();
            // data[fields+'4'] = $('input[name = dis]').val();
            // console.log(data);

            userRef.push({
                varF1 : d1,
                varV1 : a,
                varF2 : d2,
                varV2 : cen,
                varF3 : d3,
                varV3 : mgh,
                varF4 : d4,
                varV4 : dis
            });
        });


        // delete once added
        userRef.on('child_added',function(data){
            setTimeout(function(){
                userRef.child(data.key).remove();
            },200);
        });

        //retrieve data
        userRef.on('child_added',function(snapshot){
            var data = snapshot.val();

            $('#'+data.varF1).fadeOut(700);
            $('#'+data.varF2).fadeOut(700);
            $('#'+data.varF3).fadeOut(700);
            $('#'+data.varF4).fadeOut(700);
            setTimeout(function () {
                $('#'+data.varF1).html(data.varV1).fadeIn(300);
                $('#'+data.varF2).html(data.varV2).fadeIn(300);
                $('#'+data.varF3).html(data.varV3).fadeIn(300);
                $('#'+data.varF4).html(data.varV4).fadeIn(300);
            },500);
        });
    </script>
@endsection
