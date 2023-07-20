@extends('layouts.menu')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Data Keuangan</h1>
    
    </div>
    <div class="col-lg-7">
        <form method="post" action="createkeuangan" class="mb-5">
          @csrf
        <div class="mb-3">
          <label for="description" class="form-label">Deskirpsi</label>
          <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" required autofocus value="{{ old('description') }}">
          @error('description')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="value" class="form-label">Jumlah</label>
          <input type="text" class="form-control @error('value') is-invalid @enderror" id="value" name="value" required value="{{ old('value') }}">
          @error('value')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="type" class="form-label">Tipe</label>
          <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type" required value="{{ old('type') }}">
          @error('type')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>
        
        <button type="submit" class="btn btn-info">Submit</button>
      </form>
    </div>
@endsection
