
<div class="main-sidebar sidebar-style-2">
<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
    <a href="index.html">Stisla</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
    <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
    <li class="menu-header">Dashboard</li>
    <li class=active><a class="nav-link" href="#"><i class="fas fa-fire"></i><span>Dashboard</span></a></li>
    <li class="menu-header">Starter</li>
    <li class="dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-book-open"></i> <span>Posts</span></a>
        <ul class="dropdown-menu">
        <li><a class="nav-link" href="{{ route('posts.index') }}">List Post</a></li>
        <li><a class="nav-link" href="{{ route('posts.trash') }}">Trash</a></li>
        </ul>
    </li>
    <li><a class="nav-link" href="{{ route('category.index') }}"><i class="fas fa-list-ul"></i> <span>Categories</span></a></li>
    <li><a class="nav-link" href="{{ route('tags.index') }}"><i class="fas fa-tags"></i> <span>Tags</span></a></li>
    <li><a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-user"></i> <span>Users</span></a></li>

    </aside>
</div>