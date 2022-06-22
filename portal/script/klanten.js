document.getElementById("toevoegButton").addEventListener('click', function (){
    document.getElementById("addKlanten").classList.toggle("inactive");
    document.getElementById("addKlanten").classList.toggle("active");
})

document.getElementById("searchBar").addEventListener('keyup', function (){
    query = document.getElementById("searchBar").value;



    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", 'https://sportmassagenootdorp.nl/portal/process/klantenSearchBar.php?query=' + query, false ); // false for synchronous request
    xmlHttp.send( null );
    document.getElementById("klantenGrid").innerHTML = xmlHttp.responseText;
})