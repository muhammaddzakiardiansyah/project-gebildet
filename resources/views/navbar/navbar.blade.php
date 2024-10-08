<nav class="navbar navbar-expand-lg bg-primary-hmd fixed-top">
    <div class="container">
      <h3>
        <a class="navbar-brand text-dark-hmd" href="/">Code<span class="text-secondary-hmd">authentic</span></a>
      </h3>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link fw-semibold hover-secondary-hmd {{ $active === 'home' ? 'active-secondary-hmd' : '' }}" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-semibold hover-secondary-hmd {{ $active === 'about' ? 'active-secondary-hmd' : '' }}" href="/about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-semibold hover-secondary-hmd {{ $active === 'categories' ? 'active-secondary-hmd' : '' }}" href="/categories">Categories</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Selamat Datang {{ auth()->user()->name }}
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/dashboard">My Dashboard</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <form action="/logout" method="post">
                    @csrf
                     <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>  Logout</button>
                  </form>
                  {{-- <a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right"></i>  Logout</a> --}}
                </li>
              </ul>
            </li>
          @else
            {{-- <li class="nav-item">
              <a href="/login" class="nav-link fw-semibold hover-secondary-hmd {{ $active === 'login' ? 'active-secondary-hmd' : '' }}"><i class="bi bi-box-arrow-right"></i> Login</a>
            </li> --}}
          @endauth
        </ul>
      </div>
    </div>
  </nav>