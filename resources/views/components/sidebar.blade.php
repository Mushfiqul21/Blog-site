<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <a href="{{ url('dashboard-general-dashboard') }}" class="nav-link has-dropdown"><i class="fas fa-fire"></i>
                <span>Dashboard</span></a>
            </li>
            <li class="menu-header">Starter</li>
            <li class="{{ Request::is('layout-default-layout') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('blog.create') }}">Add Blogs</a>
            </li>
            <li class="{{ Request::is('blog-list') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('blog.list') }}">Blog List</a>
            </li>
            <li class="{{ Request::is('category.create') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('category.create') }}">Add Category</a>
            </li>
            <li class="{{ Request::is('category-list') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('category.list') }}">Category List</a>
            </li>
        </ul>

        <div class="hide-sidebar-mini mt-4 mb-4 p-3">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div>
    </aside>
</div>
