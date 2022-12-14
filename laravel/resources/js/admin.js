'use strict';

require('./buttons');

if ( document.querySelector('.header__btn-menu-container') ) {
  const nav = document.querySelector('.main__nav-container'),
        btnMenu = document.querySelector('.header__btn-js'),
        main = document.querySelector('.main');
  
  btnMenu.addEventListener('click' ,function(event) {
    if (btnMenu.ariaExpanded === 'true') {
      this.ariaExpanded = 'false';
      hiddenMenu();
    } else {
      this.ariaExpanded = 'true';
      showMenu();
    }
  });
  
  
  function showMenu() {
    main.classList.add('main--show');
  }

  function hiddenMenu() {
    main.classList.remove('main--show');
  }
}