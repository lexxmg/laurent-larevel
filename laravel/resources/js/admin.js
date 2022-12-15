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

if ( document.querySelector('.register-link-js') ) {
  const container = document.querySelector('.register-link-js');
        

  container.addEventListener('click', event => {
    const target =  event.target;
  
    if (!target.closest('.register-link__inner')) return false;

    const parent = target.closest('.register-link__inner');
    const checkBox = parent.querySelector('.register-link__input');
    
    if (checkBox.checked) {
      checkBox.checked = false;
      //parent.classList.remove('register-link__inner--active');
    } else {
      checkBox.checked = true;
      //parent.classList.add('register-link__inner--active');
    }
  });
}