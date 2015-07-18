
    $('#empty').on('click', function(){
        ajax_load(base_url+'index.php/home/cart/empty/','scrollbar');
        $('.counter').html('0').fadeOut();
        if( $('.cart_list').length ){
            $('.cart_list').find('tbody').html('');
            $('#total').html('...');
            $('#grand').html('...');
        }
        if( $('body .add_to_cart').length ){
            $('body .add_to_cart').each(function() {
				var h = $(this);
				if(h.data('type') == 'icon'){
					h.html('<i class="fa fa-shopping-cart"></i>').fadeIn();					
				} else if(h.data('type') == 'text'){
					h.html('<i class="fa fa-shopping-cart"></i>'+add_to_cart).fadeIn();					
				}
            });
        }
		notify(cart_empty,'success','bottom','right');
		sound('cart_empty');	
    });

    $('.remove_from_cart').on('click', function(){
        var here = $(this);
        var rowid = here.data('rowid');
        var pid = here.data('pid');
        here.closest('li').hide('fast');
        var removal = remove_from_cart(rowid);
        removal.success(function (data) {
			$(".table").find("[data-rowid='" + rowid + "']").closest('tr').hide('fast');
			if( $('body .add_to_cart').length ){
				$('body .add_to_cart').each(function() {
					var h = $(this);
					if(h.data('pid') == pid){
						if(h.data('type') == 'icon'){
							h.html('<i class="fa fa-shopping-cart"></i>').fadeIn();					
						} else if(h.data('type') == 'text'){
							h.html('<i class="fa fa-shopping-cart"></i>'+add_to_cart).fadeIn();					
						}
					}
				});
			}
			notify(cart_product_removed,'success','bottom','right');
			sound('cart_product_removed');
            update_calc();
        });
    });

    function remove_from_cart(rowid){
        return $.ajax({
            url: base_url+'index.php/home/cart/remove_one/'+rowid
        });
    }

    function update_calc(){
        
        var url = base_url+'index.php/home/cart/calcs/full';
        var total = $('#scroll_total');
        var ship = $('#scroll_ship');
        var tax = $('#scroll_tax');
        var grand = $('#scroll_grand');
        var count = $('#counter');

        $.ajax({
            url: url,
            beforeSend: function() {
                total.html('...'); 
                ship.html('...'); 
                tax.html('...'); 
                grand.html('...'); 
                count.html('...');
            },
            success: function(data) {
                var res = data.split('-');
                total.html(res[0]).fadeIn(); 
                ship.html(res[1]).fadeIn(); 
                tax.html(res[2]).fadeIn(); 
                grand.html(res[3]).fadeIn(); 
                count.html(res[4]).fadeIn();
                other_action();
            },
            error: function(e) {
                console.log(e)
            }
        });
    }

    function other_action(){
        if($('#counter').html() == '0'){
            $('#scrollbar').hide('fast');
        }
    }

    jQuery(document).ready(function ($) {
        "use strict";
        $('.contentHolder').perfectScrollbar();
        update_calc();
    });