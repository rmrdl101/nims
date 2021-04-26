@extends('dashboard.layouts.main')

@section('page_css')
    <!-- Tagsinput -->
    <link rel="stylesheet" href="{{ url('/') }}/dist/tagsinput/bootstrap-tagsinput.css">

    <!-- Data Tables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@endsection

@section('main-content')
    <section class="content">
        <row>
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Edit Position</h4>
                    </div>
                    <form method="POST" action="{{ url('/') }}/dashboard/admin/positions/{{ $queryA->id }}" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf()
                        <div class="box-body">

                            <div class="form-group">
                                <label for="name">Page</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="{{ $leaves }} Name..." value="{{ $queryA->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" name="slug" id="slug" class="form-control" placeholder="slug" value="{{ $queryA->slug }}" required>
                            </div>
                            <div id="table_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered data-table" width="100%">
                                            <thead>
                                            <tr id="">
                                                <th width="5%">Tick</th>
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
                            {{--@if($queryA->permissions->isNotEmpty())--}}
                                {{--<div>--}}
                                    {{--<label for="permissions">Page Permissions</label>--}}
                                    {{--<div id="user_permissions_ckeckbox_list">--}}
                                        {{--@foreach ($queryB as $permission)--}}
                                            {{--<div class="input-group">--}}
                                        {{--<span class="input-group-addon">--}}
                                            {{--<input class="custom-control-input" type="checkbox" name="permissions[]" id="{{$permission->slug}}" value="{{$permission->id}}" {{ in_array($permission->id, $pagePermissions->pluck('id')->toArray() ) ? 'checked="checked"' : '' }}>--}}
                                        {{--</span>--}}
                                                {{--<label class="form-control" for="{{$permission->slug}}">{{$permission->name}}</label>--}}
                                            {{--</div>--}}
                                        {{--@endforeach--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--@else--}}
                                {{--<div>--}}
                                    {{--<label for="permissions">Page Permissions</label>--}}
                                    {{--<div>--}}
                                        {{--@foreach ($queryB as $permission)--}}
                                            {{--<div class="input-group">--}}
                                        {{--<span class="input-group-addon">--}}
                                            {{--<input class="custom-control-input" type="checkbox" name="permissions[]" id="{{$permission->slug}}" value="{{$permission->id}}">--}}
                                        {{--</span>--}}
                                                {{--<label class="form-control" for="{{$permission->slug}}">{{$permission->name}}</label>--}}
                                            {{--</div>--}}
                                        {{--@endforeach--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--@endif--}}
                        </div>
                        <div class="box-footer">
                            <div class="form-group pt-2 pull-right">
                                <input class="btn btn-primary" type="submit" value="Update">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </row>
    </section>
@endsection

@section('page_js')
    <!-- Data Tables -->
    <script src="{{ url('/') }}/plugins/DataTables/datatables.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('dashboard/admin/positions/2/edit') }}",
                columns: [
                    {data: 'tick', name: 'tick'},
                    {data: 'name', name: 'name'},
                    {data: 'permission', name: 'name', orderable: false, searchable: false},
                ]
            });

            console.log(position);

            // jQuery.each(data, function(i,val){
            //     $(".check"+val).attr('checked',true);
            // });
        });
    </script>
@endsection
