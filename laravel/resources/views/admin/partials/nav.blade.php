<nav class="nav" id="menu">
  <ul class="nav__list nav-list">
    <li class="nav-list__item {{ request()->routeIs('admin.home') ? 'nav-list__item--active' : '' }}">
      <a href="{{ route('admin.home') }}" class="nav-list__link">Главная</a>
    </li>

    <li class="nav-list__item {{ request()->routeIs('admin.token.create') ? 'nav-list__item--active' : '' }}">
      <a href="{{ route('admin.token.create') }}" class="nav-list__link">Новый пользователь</a>
    </li>

    <li class="nav-list__item {{ request()->routeIs('admin.token.index') ? 'nav-list__item--active' : '' }}">
      <a href="{{ route('admin.token.index') }}" class="nav-list__link">Токены</a>
    </li>
  </ul>
</nav>