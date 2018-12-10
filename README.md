# Tuerenprojekt
Dieses Repo fasst zusammen wie die Information ob die Fachschaftstür offen ist, auf unsere Webseite gelangt.

## Elektronik
Das Signal kommt bei unserem Raspberry als einfache 1 oder 0 auf einem der GPIO Pins an.

## Software
Die Software die den Sesnor ausliest und die Information als HTTP Endpunkt bereitstellt ist teil von https://github.com/FIUS/RoomSensorApi.
Dieser Endpunkt ist aber nur aus dem FG-Lan erreichbar und wird dann von einem [PHP Skript](https://github.com/FIUS/Tuerenprojekt/blob/master/isOpen.php) auf dem FIUS Webserver ausgelesen.
Dieser stellt die Information dann wieder als HTTP Endpunkt zur Verfügung, welcher von einem [Wordpress Widget](https://github.com/FIUS/Tuerenprojekt/blob/master/fius_open_widget) auf der eigentlichen Webseite verwendet wird.
