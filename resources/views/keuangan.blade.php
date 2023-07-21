@inject('carbon', 'Carbon\Carbon')
@extends('layouts.menu')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Keuangan</h1>
    </div>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success container-fluid col-8" role="alert">
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
                        <td>{{ $keuangan['index'] }}</td>
                        <td>{{ $keuangan['description'] }}</td>
                        <td>{{ $keuangan['tanggal'] }}</td>
                        <td>Rp. {{ number_format($keuangan['value']) }}</td>
                        <td>Rp. {{ number_format($keuangan['saldo']) }}</td>
                        <td>{{ Str::ucfirst($keuangan['type']) }}</td>
                        @can('admin')
                            <td>
                                <a href="/keuangan/{{ $keuangan['id'] }}/edit" class="badge bg-warning"><span
                                        data-feather="edit"></span></a>
                                <form action="/keuangan/{{ $keuangan['id'] }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0"
                                        onclick="return confirm('Apakah data akan dihapus?')"><span
                                            data-feather="x-circle"></span></button>
                                </form>
                            </td>
                        @endcan
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex w-100 justify-content-end">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" style="@if ($currentPage == 1) background-color: #eaecf0; @endif"
                            href="@if ($currentPage == 1) "#" @else {{ $keuangans->path() }}?page={{ $currentPage - 1 }} @endif">&lsaquo;</a>
                    </li>
                    @for ($i = 0; $i < $totalPage; $i++)
                        <li class="page-item"><a
                                class="page-link  @if (intval($currentPage) === intval($i + 1)) bg-primary text-white @endif"
                                href="{{ $keuangans->path() }}?page={{ $i + 1 }}">{{ $i + 1 }}</a>
                        </li>
                    @endfor
                    <li class="page-item"><a class="page-link" style="@if ($currentPage == $totalPage) background-color: #eaecf0; @endif"
                            href="@if ($currentPage == $totalPage) "#" @else {{ $keuangans->path() }}?page={{ $currentPage + 1 }} @endif">&rsaquo;</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
