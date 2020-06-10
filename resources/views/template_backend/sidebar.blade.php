
<div class="main-sidebar sidebar-style-2">
<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
    <a href="/home">Blog Project</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
    <a href="/home">BP</a>
    </div>
    <ul class="sidebar-menu">
    <li class="menu-header">Dashboard</li>
    <li class="{{ (Request::segment(1) == 'home' ? ' active' : '') }}"><a class="nav-link" href="/home"><i class="fas fa-fire"></i><span>Dashboard</span></a></li>
    <li class="menu-header">Starter</li>
    <li class="dropdown{{ (Request::segment(1) == 'posts' ? ' active' : '') }}">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-book-open"></i> <span>Posts</span></a>
        <ul class="dropdown-menu">
        <li><a class="nav-link" href="{{ route('posts.index') }}">List Post</a></li>
        <li><a class="nav-link" href="{{ route('posts.trash') }}">Trash</a></li>
        </ul>
    </li>
    <li class="{{ (Request::segment(1) == 'category' ? ' active' : '') }}"><a class="nav-link" href="{{ route('category.index') }}"><i class="fas fa-list-ul"></i> <span>Categories</span></a></li>
    <li class="{{ (Request::segment(1) == 'tags' ? ' active' : '') }}"><a class="nav-link" href="{{ route('tags.index') }}"><i class="fas fa-tags"></i> <span>Tags</span></a></li>
    @if(Auth::user()->type == 1)
    <li class="{{ (Request::segment(1) == 'users' ? ' active' : '') }}"><a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-user"></i> <span>Users</span></a></li>
    @endif
    <li class="{{ (Request::segment(1) == 'about' ? ' active' : '') }}"><a class="nav-link" href="{{ route('about.index') }}"><i class="fas fa-book"></i> <span>About</span></a></li>

    </aside>
</div>