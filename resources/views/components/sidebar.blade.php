<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <ul class="sidebar-menu">
            <a href="{{ url('/') }}" class="nav-link has-dropdown"><i class="fas fa-fire"></i>
                <span>Dashboard</span></a>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i><span>Blog</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('layout-default-layout') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('blog.create') }}">Add Blogs</a>
                    </li>
                    <li class="{{ Request::is('blog-list') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('blog.list') }}">Blog List</a>
                    </li>
                </ul>
            </li>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i><span>Category</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('category.create') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('category.create') }}">Add Category</a>
                    </li>
                    <li class="{{ Request::is('category-list') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('category.list') }}">Category List</a>
                    </li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
