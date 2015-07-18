<div class="modal-dialog" style="margin-top:100px !important;">
    <div class="modal-content">
        <div class="modal-header">
            <button aria-hidden="true" data-dismiss="modal" id="close_log_modal" class="close" type="button">×</button>
            <br>
        </div>
        <div class="modal-body">
            <div class='login_html'>
				<?php
                    echo form_open(base_url() . 'index.php/home/login/do_login/', array(
                        'class' => 'log-reg-v3 sky-form',
                        'method' => 'post',
                        'style' => 'padding:30px 10px !important;',
                        'id' => 'login_form'
                    ));
					$fb_login_set = $this->crud_model->get_type_name_by_id('general_settings','51','value');
					$g_login_set = $this->crud_model->get_type_name_by_id('general_settings','52','value');
                ?>
                	<div class="reg-block-header">
                    <h2><?php echo translate('sign_in');?></h2>
            		<p style="font-weight:300 !important;"><?php echo translate('do_not_have_account_?_click_');?><span class="color-purple" style="cursor:pointer" data-dismiss="modal" onclick="register()" ><?php echo translate('sign_up');?></span> <?php echo translate('to_registration_.');?></p> 
                    </div>
                    <section>
                        <label class="input login-input">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="email" placeholder="<?php echo translate('email_address'); ?>" name="email" class="form-control">
                            </div>
                        </label>
                    </section>        
                    <section>
                        <label class="input login-input no-border-top">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="password" placeholder="<?php echo translate('password'); ?>" name="password" class="form-control">
                            </div>    
                        </label>
                    </section>
                    <div class="row margin-bottom-5">
                        <div class="col-xs-8">
                            <span style="cursor:pointer;" onClick="set_html('login_html','forget_html')">
                            	<?php echo translate('forget_your_password_?');?>
                            </span>
                        </div>
                        <div class="col-xs-4 text-right">
                            
                            <span class="btn-u btn-u-cust btn-block margin-bottom-20 btn-labeled fa fa-tag login_btn" type="submit">
                            	<?php echo translate('log_in');?>
                            </span>
                        </div>
                    </div>
                    
            		<?php if($fb_login_set == 'ok' || $g_login_set == 'ok'){ ?>
                    <div class="border-wings">
                        <span>or</span>
                    </div>
                    
                    <div class="row columns-space-removes">
                    <?php if($fb_login_set == 'ok'){ ?>
                        <div class="col-lg-6 <?php if($g_login_set !== 'ok'){ ?>mr_log<?php } ?> margin-bottom-10">
                        <?php if (@$user): ?>
                            <a href="<?= $url ?>" >
                                <div class="fb-icon-bg"></div>
                                    <div class="fb-bg"></div>
                            </a>
                        <?php else: ?>
                            <a href="<?= $url ?>" >
                                <div class="fb-icon-bg"></div>
                                    <div class="fb-bg"></div>
                            </a>
                        <?php endif; ?>
                        </div>
                   		<?php } if($g_login_set == 'ok'){ ?>     
                        <div class="col-lg-6 <?php if($fb_login_set !== 'ok'){ ?>mr_log<?php } ?>">
                        <?php if (@$g_user): ?>
                            <a href="<?= $g_url ?>" >
                                <div class="g-icon-bg"></div>
                                    <div class="g-bg"></div>
                            </a>							
                        <?php else: ?>
                            <a href="<?= $g_url ?>">
                                <div class="g-icon-bg"></div>
                                    <div class="g-bg"></div>
                            </a>
                        <?php endif; ?>
                        </div>
                    	<?php } ?>
                    </div>
                    <?php } ?>
                </form> 
            </div>
            
            <div class='forget_html' style="display:none;">
				<?php
                    echo form_open(base_url() . 'index.php/home/login/forget/', array(
                        'class' => 'log-reg-v3 sky-form',
                        'method' => 'post',
                        'style' => 'padding:30px !important;',
                        'id' => 'forget_form'
                    ));
                ?>    
                    <h2><?php echo translate('forgot_password');?></h2>
            
                    <section>
                        <label class="input login-input">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="email" placeholder="<?php echo translate('email_address'); ?>" name="email" class="form-control">
                            </div>
                        </label>
                    </section>  
                    <div class="row margin-bottom-5">
                        <div class="col-xs-8">
                            <span style="cursor:pointer;" onClick="set_html('forget_html','login_html')">
                            	<?php echo translate('login');?>
                            </span>
                        </div>
                        <div class="col-xs-4 text-right">
                            <span class="btn-u btn-u-cust btn-block margin-bottom-20 forget_btn" type="submit">
                            	<?php echo translate('submit');?>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <button data-dismiss="modal" class="btn-u btn-u-default" type="button" id="clsreg" ><?php echo translate('close');?></button>
        </div>
    </div>
</div>

<script>
	function set_html(hide,show){
		$('.'+show).show('fast');
		$('.'+hide).hide('fast');
	}
</script>