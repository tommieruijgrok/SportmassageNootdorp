document.getElementById("toevoegButton").addEventListener('click', function (){
    document.getElementById("afspraakToevoegen").classList.toggle("inactive");
})

document.getElementById("title").addEventListener('click', function (){
    document.getElementById("popup").classList.toggle("inactive");
})

document.getElementById("popupClose").addEventListener('click', function (){
    document.getElementById("popup").classList.toggle("inactive");
})