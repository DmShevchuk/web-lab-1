let keyArray = [];
let canvasBgArrayClasses = ["bg-blue", "bg-default"];
let canvasBgArrayClassesCounter = 0;

const graph = document.getElementById("graph");

document.addEventListener('DOMContentLoaded', () => {
    'use strict';

    document.addEventListener('keydown', event => {
        const key = event.key.toLowerCase();
        if (keyArray.length === 5) {
            keyArray.shift();
        }
        keyArray.push(key);
        if (keyArray.join('') == '1sept') {
            console.log(1111);
            canvasBgArrayClassesCounter = (canvasBgArrayClassesCounter + 1) % 2;
            graph.className = canvasBgArrayClasses[canvasBgArrayClassesCounter];
        }
        console.log(keyArray);
    });
});


