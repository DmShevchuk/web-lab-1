/*
* Функция для установки только одного чекбокса R в активное положение
* */
function setCheckedOnlyOneCheckbox(id){
    const checkboxPrefix = "checkbox";
    for(let i = 1; i <= 5; i++){
        if (checkboxPrefix + i !== id){
            document.getElementById(checkboxPrefix + i).checked = false;
        }
    }
    isFormReadyToSent();
}


/**
 * Функция для отображения нажатой кнопки со значением X
 * */
function setXvalueToHiddenInput(value){
    document.getElementById("x-hidden-value").value = value;
    let xSpan = document.getElementById("x-value");
    xSpan.textContent = value;
    xSpan.className = "x-value-chosen";
    isFormReadyToSent();
}



/**
 * Функция для очистки поля со значением X при сбросе формы
 * */
function clearHiddenXField(){
    let xSpan =  document.getElementById("x-value");
    xSpan.textContent = "Выберите X";
    xSpan.className = "x-value-not-chosen";
    document.getElementById("x-hidden-value").value = "";
    setSubmitButtonDisabled();
}