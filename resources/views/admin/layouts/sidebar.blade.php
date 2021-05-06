<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                <img src="{{asset('gambar/')}}/logo.png" class="navbar-brand-img" alt="...">
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('dashboard')}}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <h6 class="navbar-heading p-0 text-muted">
                    <span class="docs-normal">Master Data</span>
                </h6>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('siswa')}}">
                            <i class="ni ni-single-02 text-yellow"></i>
                            <span class="nav-link-text">Data Siswa</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('guru')}}">
                            <i class="ni ni-circle-08 text-green"></i>
                            <span class="nav-link-text">Data Guru</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('mapel')}}">
                            <i class="ni ni-book-bookmark text-pink"></i>
                            <span class="nav-link-text">Data Mata Pelajaran</span>
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('kelas')}}">
                            <i class="ni ni-hat-3 text"></i>
                            <span class="nav-link-text">Data Kelas</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{url('logout')}}">
                            <i class="ni ni-user-run text-red"></i>
                            <span class="nav-link-text">Keluar</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>