function showFileName(el){
    var file = el.value;
    var fileName = file.split("\\");
    document.getElementById("fileNameOutput").innerHTML = fileName[fileName.length - 1];
}