let keyArray = [];


document.addEventListener('DOMContentLoaded', () => {
    'use strict';

    document.addEventListener('keydown', event => {
        const key = event.key.toLowerCase();
        if (keyArray.length === 5) {
            keyArray.shift();
        }
        keyArray.push(key);
        if (keyArray.join('') === '1sept') {

        }
        console.log(keyArray);
    });
});


