<?php

class PxlHistory_Widget extends Pxltheme_Core_Widget_Base{
    protected $name = 'pxl_history';
    protected $title = 'PXL History';
    protected $icon = 'eicon-history';
    protected $categories = array( 'pxltheme-core' );
    protected $params = '{"sections":[{"name":"layout_section","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Layout","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"http:\/\/localhost:8888\/fastone\/wp-content\/themes\/fastone\/elements\/assets\/layout-image\/pxl_history-1.jpg"}}}]},{"name":"source_section","label":"Source Settings","tab":"content","controls":[{"name":"history_year","label":"Year","type":"text","default":"1988"},{"name":"history_title","label":"History Title","type":"textarea","rows":2,"default":"Birth Of Company"},{"name":"history_items","label":"History Items","type":"repeater","controls":[{"name":"content_template","label":"Select Templates","description":"Please create your layout before choosing. <a href=\"http:\/\/localhost:8888\/fastone\/wp-admin\/edit.php?post_type=pxl-template\">Click Here<\/a>","type":"select","default":"","options":["None"]}]}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}