<?php

class PxlVideoSlider_Widget extends Pxltheme_Core_Widget_Base{
    protected $name = 'pxl_video_slider';
    protected $title = 'PXL Video Slider';
    protected $icon = 'eicon-slider-video';
    protected $categories = array( 'pxltheme-core' );
    protected $params = '{"sections":[{"name":"layout_section","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"http:\/\/localhost:8888\/fastone\/wp-content\/themes\/fastone\/elements\/assets\/layout-image\/pxl_video_slider-1.jpg"}}}]},{"name":"clients_list","label":"Clients","tab":"content","controls":[{"name":"clients","label":"Add Client","type":"repeater","controls":[{"name":"client_img","label":"Client Image","type":"media","label_block":true},{"name":"name","label":"Client Name","type":"text","label_block":true},{"name":"position","label":"Position","type":"text","label_block":true},{"name":"video_link","label":"Video Link","type":"url","placeholder":"https:\/\/your-link.com","default":{"url":"#","is_external":"on"}},{"name":"video_text","label":"Position","type":"text","label_block":true,"default":"What Video"}],"default":[],"title_field":"{{{ name }}}"}]},{"name":"carousel_setting","label":"Carousel Settings","tab":"settings","controls":[{"name":"col_xs","label":"Extra Small &lt;= 575","type":"select","default":"1","options":{"12":"12","6":"6","5":"5","4":"4","3":"3","2":"2","1":"1"}},{"name":"col_sm","label":"Small &lt;= 767","type":"select","default":"2","options":{"12":"12","6":"6","5":"5","4":"4","3":"3","2":"2","1":"1"}},{"name":"col_md","label":"Medium &lt;= 991","type":"select","default":"2","options":{"12":"12","6":"6","5":"5","4":"4","3":"3","2":"2","1":"1"}},{"name":"col_lg","label":"Large &lt;= 1199","type":"select","default":"3","options":{"12":"12","6":"6","5":"5","4":"4","3":"3","2":"2","1":"1"}},{"name":"col_xl","label":"XL Devices &gt;= 1200","type":"select","default":"4","options":{"12":"12","6":"6","5":"5","4":"4","3":"3","2":"2","1":"1"}},{"name":"col_xxl","label":"XXL Devices &gt;= 1400","type":"select","default":"4","options":{"12":"12","6":"6","5":"5","4":"4","3":"3","2":"2","1":"1"}},{"name":"slides_to_scroll","label":"Slides to scroll","type":"select","default":"1","options":{"1":"1","2":"2","3":"3","4":"4","5":"5","6":"6"}},{"name":"arrows","label":"Show Arrows","type":"switcher"},{"name":"dots","label":"Show Dots","type":"switcher"},{"name":"pause_on_hover","label":"Pause on Hover","type":"switcher"},{"name":"autoplay","label":"Autoplay","type":"switcher"},{"name":"autoplay_speed","label":"Autoplay Speed","type":"number","default":5000,"condition":{"autoplay":"true"}},{"name":"infinite","label":"Infinite Loop","type":"switcher"},{"name":"speed","label":"Animation Speed","type":"number","default":400}]}]}';
    protected $styles = array(  );
    protected $scripts = array( 'swiper','fastone-swiper' );
}