<?php

class PxlTestimonialCarousel_Widget extends Pxltheme_Core_Widget_Base{
    protected $name = 'pxl_testimonial_carousel';
    protected $title = 'PXL Testimonial Carousel';
    protected $icon = 'eicon-blockquote';
    protected $categories = array( 'pxltheme-core' );
    protected $params = '{"sections":[{"name":"layout_section","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Layout","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"http:\/\/personal-portfolio.local\/wp-content\/themes\/ameron\/elements\/assets\/layout-image\/pxl_testimonial_carousel-1.jpg"}},"prefix_class":"pxl-testimonial-carousel-layout-"}]},{"name":"section_list","label":"Content","tab":"content","controls":[{"name":"content_list","label":"Testimonial Items","type":"repeater","default":[],"controls":[{"name":"image","label":"Image","type":"media"},{"name":"title","label":"Name","type":"text","label_block":true},{"name":"position","label":"Position","type":"text"},{"name":"description","label":"Description","type":"textarea","rows":10},{"name":"rating","label":"Rating","type":"select","default":"none","options":{"none":"None","star1":"1 Star","star2":"2 Star","star3":"3 Star","star4":"4 Star","star5":"5 Star"}}],"title_field":"{{{ title }}}"}]},{"name":"carousel_setting","label":"Carousel Settings","tab":"settings","controls":[{"name":"col_xs","label":"Extra Small &lt;= 575","type":"select","default":"1","options":{"12":"12","6":"6","5":"5","4":"4","3":"3","2":"2","1":"1"}},{"name":"col_sm","label":"Small &lt;= 767","type":"select","default":"2","options":{"12":"12","6":"6","5":"5","4":"4","3":"3","2":"2","1":"1"}},{"name":"col_md","label":"Medium &lt;= 991","type":"select","default":"2","options":{"12":"12","6":"6","5":"5","4":"4","3":"3","2":"2","1":"1"}},{"name":"col_lg","label":"Large &lt;= 1199","type":"select","default":"3","options":{"12":"12","6":"6","5":"5","4":"4","3":"3","2":"2","1":"1"}},{"name":"col_xl","label":"XL Devices &gt;= 1200","type":"select","default":"4","options":{"12":"12","6":"6","5":"5","4":"4","3":"3","2":"2","1":"1"}},{"name":"col_xxl","label":"XXL Devices &gt;= 1400","type":"select","default":"4","options":{"12":"12","6":"6","5":"5","4":"4","3":"3","2":"2","1":"1"}},{"name":"slides_to_scroll","label":"Slides to scroll","type":"select","default":"1","options":{"1":"1","2":"2","3":"3","4":"4","5":"5","6":"6"}},{"name":"arrows","label":"Show Arrows","type":"switcher"},{"name":"dots","label":"Show Dots","type":"switcher"},{"name":"dots_color","label":"Dots Color","type":"color","selectors":{"{{WRAPPER}} .pxl-swiper-slider .pxl-swiper-dots .pxl-swiper-pagination-bullet:after":"background-color: {{VALUE}};"},"condition":{"dots":"true"}},{"name":"dots_color_active","label":"Active Color","type":"color","selectors":{"{{WRAPPER}} .pxl-swiper-slider .pxl-swiper-dots .pxl-swiper-pagination-bullet.swiper-pagination-bullet-active:after":"background-color: {{VALUE}};"},"condition":{"dots":"true"}},{"name":"pause_on_hover","label":"Pause on Hover","type":"switcher"},{"name":"autoplay","label":"Autoplay","type":"switcher"},{"name":"autoplay_speed","label":"Autoplay Speed","type":"number","default":5000,"condition":{"autoplay":"true"}},{"name":"infinite","label":"Infinite Loop","type":"switcher"},{"name":"speed","label":"Animation Speed","type":"number","default":400}]},{"name":"style_section","label":"Style","tab":"content","controls":[{"name":"bg_color","label":"Background Color","type":"color","selectors":{"{{WRAPPER}} .pxl-testimonial-carousel .item-inner .item-inner-container .item-box":"background-color: {{VALUE}};"}},{"name":"title_color","label":"Title Color","type":"color","selectors":{"{{WRAPPER}} .pxl-testimonial-carousel .item-inner .item-inner-container .item-title":"color: {{VALUE}} !important;"}},{"name":"position_color","label":"Position Color","type":"color","selectors":{"{{WRAPPER}} .pxl-testimonial-carousel .item-inner .item-inner-container .item-position":"color: {{VALUE}};"}},{"name":"description_color","label":"Description Color","type":"color","selectors":{"{{WRAPPER}} .pxl-testimonial-carousel .item-inner .item-inner-container .item-desc":"color: {{VALUE}};"}},{"name":"border_color","label":"Border Color","type":"color","selectors":{"{{WRAPPER}} .pxl-testimonial-carousel .item-inner .item-inner-container .item-image .img-outer":"border-color: {{VALUE}};"}}]},{"name":"background_overlay","label":"Background Overlay","tab":"content","controls":[{"name":"image_background","label":"Image","type":"media","dynamic":{"active":true},"default":""},{"name":"bg_item_color","label":"Background Color","type":"color","default":"","selectors":{"{{WRAPPER}} .pxl-testimonial-carousel .background":"background-color: {{VALUE}};"}},{"name":"opacity_background","label":"Opacity (%)","type":"slider","control_type":"responsive","size_units":["%"],"default":{"unit":"%"},"range":{"%":{"min":0,"max":100}},"selectors":{"{{WRAPPER}} .pxl-testimonial-carousel .background":"opacity: {{SIZE}}{{UNIT}};"}},{"name":"blend_mode","label":"Blend Mode","type":"select","options":{"":"Normal","multiply":"Multiply","screen":"Screen","overlay":"Overlay","darken":"Darken","lighten":"Lighten","color-dodge":"Color Dodge","saturation":"Saturation","color":"Color","difference":"Difference","exclusion":"Exclusion","hue":"Hue","luminosity":"Luminosity"},"selectors":{"{{WRAPPER}} .pxl-testimonial-carousel .background":"mix-blend-mode: {{VALUE}}"}}]}]}';
    protected $styles = array(  );
    protected $scripts = array( 'swiper','ameron-swiper' );
}