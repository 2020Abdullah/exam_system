<!-- BEGIN: Header-->
<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
<div class="navbar-container d-flex align-items-center content">
    <ul class="nav navbar-nav">
        <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a></li>
    </ul>
    <ul class="nav navbar-nav align-items-center ms-auto">
        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a></li>

        <li class="nav-item dropdown dropdown-user">
            <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="user-nav d-sm-flex d-none">
                    <span class="user-name fw-bolder">{{ auth('student')->user()->name }}</span>
                    <span class="user-status">طالب</span>
                </div>
                <span class="avatar">
                    @if (auth('student')->user()->profile_img == null)
                        <img class="round" src="{{ asset('assets/images/user.png') }}" alt="avatar" height="40" width="40">                        
                    @else 
                        <img class="round" src="{{ asset(auth('student')->user()->profile_img) }}" alt="avatar" height="40" width="40">                        
                    @endif
                    <span class="avatar-status-online"></span>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                    <i class="me-50" data-feather="settings"></i>
                    الملف الشخصي
                </a>

                <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="me-50" data-feather="power"></i> 
                    تسجيل الخروج
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </li>
    </ul>
</div>
</nav>
<ul class="main-search-list-defaultlist-other-list d-none">
<li class="auto-suggestion justify-content-between"><a class="d-flex align-items-center justify-content-between w-100 py-50">
        <div class="d-flex justify-content-start"><span class="me-75" data-feather="alert-circle"></span><span>No results found.</span></div>
    </a></li>
</ul>
<!-- END: Header-->    