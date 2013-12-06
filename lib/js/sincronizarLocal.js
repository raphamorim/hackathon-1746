alert("Procurando sua Localização...");

	function success(position) {
    var s = document.querySelector('#status');

    if (s.className == 'success') {
        return;
    }

    s.innerHTML = "Você foi localizado!";
    $("#done").text("Localização Encontrada!");
    s.className = 'success';

    var mapcanvas = document.createElement('div');
        mapcanvas.id = 'mapcanvas';
        mapcanvas.style.height = '200px';
        mapcanvas.style.width = '80%';

    document.querySelector('article').appendChild(mapcanvas);

    var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

    var myOptions = {
        zoom: 15,
        center: latlng,
        mapTypeControl: false,
        navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    var map = new google.maps.Map(document.getElementById("mapcanvas"), myOptions);
    var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        title:"Você está aqui!"
    });

    $("#latitude").val(position.coords.latitude);
    $("#longitude").val(position.coords.longitude);

}

	function error(msg) {
	    var s = document.querySelector('#status');
	        s.innerHTML = typeof msg == 'string' ? msg : "falhou";
	        s.className = 'fail';
	}

	if (navigator.geolocation) {
	    navigator.geolocation.getCurrentPosition(success, error);
	} else {
	    error('Seu navegador não suporta <b style="color:black;background-color:#ffff66">Geolocalização</b>!');
	}
