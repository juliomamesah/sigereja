@extends('layouts.menu')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Data Jemaat</h1>
    
    </div>
    <div class="col-lg-7">
        <form method="post" action="/jemaat/{{ $jemaat->id }}/update" class="mb-5">
          @method('put')
          @csrf
        <div class="mb-3">
          <label for="Name" class="form-label">Nama</label>
          <input type="text" class="form-control @error('Name') is-invalid @enderror" id="Name" name="Name" required autofocus value="{{ old('Name', $jemaat->Name) }}">
          @error('Name')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="birthDate" class="form-label">Tanggal Lahir</label>
          <input type="date" class="form-control @error('birthDate') is-invalid @enderror" id="birthDate" name="birthDate" required value="{{ old('birthDate', $jemaat->birthDate) }}">
          @error('birthDate')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="gender" class="form-label">Jenis Kelamin</label>
          <input type="text" class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender" required value="{{ old('gender', $jemaat->gender) }}">
          @error('gender')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="komisi" class="form-label">Komisi</label>
          <input type="text" class="form-control @error('komisi') is-invalid @enderror" id="komisi" name="komisi" required value="{{ old('komisi', $jemaat->komisi) }}">
          @error('komisi')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="kepel_id" class="form-label">Kepel</label>
          <input type="text" class="form-control @error('kepel_id') is-invalid @enderror" id="kepel_id" name="kepel_id" required value="{{ old('kepel_id', $jemaat->kepel_id) }}">
          @error('kepel_id')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>
        
        <div class="d-flex justify-content-end w-100">
          <button type="submit" class="btn btn-success text-white">Submit</button>
      </div>
      </form>
    </div>
@endsection
