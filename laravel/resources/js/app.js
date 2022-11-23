'use strict';

require('./bootstrap');

const container = document.querySelector('.main-home__button-container-js'),
      allBtn = document.querySelectorAll('.button-container__btn-js');

container.addEventListener('click', event => {
  const id = event.target.id;
  console.log(id);

  fetch(`/out?out=${id}&param=on`)
    .then(res => res.json())
    .then(data => {
      console.log(data);
      if (data.stat) {
        event.target.classList.add('button-container__btn--active');
      } else {
        item.classList.remove('button-container__btn--active');
      }
    });
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
    });
  });
}, 1000);
