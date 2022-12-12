<header class="header">
  <div class="header__nav-container">
   
  </div>

  @auth('admin')
    <div class="header__btn-container header-btn-container">
      <span class="header-btn-container__text">{{ auth('admin')->user()->name }}</span>

      <a href="{{ route('admin.logout') }}" class="header__btn">Выйти</a>
    </div>
  @endauth
  
  @guest('admin')
    <div class="header__btn-container">
      <a href="{{ route('admin.login') }}" class="header__btn">Войти</a>
    </div>
  @endguest
</header>