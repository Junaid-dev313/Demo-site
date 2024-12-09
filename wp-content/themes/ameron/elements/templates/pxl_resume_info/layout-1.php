<?php 
$default_settings = [
    'resume_infos' => []
];
$settings = array_merge($default_settings, $settings);
extract($settings);


?>
<?php if(isset($resume_infos) && !empty($resume_infos) && count($resume_infos)): ?>
	<div class="pxl-resume-info">
		<?php if(!empty($heading_title)): ?>
		<div class="pi-heading <?php echo esc_html($settings['active_heading']) ?>"><?php echo esc_html($heading_title) ?></div>
		<?php endif; ?>
		<div class="pi-content">
			<ul class="list-style-none">
			<?php foreach ($resume_infos as $key => $value): ?>
				<li><span class="pi-lbl"><?php echo esc_html($value['item_label']) ?></span><span class="pi-value <?php echo esc_html($value['active_dot']) ?>"><?php echo esc_html($value['item_value']) ?></span></li>
			<?php endforeach; ?>
			</ul>
		</div>
	</div>
<?php endif; ?>

