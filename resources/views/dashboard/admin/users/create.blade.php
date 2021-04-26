@extends('dashboard.layouts.main')

@section('main-content')
    <section class="content">
        <row>
            <div class="box box-primary">
                <form method="POST" action="{{ url('dashboard/admin/users') }}" enctype="multipart/form-data">
                @csrf
                    <div class="box-header with-border">
                        <h4 class="box-title">Add User</h4>
                    </div>
                    <div class="box-body">

                            <div class="form-group">
                                <label for="name">User name</label>
                                <input type="text" name="username" class="form-control" id="username" placeholder="Username..." value="{{ old('username') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email..." value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password..." required minlength="8">
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Password Confirm</label>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Password..." id="password_confirmation">
                            </div>
                            <div class="form-group">
                                <label for="role">Select Department</label>

                                <select class="role form-control" name="department" id="department">
                                    <option value="">Select Department...</option>
                                    @foreach ($queryA as $department)
                                        <option data-role-id="{{$department->id}}" data-role-slug="{{$department->slug}}" value="{{$department->id}}">{{$department->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="role">Select Position</label>

                                <select class="role form-control" name="position" id="position">
                                    <option value="">Select Position...</option>
                                    @foreach ($queryB as $position)
                                        <option data-role-id="{{$position->id}}" data-role-slug="{{$position->slug}}" value="{{$position->id}}">{{$position->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                    </div>
                    <div class="box-footer">
                        <div class="form-group pt-2">
                            <input class="btn btn-primary" type="submit" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
        </row>
    </section>
@endsection

@section('page_js')
    <script>

        $(document).ready(function(){
            var permissions_box = $('#permissions_box');
            var permissions_ckeckbox_list = $('#permissions_ckeckbox_list');

            permissions_box.hide(); // hide all boxes


            $('#role').on('change', function() {
                var role = $(this).find(':selected');
                var role_id = role.data('role-id');
                var role_slug = role.data('role-slug');
                var url = '{{ url('/') }}';

                permissions_ckeckbox_list.empty();

                $.ajax({
                    url: url + "/dashboard/admin/users/create",
                    method: 'get',
                    dataType: 'json',
                    data: {
                        role_id: role_id,
                        role_slug: role_slug,
                    }
                }).done(function(data) {

                    console.log(data);

                    permissions_box.show();
                    // permissions_ckeckbox_list.empty();

                    $.each(data, function(index, element){
                        $(permissions_ckeckbox_list).append(
                                '<span class="badge bg-light-blue">'+
                                    '<input type="checkbox" name="permissions[]" id="'+ element.slug +'" value="'+ element.id +'">' +
                                    element.name+
                                '</span> '

                        );

                    });
                });
            });
        });

    </script>
@endsection
