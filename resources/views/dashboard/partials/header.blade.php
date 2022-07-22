<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
		
			
    <div class="m-header">
        <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
        <a href="#!" class="b-brand">
            <!-- ========   change your logo hear   ============ -->
            <img src="assets/images/logo.png" alt="" class="logo">
            <img src="assets/images/logo-icon.png" alt="" class="logo-thumb">
        </a>
        <a href="#!" class="mob-toggler">
            <i class="feather icon-more-vertical"></i>
        </a>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="#!" class="pop-search"><i class="feather icon-search"></i></a>
                <div class="search-bar">
                    <input type="text" class="form-control border-0 shadow-none" placeholder="Search hear">
                    <button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li>
                <div class="dropdown">
                    <div class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="icon feather icon-bell"></i><span class="badge badge-danger bg-sm">{{ auth()->user()->unreadnotifications->count() }}</span></div>
                    <div class="dropdown-menu dropdown-menu-right notification">
                        <div class="noti-head">
                            <h6 class="d-inline-block m-b-0">Notifications</h6>
                        </div>
                        <ul class="noti-body">
                            <li class="n-title">
                                <p class="m-b-0">NEW</p>
                            </li>
                            @foreach (auth()->user()->unreadNotifications as $notification)
                            <a href="/dashboard/users/register/{{ $notification->id }}">
                            <li class="notification">
                                <div class="media">
                                    
                                    <img class="img-radius" src="{{asset('storage/' . $notification->image_foto)}}">
                                    <div class="media-body">
                                        <p><strong>{{ $notification->data['name'] }}</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>{{ $notification->created_at }}</span></p>
                                        {{-- <p>New User Register</p> --}}
                                    </div>
                                </div>
                            </li>
                            </a>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </li>
            {{-- EMAIL --}}
            <li>
                <div class="dropdown">
                    <div class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="icon feather icon-mail"></i><span class="badge badge-danger bg-sm">{{ $contacts->count() }}</span></div>
                    <div class="dropdown-menu dropdown-menu-right notification">
                        <div class="noti-head">
                            <h6 class="d-inline-block m-b-0">Email Messages</h6>
                        </div>
                        <ul class="noti-body">
                            <li class="n-title">
                                <p class="m-b-0">NEW</p>
                            </li>
                            @foreach ($contacts as $notification)
                            <li class="notification">
                                <div class="media">
                                    <img class="img-radius" src="{{asset('storage/' . $notification->image_foto)}}">
                                    <div class="media-body">
                                        <p><strong>{{ $notification->name }}</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>{{ $notification->created_at }}</span></p>
                                        <form action="/dashboard/contact-us/status/{{ $notification->id }}" method="POST"
                                            class="d-inline" enctype="multipart/form-data">
                                            @method('put')
                                            @csrf
                                            <input type="hidden" value="1" name="status">
                                            <button type="submit"
                                                class="badge bg-dark border-0 text-white" style="float: right">Mark as read</button>
                                        </form>
                                    </div>
                                </div>
                            </li>
                            </a>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </li>
            <li>
                <div class="dropdown drp-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="feather icon-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">
                            <img src="{{asset('storage/'. auth()->user()->image )}}" class="img-radius" width="50px" height="40px">
                            <span>{{ auth()->user()->name }}</span>
                            <form action="/logout" method="POST">
                                @csrf
                                <a class="dud-logout" title="Logout">
                                  <button class="align-middle bg-transparent border-0 text-secondary" type="submit" ><i class="feather icon-log-out" style="color: white"></i></button>
                                </a>
                              </form>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    

</header>