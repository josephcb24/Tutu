	
	function toggle_subs(cat){
		$("#subs_"+cat).toggle('fast');
	}
	
	function filter(set,cat,subcat,page){
		var height = $('.filter-results').height();
		var category = $("#cur_cat").val();
		var sub_category = '';
		var featured = 'ok';
		var type = $("#viewtype").val();
		$("#ab").html(sub_category);
		//alert(sub_category);
		if(cat !== 'none'){
			category = cat;
		}
		if(subcat !== 'none'){
			sub_category = subcat;
		}
		var alerta = $('#list'); // alert div for show alert message
		if(category == 'none'){
			category = '';
		}
		var form = $('#plistform');
		$('#categoryaa').val(category);
		$('#sub_categoryaa').val(sub_category);
		$('#featuredaa').val(featured);
        //var form = $(this);
        var formdata = false;
        if (window.FormData){
            formdata = new FormData(form[0]);
        }
		$.ajax({
            url: form.attr('action')+set+'/'+page+'/'+type, // form action url
			type: 'POST', // form submit method get/post
			dataType: 'html', // request type html/json/xml
			data: formdata ? formdata : form.serialize(), // serialize form data 
			cache       : false,
			contentType : false,
			processData : false,
			beforeSend: function() {
				alerta.fadeOut();
				alerta.html(''
				+'<div style="height:'+height+'px; width:100%;">'
				+'	<img style="top:'+(height/3)+'px; left:45%; position:relative;"' 
				+'		src="'+base_url+'uploads/others/loader.gif" />'
				+'<div>'); // change submit button text
			},
			success: function(data) {
				alerta.html(data).fadeIn(); // fade in response data
				//$('.pagination li a').href('');
				$(".pagination li a").attr("href", "#")
			},
			error: function(e) {
				console.log(e)
			}
		});
		
	}
	
	$(document).ready(function() {		
		filter('click','none','none','0');
	});
	
	$(".viewers").click(function(){
		$("#viewtype").val($(this).data('typ'));
		filter('click',$("#cur_cat").val(),'none','0');
	});