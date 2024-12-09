<?php

class PxlListStyle_Widget extends Pxltheme_Core_Widget_Base{
    protected $name = 'pxl_list_style';
    protected $title = 'PXL Lists Style';
    protected $icon = 'eicon-editor-list-ul';
    protected $categories = array( 'pxltheme-core' );
    protected $params = '{"sections":[{"name":"section_list","label":"Content","tab":"content","controls":[{"name":"style","label":"Style","type":"select","options":{"style1":"Style 1","style2":"Style 2","style3":"Style 3"},"default":"style1"},{"name":"selected_icon","label":"Icon","type":"icons","fa4compatibility":"icon"},{"name":"list","label":"List","type":"repeater","controls":[{"name":"content","label":"Content","type":"textarea","label_block":true}],"title_field":"{{{ content }}}"}]},{"name":"style_section","label":"Style","tab":"content","controls":[{"name":"icon_color","label":"Icon Color","type":"color","selectors":{"{{WRAPPER}} .pxl-list-style .list-icon":"color: {{VALUE}};"}},{"name":"icon_fontsize","label":"Icon Font Size (px)","type":"number","selectors":{"{{WRAPPER}} .pxl-list-style .list-icon":"font-size: {{VALUE}}px;"}},{"name":"content_color","label":"Content Color","type":"color","selectors":{"{{WRAPPER}} .pxl-list-style .list-content":"color: {{VALUE}};"}},{"name":"content_typography","label":"Content Typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .pxl-list-style .list-content"},{"name":"item_spacing","label":"Item Space (px)","type":"slider","control_type":"responsive","size_units":["px"],"range":{"px":{"min":0,"max":3000}},"selectors":{"{{WRAPPER}} .pxl-list-style .list-item + .list-item":"margin-top: {{SIZE}}{{UNIT}};"}},{"name":"item_animation","label":"Item Motion Effect","type":"animation","condition":[]},{"name":"item_animation_duration","label":"Item Animation Duration","type":"select","default":"normal","options":{"slow":"Slow","normal":"Normal","fast":"Fast"},"condition":{"item_animation!":""}},{"name":"item_animation_delay","label":"Item Animation Delay","type":"number","min":0,"step":100,"condition":{"item_animation!":""}}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}