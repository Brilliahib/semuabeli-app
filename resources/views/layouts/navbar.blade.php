<nav class="navbar navbar-expand-lg sticky-lg-top">
    <div class="container">
        <a class="navbar-brand d-flex gap-3 h-full align-items-center" href="/">
            <img src="{{ asset('img/logo.png') }}" alt="" height="50px">
        </a>
        <button class="navbar-toggler border-0 m-0 p-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <!-- Ganti dengan SVG icon -->
            <div class="p-2 rounded-4" style="background-color: #e5e9f2;">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#000"
                    class="bi bi-list fw-extrabold" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                </svg>
            </div>
            <!-- /Ganti dengan SVG icon -->
        </button>
        <div class="collapse navbar-collapse list-navbar" id="navbarNav" style="margin-left: -6rem;">
            <ul class="navbar-nav ms-auto gap-lg-4 text-darkgray">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('template') ? 'active' : '' }}" href="/template">Template</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('how-we-work') ? 'active' : '' }}" href="/how-we-work">Panduan
                        Kerja</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('blog') ? 'active' : '' }}" href="/blog">Blog</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto contact">
                @auth
                    <li class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle d-flex h-full align-items-center gap-3"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <span>Welcome, {{ auth()->user()->name }}</span>
                            <div><img src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : asset('img/default-avatar.svg') }}" alt="" width="25px" height="25px" class="avatar"></div>
                        </a>
                        <ul class="dropdown-menu mt-2 border-0" style="left: 0; right:0;">
                            <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                            <li><a class="dropdown-item" href="#">Setting</a></li>
                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <div class="navbar-contact d-flex gap-3">
                        <a href="/login" class="button-secondary fw-bold">SignIn</a>
                        <a href="/register" class="button-secondary fw-bold">SignUp</a>
                    </div>
                @endauth
            </ul>
        </div>
    </div>
</nav>

