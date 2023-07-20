@extends('layouts.outer')

@section('container')



<div class="row justify-content-center">
    <div class="col-md-4">

        @if(session( )->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

            </button>

        </div>
        @endif


        @if(session( )->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

            </button>

        </div>
        @endif

        <main class="form-signin w-100 m-auto">
            <form action="/login" method="post">
              @csrf
              <h1 class="h3 mb-3 fw-normal">Masukkan Username & Password</h1>
          
              <div class="form-floating">
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username">
                <label for="username" autofocus required value="{{ old ('username') }}">Username</label>
                @error ('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="password" name="password" class="form-control" id="password" required placeholder="Password">
                <label for="password" required>Password</label>
              </div>
          
              <div class="checkbox mb-3">
                
              </div>
              <button class="w-100 btn btn-lg btn-primary" type="submit">Log In</button>
              <footer>
                <p class="mt-5 mb-3 text-body-secondary">&copy;KGPM EBEN HAEZER BAHU 2023</p>
              </footer>
              
            </form>
          </main>
</div>
</div>





@endsection
        
    
