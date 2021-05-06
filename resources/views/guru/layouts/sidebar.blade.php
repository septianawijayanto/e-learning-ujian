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
                        <a class="nav-link active" href="{{route('dashboard.guru')}}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <h6 class="navbar-heading p-0 text-muted">
                    <span class="docs-normal">Master Kelas</span>
                </h6>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('grup')}}">
                            <i class="ni ni-paper-diploma text-yellow"></i>
                            <span class="nav-link-text">Grup</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('materi.index')}}">
                            <i class="ni ni-single-copy-04 text-pink"></i>
                            <span class="nav-link-text">Materi</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('tugas')}}">
                            <i class="ni ni-time-alarm text-green"></i>
                            <span class="nav-link-text">Tugas</span>
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
                        <a class="nav-link active" href="{{route('ujian')}}">
                            <i class="ni ni-laptop text"></i>
                            <span class="nav-link-text">Data Ujian</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('jawaban')}}">
                            <i class="ni ni-ruler-pencil text-success"></i>
                            <span class="nav-link-text">Data Jawaban</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('nilai')}}">
                            <i class="ni ni-chart-bar-32 text-orange"></i>
                            <span class="nav-link-text">Data Nilai</span>
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