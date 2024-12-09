<?php

class PxlSearchForm_Widget extends Pxltheme_Core_Widget_Base{
    protected $name = 'pxl_search_form';
    protected $title = 'Pxl Search Form';
    protected $icon = 'eicon-site-search';
    protected $categories = array( 'pxltheme-core' );
    protected $params = '{"sections":[{"name":"layout_section","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"http:\/\/personal-portfolio.local\/wp-content\/themes\/ameron\/elements\/assets\/layout-image\/pxl_search_form-1.jpg"}},"prefix_class":"pxl-search-form-layout-"},{"name":"search_type","label":"Search Type","type":"select","options":{"1":"Default","2":"Product"},"default":"1"}]},{"name":"text_section","label":"Setting","tab":"content","controls":[{"name":"placeholder","label":"Placeholder text","type":"text","label_block":true,"default":"Enter Keywords..."},{"name":"search_text_width","label":"Search text width","type":"slider","control_type":"responsive","size_units":["px","%"],"default":{"unit":"%"},"range":{"px":{"min":100,"max":1200},"%":{"min":5,"max":100}},"selectors":{"{{WRAPPER}} .pxl-search-form":"width: {{SIZE}}{{UNIT}}"}},{"name":"border_width","label":"Border Width","type":"dimensions","selectors":{"{{WRAPPER}} .pxl-search-wrap .pxl-search-field":"border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;"}},{"name":"border_color","label":"Border Color","type":"color","default":"","selectors":{"{{WRAPPER}} .pxl-search-wrap .pxl-search-field":"border-color: {{VALUE}} !important;"}},{"name":"align","label":"Alignment","type":"choose","control_type":"responsive","default":"","options":{"left":{"title":"Left","icon":"eicon-text-align-left"},"center":{"title":"Center","icon":"eicon-text-align-center"},"right":{"title":"Right","icon":"eicon-text-align-right"}},"selectors":{"{{WRAPPER}} .pxl-search-wrap":"text-align: {{VALUE}}; justify-content: {{VALUE}};"}}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}