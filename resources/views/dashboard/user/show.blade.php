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
        <div class="card">
            <div class="row g-0">
                <div class="col-md-8">
                    <div class="card-body">
                      <div class="card-body table-border-style">
                        <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th scope="row" style="text-align: left;">No KTP</th>
                                    <td>:</td>
                                    <td style="text-align: justify !important">{{ $user->no_ktp }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align: left">Nama</th>
                                    <td>:</td>
                                    <td style="text-align: justify !important">{{ $user->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align: left">Username</th>
                                    <td>:</td>
                                    <td style="text-align: justify !important">{{ $user->username }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align: left">Tempat Lahir</th>
                                    <td>:</td>
                                    <td style="text-align: justify !important">{{ $user->tempat_lahir}}</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align: left">Tanggal Lahir</th>
                                    <td>:</td>
                                    <td style="text-align: justify !important">{{ $user->tgl_lahir }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align: left">No Telepon</th>
                                    <td>:</td>
                                    <td style="text-align: justify !important">{{ $user->no_tlpn }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align: left">Alamat</th>
                                    <td>:</td>
                                    <td style="text-align: justify !important">{{ $user->alamat }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="py-3">
                            <a href="/dashboard/users" class="btn btn-info"><i class="feather icon-arrow-left" style="color: white"></i>Back</a>
                            <a href="/dashboard/users/{{ $user->slug }}/edit" class="btn btn-warning"><i class="feather icon-edit" style="color: white"></i></i>Edit</a>
                            <form action="/dashboard/users/{{ $user->slug }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="feather icon-trash" style="color: white"></i>Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                </div>
            <!-- [ Hover-table ] end -->
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
@endsection
