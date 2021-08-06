<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" href="javascript:void(0)" onclick="$('#logout_form').submit()">
                Logout
            </a>

            <form action="{{ route('admin.logout') }}" method="post" id="logout_form">@csrf</form>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
