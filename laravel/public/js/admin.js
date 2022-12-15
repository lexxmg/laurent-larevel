/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/buttons.js":
/*!*********************************!*\
  !*** ./resources/js/buttons.js ***!
  \*********************************/
/***/ (() => {



if (document.querySelector('.main-home__button-container-js')) {
  var addClass = function addClass(stat, item) {
    var rev = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : '0';
    var statI = +stat;
    var revI = +rev;
    if (revI) {
      if (!statI) {
        item.classList.add('button-container__btn--active');
      } else {
        item.classList.remove('button-container__btn--active');
      }
    } else {
      if (statI) {
        item.classList.add('button-container__btn--active');
      } else {
        item.classList.remove('button-container__btn--active');
      }
    }
  };
  var getStatus = function getStatus() {
    return fetch('/all-status').then(function (res) {
      return res.json();
    }).then(function (data) {
      allBtn.forEach(function (item, i) {
        if (item.disabled) return;
        if (item.dataset.type === 'out') {
          var outStatArr = data[item.dataset.laurentId].stat.out_table0.split('');
          addClass(outStatArr[item.dataset.stat - 1], item, item.dataset.revers);
        }
        if (item.dataset.type === 'relle') {
          var _outStatArr = data[item.dataset.laurentId].stat.rele_table0.split('');
          addClass(_outStatArr[item.dataset.stat - 1], item, item.dataset.revers);
        }
        if (item.dataset.type === 'virt') {
          var _outStatArr2 = data[item.dataset.laurentId].stat.in_table0.split('');
          addClass(_outStatArr2[item.dataset.stat - 1], item, item.dataset.revers);
        }
        if (item.dataset.type === 'temp') {
          var temp = data[item.dataset.laurentId].stat.temper0;
          var width = item.offsetWidth;
          if (width < 200) {
            temp = Math.round(temp);
          }
          item.textContent = temp;
        }
        if (item.dataset.type === 'abc1') {
          var abc = data[item.dataset.laurentId].stat.adc0;
          var _width = item.offsetWidth;
          if (_width < 200) {
            abc = Math.round(abc);
          }
          item.textContent = abc;
        }
        if (item.dataset.type === 'abc2') {
          var _abc = data[item.dataset.laurentId].stat.adc1;
          var _width2 = item.offsetWidth;
          if (_width2 < 200) {
            _abc = Math.round(_abc);
          }
          item.textContent = _abc;
        }
      });
      return data;
    });
  };
  var container = document.querySelector('.main-home__button-container-js'),
    header = document.querySelector('.header-js'),
    allBtn = document.querySelectorAll('.button-container__btn-js');
  if ('scrollRestoration' in window.history) {
    window.history.scrollRestoration = 'manual';
  }
  if (window.innerWidth <= 768 && !document.querySelector('.header-admin-js')) {
    window.scrollTo(0, header.clientHeight);
  }
  getStatus().then(function (data) {
    return console.log(data);
  });
  container.addEventListener('click', function (event) {
    var id = event.target.id;
    if (event.target.dataset.mode === '') {
      return false;
    }
    ;
    if (id) {
      event.target.disabled = true;
      if (event.target.dataset.mode === 'timer') {
        event.target.classList.add('button-container__btn--active');
      }
      fetch("/out?id=".concat(id)).then(function (res) {
        return res.json();
      }).then(function (data) {
        if (data.stat) {
          if (+event.target.dataset.revers) {
            event.target.classList.remove('button-container__btn--active');
          } else {
            event.target.classList.add('button-container__btn--active');
          }
          event.target.disabled = false;
        } else {
          if (+event.target.dataset.revers) {
            event.target.classList.add('button-container__btn--active');
          } else {
            event.target.classList.remove('button-container__btn--active');
          }
          event.target.disabled = false;
        }
      });
    }
  });
  setInterval(getStatus, 1000);
}

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!*******************************!*\
  !*** ./resources/js/admin.js ***!
  \*******************************/


__webpack_require__(/*! ./buttons */ "./resources/js/buttons.js");
if (document.querySelector('.header__btn-menu-container')) {
  var showMenu = function showMenu() {
    main.classList.add('main--show');
  };
  var hiddenMenu = function hiddenMenu() {
    main.classList.remove('main--show');
  };
  var nav = document.querySelector('.main__nav-container'),
    btnMenu = document.querySelector('.header__btn-js'),
    main = document.querySelector('.main');
  btnMenu.addEventListener('click', function (event) {
    if (btnMenu.ariaExpanded === 'true') {
      this.ariaExpanded = 'false';
      hiddenMenu();
    } else {
      this.ariaExpanded = 'true';
      showMenu();
    }
  });
}
if (document.querySelector('.register-link-js')) {
  var container = document.querySelector('.register-link-js');
  container.addEventListener('click', function (event) {
    var target = event.target;
    if (!target.closest('.register-link__inner')) return false;
    var parent = target.closest('.register-link__inner');
    var checkBox = parent.querySelector('.register-link__input');
    if (checkBox.checked) {
      checkBox.checked = false;
      //parent.classList.remove('register-link__inner--active');
    } else {
      checkBox.checked = true;
      //parent.classList.add('register-link__inner--active');
    }
  });
}
})();

/******/ })()
;