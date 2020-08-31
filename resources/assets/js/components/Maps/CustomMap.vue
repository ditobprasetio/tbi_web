<template>
    <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 pn">
        <div id="maps"></div>
      </div>
    </div>
  </div>
</template>

<script>
export default 
{
    props: ['default_model'],
    data: function () 
    {
        return {
            model:[],
        }
    },
    mounted: function () 
    {
        this.model = this.default_model;
        this.initialMap();
    },
    methods:{

        initialMap()
        {
            var myLatLng = {lat: parseFloat(this.model.lat), lng: parseFloat(this.model.lng)};
            var mapProp= {
                center:new google.maps.LatLng(myLatLng.lat, myLatLng.lng),
                zoom:17,
                mapTypeControl:false,
                zoomControl: false,
                scaleControl: false,
                gestureHandling: 'none',  
                styles:[
                    {
                    "elementType": "geometry",
                    "stylers": [
                        {
                        "color": "#f5f5f5"
                        }
                    ]
                    },
                    {
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                        "visibility": "off"
                        }
                    ]
                    },
                    {
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                        "color": "#616161"
                        }
                    ]
                    },
                    {
                    "elementType": "labels.text.stroke",
                    "stylers": [
                        {
                        "color": "#f5f5f5"
                        }
                    ]
                    },
                    {
                    "featureType": "administrative.land_parcel",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                        "color": "#bdbdbd"
                        }
                    ]
                    },
                    {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [
                        {
                        "color": "#eeeeee"
                        }
                    ]
                    },
                    {
                    "featureType": "poi",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                        "color": "#757575"
                        }
                    ]
                    },
                    {
                    "featureType": "poi.park",
                    "elementType": "geometry",
                    "stylers": [
                        {
                        "color": "#e5e5e5"
                        }
                    ]
                    },
                    {
                    "featureType": "poi.park",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                        "color": "#9e9e9e"
                        }
                    ]
                    },
                    {
                    "featureType": "road",
                    "elementType": "geometry",
                    "stylers": [
                        {
                        "color": "#ffffff"
                        }
                    ]
                    },
                    {
                    "featureType": "road.arterial",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                        "color": "#757575"
                        }
                    ]
                    },
                    {
                    "featureType": "road.highway",
                    "elementType": "geometry",
                    "stylers": [
                        {
                        "color": "#dadada"
                        }
                    ]
                    },
                    {
                    "featureType": "road.highway",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                        "color": "#616161"
                        }
                    ]
                    },
                    {
                    "featureType": "road.local",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                        "color": "#9e9e9e"
                        }
                    ]
                    },
                    {
                    "featureType": "transit.line",
                    "elementType": "geometry",
                    "stylers": [
                        {
                        "color": "#e5e5e5"
                        }
                    ]
                    },
                    {
                    "featureType": "transit.station",
                    "elementType": "geometry",
                    "stylers": [
                        {
                        "color": "#eeeeee"
                        }
                    ]
                    },
                    {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [
                        {
                        "color": "#c9c9c9"
                        }
                    ]
                    },
                    {
                    "featureType": "water",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                        "color": "#9e9e9e"
                        }
                    ]
                    }
                ]
            };
            var contentString = '<div id="content-infowindow">'+
            '<h5>HARIOMS TAILOR AND TEXTILE</h5>'+
            '<p>'+this.model.address+'</p>'+
            '<table>'+
            '<tr><td width="50"><b>Phone</b></td><td> : '+this.model.phone+'</td><tr>'+
            '<tr><td><b>Fax</b></td><td> : '+this.model.fax+'</td><tr>'+
            '<tr><td><b>Email</b></td><td> : '+this.model.email+'</td><tr>'+
            '</table>'+
            '</div>';
            var map=new google.maps.Map(document.getElementById("maps"),mapProp);
            var icon_custom = {
                url: process.env.MIX_APP_URL + "template/img/HOME/loctag_icon.png",
                scaledSize: new google.maps.Size(33, 46),
                origin: new google.maps.Point(0,0),
                anchor: new google.maps.Point(0, 0)
            };
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                icon: icon_custom,
                title: "HARIOM'S"
            });
            var infowindow = new google.maps.InfoWindow({
                content: contentString,
                pixelOffset: new google.maps.Size(0,24)
            });

            google.maps.event.addListener(infowindow, 'domready', function() {
                // Reference to the DIV that wraps the bottom of infowindow
                    var iwOuter = $('.gm-style-iw');

                    /* Since this div is in a position prior to .gm-div style-iw.
                    * We use jQuery and create a iwBackground variable,
                    * and took advantage of the existing reference .gm-style-iw for the previous div with .prev().
                    */
                    var iwBackground = iwOuter.prev();

                    // Removes background shadow DIV
                    iwBackground.children(':nth-child(2)').css({'display' : 'none'});

                    // Removes white background DIV
                    iwBackground.children(':nth-child(4)').css({'display' : 'none'});

                    // hide cursor  
                    var arrow_div = $(".gm-style-iw").prev();
                    $("div:eq(0)", arrow_div).hide();
                    $("div:eq(2)", arrow_div).hide();

                    // Moves the infowindow 115px to the right.
                    iwOuter.parent().parent().css({left: '30px'});

                    // Reference to the div that groups the close button elements.
                    var iwCloseBtn = iwOuter.next();

                    // Apply the desired effect to the close button
                    iwCloseBtn.css({display: 'none'});

            });
            

            infowindow.open(map, marker);


        }
    }
};
</script>
