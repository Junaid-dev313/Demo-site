<?php 
	$dashboard_page_url = admin_url( 'admin.php?page=pxlart' );
	if( isset( $_GET['page'] ) && 'pxlart' === sanitize_text_field($_GET['page']) ) {
		$dashboard_page_url = '';
	}
	$plugin_page_url = admin_url( 'admin.php?page=pxlart-plugins' );
	$import_demos_page_url = admin_url( 'admin.php?page=pxlart-import-demos' );

	$pxl_server_info = apply_filters( 'pxl_server_info', 
		[
			'video_url' => '',
			'demo_url' => '',
			'docs_url' => '',
			'support_url' => '']
		) ; 
?>
<nav class="pxl-dsb-menubar">
	<?php 
	$favicon = ameron()->get_theme_opt( 'favicon' );
	$logo_url = !empty($favicon['url']) ? $favicon['url'] : get_template_directory_uri() . '/inc/admin/assets/img/logo.png'; ?>
	<div class="pxl-dsb-logo">
		<div class="pxl-dsb-logo-inner">
			<img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr( ameron()->get_name() ); ?>">
		</div>
		<div class="pxl-dsb-logo-title">
			<h2><?php esc_html_e( 'Welcome to', 'ameron' ); ?> <?php echo esc_attr( ameron()->get_name() ).'!'; ?></h2>
			<span class="pxl-v"><?php esc_html_e( 'Version', 'ameron' ); ?> <?php echo esc_html(ameron()->get_version()) ?></span>
		</div>
	</div>
	<div class="pxl-dsb-menu">
		<ul class="pxl-dsb-menu-left">
			<li class="<?php echo ( isset( $_GET['page'] ) && 'pxlart' === sanitize_text_field($_GET['page']) ) ? 'is-active' : ''; ?>">
				<a href="<?php echo esc_attr($dashboard_page_url); ?>">
					<span><?php echo sprintf( esc_html__( '%s Dashboard', 'ameron' ), ameron()->get_name()); ?></span>
				</a>
			</li>
			<li class="<?php echo ( isset( $_GET['page'] ) && 'pxlart-plugins' === sanitize_text_field($_GET['page']) ) ? 'is-active' : ''; ?>">
				<a href="<?php echo esc_url($plugin_page_url); ?>">
					<span><?php esc_html_e( 'Install Plugins', 'ameron' ); ?></span>
				</a>
			</li>
			<li class="<?php echo ( isset( $_GET['page'] ) && 'pxlart-import-demos' === sanitize_text_field($_GET['page']) ) ? 'is-active' : ''; ?>">
				<a href="<?php echo esc_url($import_demos_page_url); ?>">
					<span><?php esc_html_e( 'Import Demo', 'ameron' ); ?></span>
				</a>
			</li>
		</ul>
		<ul class="pxl-dsb-menu-right">
			<li>
				<a href="<?php echo esc_url($pxl_server_info['video_url']) ?>" target="_blank">
					<span><?php esc_html_e( 'Videos tutorial', 'ameron' ); ?></span>
				</a>
			</li>
			<li>
				<a href="<?php echo esc_url($pxl_server_info['support_url']) ?>" target="_blank">
					<span><?php esc_html_e( 'Support system', 'ameron' ); ?></span>
				</a>
			</li>
			<li>
				<a href="<?php echo esc_url($pxl_server_info['demo_url']) ?>" target="_blank">
					<span><?php esc_html_e( 'Live Demo', 'ameron' ); ?></span>
				</a>
			</li>
			 
			<li>
				<a href="<?php echo esc_url($pxl_server_info['docs_url']) ?>" target="_blank">
					<i class="pxl-icn-ess icon-md-help-circle"></i>
					<span><?php esc_html_e( 'Documentations', 'ameron' ); ?></span>
				</a>
			</li>
		</ul>
	</div>
</nav> 
