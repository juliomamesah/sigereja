@inject('carbon', 'Carbon\Carbon')
@extends('layouts.menu')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Keuangan</h1>
    
    </div>
  </div>  

  @if (session()->has ('success'))
  <div class="alert alert-success container-fluid col-8" role="alert" >
    {{ session('success') }}
  </div>
      
  @endif
  


  <div class="table-responsive container-fluid col-8 ">
    @can('admin')
    <a href="/createkeuangan" class="btn btn-info mb-3">Tambah Data Keuangan</a>
    @endcan
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Deskripsi</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Jumlah</th>
          <th scope="col">Saldo</th>
          <th scope="col">Tipe</th>
          @can('admin')
          <th scope="col">Action</th>
          @endcan

        </tr>
      </thead>
      <tbody>
        @foreach ($keuangans as $keuangan)
            <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $keuangan['description']}}</td>
          <td>{{ $keuangan['tanggal'] }}</td>
          <td>Rp. {{ number_format($keuangan['value']) }}</td>
          <td>Rp. {{ number_format($keuangan['saldo']) }}</td>
          <td>{{ Str::ucfirst($keuangan['type']) }}</td>
          @can('admin')
          <td>
            <a href="/keuangan/{{ $keuangan ['id'] }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
            <form action="/keuangan/{{ $keuangan ['id'] }}" method="post" class="d-inline">
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

 

@endsection