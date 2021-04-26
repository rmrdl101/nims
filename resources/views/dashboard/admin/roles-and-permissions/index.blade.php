@extends('dashboard.layouts.main')


@section('page_css')
    <!-- Tagsinput -->
    <link rel="stylesheet" href="{{ url('/') }}/dist/tagsinput/bootstrap-tagsinput.css">
@endsection

@section('main-content')
    <section class="content">
        <row>
            <div class="col-sm-4">
                <div class="box">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Role</h4>
                    </div>
                    <div class="box-body">
                        <form id="role-form" action="{{ url('dashboard/admin/roles') }}" method="post" role="form">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Role" value="" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="slug" id="slug" class="form-control" placeholder="slug" value="" required>
                            </div>
                            <div class="form-group">
                                <input type="text"  name="permissions" id="permissions" data-role="tagsinput"  class="form-control" value="" required>
                            </div>

                            <div class="modal-footer">
                                <div class="form-group">
                                    <input type="submit" name="role-submit" id="role-submit" tabindex="4" class="form-control btn btn-info" value="Add Role">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="box">
                    <div class="modal-header">
                        <h3 >User List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="dataTables_length" id="example1_length">
                                        <label>Show
                                            <select name="example1_length" aria-controls="example1" class="form-control input-sm">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select> entries
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div id="example1_filter" class="dataTables_filter pull-right">
                                        <label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 50px;">ID</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">Role</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 206px;">Slug</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 113px;">Permissions</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 113px;">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($roles as $role)
                                            <tr role="row">
                                                <td>{{ $role->id }}</td>
                                                <td>{{ $role->name }}</td>
                                                <td>{{ $role->slug }}</td>
                                                <td>
                                                    @if ($role->permissions->isNotEmpty())
                                                        @foreach ($role->permissions as $permission)
                                                            <span class="badge badge-secondary">
                                                            {{ $permission->name }}
                                                        </span>
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td class="button-group">
                                                    <a href="{{ url('users').'/'.$role['id'] }}"><i class="fa fa-eye"></i></a>
                                                    <a href="{{ url('users').'/'.$role['id'] }}/edit"><i class="fa fa-edit"></i></a>
                                                    <a class="swalDefaultSuccess" data-id="{{ $role['id'] }}"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                        <tfoot>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending">ID</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Role</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Slug</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Permissions</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Action</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    Showing {{ $roles->firstItem() }} to {{ $roles->lastItem() }} of {{ $roles->total() }} entries
                                    <span class="pull-right">{{ $roles->links() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- /.box-body -->
                </div>
            </div>
        </row>
    </section>
    <form id="deleteRole" method="POST" action="">
        @method('DELETE')
        @csrf
    </form>
@endsection

@section('page_js')
    <script>
        $('.swalDefaultSuccess').on('click', function(){
            var role_id = $(this).data('id');
            var url_del = '{{ url('/') }}';

            $('#deleteRole').attr('action', url_del + '/dashboard/admin/roles/' + role_id);

            Swal.fire({
                title: "Are you sure you want to delete this role?",
                icon: 'warning',
                showDenyButton: true,
                denyButtonText: `No`,
                confirmButtonText: `Yes`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    document.getElementById("deleteRole").submit();
                    Swal.fire('User deleted!', '', 'success')
                } else if (result.isDenied) {
                    Swal.fire('No changes made!', '', 'info')
                }
            })
        });

    </script>

    <!-- Tagsinput -->
    <script src="{{ url('/') }}/dist/tagsinput/bootstrap-tagsinput.js"></script>
    <script>
        $(document).ready(function () {
            $('#name').keyup(function(e) {
                var str = $('#name').val();
                str = str.replace(/\W+(?!$)/g, '-').toLowerCase();
                $('#slug').attr('value', str);
            });
        });
    </script>
@endsection
