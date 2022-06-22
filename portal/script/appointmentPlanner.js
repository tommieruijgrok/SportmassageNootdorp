var globalDate = '';
var globalElement = '';
function showDetails(date, el){
    globalDate = date;
    globalElement = el;
    $.getJSON('../process/getDateAppointmentDetails.php?date=' + date, function(data) {
        console.log(data);
        emptyAgendaDetails();

        document.getElementById("agendaDetailsTitle").innerText = data.dateInString;

        if (data.open == false){
            setOpenCloseButton("close");
            console.log("CLOSED");
        } else if (data.open == true) {
            setOpenCloseButton("open");
            console.log("OPEN");
        }

        appointmentOutput = document.getElementById("agendaDetailsOutput");
        if (data.appointments.length > 0){
            for (i=0; i < data.appointments.length; i++){
                x = document.createElement('div');
                x.classList.add("appointmentOutputEl");
                y = document.createElement('h4');
                y.innerText = data.appointments[i].klant.name;
                z = document.createElement('p');
                z.classList.add("appointmentOutputElTime")
                z.innerText = data.appointments[i].beginTime + ' - ' + data.appointments[i].endTime + ' (' + data.appointments[i].totalMinutes + ' minuten)';
                x.append(y);
                x.append(z);
                appointmentOutput.append(x);
            }
        } else {
            x = document.createElement('P');
            x.id = "agendaDetailsNoFound";
            x.innerText = "Geen afspraken gevonden."
            appointmentOutput.append(x);
            console.log("JAA");
        }
    });

}

document.getElementById("openClosedButton").addEventListener('click', function (){

    var dataString = 'date=' + globalDate;
    $.ajax({
        type:'post',
        url:'../process/toggleOpenClosed.php',
        data:dataString,
        cache:false,
        success: function (html){
            if (html == "OPEN"){
                setOpenCloseButton("open");
                toggleCalendar("open");
            } else if (html == "CLOSED"){
                setOpenCloseButton("close");
                toggleCalendar("close");
            }
        }
    })

})

function setOpenCloseButton(which){
    if (which == "open"){
        document.getElementById("openClosedButton").classList.add("openClosedButtonOpen");
        document.getElementById("openClosedText").innerText = "Geopend!";
    } else if (which == "close") {
        document.getElementById("openClosedButton").classList.remove("openClosedButtonOpen");
        document.getElementById("openClosedText").innerText = "Gesloten!";
    }
}

function toggleCalendar(which){
    if (which == "open"){
        globalElement.classList.toggle("noAppointments");
        globalElement.classList.toggle("appointmentsNotAllowed");
    } else if (which == "close") {
        globalElement.classList.toggle("noAppointments");
        globalElement.classList.toggle("appointmentsNotAllowed");
    }
}

function emptyAgendaDetails(){
    document.getElementById("agendaDetailsOutput").innerHTML = "";
}