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
                            <label for="name">Middle Name</label>
                            <input type="text" name="mname" class="form-control" id="mname" placeholder="Middle Name..." value="{{ $user->mname }}">
                        </div>
                        <div class="form-group">
                            <label for="name">User name</label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="Name..." value="{{ $user->username }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email..." value="{{ $user->email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Initials</label>
                            <input type="text" name="initials" class="form-control" id="initials" placeholder="initials..." value="{{ $user->initials }}" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Designation</label>
                            <select class="form-control" name="designation" id="designation">
                                <option value="Administrative Aide I" {{ ('Administrative Aide I' == $user->designation) ? 'selected':'' }}>Administrative Aide I</option>
                                <option value="Administrative Aide II" {{ ('Administrative Aide II' == $user->designation) ? 'selected':'' }}>Administrative Aide II</option>
                                <option value="Administrative Aide III" {{ ('Administrative Aide III' == $user->designation) ? 'selected':'' }}>Administrative Aide III</option>
                                <option value="Administrative Aide IV" {{ ('Administrative Aide IV' == $user->designation) ? 'selected':'' }}>Administrative Aide IV</option>
                                <option value="Administrative Aide V"  {{ ('Administrative Aide V' == $user->designation) ? 'selected':'' }}>Administrative Aide V</option>
                                <option value="Administrative Aide VI" {{ ('Administrative Aide VI' == $user->designation) ? 'selected':'' }}>Administrative Aide VI</option>
                                <option value="Administrative Assistant I" {{ ('Administrative Assistant I' == $user->designation) ? 'selected':'' }}>Administrative Assistant I</option>
                                <option value="Administrative Assistant II" {{ ('Administrative Assistant II' == $user->designation) ? 'selected':'' }}>Administrative Assistant II</option>
                                <option value="Administrative Assistant III" {{ ('Administrative Assistant III' == $user->designation) ? 'selected':'' }}>Administrative Assistant III</option>
                                <option value="Midwife I" {{ ('Midwife I' == $user->designation) ? 'selected':'' }}>Midwife I</option>
                                <option value="Midwife II" {{ ('Midwife II' == $user->designation) ? 'selected':'' }}>Midwife II</option>
                                <option value="Nursing Attendant I" {{ ('Nursing Attendant I' == $user->designation) ? 'selected':'' }}>Nursing Attendant I</option>
                                <option value="Nursing Attendant II" {{ ('Nursing Attendant II' == $user->designation) ? 'selected':'' }}>Nursing Attendant II</option>
                                <option value="Nurse I" {{ ('Nurse I' == $user->designation) ? 'selected':'' }}>Nurse I</option>
                                <option value="Nurse II" {{ ('Nurse II' == $user->designation) ? 'selected':'' }}>Nurse II</option>
                                <option value="Nurse III" {{ ('Nurse III' == $user->designation) ? 'selected':'' }}>Nurse III</option>
                                <option value="Nurse IV" {{ ('Nurse IV' == $user->designation) ? 'selected':'' }}>Nurse IV</option>
                                <option value="Nurse V" {{ ('Nurse V' == $user->designation) ? 'selected':'' }}>Nurse V</option>
                                <option value="Nurse VI" {{ ('Nurse VI' == $user->designation) ? 'selected':'' }}>Nurse VI</option>
                            </select>

{{--                            <input type="text" name="designation" class="form-control" id="designation" placeholder="designation..." value="{{ $user->designation }}" required>--}}
                        </div>
                        <div class="form-group">
                            <label for="name">Birth Date</label>
                            <input type="date" name="birthday" class="form-control" id="birthday" value="{{ $user->birthday }}" required>
                        </div>
                        <div class="form-group">
                            <label for="name">License Number</label>
                            <input type="text" name="licnum" class="form-control" id="licnum" placeholder="license number..." value="{{ $user->licnum }}">
                        </div>
                        <div class="form-group">
                            <label for="departments">Area/Department</label>
                            <select class="form-control" name="departments" id="departments">
                                <option value="0"><--select area/deprtment--></option>
                                @foreach($queryA as $department)
                                    @if(isset($user->departments->first()->id))
                                        @foreach($user->departments as $dep)
                                            <option value="{{ $department->id }}"
                                                    {{ ($dep->id == $department->id) ? 'selected':'' }}
                                            >{{ $department->name }}</option>
                                        @endforeach
                                    @else
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="departments">Position Permission</label>
                            <select class="form-control" name="positions" id="positions">
                                <option value="0"><--select position--></option>
                                @foreach($queryB as $position)
                                    @if(isset($user->positions->first()->id))
                                        @foreach($user->positions as $pos)
                                            <option value="{{ $position->id }}"
                                                    {{ ($pos->id == $position->id) ? 'selected':'' }}
                                            >{{ $position->name }}</option>
                                        @endforeach
                                    @else
                                        <option value="{{ $position->id }}">{{ $position->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password..." minlength="8">
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
