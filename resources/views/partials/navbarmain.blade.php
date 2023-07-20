<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container-fluid">
        <a class="navbar-brand" href="/beranda">SI GEREJA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link {{ ($title === "Beranda") ? 'active' : '' }}" href="/beranda">Beranda</a>
            </li>
            <li class="nav-item">
            <a class="nav-link {{ ($title === "Jemaat") ? 'active' : '' }}" href="/jemaat">Jemaat</a>
            </li>
            <li class="nav-item">
            <a class="nav-link {{ ($title === "Keuangan") ? 'active' : '' }}" href="/keuangan">Keuangan</a>
            </li>
            
        </ul>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Selamat Datang, {{ auth()->user()->username }}
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/beranda"><i class="bi bi-layout-text-window-reverse"></i>
                    Beranda</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-left"></i>
                            Log Out</a></button>
                    </form>
                    </li>
                </ul>
              </li>
            <li>
            
            
            </li>
        </ul>
        </div>
    </div>
    </nav>