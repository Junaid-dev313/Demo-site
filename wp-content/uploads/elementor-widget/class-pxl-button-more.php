<?php

class PxlButtonMore_Widget extends Pxltheme_Core_Widget_Base{
    protected $name = 'pxl_button_more';
    protected $title = 'PXL Button More';
    protected $icon = 'eicon-editor-external-link';
    protected $categories = array( 'pxltheme-core' );
    protected $params = '{"sections":[{"name":"source_section","label":"Source Settings","tab":"content","controls":[{"name":"style","label":"Style","type":"select","default":"style-default","options":{"style-default":"Default"}},{"name":"text","label":"Button Text","type":"text","default":"Read More","placeholder":"Read More"},{"name":"button_url_type","label":"Link Type","type":"select","options":{"url":"URL","page":"Existing Page"},"default":"url"},{"name":"link","label":"Link","type":"url","placeholder":"https:\/\/your-link.com","condition":{"button_url_type":"url"},"default":{"url":"#"}},{"name":"page_link","label":"Existing Page","type":"select2","options":{"2988":"Portfolio","1069":"Home","1054":"Contact Me","750":"Pricing Plan"},"condition":{"button_url_type":"page"},"multiple":false,"label_block":true},{"name":"text_color","label":"Color","type":"color","selectors":{"{{WRAPPER}} .pxl-button-more .btn-more":"color: {{VALUE}};"}},{"name":"text_color_hover","label":"Color Hover","type":"color","selectors":{"{{WRAPPER}} .pxl-button-more .btn-more:hover":"color: {{VALUE}};"}}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}