<?php
	$dev_mode = apply_filters( 'pxl_set_dev_mode', (defined('DEV_MODE') && DEV_MODE)) ; 
	 
	$license = trim( get_option( ameron()->get_slug() . '_purchase_code' ) );

	$active = get_option( ameron()->get_slug() . '_purchase_code_status', false ) === 'valid';
	if( $dev_mode === true) $active = true;

	$register = new Ameron_Register;
  
?>
<?php if ($active): ?> 
	<div class="pxl-dsb-box-head"> 
		<div class="pxl-dsb-confirmation success">
			<h6><?php echo esc_html__( 'Thanks for the verification!', 'ameron' ) ?></h6>
			<p><?php echo esc_html__( 'You can now enjoy and build great websites.', 'ameron' ) ?></p>
		</div> 

		<div class="pxl-dsb-deactive">
			<form method="POST" action="<?php echo admin_url( 'admin.php?page=pxlart' )?>">
				<input type="hidden" name="action" value="removekey"/>
				<button class="btn button" type="submit"><?php esc_html_e( 'Remove Purchase Code', 'ameron' ) ?></button>
			</form>
		</div> 
	</div> 
<?php else: ?>
	<?php $register->messages(); ?>
	  
<?php endif; ?>
 