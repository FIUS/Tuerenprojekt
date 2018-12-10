window.onload = htmlRequest();

//interval timer set to one minute
window.setInterval(htmlRequest, 60000);

//the request for the door state
function htmlRequest(){
    let xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            if (xmlHttp.responseText == "open") {
                removeClass();
                document.getElementById('dot').classList.add('dotGreen');
                document.getElementById('fius_widget_text').innerHTML = "Offen";
            } else if (xmlHttp.responseText == "closed") {
                removeClass();
                document.getElementById('dot').classList.add('dotRed');
                document.getElementById('fius_widget_text').innerHTML = "Geschlossen";
            } else {
                removeClass();
                document.getElementById('dot').classList.add('dotYellow');
                document.getElementById('fius_widget_text').innerHTML = "Außer betrieb";
            }
        }
    }
    xmlHttp.open( "GET", "/isOpen.php", true );
    xmlHttp.send( null );

}

//removing of color classes
function removeClass() {
    if (document.getElementById('dot').classList.contains("dotYellow")){
        document.getElementById('dot').classList.remove('dotYellow');
    } else if (document.getElementById('dot').classList.contains("dotGreen")){
        document.getElementById('dot').classList.remove('dotGreen');
    } else {
        document.getElementById('dot').classList.remove('dotRed');
    }
}