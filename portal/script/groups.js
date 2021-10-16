document.getElementById("toevoegButton").addEventListener('click', function (){
    document.getElementById("addGroepen").classList.toggle("inactive");
    document.getElementById("addGroepen").classList.toggle("active");
})

function toggleClass(div){
    div.getElementsByClassName('groepenElKlanten')[0].classList.toggle('groepenElKlantenInactive');
    div.getElementsByClassName('groepenElKlanten')[0].classList.toggle('groepenElKlantenActive');

    div.getElementsByClassName('fa-chevron-up')[0].classList.toggle('arrowActive');
}

function editGroup(div){
    document.getElementById("popup").classList.toggle("inactive");
    z = div.parentElement.parentElement.parentElement.getElementsByClassName('groupIdInput')[0].value;
    document.getElementById('changeGroupFormOutput').innerHTML = '<input type="hidden" name="groupId" value="' + z + '">';

}

document.getElementById("popupClose").addEventListener('click', function (){
    document.getElementById("popup").classList.toggle("inactive");
})