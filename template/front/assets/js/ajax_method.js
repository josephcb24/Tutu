
	function ajax_load(url,id){
		var list = $('#'+id);
		$.ajax({
			url: url,
			beforeSend: function() {
				list.html('...'); // change submit button text
			},
			success: function(data) {
				list.html('');
				list.html(data).fadeIn();
				other_action();
			},
			error: function(e) {
				console.log(e)
			}
		});
	}
  	
	function notify(message,type,from,align){		
		$.notify({
			// options
			message: message 
		},{
			// settings
			type: type,
			placement: {
				from: from,
				align: align
		  	}
		});
		
	}
		

    $('body').on('click', '.add_to_cart', function(){        
        var product = $(this).data('pid');
        var elm_type = $(this).data('type');
        var quantity = 1;
        var option = '';
        var button = $(this);
		var alread = button.html();
        if(button.closest('.margin-bottom-40').find('.cart_quantity').length){
            quantity = button.closest('.margin-bottom-40').find('.cart_quantity').val();
        }
		
        if(button.closest('.col-md-6').find('.product-color').length){
            option = $('input[name=color]:checked', '.product-color').val();
            if(option == 'undefined'){
                option = '';
            }
            option = option.split(",").join("-");
            option = option.replace(')','--');
            option = option.replace('(','---');
        }
		
        $.ajax({
            url: base_url+'index.php/home/cart/add/'+product+'/'+quantity+'/'+option,
            beforeSend: function() {
				if(elm_type !== 'icon'){
                	button.html(cart_adding); // change submit button text
				}
            },
            success: function(data) {
                if(data == 'added'){
					$('.add_to_cart').each(function(index, element) {
						if( $('body .add_to_cart').length ){
							$('body .add_to_cart').each(function() {
								if($(this).data('pid') == product){
									var h = $(this);
									if(h.data('type') == 'text'){
										h.html('<i class="fa fa-shopping-cart"></i>'+added_to_cart).fadeIn();				
									} else if(h.data('type') == 'icon'){
										h.html('<i style="color:#AB00FF" class="fa fa-shopping-cart"></i>').fadeIn();					
									}
								}
							});
						}
                    });
					if (button.hasClass("btn_cart")) {
						button.removeClass("btn_cart");
						button.addClass("btn_carted");
					}
					//growl
                    ajax_load(base_url+'index.php/home/cart/added_list/','added_list');
					notify(product_added,'success','bottom','right');
					sound('successful_cart');
                } else if (data == 'shortage'){
                    button.html(alread);
					notify(quantity_exceeds,'warning','bottom','right');
					sound('cart_shortage');
                } else if (data == 'already'){
                    button.html(alread);
					notify(product_already,'warning','bottom','right');
					sound('already_cart');
                }
            },
            error: function(e) {
                console.log(e)
            }
        });
    });
  

    $('body').on('click', '.wish_it', function(){
        var state = check_login_stat('state');
		var product = $(this).data('pid');
		var button = $(this);
		
        state.success(function (data) {
            if(data == 'hypass'){
				$.ajax({
					url: base_url+'index.php/home/wishlist/add/'+product,
					beforeSend: function() {
					},
					success: function(data) {
						button.removeClass("wish_it");
						button.addClass("wished_it");
						//alert(button.closest('ul').data('originalTitle'));
						button.closest('ul').data('originalTitle',wishlist_add1);
						notify(wishlist_add,'info','bottom','right');
						sound('successful_wish');
					},
					error: function(e) {
						console.log(e)
					}
				});
            } else {
				signin();
			}
        });
    });
	
    $('body').on('click', '.btn_wish', function(){
        var state = check_login_stat('state');
		var product = $(this).data('pid');
		var button = $(this);
        state.success(function (data) {
            if(data == 'hypass'){
				$.ajax({
					url: base_url+'index.php/home/wishlist/add/'+product,
					beforeSend: function() {
						button.html(wishlist_adding); // change submit button text
					},
					success: function(data) {
						button.removeClass("btn_wish");
						button.addClass("btn_wished");
						button.html('<i class="fa fa-heart"></i> '+wishlist_add1);
						notify(wishlist_add,'info','bottom','right');
						sound('successful_wish');
					},
					error: function(e) {
						console.log(e)
					}
				});
            } else {
				signin();
			}
        });
    });

    $('body').on('click', '.remove_from_wish', function(){
		var product = $(this).data('pid');
		var button = $(this);
		$.ajax({
			url: base_url+'index.php/home/wishlist/remove/'+product,
			beforeSend: function() {
				button.parent().parent().hide('fast');
			},
			success: function(data) {
				ajax_load(base_url+'index.php/home/wishlist/num/','wishlist_num');
				button.parent().parent().remove();
				notify(wishlist_remove,'info','bottom','right');
			},
			error: function(e) {
				console.log(e)
			}
		});
    });
  

    $('body').on('click', '.rate_it', function(){
        var state = check_login_stat('state');
		var product = $(this).closest('.stars-ratings').data('pid');
		var rating = $(this).data('rate');
		var button = $(this);
		
        state.success(function (data) {
            if(data == 'hypass'){
				$.ajax({
					url: base_url+'index.php/home/rating/'+product+'/'+rating,
					beforeSend: function() {
					},
					success: function(data) {
						if(data == 'success'){
							notify(rated_success,'info','bottom','right');
						} else if(data == 'failure'){
							notify(rated_fail,'alert','bottom','right');
						} else if(data == 'already'){
							notify(rated_already,'info','bottom','right');
						}
					},
					error: function(e) {
						console.log(e)
					}
				});
            } else {
				signin();
			}
        });
    });
	
	
    $('.subscriber').on('click', function(){
        var here = $(this); // alert div for show alert message
        var text = here.html(); // alert div for show alert message
        var form = here.closest('form');
        //var form = $(this);
        var formdata = false;
        if (window.FormData){
            formdata = new FormData(form[0]);
        }
        $.ajax({
            url: form.attr('action'), // form action url
            type: 'POST', // form submit method get/post
            dataType: 'html', // request type html/json/xml
            data: formdata ? formdata : form.serialize(), // serialize form data 
            cache       : false,
            contentType : false,
            processData : false,
            beforeSend: function() {
				here.addClass('disabled');
                here.html(working); // change submit button text
            },
            success: function(data) {
                here.fadeIn();
                here.html(text);
				here.removeClass('disabled');
				if(data == 'done'){
					notify(subscribe_success,'info','bottom','right');
				} else if(data == 'already'){
					notify(subscribe_already,'info','bottom','right');
				} else if(data == 'already_session'){
					notify(subscribe_sess,'info','bottom','right');
				}
            },
            error: function(e) {
                console.log(e)
            }
        });
    });
	
	$("body").on('click','.login_btn',function(){
        var here = $(this); // alert div for show alert message
        var text = here.html(); // alert div for show alert message
        var form = here.closest('form');
        //var form = $(this);
        var formdata = false;
        if (window.FormData){
            formdata = new FormData(form[0]);
        }
        $.ajax({
            url: form.attr('action'), // form action url
            type: 'POST', // form submit method get/post
            dataType: 'html', // request type html/json/xml
            data: formdata ? formdata : form.serialize(), // serialize form data 
            cache       : false,
            contentType : false,
            processData : false,
            beforeSend: function() {
				here.addClass('disabled');
                here.html(logging); // change submit button text
            },
            success: function(data) {
                here.fadeIn();
                here.html(text);
				here.removeClass('disabled');
				if(data == 'done'){
					notify(login_success,'info','bottom','right');
					here.closest('.modal-content').find('#close_log_modal').click();
					set_loggers();
					sound('successful_login');
				} else if(data == 'failed'){
					here.closest('.modal-content').find('#close_log_modal').click();
					notify(login_fail,'warning','bottom','right');
					sound('unsuccessful_login');
				}
            },
            error: function(e) {
                console.log(e)
            }
        });
    });
	
	$("body").on('click','.forget_btn',function(){
        var here = $(this); // alert div for show alert message
        var text = here.html(); // alert div for show alert message
        var form = here.closest('form');
        //var form = $(this);
        var formdata = false;
        if (window.FormData){
            formdata = new FormData(form[0]);
        }
        $.ajax({
            url: form.attr('action'), // form action url
            type: 'POST', // form submit method get/post
            dataType: 'html', // request type html/json/xml
            data: formdata ? formdata : form.serialize(), // serialize form data 
            cache       : false,
            contentType : false,
            processData : false,
            beforeSend: function() {
				here.addClass('disabled');
                here.html(submitting); // change submit button text
            },
            success: function(data) {
                here.fadeIn();
                here.html(text);
				here.removeClass('disabled');
				if(data == 'email_sent'){
					notify(email_sent,'info','bottom','right');
					here.closest('.modal-content').find('#close_log_modal').click();
				} else if(data == 'email_nay'){
					here.closest('.modal-content').find('#close_log_modal').click();
					notify(email_noex,'info','bottom','right');
				} else if(data == 'email_not_sent'){
					here.closest('.modal-content').find('#close_log_modal').click();
					notify(email_fail,'info','bottom','right');
				}
            },
            error: function(e) {
                console.log(e)
            }
        });
    });
	
	
    