@extends('adminlte::page')

@section('title', 'User Manage')

@section('content_header')
    <h1>Danh sach User</h1>
@stop

@section('content')
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th style="width: 10px">#</th>
            <th>Username</th>
            <th style="width: 40px">Trang Thai</th>
            <th style="width: 40px"></th>
          </tr>
        </thead>
        <tbody>
            @foreach( $users as $user)
          <tr>
            <td>1.</td>
            <td>{{ $user->username }}</td>
            <td>
                @if($user->blocked)
                    <span class="badge bg-danger">Da Khoa</span>
                @else
                    <span class="badge bg-success">Dang Hoat Dong</span>
                @endif
            </td>
            <td>
                {{-- Nếu không bị khóa --}}
                @if(!$user->blocked)
                    {{-- Khóa tài khoản --}}
                    <form action="{{ route('admin.blockUser', ['user'=> $user]) }}" method="POST">
                        @csrf
                        <button class="btn btn-default btn-sm">Block</button>
                    </form>
                @else
                    <form action="{{ route('admin.unblockUser', ['user'=> $user]) }}" method="POST">
                        @csrf
                        <button class="btn btn-default btn-sm">UnBlock</button>
                    </form>
                @endif
            </td>
          </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
      <ul class="pagination pagination-sm m-0 float-right">
        <li class="page-item"><a class="page-link" href="#">«</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">»</a></li>
      </ul>
    </div>
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
