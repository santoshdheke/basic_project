<li class="nav-item">
    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::is('admin/dashboard')?'active':'' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i> Dashboard
    </a>
</li>

<li class="nav-item {{ Request::is('admin/blog*')?'menu-open':'' }}">
    <a href="#" class="nav-link {{ Request::is('admin/blog*')?'active':'' }}">
        <i class="nav-icon fas fa-book"></i>
        <p>
            Blog
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.blog-category.index') }}" class="nav-link {{ Request::is('admin/blog-category')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Category</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.blog.create') }}" class="nav-link {{ Request::is('admin/blog/create')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Add</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.blog.index') }}" class="nav-link {{ Request::is('admin/blog')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>List</p>
            </a>
        </li>
    </ul>
</li>
