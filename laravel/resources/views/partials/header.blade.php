<header class="header header-js">
  <div class="header__nav-container">
    <nav class="header__nav header-nav">
      <ul class="header-nav__list header-nav-list">
        <li class="header-nav-list__item">
          <a href="{{ route('admin.outs.index') }}" class="header-nav-list__link">Aдмин-панель</a>
        </li>

        <li class="header-nav-list__item">
          <a href="#" class="header-nav-list__link">Настройки</a>
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