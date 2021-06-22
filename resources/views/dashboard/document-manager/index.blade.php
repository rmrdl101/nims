<!-- TODO
    -reload file tree when adding and deleting folder
-->

@extends('dashboard.layouts.main')

@section('page_css')
        <link rel="stylesheet" href="{{ url('/') }}/dash/custom/file-explore/file-explore.css" rel="stylesheet" type="text/css">

        <!-- DataTables -->
        <link rel="stylesheet" href="{{ url('/') }}/dash/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endsection

@section('main-content')
    <section class="content">
        <div class="row">

            <div class="col-md-4">
                <div class="box box-info">
                    <div id="file-body" class="box-body">
                        <ul class="file-tree">
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.col-md-4 -->

            <div class="col-md-8">
                <div id="welcome-msg" class="box box-danger">
                    <div class="box-body load_content pt-2 pl-4 pr-4 pb-3">
                        <h1 class="text-danger title-header">Welcome to NIMS Document Manager</h1>
                        <div class="img-thumbnail" style="width: 100%">
                            <img src="http://csmc.site/intranet/images/dms.jpg" width="100%" alt="">
                        </div>
                        <p>
                            NIMS Document Management System is a web-based information system that store documents, coded forms, operation manuals, and other documents within the organization, usually to the exclusion of access by outsiders or unregistered personnel.
                        </p>
                        <p>
                            Document management, often referred to as Document Management Systems (DMS), is the use of a computer system and software to store, manage and track electronic documents and electronic images of paper-based information captured through the use of a document scanner.
                        </p>
                    </div>
                </div>
                <!-- /#welcome-msg -->

                <div id="table-id" class="box" style="display:none">
                    <div class="box-header">
                        <h3 class="box-title folder-show-name">Data Table With Full Features</h3>

                        <div class="box-tools">
                            <a data-toggle="modal" class="btn btn-info" data-target="#add-folder">New Folder</a>
                            <a class="btn btn-danger" id="delete-folder">Delete Folder</a>
                            <a data-toggle="modal" class="btn btn-info" data-target="#add-new-document">Add Document</a>
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
                                            <th>Code</th>
                                            <th>Revision</th>
                                            <th>Title</th>
                                            <th>File Type</th>
                                            <th>Action</th>
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
                <!-- /#table-id -->

                {{--<div class="box">--}}
                    {{--<iframe src="https://view.officeapps.live.com/op/view.aspx?src={{url("http://csmc.site/intranet/download/3")}}" frameborder="0" style="width:100%;min-height:640px;"></iframe>--}}
                     {{--<iframe id="return-view" src="https://docs.google.com/gview?url=http://127.0.0.1/nims/storage/Document-Controlled-Form/NSD/0 Generic/FM/NSD-FM-01_5_Nurse Supervisor's Daily Endrosement Report.docx&embedded=true" title="views" style="width: 100%; height: 400px"></iframe> --}}
                {{--</div>--}}
            </div>
        </div>
    </section>

    <!-- Preview Document-->
    <div class="modal fade" id="modal-default">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="title" class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <iframe id="return-view" src="" title="views" style="width: 100%; height: 80vh"></iframe>
                </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-info pull-right" data-dismiss="modal">Close</button>
               </div>
            </div>
            <!-- /.modal-content -->

    </div>
    <!-- /.modal -->

    <!-- Add Document -->
    <div class="modal fade" id="add-new-document" aria-hidden="true" >
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="crudModal">Upload Files</h4>
            </div>
            <div class="modal-body">
                <form id="add-file" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="file" class="col-md-4 col-form-label text-md-right">Select a file to upload</label>
                        <div class="col-md-6">
                            <input id="route" type="hidden" name="route" value="">
                            <input id="file" type="file" class="form-control @error('file') is-invalid @enderror" name="files[]" value="{{ old('file') }}" multiple>
                            @error('file')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary" id="upload">Upload File</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- New Folder -->
    <div class="modal fade" id="add-folder" aria-hidden="true" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="crudModal">New Folder</h4>
                </div>
                <div class="modal-body">
                    <form id="new-folder" method="post">
                        @csrf
                        <div id="additional"></div>
                        <div class="box-body">
                            <input id="froute" type="hidden" name="froute" value="">
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
                                <label for="name">Folder Name</label>
                                <input type="text" name="foldername" id="foldername" class="form-control" value="" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="form-group">
                                <input type="submit" name="role-submit" id="add-data" tabindex="4" class="form-control btn btn-info" data-id="" value="Create Folder">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('page_js')
    <!-- DataTables -->
    <script src="{{ url('/') }}/dash/plugins/DataTables/datatables.min.js"></script>

    <script src="{{ url('/') }}/dash/custom/file-explore/file-explore.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            var thisUrl = "{{ url('document-manager') }}";
//            $('.file-tree').filetree();

            var fileTree = $.ajax({
                url: '{{route('file-tree')}}',
                method: "GET",
                contentType: false,
                cache: false,
                success: function (data) {
                    $('.file-tree').html(data).filetree();

                    //Folder Tree View
                    $('.folder-name').click( function () {
                        var token = $("meta[name='csrf-token']").attr("content");

                        var path = $(this).attr('path');

                        var name = $(this).attr('data-name');

                        $('.box-title').html(name);

                        $('#route').val(path);
                        $('#froute').val(path);

                        $('#welcome-msg').attr("style", "display:none")

                        $('#table-id').removeAttr("style")

                        $.ajax({
                            url: "{{ url("/store/path/") }}",
                            type: 'POST',
                            data: {
                                path: path,
                                _token: token,
                            },
                            success: function(data){
                                // console.log(path);
                                table.ajax.reload();
                                // $('input[type=search]').val('');
                            }
                        })

                    });
                },
            });

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: thisUrl,
                columns: [
                    {data: 'docCode', name: 'docCode'},
                    {data: 'docRev', name: 'docRev'},
                    {data: 'docName', name: 'docName'},
                    {data: 'docExt', name: 'docExt'},
                    {data: 'action', name: 'action'},
                ]
            });


            // Add File or Document
            $(document).on('submit','#add-file',function (e) {
                e.preventDefault();

                $.ajax({
                    url: "{{ route('upload') }}",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function (data) {
                        table.ajax.reload();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });

                $("#add-new-document").modal('hide');
            });

            // Delete File or Document
            $('body').on('click', '#delete-data', function () {
                var item_path = $(this).data('path');
                var token = $("meta[name='csrf-token']").attr("content");

                Swal.fire({
                    title: "Are you sure you want to DELETE this document?",
                    icon: 'warning',
                    showDenyButton: true,
                    confirmButtonText: `DELETE`,
                    denyButtonText: `NO`,
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('file-delete') }}",
                            method: 'POST',
                            data: {
                                "fpath": item_path,
                                "_token": '{{ csrf_token() }}',
                            },
                            success: function (data) {
                                table.ajax.reload();
                                Swal.fire('Document deleted!', '', 'success')
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


            //Create New Folder
            $(document).on('submit','#new-folder',function (e) {
                e.preventDefault();

                $.ajax({
                    url: "{{ route('new-folder') }}",
                    method: 'POST',
                    data: {
                        "fpath": document.getElementById("froute").value,
                        "fname": document.getElementById("foldername").value,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function (data)
                    {
                        $.get('{{route('file-tree')}}', function (data) {
                            $('.file-tree').html(data).filetree();
                        });
                    },
                    error: function (data)
                    {
                        //
                    }
                });

                $("#add-folder").modal('hide');
            });

            //Delete Folder
            $(document).on('click','#delete-folder',function (e) {
                e.preventDefault();

                $.ajax({
                    url: "{{ route('delete-folder') }}",
                    method: 'POST',
                    data: {
                        "fpath": document.getElementById("froute").value,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function (data)
                    {
                        $.get('{{route('file-tree')}}', function (data) {
                            $('.file-tree').html(data).filetree();
                        });
                    },
                    error: function (data)
                    {
                        //
                    }
                });

                $("#add-folder").modal('hide');
            });
        });

    </script>

@endsection
