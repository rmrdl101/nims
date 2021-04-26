@extends('dashboard.layouts.main')

@section('main-content')
    <section class="content">
        <row>
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit User</h4>
                </div>
                <div class="box-body">
                    <form method="POST" action="{{ url('/') }}/dashboard/admin/users/{{ $user->id }}" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf()

                        <div class="form-group">
                            <label for="name">Last name</label>
                            <input type="text" name="lname" class="form-control" id="lname" placeholder="Last Name..." value="{{ $user->lname }}" required>
                        </div>
                        <div class="form-group">
                            <label for="name">First name</label>
                            <input type="text" name="fname" class="form-control" id="fname" placeholder="First Name..." value="{{ $user->fname }}" required>
                        </div>
                        <div class="form-group">
                            <label for="name">User name</label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="Name..." value="{{ $user->username }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email..." value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password..." minlength="8">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Password Confirm</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Password..." id="password_confirmation">
                        </div>

                        <div id="permissions_box" >
                            <label for="roles">Select Permissions</label>
                            <div id="permissions_ckeckbox_list">
                            </div>
                        </div>




                        <div class="form-group pt-2">
                            <input class="btn btn-primary" type="submit" value="Submit">
                        </div>
                    </form>

                </div>
            </div>
        </row>
    </section>
@endsection

@section('page_js')

    {{--<script>--}}

        {{--$(document).ready(function(){--}}
            {{--var permissions_box = $('#permissions_box');--}}
            {{--var permissions_ckeckbox_list = $('#permissions_ckeckbox_list');--}}
            {{--var user_permissions_box = $('#user_permissions_box');--}}
            {{--var user_permissions_ckeckbox_list = $('#user_permissions_ckeckbox_list');--}}

            {{--permissions_box.hide(); // hide all boxes--}}


            {{--$('#role').on('change', function() {--}}
                {{--var role = $(this).find(':selected');--}}
                {{--var role_id = role.data('role-id');--}}
                {{--var role_slug = role.data('role-slug');--}}

                {{--permissions_ckeckbox_list.empty();--}}
                {{--user_permissions_box.empty();--}}

                {{--$.ajax({--}}
                    {{--url: "/users/create",--}}
                    {{--method: 'get',--}}
                    {{--dataType: 'json',--}}
                    {{--data: {--}}
                        {{--role_id: role_id,--}}
                        {{--role_slug: role_slug,--}}
                    {{--}--}}
                {{--}).done(function(data) {--}}

                    {{--console.log(data);--}}

                    {{--permissions_box.show();--}}
                    {{--// permissions_ckeckbox_list.empty();--}}

                    {{--$.each(data, function(index, element){--}}
                        {{--$(permissions_ckeckbox_list).append(--}}
                            {{--'<div class="custom-control custom-checkbox">'+--}}
                            {{--'<input class="custom-control-input" type="checkbox" name="permissions[]" id="'+ element.slug +'" value="'+ element.id +'">' +--}}
                            {{--'<label class="custom-control-label" for="'+ element.slug +'">'+ element.name +'</label>'+--}}
                            {{--'</div>'--}}
                        {{--);--}}

                    {{--});--}}
                {{--});--}}
            {{--});--}}
        {{--});--}}

    {{--</script>--}}
@endsection
