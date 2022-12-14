'use strict';

if ( document.querySelector('.main-home__button-container-js') ) {

  const container = document.querySelector('.main-home__button-container-js'),
        header = document.querySelector('.header-js'),
        allBtn = document.querySelectorAll('.button-container__btn-js');
        
  if ('scrollRestoration' in window.history) {
    window.history.scrollRestoration = 'manual';
  }

  if (window.innerWidth <= 768 && !document.querySelector('.header-admin-js')) {
    window.scrollTo(0, header.clientHeight);  
  }

  getStatus().then(data => console.log(data));      

  container.addEventListener('click', event => {
    const id = event.target.id;

    if (event.target.dataset.mode === '') {
      return false;
    };

    if (id) {
      event.target.disabled = true;

      if (event.target.dataset.mode === 'timer') {
        event.target.classList.add('button-container__btn--active');
      }

      fetch(`/out?id=${id}`)
        .then(res => res.json())
        .then(data => {
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

  function addClass(stat, item, rev = '0') {
    const statI = +stat;
    const revI = +rev;

    if (revI) {
      if ( !statI ) {
        item.classList.add('button-container__btn--active');
      } else {
        item.classList.remove('button-container__btn--active');
      }
    } else {
      if ( statI ) {
        item.classList.add('button-container__btn--active');
      } else {
        item.classList.remove('button-container__btn--active');
      }
    }
  }

  function getStatus() {
    return fetch('/all-status').then(res => res.json()).then(data => {
      allBtn.forEach((item, i) => {
        if (item.disabled) return;

        if (item.dataset.type === 'out') {
          const outStatArr = data[item.dataset.laurentId].stat.out_table0.split('');

          addClass(outStatArr[item.dataset.stat - 1], item, item.dataset.revers);
        }

        if (item.dataset.type === 'relle') {
          const outStatArr = data[item.dataset.laurentId].stat.rele_table0.split('');

          addClass(outStatArr[item.dataset.stat - 1], item, item.dataset.revers);
        }

        if (item.dataset.type === 'virt') {
          const outStatArr = data[item.dataset.laurentId].stat.in_table0.split('');
        
          addClass(outStatArr[item.dataset.stat - 1], item, item.dataset.revers);
        }

        if (item.dataset.type === 'temp') {
          let temp = data[item.dataset.laurentId].stat.temper0;
          const width = item.offsetWidth;
        
          if (width < 200) {
            temp = Math.round(temp);
          }

          item.textContent = temp;
        }

        if (item.dataset.type === 'abc1') {
          let abc = data[item.dataset.laurentId].stat.adc0;
          const width = item.offsetWidth;
      
          if (width < 200) {
            abc = Math.round(abc);
          }

          item.textContent = abc;
        }

        if (item.dataset.type === 'abc2') {
          let abc = data[item.dataset.laurentId].stat.adc1;
          const width = item.offsetWidth;
        
          if (width < 200) {
            abc = Math.round(abc);
          }

          item.textContent = abc;
        }
      });

      return data;
    });
  }
}