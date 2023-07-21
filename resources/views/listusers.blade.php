@extends('layouts.menu')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data User</h1>
    
    </div>
  </div>  
  

  @if (session()->has ('success'))
  <div class="alert alert-success container-fluid col-8" role="alert" >
    {{ session('success') }}
  </div>
      
  @endif


  <div class="table-responsive container-fluid col-8 ">
    @can('admin')
    <a href="/tambahuser" class="btn btn-info mb-3 text-white">Tambah User</a>
    @endcan
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Username</th>
          <th scope="col">Role</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
            <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $user->username}}</td>
          <td>{{ $user->role}}</td>
          <td>
            <form action="/user/{{ $user['id'] }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" style="font-size: 0.8rem"
                  onclick="return confirm('Apakah user akan dihapus?')">Hapus</button>
          </form>
          </td>
        </tr>
        @endforeach
        
        
      </tbody>
    </table>
  </div>

  <div class="d-flex justify-content-end col-10">
    {{ $users->links() }}
  </div>
@endsection