'use strict';

require('./bootstrap');

const container = document.querySelector('.main-home__button-container-js');

container.addEventListener('click', event => {
  const id = event.target.id;
  console.log(id);

  fetch(`http://127.0.0.1:8001/out?out=${id}&param=on`)
    .then(res => res.json())
    .then(data => {
      console.log(data);
    });
});