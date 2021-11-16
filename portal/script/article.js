function showFileName(el){
    var file = el.value;
    var fileName = file.split("\\");
    document.getElementById("fileNameOutput").innerHTML = fileName[fileName.length - 1];
}

document.getElementById("visibilityToggle").addEventListener('click', function (){
    document.getElementById("visibilityToggle").getElementsByTagName('i')[0].classList.toggle("fa-eye-slash");
    document.getElementById("visibilityToggle").getElementsByTagName('i')[0].classList.toggle("fa-eye");

    const urlParams = new URLSearchParams(window.location.search);

    var dataString = 'id=' + urlParams.get('a');
    $.ajax({
        type:'post',
        url:'process/changeArticleVisibility.php',
        data:dataString,
        cache:false,
        success: function (html){

        }
    })
})