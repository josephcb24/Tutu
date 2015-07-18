
                    $('.colrs').on('click', function(){
                        var here = $(this);
                        var rowid = here.closest('tr').data('rowid');
                        var val = here.closest('li').find('input').val();
                        if(val == 'undefined'){
                            val = '';
                        }
                        val = val.split(",").join("-");
                        val = val.replace(')','--');
                        val = val.replace('(','---');

                        $.ajax({
                            url: base_url+'index.php/home/cart/upd_color/'+rowid+'/'+val,
                            beforeSend: function() {
                            },
                            success: function() {
                                //other option
                                ajax_load(base_url+'index.php/home/cart/added_list/','added_list');
                            },
                            error: function(e) {
                                console.log(e)
                            }
                        });
                    });

                    function others_count(){
                        update_calc_cart();
                    }
                    
                    $('.close').on('click', function(){
                        var here = $(this);
                        var rowid = here.closest('tr').find('.quantity_field').data('rowid');
                        var thetr = here.closest('tr');
                        var list1 = $('#total');
                        $.ajax({
                            url: base_url+'index.php/home/cart/remove_one/'+rowid,
                            beforeSend: function() {
                                list1.html('...');
                            },
                            success: function(data) {
                                list1.html(data).fadeIn();
                                ajax_load(base_url+'index.php/home/cart/added_list/','added_list');
								notify(cart_product_removed,'success','bottom','right');
								sound('cart_product_removed');
                                others_count();
                                thetr.hide('fast');
                            },
                            error: function(e) {
                                console.log(e)
                            }
                        });
                    });
                    function check_ok(element){
                        var here = $(element);
                        here.closest('td').find('.minus').click();
                        here.closest('td').find('.plus').click();
                    }
                    $('.quantity-button').on('click', function(){
                        var here = $(this);
                        var quantity = here.closest('td').find('.quantity_field').val();
                        var limit = here.closest('td').find('.quantity_field').data('limit');
                        if(here.val()=='minus'){
                            quantity = quantity-1;
                        } else if (here.val()=='plus'){
                            //if(limit == 'no'){
                                quantity = Number(quantity)+1;
                           // }
                        }
                        if(quantity >= 1){
                            here.closest('td').find('.quantity_field').val(quantity);

                            var rowid = here.closest('td').find('.quantity_field').data('rowid');
                            var lim_t = here.closest('tr').find('.limit');
                            var list1 = here.closest('tr').find('.sub_total');

                            $.ajax({
                                url: base_url+'index.php/home/cart/quantity_update/'+rowid+'/'+quantity,
                                beforeSend: function() {
                                    list1.html('...'); 
                                },
                                success: function(data) {
                                    var res = data.split("---")
                                    list1.html(res[0]).fadeIn();
                                    ajax_load(base_url+'index.php/home/cart/added_list/','added_list');
                                    others_count();
                                    if(res[1] !== 'not_limit'){
                                        lim_t.html('!!').fadeIn();
                                        here.closest('td').find('.plus').hide();
                                        here.closest('td').find('.quantity_field').data('limit','yes');
                                        here.closest('td').find('.quantity_field').val(res[1]);
                                    } else {
                                        lim_t.html('').fadeOut();
                                        here.closest('td').find('.plus').show();
                                        here.closest('td').find('.quantity_field').data('limit','no');
                                    }
                                },
                                error: function(e) {
                                    console.log(e)
                                }
                            });
                        }
                    });

                    function cart_submission(){
                        //var payment_type = $('#ab').val();
                        var payment_type = '';
                        var state = check_login_stat('state');
                        state.success(function (data) {
                            if(data == 'hypass'){
                                 var form = $('#cart_form');
                                 form.submit();
                            } else {
                                $('#loginss').click();
                                $('#login_form').attr('action',base_url+'index.php/home/login/do_login/nlog');
                                $('#logup_form').attr('action',base_url+'index.php/home/registration/add_info/nlog');
                            }
                        });
                    }

                    $( document ).ready(function() {
                        $('.colrs').each(function() {
                            var here = $(this);
                            var rad = here.closest('li').find('input');
                            if(rad.is(':checked')) {
                                setTimeout( function(){ 
                                    here.click();
                                }
                                , 800 );
                            }
                        });
                    });

                    function update_calc_cart(){
                        var url = base_url+'index.php/home/cart/calcs/full';
                        var total = $('#total');
                        var ship = $('#shipping');
                        var tax = $('#tax');
                        var grand = $('#grand');

                        $.ajax({
                            url: url,
                            beforeSend: function() {
                                total.html('...'); 
                                ship.html('...'); 
                                tax.html('...'); 
                                grand.html('...'); 
                            },
                            success: function(data) {
                                var res = data.split('-');
                                total.html(res[0]).fadeIn(); 
                                ship.html(res[1]).fadeIn(); 
                                tax.html(res[2]).fadeIn(); 
                                grand.html(res[3]).fadeIn(); 
                                other_action();
                            },
                            error: function(e) {
                                console.log(e)
                            }
                        });
                    }
                
				
    function set_cart_map(){
        //$('#maps').animate({ height: '400px' }, 'easeInOutCubic', function(){});
        initialize();
        var address = [];
        //$('#pos').show('fast');
        //$('#lnlat').show('fast');
        $('.address').each(function(index, value){
            if(this.value !== ''){
                address.push(this.value);
            }
        });
        address = address.toString();
        deleteMarkers();
        geocoder.geocode( { 'address': address}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if($('#langlat').val().indexOf(',')  == -1 || $('#first').val() == 'no'){
					deleteMarkers();
                    var location = results[0].geometry.location; 
                    var marker = addMarker(location);
                    map.setCenter(location);
                    $('#langlat').val(location);
                } else if($('#langlat').val().indexOf(',')  >= 0){
					deleteMarkers();
                    var loca = $('#langlat').val();
                    loca = loca.split(',');
                    var lat = loca[0].replace('(','');
                    var lon = loca[1].replace(')','');
                    var marker = addMarker(new google.maps.LatLng(lat, lon));
                    map.setCenter(new google.maps.LatLng(lat, lon));
                }
				if($('#first').val() == 'yes'){
					$('#first').val('no');
				}
                // Add dragging event listeners.
                google.maps.event.addListener(marker, 'drag', function() {
                    $('#langlat').val(marker.getPosition());
                });
            }
        }); 
    }

        var geocoder;
        var map;
        var markers = [];
        function initialize() {
            geocoder = new google.maps.Geocoder();
            var latlng = new google.maps.LatLng(-34.397, 150.644);
            var mapOptions = {
                zoom: 14,
                center: latlng
            }
            map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
            google.maps.event.addListener(map, 'click', function(event) {
                deleteMarkers();
                var marker = addMarker(event.latLng);
                $('#langlat').val(event.latLng);	
            	// Add dragging event listeners.
				google.maps.event.addListener(marker, 'drag', function() {
					$('#langlat').val(marker.getPosition());
				});
				
            });		
        }
        

    /*
        var address = [];
        $('#maps').show('fast');
        $('#pos').show('fast');
        $('#lnlat').show('fast');
        $(".address").each(
        address.push(this.value);
        );
    */

        $('.address').on('blur', function(){
            set_cart_map();
        });

        // Add a marker to the map and push to the array.
        function addMarker(location) {
            var image = {
                url: base_url+'uploads/others/marker.png',
                size: new google.maps.Size(40, 60),
                origin: new google.maps.Point(0,0),
                anchor: new google.maps.Point(20, 62)
            };

            var shape = {
                coords: [1, 5, 15, 62, 62, 62, 15 , 5, 1],
                type: 'poly'
            };

            var marker = new google.maps.Marker({
                position: location,
                map: map,
                draggable:true,
                icon: image,
                shape: shape,
                animation: google.maps.Animation.DROP
            });
            markers.push(marker);
            return marker;
        }

        // Deletes all markers in the array by removing references to them.
        function deleteMarkers() {
            clearMarkers();
            markers = [];
        }

        // Sets the map on all markers in the array.
        function setAllMap(map) {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(map);
            }
        }

        // Removes the markers from the map, but keeps them in the array.
        function clearMarkers() {
            setAllMap(null);
        }
        //google.maps.event.addDomListener(window, 'load', initialize);