'use strict';

require('./buttons');
//require('./form');

if ( document.querySelector('.header-js') ) {
  const header = document.querySelector('.header-js'),
        nav = document.querySelector('.header__nav-container-js'),
        body = document.querySelector('body'),
        btnMenu = document.querySelector('.header__btn-js'),
        btnCloseMenu = document.querySelector('.header-nav-container__btn');
  
  btnMenu.addEventListener('click' ,function(event) {
    if (btnMenu.ariaExpanded === 'true') {
      this.ariaExpanded = 'false';
      hiddenMenu();
    } else {
      this.ariaExpanded = 'true';
      showMenu();
    }
  });
  
  btnCloseMenu.addEventListener('click' ,function(event) {
    btnMenu.ariaExpanded = 'false';
    hiddenMenu();
  });
  
  
  function showMenu() {
    nav.classList.add('show--menu');
    body.classList.add('body--margim');
  }

  function hiddenMenu() {
    nav.classList.remove('show--menu');
    body.classList.remove('body--margim');
  }
}

if (document.querySelector('.icon-container-js')) {
  const icons = document.querySelector('.icon-container-js');

  icons.addEventListener('click', async function(event) {
    const target = event.target;
    const icon = target.className;

    if (target.tagName === 'I') {
      const res = await fetch('/add-icon?icon=' + icon);
      const data = await res.json();

    //this.classList.add('icon-container--hidden');
      console.log(data);
    }
  });
}
