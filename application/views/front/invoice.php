<!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="text-center"><?php echo translate('invoice_paper');?></h1>
        </div><!--/container-->
    </div><!--/breadcrumbs-->
    <!--=== End Breadcrumbs ===-->

    <!--=== Content Part ===-->
    <div class="container content invoice_div box-border margin-top-20 margin-bottom-20">
    <?php
        $sale_details = $this->db->get_where('sale',array('sale_id'=>$sale_id))->result_array();
        foreach($sale_details as $row){
    ?>
        <!--Invoice Header-->
        <div class="row invoice-header">
            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6">
                <img src="<?php echo $this->crud_model->logo('home_top_logo'); ?>" alt="" width="60%">
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6 invoice-numb">
            	<ul class="list-unstyled">
                    <li><strong><?php echo translate('invoice_no');?></strong> : <?php echo $row['sale_code']; ?> </li>
                    <li><strong><?php echo translate('date');?></strong> : <?php echo date('d M, Y',$row['sale_datetime'] );?></li>
                </ul>
            </div>
        </div>
        <!--End Invoice Header-->

        <!--Invoice Detials-->
        <div class="row invoice-info">
            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6">
                <div class="tag-box tag-box-v3">
                    <?php
                        $info = json_decode($row['shipping_address'],true);
                    ?>
                    <h2><?php echo translate('client_information:');?></h2>
                    <ul class="list-unstyled">
                        <li><strong><?php echo translate('first_name:');?></strong> <?php echo $info['firstname']; ?></li>
                        <li><strong><?php echo translate('last_name:');?></strong> <?php echo $info['lastname']; ?></li>
                        <li><strong><?php echo translate('city_:');?></strong> <?php echo $info['city']; ?></li>
                    </ul>
                </div>        
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6">
                <div class="tag-box tag-box-v3">
                    <h2><?php echo translate('peyment_details_:');?></h2>  
                    <ul class="list-unstyled">       
                        <li><strong><?php echo translate('payment_status_:');?></strong> <i><?php echo ucfirst($row['payment_status']); ?></i></li>
                        <li><strong><?php echo translate('payment_method_:');?></strong> <?php echo ucfirst(str_replace('_', ' ', $info['payment_type'])); ?></li>  
                    </ul>
                </div>
            </div>
        </div>
        <!--End Invoice Detials-->

        <!--Invoice Table-->
        <div class="panel panel-purple margin-bottom-40">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo translate('payment_invoice');?></h3>
            </div>
            <table class="table table-striped invoice-table">
                <thead>
                    <tr>
                        <th><?php echo translate('no');?></th>
                        <th><?php echo translate('item');?></th>
                        <th><?php echo translate('quantity');?></th>
                        <th><?php echo translate('unit_cost');?></th>
                        <th><?php echo translate('total');?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $product_details = json_decode($row['product_details'], true);
                        $i =0;
                        $total = 0;
                        foreach ($product_details as $row1) {
                            $i++;
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row1['name']; ?></td>
                            <td><?php echo $row1['qty']; ?></td>
                            <td style="text-align:center;"><?php echo currency().$this->cart->format_number($row1['price']); ?></td>
                            <td style="text-align:right;"><?php echo currency().$this->cart->format_number($row1['subtotal']); $total += $row1['subtotal']; ?></td>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <!--End Invoice Table-->
        <!--Invoice Footer-->
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6">
                <div class="tag-box tag-box-v6">
                    <h2><?php echo translate('address');?></h2>
                    <address>
                        <?php echo $info['address1']; ?> <br>
                        <?php echo $info['address2']; ?> <br>
                        <?php echo translate('city');?> : <?php echo $info['city']; ?> <br>
                        <?php echo translate('zip');?> : <?php echo $info['zip']; ?> <br>
                        <?php echo translate('phone');?> : <?php echo $info['phone']; ?> <br>
                        <?php echo translate('e-mail');?> : <a href=""><?php echo $info['email']; ?></a>
                    </address>
                </div>            
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6">
            	<div class="tag-box tag-box-v6" style="padding:0px 15px !important;">
                 	 <table class="table">
                     	<tr>
                        	<td><?php echo translate('sub_total_amount');?> :</td>
                        	<td><?php echo currency().$this->cart->format_number($total);?></td>
                        </tr>
                        <tr>
                        	<td><?php echo translate('tax');?> :</td>
                            <td><?php echo currency().$this->cart->format_number($row['vat']);?></td>
                        </tr>
                        <tr>
                        	<td><?php echo translate('shipping');?> :</td>
                            <td><?php echo currency().$this->cart->format_number($row['shipping']);?></td>
                        </tr>
                        <tr>
                        	<td><?php echo translate('grand_total');?> :</td>
                            <td><?php echo currency().$this->cart->format_number($row['grand_total']);?></td>
                        </tr>
                     </table>
               </div>
               
                <button class="btn-u btn-u-cust push pull-right margin-bottom-10" onclick="javascript:window.print();">
                	<i class="fa fa-print"></i> <?php echo translate('print');?>
                </button>
            </div>
        </div>
        <div class="row" style="height:300px;" id="mapa"></div>
        <!--End Invoice Footer-->
        <style type="text/css">
            @media print {
                .push{
                    display: none;
                }
                .topbar-v3{
                    display: none;
                }
                .breadcrumbs{
                    display: none;
                }
                .footer-v2{
                    display: none;
                }
                .invoice_div{
                    display: block;
                }
            }
        </style>
        <?php
            $position = explode(',',str_replace('(', '', str_replace(')', '',$info['langlat'])));
        ?>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
        <script>
            
            var map;
            function initialize() {
              var mapOptions = {
                zoom: 16,
                center: {lat: <?php echo $position[0]; ?>, lng: <?php echo $position[1]; ?>}
              };
              map = new google.maps.Map(document.getElementById('mapa'),
                  mapOptions);

              var marker = new google.maps.Marker({
                position: {lat: <?php echo $position[0]; ?>, lng: <?php echo $position[1]; ?>},
                map: map
              });

              var infowindow = new google.maps.InfoWindow({
                content: '<p>Marker Location:</p><p><?php echo $info['address1']; ?> </p><p><?php echo $info['address2']; ?> </p><p>City: <?php echo $info['city']; ?> </p><p>ZIP: <?php echo $info['zip']; ?> </p>'
              });
              google.maps.event.addListener(marker, 'click', function() {
                infowindow.open(map, marker);
              });
            }
            google.maps.event.addDomListener(window, 'load', initialize);

        </script>
    <?php } ?>
    </div><!--/container-->     
    <!--=== End Content Part ===-->