"use strict";

// Class definition
var KTGoogleMapsDemo = function() {

    var demo8 = function() {
        var lat=$('#tbldatoscliente-clatitud').val();
        var lng= $('#tbldatoscliente-clongitud').val();
        lat=lat ===""?-12.043333:lat;
        lng=lng ===""?-77.028333:lng;
        var map = new GMaps({
            div: '#map-canvas',
            lat: lat,
            lng: lng
        });

        var handleAction = function() {
            var text = $.trim($('#tbldatoscliente-cdireccion').val());
            GMaps.geocode({
                address: text,
                callback: function(results, status) {
                    if (status == 'OK') {
                        var latlng = results[0].geometry.location;
                        map.setCenter(latlng.lat(), latlng.lng());
                        map.addMarker({
                            lat: latlng.lat(),
                            lng: latlng.lng()
                        });
                       
                        $('#tbldatoscliente-clatitud').val(latlng.lat());
                        $('#tbldatoscliente-clongitud').val(latlng.lng());
                        KTUtil.scrollTo('map-canvas');
                    }
                }
            });
        }

        $('#m_gmap_8_btn').click(function(e) {
            e.preventDefault();
            handleAction();
        });

        $("#tbldatoscliente-cdireccion").keypress(function(e) {
            var keycode = (e.keyCode ? e.keyCode : e.which);
            if (keycode == '13') {
                e.preventDefault();
                handleAction();
            }
        });
    }

    return {
        // public functions
        init: function() {
            // default charts
    
            demo8();
        }
    };
}();

jQuery(document).ready(function() {
    KTGoogleMapsDemo.init();
});