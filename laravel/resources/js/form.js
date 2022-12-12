'use strict';

if (document.forms) {
  const form = document.forms;

  form[0].array.forEach(element => {
    console.log(element.value);
  });
} 