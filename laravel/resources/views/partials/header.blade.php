<header class="header header-js">
  <div class="header__btn-menu-container">
    <button class="header__btn header__btn-js icon-menu"
      aria-expanded="false"
      aria-controls="menu">
    </button>
  </div>

  <div class="header__nav-container header-nav-container header__nav-container-js">
    <button class="header-nav-container__btn icon-home" 
      aria-label="закрыть меню">
    </button>

    <nav class="header__nav header-nav" id="menu">
      <ul class="header-nav__list header-nav-list">
        @auth('web')
          <li class="header-nav-list__item {{ request()->routeIs('home') ? 'header-nav-list__item--active' : '' }}">
            <a href="{{ route('home') }}" class="header-nav-list__link">Главная</a>
          </li>

          <li class="header-nav-list__item {{ request()->routeIs('admin.settings') ? 'header-nav-list__item--active' : '' }}">
            <a href="{{ route('admin.settings') }}" class="header-nav-list__link">Настройки</a>
          </li>
        @endauth

        <li class="header-nav-list__item">
          <a href="{{ route('admin.outs.index') }}" class="header-nav-list__link">Aдмин-панель</a>
        </li>
      </ul>
    </nav>
  </div>

  @auth('web')
    <div class="header__name-container header-name-container">
      <span class="header-name-container__text">{{ auth('web')->user()->name }}</span>

      <span class="header-name-container__text">{{ auth('web')->user()->device_name }}</span>
    </div>
  @endauth
  
  @guest('web')
    <span class="header__text">Нет доступа</span>
  @endguest
</header>