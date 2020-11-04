var customLabel = {
    restaurant: {
        label: 'R'
    },
    bar: {
        label: 'B'
    }
    };

function initMap() {
    console.log('ahihi do ngok')
    var map = new google.maps.Map(document.getElementById('map'), {
        center: new google.maps.LatLng(10.714917, 106.630389),
        zoom: 12
    });
    var infoWindow = new google.maps.InfoWindow;
    
    // Change this depending on the name of your PHP or XML file
    downloadUrl('./js/mapXML.php', function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName('marker');
        Array.prototype.forEach.call(markers, function(markerElem) {
            var id = markerElem.getAttribute('id');
            var name = markerElem.getAttribute('name');
            var address = markerElem.getAttribute('address');
            var point = new google.maps.LatLng(
                parseFloat(markerElem.getAttribute('lat')),
                parseFloat(markerElem.getAttribute('lng')));

            var infowincontent = document.createElement('div');
            var strong = document.createElement('strong');
            strong.textContent = name
            infowincontent.appendChild(strong);
            infowincontent.appendChild(document.createElement('br'));

            var text = document.createElement('text');
            text.textContent = address
            infowincontent.appendChild(text);
            
            var marker = new google.maps.Marker({
            map: map,
            position: point,
            
            });
            marker.addListener('click', function() {
            infoWindow.setContent(infowincontent);
            infoWindow.open(map, marker);
            });
        });
    });
}



function downloadUrl(url, callback) {
    var request = window.ActiveXObject ?
        new ActiveXObject('Microsoft.XMLHTTP') :
        new XMLHttpRequest;

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
    }
};

request.open('GET', url, true);
request.send(null);
}

function doNothing() {}