<header class="navbar navbar-dark sticky-top bg-danger flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="/beranda">SI Gereja KGPM</a>
    
   
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
         <form action="/logout" method="post">
             @csrf
             <button type="submit" class="nav-link px-3 border-0"><i class="bi bi-box-arrow-left"></i>
                 Log Out</a></button>
         </form>
      </div>
    </div>
  </header>