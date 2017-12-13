@extends('layouts.admin.admin_mst_dashboard')
@section('title', 'SSWS - '.Auth::user()->name.'`s Profile')
@section('sidenav')
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">FROM USERS</li>
        <li class="active treeview menu-open">
            @if(session('nama')== 'SUPER ADMIN')
                <a href="{{route('admin.dashboard')}}">
                    @elseif(session('nama')== 'UPTSA')
                        <a href="{{route('uptsa.dashboard')}}">
                            @elseif(session('nama')== 'KASIE')
                                <a href="{{route('kasie.dashboard')}}">
                                    @elseif(session('nama')== 'KABID')
                                        <a href="{{route('kabid.dashboard')}}">
                                            @elseif(session('nama')== 'SEKRETARIS')
                                                <a href="{{route('sekretaris.dashboard')}}">
                                                    @elseif(session('nama')== 'KADIN')
                                                        <a href="{{route('kadin.dashboard')}}">
                                                            @endif
                                                            <i class="fa fa-dashboard"></i>
                                                            <span>Dashboard</span>
                                                        </a>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-table"></i> <span>Tables</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{url('admin/tables/perizinan#apotek')}}"><i class="fa fa-medkit text-aqua"></i>
                        Perizinan Apotek</a>
                </li>
                <li><a href="{{url('admin/tables/perizinan#air')}}"><i class="fa fa-bitbucket text-teal"></i>
                        Perizinan
                        Depo Air Minum</a></li>
                <li><a href="{{url('admin/tables/perizinan#hama')}}"><i class="fa fa-bug text-yellow"></i>
                        Perizinan
                        Pengendalian Hama</a></li>
                <li><a href="{{url('admin/tables/member-feedback#feedback')}}"><i
                                class="fa fa-comments text-red"></i> Feedback
                        Received</a></li>
            </ul>
        </li>
        <li class="header">FOR USERS</li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-medkit"></i> <span>Apotek Contents</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{url('admin/apotekcontent#addapotek')}}"><i
                                class="fa fa-pencil-square-o text-aqua"></i> Add Content</a>
                </li>
                <li><a href="{{url('admin/apotekcontent#apotek')}}"><i class="fa fa-table text-aqua"></i> View
                        Content</a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-bitbucket"></i> <span>Depo Air Minum Contents</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{url('admin/aircontent#addair')}}"><i
                                class="fa fa-pencil-square-o text-teal"></i> Add
                        Content</a></li>
                <li><a href="{{url('admin/aircontent#air')}}"><i class="fa fa-table text-teal"></i>
                        View Content</a>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-bug"></i> <span>Hama Contents</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{url('admin/hamacontent#addhama')}}"><i
                                class="fa fa-pencil-square-o text-teal"></i> Add
                        Content</a></li>
                <li><a href="{{url('admin/hamacontent#hama')}}"><i class="fa fa-table text-teal"></i>
                        View Content</a>
            </ul>
        </li>
    </ul>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{Auth::user()->name}} Profile
            </h1>
            <ol class="breadcrumb">
                <li>
                    @if(session('nama')== 'SUPER ADMIN')
                        <a href="{{route('admin.dashboard')}}">
                            @elseif(session('nama')== 'UPTSA')
                                <a href="{{route('uptsa.dashboard')}}">
                                    @elseif(session('nama')== 'KASIE')
                                        <a href="{{route('kasie.dashboard')}}">
                                            @elseif(session('nama')== 'KABID')
                                                <a href="{{route('kabid.dashboard')}}">
                                                    @elseif(session('nama')== 'SEKRETARIS')
                                                        <a href="{{route('sekretaris.dashboard')}}">
                                                            @elseif(session('nama')== 'KADIN')
                                                                <a href="{{route('kadin.dashboard')}}">
                                                                    @endif
                                                                    <i class="fa fa-dashboard"></i> Home</a>
                </li>
                <li><a href="{{url('admin/'.Auth::user()->id.'/settings')}}">Edit Profile</a></li>
                <li class="active">{{Auth::user()->name}}</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            @if(Auth::user()->url == "avatar.png")
                                <img class="profile-user-img img-responsive img-circle"
                                     src="{{asset('storage/admin/dummy-profile.jpg')}}" alt="User profile picture">
                            @else
                                <img class="profile-user-img img-responsive img-circle"
                                     src="{{asset('storage/admin/'.Auth::user()->url)}}" alt="User profile picture">
                            @endif

                            <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>
                            <?php $dt = \App\role::findOrFail(Auth::user()->lastname) ?>
                            <p class="text-muted text-center">{{$dt->ket}}</p>

                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>E-mail</b> <a class="pull-right">{{Auth::user()->email}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Admin Since</b> <a class="pull-right">{{Auth::user()->created_at}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Last Update</b> <a class="pull-right">{{Auth::user()->updated_at}}</a>
                                </li>
                            </ul>
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
                            <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

                            <p class="text-muted">
                                {{Auth::user()->education}}
                            </p>

                            <hr>

                            <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                            <p class="text-muted">{{Auth::user()->address}}</p>

                            <hr>

                            <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

                            <p>
                                <span class="label label-info">{{Auth::user()->skills}}</span>
                            </p>

                            <hr>
                            <strong><i class="fa fa-file-text-o margin-r-5"></i> Brief Biography</strong>

                            <p>{{Auth::user()->biography}}</p>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#settings" data-toggle="tab">Settings</a></li>
                            @if(Auth::user()->lastname=='1')
                                <li><a href="#add" data-toggle="tab">Add an Admin</a></li>
                                <li><a href="#adminlist" data-toggle="tab">Admin List</a></li>
                            @endif
                        </ul>
                        <div class="tab-content">
                            <div class="active tab-pane" id="settings">
                                <form method="post" class="form-horizontal"
                                      action="{{url('admin/'.$admin->id)}}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{ method_field('put') }}
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Picture</label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <label class="input-group-btn">
                                                    <span class="btn btn-info">
                                                        Browse&hellip;<input type="file" name="url"
                                                                             style="display: none;" multiple>
                                                    </span>
                                                </label>
                                                <input type="text" id="img_gallery" class="form-control" readonly>
                                                @if(session('file'))
                                                    <span class="help-block">
                                                        <strong>{{ session('file') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Name</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name" id="inputName"
                                                   value="{{ $admin->name }}">
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Job Title</label>
                                        <div class="col-sm-10">
                                            <?php $dt2 = \App\role::findOrFail($admin->lastname) ?>
                                            <select class="form-control" name="lastname" disabled>
                                                    <option value="" disabled selected>-- Choose Title --</option>
                                                @foreach($ro as $row)
                                                    <option value="{{$row->id}}"
                                                    <?php if ($row->name == $dt2->name) echo 'selected'
                                                        ?>>{{$row->ket}}</option>
                                                @endforeach
                                                </select>
                                            @if ($errors->has('lastname'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('lastname') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" name="email"
                                                   id="inputEmail"
                                                   value="{{ $admin->email }}">
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ session('status') ? ' has-error' : '' }} has-feedback">
                                        <label for="password" class="col-sm-2 control-label">Old
                                            Password</label>

                                        <div class="col-sm-10">
                                            <input placeholder="Current password" id="password" type="password"
                                                   class="form-control"
                                                   name="password">
                                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                                            @if (session('status'))
                                                <span class="help-block">
                                                            <strong>{{ session('status') }}</strong>
                                                        </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }} has-feedback">
                                        <label for="password" class="col-sm-2 control-label">New
                                            Password</label>

                                        <div class="col-sm-10">
                                            <input placeholder="if you don`t wanna change it, fill it with your current password"
                                                   id="password" type="password" class="form-control"
                                                   name="new_password">
                                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                                            @if ($errors->has('new_password'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('new_password') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} has-feedback">
                                        <label for="password-confirm" class="col-sm-2 control-label">Confirm
                                            Password</label>
                                        <div class="col-sm-10">
                                            <input placeholder="Retype password"
                                                   id="password-confirm" type="password" class="form-control"
                                                   name="password_confirmation">
                                            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                                            @if ($errors->has('password_confirmation'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Address</label>

                                        <div class="col-sm-10">
                                            <input value="{{$admin->address}}" type="text" class="form-control"
                                                   name="address"
                                                   id="inputEmail"
                                                   placeholder="Address">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="education" class="col-sm-2 control-label">Education</label>

                                        <div class="col-sm-10">
                                            <input value="{{$admin->education}}" type="text" class="form-control"
                                                   id="inputName"
                                                   name="education"
                                                   placeholder="Educational background">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                                        <div class="col-sm-10">
                                            <input value="{{$admin->skills}}" type="text" class="form-control"
                                                   name="skills"
                                                   id="inputSkills"
                                                   placeholder="Skills">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSkills"
                                               class="col-sm-2 control-label">Biography</label>

                                        <div class="col-sm-10">
                                            <textarea name="biography" class="form-control" id="inputSkills"
                                                      placeholder="Brief biography">{{$admin->biography}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="add">
                                @if(Auth::user()->lastname=='1')
                                    <form method="post" class="form-horizontal" action="{{route('admin.add')}}">
                                        {{ csrf_field() }}
                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
                                            <label for="inputName" class="col-sm-3 control-label">Name</label>
                                            <div class="col-sm-9">
                                                <input placeholder="Full name" type="text" class="form-control"
                                                       name="name" id="inputName">
                                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }} has-feedback">
                                            <label for="inputName" class="col-sm-3 control-label">Job Title</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="lastname">
                                                    <option value="" disabled selected>-- Choose Title --</option>
                                                    @foreach($ro as $row)
                                                        @if($row->id != '1')
                                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                                @if ($errors->has('lastname'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('lastname') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                                            <label for="inputEmail" class="col-sm-3 control-label">Email</label>

                                            <div class="col-sm-9">
                                                <input placeholder="E-mail" type="email" class="form-control"
                                                       name="email" id="inputEmail">
                                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                                            <label for="password" class="col-sm-3 control-label">Password</label>
                                            <div class="col-sm-9">
                                                <input placeholder="Password" id="password" type="password"
                                                       class="form-control"
                                                       name="password">
                                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group has-feedback">
                                            <label for="password-confirm" class="col-md-3 control-label">Confirm
                                                Password</label>
                                            <div class="col-md-9">
                                                <input placeholder="Retype password" id="password-confirm"
                                                       type="password" class="form-control"
                                                       name="password_confirmation">
                                                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                @endif
                            </div>
                            <div class="tab-pane" id="adminlist">
                                @if(Auth::user()->lastname=='1')
                                    <table id="example1" class="table table-bordered table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Name</th>
                                            <th>Job_Title</th>
                                            <th>E-mail</th>
                                            <th>created_at</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no = 1;?>
                                        @foreach($admins as $row)
                                            <?php $dt = \App\role::findOrFail($row->lastname) ?>
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$row->name}}</td>
                                                <td>{{$dt->ket}}</td>
                                                <td>{{$row->email}}</td>
                                                <td>{{$row->created_at}}</td>
                                                @if($row->lastname=='1')
                                                    <td><span class="label label-primary">Super Active</span></td>
                                                @else
                                                    @if(is_null($row->deleted_at))
                                                        <td><span class="label label-success">Active</span></td>
                                                    @else
                                                        <td><span class="label label-danger">Banned</span></td>
                                                    @endif
                                                @endif
                                                <td class="text-center">
                                                    @if($row->lastname=='1')
                                                        <a>
                                                            <button class="btn btn-warning" disabled>
                                                                <i class="fa fa-refresh" data-toggle="tooltip"
                                                                   title="RESTORE"></i>
                                                            </button>
                                                        </a>
                                                        <a>
                                                            <button class="btn btn-danger" disabled>
                                                                <i class="fa fa-ban" data-toggle="tooltip"
                                                                   title="BANNED"></i>
                                                            </button>
                                                        </a>
                                                    @else
                                                        @if(is_null($row->deleted_at))
                                                            <a onclick="return confirm('Are you sure wanna ban {{$row->name}} ?')"
                                                               href="{{url('admin/adminlist/'.$row->id.'/banned')}}">
                                                                <button class="btn btn-danger">
                                                                    <i class="fa fa-ban" data-toggle="tooltip"
                                                                       title="BANNED"></i>
                                                                </button>
                                                            </a>
                                                            <a>
                                                                <button class="btn btn-warning" disabled>
                                                                    <i class="fa fa-refresh" data-toggle="tooltip"
                                                                       title="RESTORE"></i>
                                                                </button>
                                                            </a>
                                                        @else
                                                            <a>
                                                                <button class="btn btn-danger" disabled>
                                                                    <i class="fa fa-ban" data-toggle="tooltip"
                                                                       title="BANNED"></i>
                                                                </button>
                                                            </a>
                                                            <a onclick="return confirm('Are you sure wanna restore {{$row->name}} ?')"
                                                               href="{{url('admin/adminlist/'.$row->id.'/restore')}}"
                                                               data-toggle="tooltip" title="RESTORE">
                                                                <button class="btn btn-warning">
                                                                    <i class="fa fa-refresh" data-toggle="tooltip"
                                                                       title="RESTORE"></i>
                                                                </button>
                                                            </a>
                                                        @endif
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Job_Title</th>
                                            <th>E-mail</th>
                                            <th>created_at</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                @endif
                            </div>
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>
@endsection