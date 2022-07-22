@extends('dashboard.layouts.main')
@section('container')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Welcome back, {{ auth()->user()->name }}</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Dashboard Analytics</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <!-- page statustic card start -->
                <div class="row">
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h4 class="text-c-yellow">{{ $katalogs->count() }}</h4>
                                        <h6 class="text-muted m-b-0">Buku</h6>
                                    </div>
                                    <div class="col-4 text-right">
                                        <i class="feather icon-book f-28"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-c-yellow">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <a href="/dashboard/sirkulasi/katalogs" class="text-white m-b-0">% change</a>
                                    </div>
                                    <div class="col-3 text-right">
                                        <i class="feather icon-trending-up text-white f-16"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h4 class="text-c-green">{{ auth()->user()->count() }}</h4>
                                        <h6 class="text-muted m-b-0">Anggota</h6>
                                    </div>
                                    <div class="col-4 text-right">
                                        <i class="feather icon-users f-28"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-c-green">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <a href="" class="text-white m-b-0">% change</a>
                                    </div>
                                    <div class="col-3 text-right">
                                        <i class="feather icon-trending-up text-white f-16"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h4 class="text-c-red">{{ $peminjamans->count() }}</h4>
                                        <h6 class="text-muted m-b-0">Peminjaman</h6>
                                    </div>
                                    <div class="col-4 text-right">
                                        <i class="feather icon-edit f-28"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-c-red">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <a href="/dashboard/peminjamans" class="text-white m-b-0">% change</a>
                                    </div>
                                    <div class="col-3 text-right">
                                        <i class="feather icon-trending-down text-white f-16"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h4 class="text-c-blue">{{ $pengembalians->count() }}</h4>
                                        <h6 class="text-muted m-b-0">Pengembalian</h6>
                                    </div>
                                    <div class="col-4 text-right">
                                        <i class="feather icon-file-text f-28"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-c-blue">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <a href="" class="text-white m-b-0">% change</a>
                                    </div>
                                    <div class="col-3 text-right">
                                        <i class="feather icon-trending-down text-white f-16"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- page statustic card end -->
                    <!-- Latest Customers start -->
                    <div class="col-lg-6 col-md-12">
                        <div class="card table-card review-card">
                            <div class="card-header borderless ">
                                <h5>New Register</h5>
                                <div class="card-header-right">
                                    <div class="btn-group card-option">
                                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="feather icon-more-horizontal"></i>
                                        </button>
                                        <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                            <li class="dropdown-item full-card"><a href="#!"><span><i
                                                            class="feather icon-maximize"></i> maximize</span><span
                                                        style="display:none"><i class="feather icon-minimize"></i>
                                                        Restore</span></a></li>
                                            <li class="dropdown-item minimize-card"><a href="#!"><span><i
                                                            class="feather icon-minus"></i> collapse</span><span
                                                        style="display:none"><i class="feather icon-plus"></i>
                                                        expand</span></a></li>
                                            <li class="dropdown-item reload-card"><a href="#!"><i
                                                        class="feather icon-refresh-cw"></i> reload</a></li>
                                            <li class="dropdown-item close-card"><a href="#!"><i
                                                        class="feather icon-trash"></i> remove</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="review-block">
                                    @foreach (auth()->user()->unreadNotifications as $notification)
                                    <div class="row">
                                        <div class="col-sm-auto p-r-0">
                                            <img src="a{{asset('storage/' . $notification->image_foto)}}"
                                                class="img-radius profile-img cust-img m-b-15">
                                        </div>
                                        <div class="col">
                                            <h6 class="m-b-15">{{ $notification->data['name'] }}<span class="float-right f-13 text-muted">{{ $notification->created_at }}</span></h6>
                                            <p class="m-t-15 m-b-15 text-muted">New User Register</p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="card table-card review-card">
                            <div class="card-header borderless ">
                                <h5>New Messages</h5>
                                <div class="card-header-right">
                                    <div class="btn-group card-option">
                                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="feather icon-more-horizontal"></i>
                                        </button>
                                        <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                            <li class="dropdown-item full-card"><a href="#!"><span><i
                                                            class="feather icon-maximize"></i> maximize</span><span
                                                        style="display:none"><i class="feather icon-minimize"></i>
                                                        Restore</span></a></li>
                                            <li class="dropdown-item minimize-card"><a href="#!"><span><i
                                                            class="feather icon-minus"></i> collapse</span><span
                                                        style="display:none"><i class="feather icon-plus"></i>
                                                        expand</span></a></li>
                                            <li class="dropdown-item reload-card"><a href="#!"><i
                                                        class="feather icon-refresh-cw"></i> reload</a></li>
                                            <li class="dropdown-item close-card"><a href="#!"><i
                                                        class="feather icon-trash"></i> remove</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="review-block">
                                    @foreach ($contacts as $notification)
                                    <div class="row">
                                        <div class="col-sm-auto p-r-0">
                                            <img src="a{{asset('storage/' . $notification->image_foto)}}"
                                                class="img-radius profile-img cust-img m-b-15">
                                        </div>
                                        <div class="col">
                                            <h6 class="m-b-15">{{ $notification->name }}<span class="float-right f-13 text-muted">{{ $notification->created_at }}</span></h6>
                                            <p class="m-t-15 m-b-15 text-muted">{{ $notification->pesan }}</p>
                                       
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
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Latest Customers end -->
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
@endsection
