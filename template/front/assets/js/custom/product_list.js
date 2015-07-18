
    function toggle_subs(cat){
        $("#subs_"+cat).toggle('fast');
    }
    
    function sub_clear(){
        $(".check_sub_category").each(function(){
             this.checked = false;
        });
    }
    
    
    $('.check_category').on('click', function(){
        var category_set = [];
        $(".check_category:checked").each(function(){
             if(this.checked == true){
                category_set.push(this.value);
             }
        });
        var category = category_set.toString();
        avs(category,'','');
    });
    
    function avs(category,start,end,now){
        var list2 = $('#range');
        $.ajax({
            url: base_url+'index.php/home/others/get_range_by_cat/'+category+'/'+start+'/'+end,
            beforeSend: function() {
                list2.html('...');
            },
            success: function(data) {
                list2.html(data);
                if(now == 'first'){
                    filter('click',cur_category,cur_sub_category,'0');
                } else {
                    filter('click','none','none','0');
                }
            },
            error: function(e) {
                console.log(e)
            }
        });
    }
    
    function filter(set,cat,subcat,page){
        var category_set = [];
        var sub_category_set = [];
        var height = $( window ).height();
        
        $(".check_category:checked").each(function(){
             if(this.checked == true){
                category_set.push(this.value);
             }
        });
        $(".check_category").each(function(){
            if(this.checked == false){
                $("#subs_"+this.value+" li input:radio").removeAttr("checked");
                $("#subs_"+this.value).hide('fast');
             }
        });
        
        $(".check_sub_category:checked").each(function(){
             if(this.checked == true){
                sub_category_set.push(this.value);
             }
        });
        
        
        var category = category_set.toString();
        var featured = '';
        var sub_category = sub_category_set.toString();
        var type = $("#viewtype").val();
        var fload = $("#fload").val();
        if(cat !== 'none'){
            category = cat;
        }
        if(subcat !== 'none'){
            sub_category = subcat;
        }
        var alert = $('#list'); // alert div for show alert message
        
        var range = $('#rangelvl').val();
		var form = $('#plistform');
		$('#categoryaa').val(category);
		$('#sub_categoryaa').val(sub_category);
		$('#featuredaa').val(featured);
		$('#rangeaa').val(range);
		
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
				alert.fadeOut();
                alert.html(''
                +'<div style="height:'+height+'px; width:100%;">'
                +'  <img style="top:'+(height/3)+'px; left:45%; position:relative;"' 
                +'      src="'+base_url+'uploads/others/loader.gif" />'
                +'<div>').fadeIn(); // change submit button text
            },
            success: function(data) {
				setTimeout(function(){
                	alert.html(data); // fade in response data
				}, 20);
				setTimeout(function(){
                	alert.fadeIn(); // fade in response data
				}, 30);
				if(fload == 'done'){
					history.pushState('data', '', base_url+'index.php/home/category/'+category);
				}
				$("#fload").val('done');
                $(".pagination li a").attr("href", "#")
            },
            error: function(e) {
                console.log(e)
            }
        });
        
    }
    
                
    $(document).ready(function() {
        
        $(".check_category").each(function(){
            if(this.value == cur_category){
                $(this).attr("checked",true);
                $("#subs_"+this.value).show('fast');
             }
        });
        
        $(".check_sub_category").each(function(){
            if(this.value == cur_sub_category){
                $(this).attr("checked",true);
             }
        });
        
        var a = range;
        a = a.split(';');
        avs(cur_category,a[0],a[1],'first');
    });

    $(".viewers").click(function(){
        $("#viewtype").val($(this).data('typ'));
        filter('click','none','none','0');
    });