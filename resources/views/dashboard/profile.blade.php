@extends('dashboard.layouts.main')

@section('page_css')
@endsection
@section('main-content')

    <section class="content">

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="https://ui-avatars.com/api/?name={{ Auth::user()->fname }}+{{ Auth::user()->lname }}" alt="User profile picture">

                        <h3 class="profile-username text-center">{{ Auth::user()->fname }} {{ substr(Auth::user()->mname, 0, 1) }}. {{ Auth::user()->lname }}</h3>

                        <p class="text-muted text-center" style="font-size: small">{{ Auth::user()->designation }} | {{ Auth::user()->departments->first()->name }}</p>

                        {{--<ul class="list-group list-group-unbordered">--}}
                            {{--<li class="list-group-item">--}}
                                {{--<b>Followers</b> <a class="pull-right">1,322</a>--}}
                            {{--</li>--}}
                            {{--<li class="list-group-item">--}}
                                {{--<b>Following</b> <a class="pull-right">543</a>--}}
                            {{--</li>--}}
                            {{--<li class="list-group-item">--}}
                                {{--<b>Friends</b> <a class="pull-right">13,287</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}

                        {{--<a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>--}}
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">About Me</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-book margin-r-5"></i>Birthday</strong>

                        <p class="text-muted">
                            {{ Auth::user()->birthday }}
                        </p>

                        <hr>
                        @if(!Auth::user()->licnum)
                        @else
                            <strong><i class="fa fa-map-marker margin-r-5"></i> License Number</strong>

                            <p class="text-muted">{{ Auth::user()->licnum }}</p>

                            <hr>
                        @endif

                        {{--<strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>--}}

                        {{--<p>--}}
                            {{--<span class="label label-danger">UI Design</span>--}}
                            {{--<span class="label label-success">Coding</span>--}}
                            {{--<span class="label label-info">Javascript</span>--}}
                            {{--<span class="label label-warning">PHP</span>--}}
                            {{--<span class="label label-primary">Node.js</span>--}}
                        {{--</p>--}}

                        {{--<hr>--}}

                        <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>

                        @if(Auth::user()->hasPosition('admin'))
                        <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
                        <li><a href="#settings" data-toggle="tab">Settings</a></li>
                        @endif
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <!-- Post -->
                            <div class="post">
                                <div class="fb-post" data-href="https://www.facebook.com/TDHNursingService/posts/1007348243406363" data-width="auto" data-show-text="true"><blockquote cite="https://www.facebook.com/TDHNursingService/posts/1007348243406363" class="fb-xfbml-parse-ignore"><p>June 10-11, 2021 - a very productive session for our Admin and other NSD Personnel as they embarked on an interactive...</p>Posted by <a href="https://www.facebook.com/TDHNursingService/">Cebu South Medical Center Nursing Service</a> on&nbsp;<a href="https://www.facebook.com/TDHNursingService/posts/1007348243406363">Sunday, June 13, 2021</a></blockquote></div>
                            </div>
                            <!-- /.post -->

                            <!-- Post -->
                            <div class="post clearfix">
                                <div class="fb-post" data-href="https://www.facebook.com/TDHNursingService/posts/1004755066999014" data-width="auto" data-show-text="true"><blockquote cite="https://www.facebook.com/TDHNursingService/posts/1004755066999014" class="fb-xfbml-parse-ignore"><p>June 9, 2021 - CSMC Nursing Service was invited to share best practices on the division???s COVID-19 Response in a collaborative activity with the Western Visayas Sanitarium Nursing Service Division.</p>Posted by <a href="https://www.facebook.com/TDHNursingService/">Cebu South Medical Center Nursing Service</a> on&nbsp;<a href="https://www.facebook.com/TDHNursingService/posts/1004755066999014">Wednesday, June 9, 2021</a></blockquote></div>
                            </div>
                            <!-- /.post -->
                        </div>
                        <!-- /.tab-pane -->

                        @if(Auth::user()->hasPosition('admin'))
                        <div class="tab-pane" id="timeline">
                            <!-- The timeline -->
                            <ul class="timeline timeline-inverse">
                                <!-- timeline time label -->
                                <li class="time-label">
                        <span class="bg-red">
                          10 Feb. 2014
                        </span>
                                </li>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <li>
                                    <i class="fa fa-envelope bg-blue"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                                        <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                                        <div class="timeline-body">
                                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                            quora plaxo ideeli hulu weebly balihoo...
                                        </div>
                                        <div class="timeline-footer">
                                            <a class="btn btn-primary btn-xs">Read more</a>
                                            <a class="btn btn-danger btn-xs">Delete</a>
                                        </div>
                                    </div>
                                </li>
                                <!-- END timeline item -->
                                <!-- timeline item -->
                                <li>
                                    <i class="fa fa-user bg-aqua"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                                        <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                                        </h3>
                                    </div>
                                </li>
                                <!-- END timeline item -->
                                <!-- timeline item -->
                                <li>
                                    <i class="fa fa-comments bg-yellow"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                                        <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                                        <div class="timeline-body">
                                            Take me to your leader!
                                            Switzerland is small and neutral!
                                            We are more like Germany, ambitious and misunderstood!
                                        </div>
                                        <div class="timeline-footer">
                                            <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                                        </div>
                                    </div>
                                </li>
                                <!-- END timeline item -->
                                <!-- timeline time label -->
                                <li class="time-label">
                        <span class="bg-green">
                          3 Jan. 2014
                        </span>
                                </li>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <li>
                                    <i class="fa fa-camera bg-purple"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                                        <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                                        <div class="timeline-body">
                                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                                        </div>
                                    </div>
                                </li>
                                <!-- END timeline item -->
                                <li>
                                    <i class="fa fa-clock-o bg-gray"></i>
                                </li>
                            </ul>
                        </div>
                        <!-- /.tab-pane -->

                        <div class="tab-pane" id="settings">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputName" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                            @endif
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>

@endsection


@section('page_js')

    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v11.0" nonce="KPMExV8O"></script>
@endsection
