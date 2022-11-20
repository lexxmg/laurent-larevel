<header class="header">
  <div class="header__nav-container">
    <nav class="header__nav header-nav">
      <ul class="header-nav__list header-nav-list">
        <li class="header-nav-list__item">
          <a href="#" class="header-nav-list__link">Главная</a>
        </li>

        <li class="header-nav-list__item">
          <a href="#" class="header-nav-list__link">Настройки</a>
        </li>
      </ul>
    </nav>
  </div>

  @auth
    <div class="header__btn-container header-btn-container">
      <span class="header-btn-container__text">atth-user</span>

      <a href="#" class="header__btn">Выйти</a>
    </div>
  @endauth
  
  @guest
    <div class="header__btn-container">
      <a href="#" class="header__btn">Войти</a>
    </div>
  @endguest
</header>