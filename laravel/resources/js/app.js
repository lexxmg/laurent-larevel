'use strict';

require('./bootstrap');

const container = document.querySelector('.main-home__button-container-js'),
      allBtn = document.querySelectorAll('.button-container__btn-js');

container.addEventListener('click', event => {
  const id = event.target.id;

  if (id) {
    event.target.disabled = true;

    if (event.target.dataset.mode === 'timer') {
      event.target.classList.add('button-container__btn--active');
    }

    fetch(`/out?id=${id}`)
      .then(res => res.json())
      .then(data => {
        console.log(data);
        if (data.stat) {
          event.target.classList.add('button-container__btn--active');
          event.target.disabled = false;
        } else {
          event.target.classList.remove('button-container__btn--active');
          event.target.disabled = false;
        }
      });
  }
});

setInterval(() => {
  fetch('/status').then(res => res.json()).then(data => {
    allBtn.forEach((item, i) => {
      if (item.dataset.type === 'out') {
        const outStatArr = data.out_table0.split('');

        if ( +outStatArr[item.dataset.stat - 1] ) {
          item.classList.add('button-container__btn--active');
        } else {
          item.classList.remove('button-container__btn--active');
        }
      }

      if (item.dataset.type === 'relle') {
        const outStatArr = data.rele_table0.split('');

        if ( +outStatArr[item.dataset.stat - 1] ) {
          item.classList.add('button-container__btn--active');
        } else {
          item.classList.remove('button-container__btn--active');
        }
      }
    });
  });
}, 1000);
