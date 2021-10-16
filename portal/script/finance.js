function toggleClass(div){
    div.getElementsByClassName('monthDetails')[0].classList.toggle('monthDetailsInactive');
    div.getElementsByClassName('monthDetails')[0].classList.toggle('monthDetailsActive');

    div.getElementsByClassName('fa-chevron-up')[0].classList.toggle('arrowActive');
}