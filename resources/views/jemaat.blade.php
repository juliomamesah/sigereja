@extends('layouts.menu')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Jemaat</h1>
    
    </div>
  </div>  
  

  @if (session()->has ('success'))
  <div class="alert alert-success container-fluid col-8" role="alert" >
    {{ session('success') }}
  </div>
      
  @endif


  <div class="table-responsive container-fluid col-8 ">
    @can('admin')
    <a href="/createjemaat" class="btn btn-info mb-3 text-white">Tambah Data Jemaat</a>
    @endcan
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Tanggal Lahir</th>
          <th scope="col">Gender</th>
          <th scope="col">Komisi</th>
          <th scope="col">Kepel</th>
          @can('admin')
          <th scope="col">Action</th>
          @endcan

        </tr>
      </thead>
      <tbody>
        @foreach ($jemaats as $jemaat)
            <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $jemaat->Name}}</td>
          <td>{{ \Carbon\Carbon::parse($jemaat->birthDate)->isoFormat('DD-MM-YYYY')}}</td>
          <td>{{ $jemaat->gender}}</td>
          <td>{{ $jemaat->komisi}}</td>
          <td>{{ $jemaat->kepel_id}}</td>
          @can('admin')
          <td>
            <a href="/jemaat/{{ $jemaat ['id'] }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
            <form action="/jemaat/{{ $jemaat ['id'] }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('Apakah data akan dihapus?')"><span data-feather="x-circle"></span></button>
            </form>
          </td>
          @endcan
        </tr>
        @endforeach
        
        
      </tbody>
    </table>
  </div>

  <div class="d-flex justify-content-end col-10">
    {{ $jemaats->links() }}
  </div>
@endsection