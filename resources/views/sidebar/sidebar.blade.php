<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main Menu</span>
                </li>
                @if(auth()->check() && auth()->user()->role_name === 'admin')

                <li class="submenu {{set_active(['list/users'])}} {{ (request()->is('view/user/edit/*')) ? 'active' : '' }}">
                    <a href="#"><i class="fas fa-shield-alt"></i>
                        <span>List Akun Private</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('list/users') }}" class="{{set_active(['list/users'])}} {{ (request()->is('view/user/edit/*')) ? 'active' : '' }}">List Users</a></li>
                    </ul>
                </li>


                <li class="submenu {{set_active(['student/list','student/grid','student/add/page'])}} {{ (request()->is('student/edit/*')) ? 'active' : '' }} {{ (request()->is('student/profile/*')) ? 'active' : '' }}">
                    <a href="#"><i class="fas fa-graduation-cap"></i>
                        <span> Admin Poliban </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('student/add/page') }}" class="{{set_active(['student/add/page'])}}">Slot Semester</a></li>
                        <li><a href="{{ route('student/delete') }}" class="{{set_active(['student/delete'])}}">Daftar RPS</a></li>
                        <li><a href="{{ route('student/reporting/page') }}" class="{{ set_active(['student/reporting/page']) }}">Reporting</a></li>
                        <li><a href="{{ route('student/monitoring/page') }}" class="{{ set_active(['student/monitoring/page']) }}">Monitoring</a></li>
                    </ul>
                </li>
                @endif
                @if(auth()->check() && auth()->user()->role_name === 'pengajar')
                <li class="submenu  {{set_active(['teacher/add/page','teacher/list/page','teacher/edit'])}} {{ (request()->is('teacher/edit/*')) ? 'active' : '' }}">
                    <a href="#"><i class="fas fa-chalkboard-teacher"></i>
                        <span> Dosen/Pengajar</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('teacher/list/page') }}" class="{{set_active(['teacher/list/page'])}}">Dashboard Pengajar</a></li>

                        <li><a href="{{ route('teacher/add/page') }}" class="{{set_active(['teacher/add/page'])}}">Filtering program studi</a></li>
                        <li><a href="{{ route('teacher-pesan') }}" class="{{ set_active(['teacher-pesan']) }}">Pesan Kaprodi</a></li>

                    </ul>
                </li>
                @endif
                @if(auth()->check() && auth()->user()->role_name === 'kajur')
                <li class="submenu {{set_active(['department/add/page','department/edit/page'])}}">
                    <a href="#"><i class="fas fa-building"></i>
                        <span>Kajur</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('department/add/page') }}" class="{{set_active(['department/add/page'])}}">Reporting</a></li>
                        <li><a href="{{ route('department/edit/page') }}" class="{{set_active(['department/edit/page'])}}">Monitoring</a></li>
                    </ul>
                </li>
                @endif
                @if(auth()->check() && auth()->user()->role_name === 'kaprodi')
                <li class="submenu {{set_active(['kaprodi/add/page','kaprodi/edit/page','kaprodi/dashboard/page'])}}">
                    <a href="#"><i class="fas fa-building"></i>
                        <span>Kaprodi</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('kaprodi/dashboard/page') }}" class="{{set_active(['kaprodi/dashboard/page'])}}">Dashboard kaprodi</a></li>
                        <li><a href="{{ route('kaprodi/add/page') }}" class="{{set_active(['kaprodi/add/page'])}}">Penyetujuan RPS</a></li>
                        <li><a href="{{ route('kaprodi/edit/page') }}" class="{{set_active(['kaprodi/edit/page'])}}">Menampilkan RPS</a></li>
                    </ul>
                </li>
                @endif
        </div>
    </div>
</div>