@extends('layouts.menu')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah User</h1>
    
    </div>
    <div class="col-lg-7">
        <form method="post" action="/tambahuser" class="mb-5">
          @csrf
        <div class="mb-4">
          <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" autofocus required value="{{ old ('username') }}">
                
                @error ('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
        </div>
        <div class="mb-4">
          <input type="password" name="password" class="form-control" id="password" required placeholder="Password" required value="{{ old ('username') }}">
          
        </div>
        <div class="mb-4">
          <select class="form-control" name="role" id="role" required>
            <option value="" disabled selected>Pilih role</option>
            <option value="admin">admin</option>
            <option value="regular">regular</option>
          </select>
          </div>
        
        <button type="submit" class="btn btn-info">Submit</button>
      </form>
    </div>
@endsection
