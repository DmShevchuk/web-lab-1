const canvas = document.querySelector('canvas');

canvas.addEventListener('mousedown', function(e) {
    getCursorPosition(canvas, e)
});


const context = canvas.getContext("2d");
const width = canvas.width;
const height = canvas.height;
const scaleR = canvas.width / 3;
const arrowDeltaInPx = 8;



/**
 * Функция для обработки клика на canvas
 * */
function getCursorPosition(canvas, event) {

    const form = document.getElementById("form");
    const formData = new FormData(form);

    if (!formData.has('r')) {
        alert("Для начала выберите R!");
        return;
    }

    console.log(" x: " + event.offsetX + " y: " + event.offsetY)
    const r = formData.get("r");

    const x = convertX(event.offsetX, r);
    const y = convertY(event.offsetY, r);
    form["x"].value = x;
    form["y"].value = y;

    setXvalueToHiddenInput(x);

    form.submit();
}


context.fillStyle = "#4CAF50";

context.beginPath();
context.moveTo(width / 2, height / 2);
context.lineTo((width / 2) / 3, height / 2);
context.lineTo(width / 2, (height / 2) + (((width / 2) / 3) * 2));
context.fill();

context.beginPath();
context.rect((width / 2) / 3, (height / 2) / 3, (width / 3), (height / 3));
context.fill();

context.beginPath();
context.arc(width / 2, height / 2, height / 6, -Math.PI / 2, 0, false);
context.lineTo(width / 2, height / 2)
context.fill();

drawArrowOnCanvas(0, height / 2, width, height / 2);
context.beginPath();
context.moveTo(width, height / 2);
context.lineTo(width - arrowDeltaInPx, (height / 2) - arrowDeltaInPx);
context.lineTo(width - arrowDeltaInPx, (height / 2) + arrowDeltaInPx);
context.fill();

drawArrowOnCanvas(width / 2, height, width / 2, 0);
context.beginPath();
context.moveTo(width / 2, 0);
context.lineTo((width / 2) - arrowDeltaInPx, arrowDeltaInPx);
context.lineTo((width / 2) + arrowDeltaInPx, arrowDeltaInPx);
context.fill();

context.font = "lighter 13px fantasy";

// x -R
context.beginPath();
context.moveTo(width / 6, (height / 2) - 5);
context.lineTo(width / 6, (height / 2) + 5);
context.stroke();
context.fillText("-R", width / 6, (height / 2) - 5);

// x -R/2
context.beginPath();
context.moveTo(width / 3, (height / 2) - 5);
context.lineTo(width / 3, (height / 2) + 5);
context.stroke();
context.fillText("-R/2", width / 3, (height / 2) - 5);

// x R/2
context.beginPath();
context.moveTo((width / 3) * 2, (height / 2) - 5);
context.lineTo((width / 3) * 2, (height / 2) + 5);
context.stroke();
context.fillText("R/2", (width / 3) * 2, (height / 2) - 5);

// x R
context.beginPath();
context.moveTo((width / 6) * 5, (height / 2) - 5);
context.lineTo((width / 6) * 5, (height / 2) + 5);
context.stroke();
context.fillText("R", (width / 6) * 5, (height / 2) - 5);

// y R
context.beginPath();
context.moveTo((width / 2) - 5, height / 6);
context.lineTo((width / 2) + 5, height / 6);
context.stroke();
context.fillText("R", width / 2 + 10, height / 6);

// y R/2
context.beginPath();
context.moveTo(width / 2 - 5, height / 3);
context.lineTo(width / 2 + 5, height / 3);
context.stroke();
context.fillText("R/2", width / 2 + 10, height / 3);

// y -R/2
context.beginPath();
context.moveTo(width / 2 - 5, (height / 3) * 2);
context.lineTo(width / 2 + 5, (height / 3) * 2);
context.stroke();
context.fillText("-R/2", width / 2 + 10, (height / 3) * 2);

// y -R
context.beginPath();
context.moveTo(width / 2 - 5, (height / 6) * 5);
context.lineTo(width / 2 + 5, (height / 6) * 5);
context.stroke();
context.fillText("-R", width / 2 + 10, (height / 6) * 5);

function drawArrowOnCanvas(fromX, fromY, toX, toY) {
    context.fillStyle = "black";
    context.beginPath();
    context.moveTo(fromX, fromY);
    context.lineTo(toX, toY);
    context.lineWidth = 2;
    context.stroke();
}

/**
 * Функция для конвертации координаты X клика мыши
 * */
function convertX(x, r){
    return (x - width / 2) / scaleR * r;
}


/**
 * Функция для конвертации координаты Y клика мыши
 * */
function convertY(y, r){
    return (height / 2 - y) / scaleR * r;
}