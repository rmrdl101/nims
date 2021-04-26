@extends('dashboard.layouts.main')

@section('main-content')
    <section class="content">
        <row>
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Edit Department</h4>
                    </div>
                    <div class="box-body">
                        <form method="POST" action="{{ url('/') }}/dashboard/admin/departments/{{ $queryA->id }}" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf()

                            <div class="form-group">
                                <label for="name">Name of Department</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="{{ $leaves }} Name..." value="{{ $queryA->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" name="slug" id="slug" class="form-control" placeholder="slug" value="{{ $queryA->slug }}" required>
                            </div>

                            <div class="form-group pt-2">
                                <input class="btn btn-primary" type="submit" value="Update">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </row>
    </section>
@endsection

@section('page_js')
    <script>
        $(document).ready(function () {
            $('#name').keyup(function(e) {
                var str = $('#name').val();
                str = str.replace(/\W+(?!$)/g, '-').toLowerCase();
                $('#slug').attr('value', str);
            });
        });
    </script>

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
