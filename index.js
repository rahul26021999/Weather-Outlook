function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}

function showPosition(position) {
    document.getElementById("lat").value = position.coords.latitude;
    document.getElementById("long").value = position.coords.longitude;
}

function autoDetect() {
    if (document.getElementById('auto_detect').checked) {
        getLocation();
    }
}
// search location
var autocomplete;

function initialize() {
    initializeLocationFinder();
    autoDetect();
}

function initializeLocationFinder() {
    autocomplete = new google.maps.places.Autocomplete(
        /** @type {HTMLInputElement} */
        (document.getElementById('autocomplete')), {
            types: ['geocode']
        });
    google.maps.event.addListener(autocomplete, 'place_changed', function() {
        var place = autocomplete.getPlace();
        var lat = place.geometry.location.lat();
        var long = place.geometry.location.lng();
        document.getElementById("lat").value = lat;
        document.getElementById("long").value = long;

    });
}
//onsubmit
function checkForLocation() {
    if (document.getElementById("lat").value && document.getElementById("long").value) {
        return true;
    } else {
        alert("Please Select any location Or Enable Auto detect");
        return false;
    }
}