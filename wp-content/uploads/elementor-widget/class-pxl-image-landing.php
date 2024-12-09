<?php

class PxlImageLanding_Widget extends Pxltheme_Core_Widget_Base{
    protected $name = 'pxl_image_landing';
    protected $title = 'PXL Image Landing';
    protected $icon = 'eicon-image';
    protected $categories = array( 'pxltheme-core' );
    protected $params = '{"sections":[{"name":"layout_section","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Layout","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"http:\/\/personal-portfolio.local\/wp-content\/themes\/ameron\/elements\/assets\/layout-image\/pxl_image_landing-1.jpg"}}}]},{"name":"content_section","label":"Content","tab":"content","controls":[{"name":"selected_image","label":"Image","type":"media"},{"name":"title_text","label":"Title Text","type":"text","default":"Homepage"},{"name":"link_type","label":"Link Type","type":"select","options":{"url":"URL","page":"Existing Page"},"default":"url"},{"name":"link","label":"Link","type":"url","placeholder":"https:\/\/your-link.com","condition":{"link_type":"url"},"default":{"url":"#"}},{"name":"page_link","label":"Existing Page","type":"select2","options":{"2988":"Portfolio","1069":"Home","1054":"Contact Me","750":"Pricing Plan"},"condition":{"link_type":"page"},"multiple":false,"label_block":true}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}