@extends('Admin.Menu.admin')
@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>User</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Beranda</a></li>
                            <li class="active">User</li>
                        </ol>
                    </div>
                </div>
            </div>
</div>
@endsection
@section('content')
<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                        @include('Admin.alert')
                            <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_user"><i class="fa fa-plus fa-sm"></i> Tambah User</button>
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered table-sm" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No. Induk</th>
                                            <th>Nama</th>
                                            <th>Role</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($user as $user)
                                            <tr>
                                                <td>{{ $user['no_induk'] }}</td>
                                                <td>{{ $user['username'] }}</td>
                                                <td>{{ $user['role'] }}</td>
                                                <td>
                                                    @if($user->role == 'Admin')

                                                    @else
                                                <form action="/delete/{{ $user->id }}" class="d-inline" method="post" onsubmit="return confirm('apakah anda ingin menghapusnya ?')">
                                                        @method('delete')
                                                        @csrf
                                                        @can('delete', $user)
                                                        <button class="btn btn-danger btn-sm">
                                                            Hapus
                                                        </button>
                                                        @endcan
                                                    </form>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
            
        @include("Admin.User.create-user")
        </div>
@endsection