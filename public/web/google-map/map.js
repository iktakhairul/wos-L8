/**
 *
 * Get current location latitude and longitude on map by calling getLocation() function.
 * The getMyLocation(); function will pass position object to initialize() function.
 */
function getMyLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(initialize);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

getMyLocation();

/**
 *
 * Get Map Ready By initialize() function.
 */
function initialize(position) {

    document.getElementById('my_latitude').value = position.coords.latitude;
    document.getElementById('my_longitude').value = position.coords.longitude;

    var mapOptions, map, marker, searchBox, city,
		infoWindow = '',
		addressEl = document.querySelector( '#map-search' ),
		latEl = document.querySelector( '.latitude' ),
		longEl = document.querySelector( '.longitude' ),
		element = document.getElementById( 'map-canvas' );
	    city = document.querySelector( '.reg-input-city' );

	mapOptions = {
		zoom: 15, // Zoom option
		center: new google.maps.LatLng(position.coords.latitude, position.coords.longitude), // Current latitude and longitude position of the pin in map.
		disableDefaultUI: false, // Disables the controls like zoom control on the map if set to true
		scrollWheel: true, // If set to false disables the scrolling on the map.
		draggable: true, // If set to false , you cannot move the map around.
		// mapTypeId: google.maps.MapTypeId.HYBRID, // If set to HYBRID its between sat and ROADMAP, Can be set to SATELLITE as well.
		// maxZoom: 20, // Wont allow you to zoom more than this
		// minZoom: 8  // Wont allow you to go more up.
	};

	/**
	 * Creates the map using google function google.maps.Map() by passing the id of canvas and
	 * mapOptions object that we just created above as its parameters.
	 *
	 */
	// Create an object map with the constructor function Map()
	map = new google.maps.Map( element, mapOptions ); // Till this like of code it loads up the map.

	/**
	 * Creates the marker on the map
	 *
	 */
	marker = new google.maps.Marker({
		position: mapOptions.center,
		map: map,
		draggable: true
	});

	/**
	 * Creates a search box
	 */
	searchBox = new google.maps.places.SearchBox( addressEl );

	/**
	 * When the place is changed on search box, it takes the marker to the searched location.
	 */
	google.maps.event.addListener( searchBox, 'places_changed', function () {
		var places = searchBox.getPlaces(),
			bounds = new google.maps.LatLngBounds(),
			i, place, lat, long, resultArray,
			addresss = places[0].formatted_address;

		for( i = 0; place = places[i]; i++ ) {
			bounds.extend( place.geometry.location );
			marker.setPosition( place.geometry.location );  // Set marker position new.
		}

		map.fitBounds( bounds );  // Fit to the bound
		map.setZoom( 15 ); // This function sets the zoom to 15, meaning zooms to level 15.
		// console.log( map.getZoom() );

		lat = marker.getPosition().lat();
		long = marker.getPosition().lng();
		latEl.value = lat;
		longEl.value = long;

		resultArray =  places[0].address_components;

		// Get the city and set the city input value to the one selected
		for( var i = 0; i < resultArray.length; i++ ) {
			if ( resultArray[ i ].types[0] && 'administrative_area_level_2' === resultArray[ i ].types[0] ) {
				citi = resultArray[ i ].long_name;
				city.value = citi;
			}
		}

		// Closes the previous info window if it already exists
		if ( infoWindow ) {
			infoWindow.close();
		}
		/**
		 * Creates the info Window at the top of the marker
		 */
		infoWindow = new google.maps.InfoWindow({
			content: addresss
		});

		infoWindow.open( map, marker );
	} );


	/**
	 * Finds the new position of the marker when the marker is dragged.
	 */
	google.maps.event.addListener( marker, "dragend", function ( event ) {
		var lat, long, address, resultArray, citi;

		lat = marker.getPosition().lat();
		long = marker.getPosition().lng();

		var geocoder = new google.maps.Geocoder();
		geocoder.geocode( { latLng: marker.getPosition() }, function ( result, status ) {
			if ( 'OK' === status ) {
				address = result[0].formatted_address;
				resultArray =  result[0].address_components;

				// Get the city and set the city input value to the one selected
				for( var i = 0; i < resultArray.length; i++ ) {
					if ( resultArray[ i ].types[0] && 'administrative_area_level_2' === resultArray[ i ].types[0] ) {
						citi = resultArray[ i ].long_name;
						city.value = citi;
					}
				}
				addressEl.value = address;
				latEl.value = lat;
				longEl.value = long;

			} else {
				console.log( 'Geocode was not successful for the following reason: ' + status );
			}

			// Closes the previous info window if it already exists
			if ( infoWindow ) {
				infoWindow.close();
			}

			/**
			 * Creates the info Window at the top of the marker
			 */
			infoWindow = new google.maps.InfoWindow({
				content: address
			});

			infoWindow.open( map, marker );
		} );
	});
}
