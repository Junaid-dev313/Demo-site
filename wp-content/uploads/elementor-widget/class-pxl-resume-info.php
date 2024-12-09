<?php

class PxlResumeInfo_Widget extends Pxltheme_Core_Widget_Base{
    protected $name = 'pxl_resume_info';
    protected $title = 'PXL Resume Info';
    protected $icon = 'eicon-info-circle-o';
    protected $categories = array( 'pxltheme-core' );
    protected $params = '{"sections":[{"name":"content_section","label":"Content Settings","tab":"content","controls":[{"name":"heading_title","label":"Heading Title","type":"text","placeholder":"Enter heading title","default":"UI\/UX Designer","label_block":true},{"name":"active_heading","label":"Active Heading Title","type":"select","options":{"active":"Active","deactive":"Deactive"},"default":"active"},{"name":"resume_infos","label":"Resume Information Lists","type":"repeater","controls":[{"name":"item_label","label":"Item Label","type":"text","placeholder":"Enter item label","default":"Name:","label_block":true},{"name":"item_value","label":"Item Value","type":"text","placeholder":"Enter item value","default":"ABC","label_block":true},{"name":"active_dot","label":"Active Dot","type":"select","options":{"active":"Active","deactive":"Deactive"},"default":"deactive"}],"default":[{"item_label":"AGE :","item_value":"28"},{"item_label":"PHONE :","item_value":"+12 986 987 7867"},{"item_label":"EMAIL :","item_value":"youremail@gmail.com"},{"item_label":"ADRESS :","item_value":"37, Pollsatnd, New York, United State"},{"item_label":"Freelancer :","item_value":"AVAILABLE"}]}]},{"name":"pi_style","label":"Style","tab":"style","controls":[{"name":"heading_color","label":"Heading Color","type":"color","selectors":{"{{WRAPPER}} .pi-heading":"color: {{VALUE}};"},"condition":{"active_heading":"active"}},{"name":"content_color","label":"Content Color","type":"color","selectors":{"{{WRAPPER}} .pi-content .pi-value":"color: {{VALUE}};"}},{"name":"lbl_color","label":"Label Color","type":"color","selectors":{"{{WRAPPER}} .pi-lbl":"color: {{VALUE}};"}},{"name":"lbl_typo","label":"Label Typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .pi-lbl"},{"name":"item_animation","label":"Item Motion Effect","type":"animation","condition":[]},{"name":"item_animation_duration","label":"Item Animation Duration","type":"select","default":"normal","options":{"slow":"Slow","normal":"Normal","fast":"Fast"},"condition":{"item_animation!":""}},{"name":"item_animation_delay","label":"Item Animation Delay","type":"number","min":0,"step":100,"condition":{"item_animation!":""}}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}