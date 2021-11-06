document.getElementById("toevoegButton").addEventListener('click', function (){
    document.getElementById("addNews").classList.toggle("inactive");
    document.getElementById("addNews").classList.toggle("active");
})

function showFileName(el){
    var file = el.value;
    var fileName = file.split("\\");
    document.getElementById("fileNameOutput").innerHTML = fileName[fileName.length - 1];
}