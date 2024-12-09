<?php

class PxlBreadcrumb_Widget extends Pxltheme_Core_Widget_Base{
    protected $name = 'pxl_breadcrumb';
    protected $title = 'PXL Breadcrumb';
    protected $icon = 'eicon-navigation-horizontal';
    protected $categories = array( 'pxltheme-core' );
    protected $params = '{"sections":[{"name":"content_section","label":"Style","tab":"style","controls":[{"name":"text_align","label":"Alignment","type":"choose","control_type":"responsive","options":{"start":{"title":"Start","icon":"eicon-text-align-left"},"center":{"title":"Center","icon":"eicon-text-align-center"},"end":{"title":"End","icon":"eicon-text-align-right"}},"selectors":{"{{WRAPPER}} .pxl-breadcrumb":"justify-content: {{VALUE}};"}},{"name":"brc_color","label":"Text Color","type":"color","selectors":{"{{WRAPPER}} .pxl-breadcrumb .br-item":"color: {{VALUE}};"}},{"name":"link_color","label":"Link Color","type":"color","selectors":{"{{WRAPPER}} .pxl-breadcrumb .br-item a":"color: {{VALUE}};"}},{"name":"link_color_hover","label":"Link Color Hover","type":"color","selectors":{"{{WRAPPER}} .pxl-breadcrumb .br-item a:hover":"color: {{VALUE}};"}},{"name":"icon_color","label":"Icon Color","type":"color","selectors":{"{{WRAPPER}} .pxl-breadcrumb i":"color: {{VALUE}};"}},{"name":"brc_typography","label":"Typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .pxl-breadcrumb .br-item a, {{WRAPPER}} .pxl-breadcrumb .br-item .br-text, {{WRAPPER}} .pxl-breadcrumb .br-item, {{WRAPPER}} .pxl-breadcrumb .br-item .br-divider"}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}