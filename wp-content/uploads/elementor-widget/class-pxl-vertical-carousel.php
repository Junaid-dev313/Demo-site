<?php

class PxlVerticalCarousel_Widget extends Pxltheme_Core_Widget_Base{
    protected $name = 'pxl_vertical_carousel';
    protected $title = 'PXL Vertical Carousel';
    protected $icon = 'eicon-posts-carousel';
    protected $categories = array( 'pxltheme-core' );
    protected $params = '{"sections":[{"name":"layout_section","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"http:\/\/localhost:8888\/fastone\/wp-content\/themes\/fastone\/elements\/assets\/layout-image\/pxl_vertical_carousel-1.jpg"}}}]},{"name":"section_list","label":"Content","tab":"content","controls":[{"name":"content_list","label":"vertical List","type":"repeater","controls":[{"name":"image","label":"Image","type":"media"},{"name":"title","label":"Title","type":"text","label_block":true},{"name":"position","label":"Position","type":"text","label_block":true},{"name":"description","label":"Description","type":"textarea","rows":4},{"name":"phone","label":"Phone","type":"text","label_block":true},{"name":"link","label":"Link","type":"url","label_block":true},{"name":"social","label":"Social","type":"pxl_icons"}],"title_field":"{{{ title }}}"}]},{"name":"style_section","label":"Style","tab":"content","controls":[{"name":"title_color","label":"Title Color","type":"color","selectors":{"{{WRAPPER}} .pxl-vertical .item-title":"color: {{VALUE}};"}},{"name":"title_typography","label":"Title Typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .pxl-vertical .item-title"},{"name":"position_color","label":"Position Color","type":"color","selectors":{"{{WRAPPER}} .pxl-vertical .item-position":"color: {{VALUE}};"}},{"name":"position_typography","label":"Position Typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .pxl-vertical .item-position"}]},{"name":"section_carousel_settings","label":"Carousel Settings","tab":"settings","controls":[{"name":"img_size","label":"Image Size","type":"text","description":"Enter image size (Example: &quot;thumbnail&quot;, &quot;medium&quot;, &quot;large&quot;, &quot;full&quot; or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height))."},{"name":"space_between","label":"Space Between","description":"Distance between slides in px","type":"number","default":30},{"name":"col_xs","label":"Extra Small &lt;= 575","type":"select","default":"1","options":{"12":"12","6":"6","5":"5","4":"4","3":"3","2":"2","1":"1"}},{"name":"col_sm","label":"Small &lt;= 767","type":"select","default":"2","options":{"12":"12","6":"6","5":"5","4":"4","3":"3","2":"2","1":"1"}},{"name":"col_md","label":"Medium &lt;= 991","type":"select","default":"2","options":{"12":"12","6":"6","5":"5","4":"4","3":"3","2":"2","1":"1"}},{"name":"col_lg","label":"Large &lt;= 1199","type":"select","default":"3","options":{"12":"12","6":"6","5":"5","4":"4","3":"3","2":"2","1":"1"}},{"name":"col_xl","label":"XL Devices &gt;= 1200","type":"select","default":"4","options":{"12":"12","6":"6","5":"5","4":"4","3":"3","2":"2","1":"1"}},{"name":"col_xxl","label":"XXL Devices &gt;= 1400","type":"select","default":"4","options":{"12":"12","6":"6","5":"5","4":"4","3":"3","2":"2","1":"1"}},{"name":"slides_to_scroll","label":"Slides to scroll","type":"select","default":"1","options":{"1":"1","2":"2","3":"3","4":"4","5":"5","6":"6"}},{"name":"arrows","label":"Show Arrows","type":"switcher"},{"name":"dots","label":"Show Dots","type":"switcher"},{"name":"pause_on_hover","label":"Pause on Hover","type":"switcher"},{"name":"autoplay","label":"Autoplay","type":"switcher"},{"name":"autoplay_speed","label":"Autoplay Speed","type":"number","default":5000,"condition":{"autoplay":"true"}},{"name":"infinite","label":"Infinite Loop","type":"switcher"},{"name":"speed","label":"Animation Speed","type":"number","default":400}]}]}';
    protected $styles = array(  );
    protected $scripts = array( 'swiper','fastone-swiper-vertical' );
}