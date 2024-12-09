<?php

class PxlPostGrid_Widget extends Pxltheme_Core_Widget_Base{
    protected $name = 'pxl_post_grid';
    protected $title = 'PXL Post Grid';
    protected $icon = 'eicon-posts-grid';
    protected $categories = array( 'pxltheme-core' );
    protected $params = '{"sections":[{"name":"layout_section","label":"Layout","tab":"layout","controls":[{"name":"post_type","label":"Select Post Type","type":"select","multiple":true,"options":{"post":"Post","pxl-case-study":"Portfolio","pxl-practice-area":"My Services"},"default":"post"},{"name":"layout_post","label":"Select Templates of Post","type":"layoutcontrol","default":"post-1","options":{"post-1":{"label":"Layout 1","image":"http:\/\/personal-portfolio.local\/wp-content\/themes\/ameron\/elements\/assets\/layout-image\/post_grid-layout1.jpg"},"post-2":{"label":"Layout 2","image":"http:\/\/personal-portfolio.local\/wp-content\/themes\/ameron\/elements\/assets\/layout-image\/post_grid-layout2.jpg"}},"condition":{"post_type":["post"]}},{"name":"layout_pxl-case-study","label":"Select Templates of Portfolio","type":"layoutcontrol","default":"post-1","options":{"pxl-case-study-1":{"label":"Layout 1","image":"http:\/\/personal-portfolio.local\/wp-content\/themes\/ameron\/elements\/assets\/layout-image\/post_grid-pxl-case-study-1.jpg"},"pxl-case-study-2":{"label":"Layout 2","image":"http:\/\/personal-portfolio.local\/wp-content\/themes\/ameron\/elements\/assets\/layout-image\/post_grid-pxl-case-study-2.jpg"}},"condition":{"post_type":["pxl-case-study"]}},{"name":"layout_pxl-practice-area","label":"Select Templates of My Services","type":"layoutcontrol","default":"post-1","options":{"pxl-practice-area-1":{"label":"Layout 1","image":"http:\/\/personal-portfolio.local\/wp-content\/themes\/ameron\/elements\/assets\/layout-image\/post_grid-pxl-practice-area-1.jpg"}},"condition":{"post_type":["pxl-practice-area"]}}]},{"name":"source_section","label":"Source","tab":"content","controls":[{"name":"select_post_by","label":"Select posts by","type":"select","multiple":true,"options":{"term_selected":"Terms selected","post_selected":"Posts selected "},"default":"term_selected"},{"name":"source_post","label":"Select Term","description":"Get all when no term selected","type":"select2","multiple":true,"options":{"figma-design|category":"Figma Design","prototyping|category":"Prototyping","ui-design|category":"UI Design","ux-strategy|category":"UX Strategy","wireframing|category":"Wireframing","xd-design|category":"XD Design"},"condition":{"post_type":["post"],"select_post_by":"term_selected"}},{"name":"source_pxl-case-study","label":"Select Term","description":"Get all when no term selected","type":"select2","multiple":true,"options":{"design|pxl-case-study-category":"Design","events|pxl-case-study-category":"Events","graphic|pxl-case-study-category":"Graphic","technology|pxl-case-study-category":"Technology"},"condition":{"post_type":["pxl-case-study"],"select_post_by":"term_selected"}},{"name":"source_pxl-practice-area","label":"Select Term","description":"Get all when no term selected","type":"select2","multiple":true,"options":{"services|pxl-practice-area-category":"Services","technology|pxl-practice-area-category":"Technology"},"condition":{"post_type":["pxl-practice-area"],"select_post_by":"term_selected"}},{"name":"source_post_post_ids","label":"Select posts","type":"select2","multiple":true,"options":{"32":"Shot of two work colleague using a digital tablet","4286":"Beautiful Specialist with Short Pink Hair Talks","4287":"Project that began allow second phase in worth","4288":"Multiethnic colleagues sitting at desk looking","4289":"Spring Which I Enjoy With For Effective Agile Team","4290":"But some of the current projects that make","4291":"Shot of two work colleague using a digital tablet"},"condition":{"post_type":["post"],"select_post_by":"post_selected"}},{"name":"source_pxl-case-study_post_ids","label":"Select posts","type":"select2","multiple":true,"options":{"390":"Graphic Illustration","2635":"Efficient Team Mobile","2636":"UI\/UX Creative Design","2637":"Mobile Illustration","2638":"Anaylsis Application","2639":"Business Growth","2640":"Profitable Business","2641":"Wireframing Services","2731":"Website Development","2732":"Desktop Application"},"condition":{"post_type":["pxl-case-study"],"select_post_by":"post_selected"}},{"name":"source_pxl-practice-area_post_ids","label":"Select posts","type":"select2","multiple":true,"options":{"669":"Wireframing Services","704":"Branding & Strategy","709":"Stratagy & Research","715":"Website Development","720":"Desktop Application","725":"Ui \/ Ux Creative Design","3028":"Wireframing Services"},"condition":{"post_type":["pxl-practice-area"],"select_post_by":"post_selected"}},{"name":"orderby","label":"Order By","type":"select","default":"date","options":{"date":"Date","ID":"ID","author":"Author","title":"Title","rand":"Random"}},{"name":"order","label":"Sort Order","type":"select","default":"desc","options":{"desc":"Descending","asc":"Ascending"}},{"name":"limit","label":"Total items","type":"number","default":"6"}]},{"name":"general_section","label":"General Settings","tab":"content","controls":[{"name":"img_size","label":"Image Size","type":"text","description":"Enter image size (Example: &quot;thumbnail&quot;, &quot;medium&quot;, &quot;large&quot;, &quot;full&quot; or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height))."},{"name":"layout_mode","label":"Layout Mode","type":"select","options":{"fitRows":"Basic Grid","masonry":"Masonry Grid"},"default":"fitRows"},{"name":"filter","label":"Term Filter","type":"select","default":"false","options":{"true":"Enable","false":"Disable"},"condition":{"select_post_by":"term_selected"}},{"name":"filter_default_title","label":"Filter Default Title","type":"text","default":"All","condition":{"select_post_by":"term_selected","filter":"true"}},{"name":"filter_alignment","label":"Filter Alignment","type":"choose","control_type":"responsive","options":{"start":{"title":"Start","icon":"eicon-text-align-left"},"center":{"title":"Center","icon":"eicon-text-align-center"},"end":{"title":"End","icon":"eicon-text-align-right"}},"selectors":{"{{WRAPPER}} .grid-filter-wrap":"justify-content: {{VALUE}};"},"default":"center","condition":{"select_post_by":"term_selected","filter":"true"}},{"name":"pagination_type","label":"Pagination Type","type":"select","default":"false","options":{"pagination":"Pagination","loadmore":"Loadmore","false":"Disable"}},{"name":"loadmore_text","label":"Load More text","type":"text","default":"Load More","condition":{"pagination_type":"loadmore"}},{"name":"loadmore_icon","label":"Loadmore Icon","type":"icons","default":[],"condition":{"pagination_type":"loadmore"}},{"name":"icon_align","label":"Icon Position","type":"select","default":"right","options":{"right":"After","left":"Before"},"condition":{"pagination_type":"loadmore"}},{"name":"pagination_alignment","label":"Pagination Alignment","type":"choose","control_type":"responsive","options":{"start":{"title":"Start","icon":"eicon-text-align-left"},"center":{"title":"Center","icon":"eicon-text-align-center"},"end":{"title":"End","icon":"eicon-text-align-right"}},"selectors":{"{{WRAPPER}} .pxl-grid-pagination, {{WRAPPER}} .pxl-load-more":"justify-content: {{VALUE}};"},"default":"start","condition":{"pagination_type":["pagination","loadmore"]}},{"name":"item_padding","label":"Item Padding","type":"dimensions","size_units":["px"],"default":{"top":"15","right":"15","bottom":"15","left":"15"},"selectors":{"{{WRAPPER}} .pxl-grid-inner":"margin-top: -{{TOP}}{{UNIT}}; margin-right: -{{RIGHT}}{{UNIT}}; margin-bottom: -{{BOTTOM}}{{UNIT}}; margin-left: -{{LEFT}}{{UNIT}};","{{WRAPPER}} .pxl-grid-inner .grid-item":"padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};"},"control_type":"responsive"},{"name":"gap_extra","label":"Item Gap Bottom","description":"Add extra space at bottom of each items","type":"number","default":0,"control_type":"responsive","selectors":{"{{WRAPPER}} .pxl-grid-inner .grid-item":"margin-bottom: {{VALUE}}px;"}},{"name":"item_animation","label":"Item Motion Effect","type":"animation","condition":[]},{"name":"item_animation_duration","label":"Item Animation Duration","type":"select","default":"normal","options":{"slow":"Slow","normal":"Normal","fast":"Fast"},"condition":{"item_animation!":""}},{"name":"item_animation_delay","label":"Item Animation Delay","type":"number","min":0,"step":100,"condition":{"item_animation!":""}}]},{"name":"grid_section","label":"Grid Settings","tab":"content","controls":[{"name":"col_xs","label":"Extra Small &lt;= 575","type":"select","default":"1","options":{"12":"12","6":"6","5":"5","4":"4","3":"3","2":"2","1":"1"}},{"name":"col_sm","label":"Small &lt;= 767","type":"select","default":"1","options":{"12":"12","6":"6","5":"5","4":"4","3":"3","2":"2","1":"1"}},{"name":"col_md","label":"Medium &lt;= 991","type":"select","default":"2","options":{"12":"12","6":"6","5":"5","4":"4","3":"3","2":"2","1":"1"}},{"name":"col_lg","label":"Large &lt;= 1199","type":"select","default":"2","options":{"12":"12","6":"6","5":"5","4":"4","3":"3","2":"2","1":"1"}},{"name":"col_xl","label":"XL Devices &gt;= 1200","type":"select","default":"3","options":{"12":"12","6":"6","5":"5","4":"4","3":"3","2":"2","1":"1"}},{"name":"col_xxl","label":"XXL Devices &gt;= 1400","type":"select","default":"3","options":{"12":"12","6":"6","5":"5","4":"4","3":"3","2":"2","1":"1"}},{"name":"grid_custom_columns","label":"Custom Items Columns","type":"repeater","condition":{"layout_mode":["masonry"]},"controls":[{"name":"col_xs_c","label":"Extra Small &lt;= 575","type":"select","default":"1","options":{"12":"12","6":"6","5":"5","4":"4","3":"3","2":"2","1":"1"}},{"name":"col_sm_c","label":"Small &lt;= 767","type":"select","default":"1","options":{"12":"12","6":"6","5":"5","4":"4","3":"3","2":"2","1":"1"}},{"name":"col_md_c","label":"Medium &lt;= 991","type":"select","default":"2","options":{"12":"12","6":"6","5":"5","4":"4","3":"3","2":"2","1":"1"}},{"name":"col_lg_c","label":"Large &lt;= 1199","type":"select","default":"2","options":{"12":"12","6":"6","5":"5","4":"4","3":"3","2":"2","1":"1"}},{"name":"col_xl_c","label":"XL Devices &gt;= 1200","type":"select","default":"3","options":{"12":"12","6":"6","5":"5","4":"4","3":"3","2":"2","1":"1"}},{"name":"col_xxl_c","label":"XXL Devices &gt;= 1400","type":"select","default":"3","options":{"12":"12","6":"6","5":"5","4":"4","3":"3","2":"2","1":"1"}},{"name":"img_size_c","label":"Image Size","type":"text","description":"Enter image size (Example: &quot;thumbnail&quot;, &quot;medium&quot;, &quot;large&quot;, &quot;full&quot; or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height))."},{"name":"item_c_animation","label":"Item Motion Effect","type":"animation","condition":[]},{"name":"item_c_animation_duration","label":"Item Animation Duration","type":"select","default":"normal","options":{"slow":"Slow","normal":"Normal","fast":"Fast"},"condition":{"item_c_animation!":""}},{"name":"item_c_animation_delay","label":"Item Animation Delay","type":"number","min":0,"step":100,"condition":{"item_c_animation!":""}}]}]},{"name":"display_section","label":"Display Options","tab":"content","controls":[{"name":"bg_item_post","label":"Background Color Item","type":"color","default":"","selectors":{"{{WRAPPER}} .pxl-post-grid .pxl-grid-inner .item-content":"background-color: {{VALUE}};"},"condition":{"post_type":"post"}},{"name":"bg_item_practice_area","label":"Background Color Item 2","type":"color","default":"","selectors":{"{{WRAPPER}} .pxl-practice-area-grid .pxl-grid-inner .grid-item-inner":"background-color: {{VALUE}} !important;"},"condition":{"post_type":["pxl-practice-area"]}},{"name":"color_title","label":"Title Color","type":"color","default":"","selectors":{"{{WRAPPER}} .pxl-post-grid .pxl-grid-inner .item-content .item-title":"color: {{VALUE}};"},"condition":{"post_type":"post"}},{"name":"color_title_practice_area","label":"Title Color","type":"color","default":"","selectors":{"{{WRAPPER}} .pxl-practice-area-grid .pxl-grid-inner .grid-item-inner .item-title":"color: {{VALUE}};"},"condition":{"post_type":["pxl-practice-area"]}},{"name":"color_excerpt_practice_area","label":"Excerpt Color","type":"color","default":"","selectors":{"{{WRAPPER}} .pxl-practice-area-grid .pxl-grid-inner .grid-item-inner .item-excerpt":"color: {{VALUE}};"},"condition":{"post_type":["pxl-practice-area"]}},{"name":"show_title","label":"Show Title","type":"switcher","default":"true","condition":{"post_type":["pxl-case-study"]}},{"name":"show_date","label":"Show Date","type":"switcher","default":"true","condition":{"post_type":"post"}},{"name":"show_author","label":"Show Author","type":"switcher","default":"true","condition":{"post_type":"post"}},{"name":"show_category","label":"Show Category","type":"switcher","default":"true","condition":{"post_type":["post","pxl-case-study"]}},{"name":"show_comment","label":"Show Comment","type":"switcher","default":"false","condition":{"post_type":"post"}},{"name":"show_excerpt","label":"Show Excerpt","type":"switcher","default":"false"},{"name":"num_words","label":"Number of Words","type":"number","condition":{"show_excerpt":"true"}},{"name":"show_button","label":"Show Button Readmore","type":"switcher","default":"false"},{"name":"button_text","label":"Button Text","type":"text","condition":{"show_button":"false"}},{"name":"title_padding","label":"Title Padding","type":"dimensions","size_units":["px"],"selectors":{"{{WRAPPER}} .pxl-practice-area-grid .item-title":"padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};"},"condition":{"post_type":["pxl-practice-area"]}},{"name":"text_align","label":"Alignment","type":"choose","control_type":"responsive","options":{"start":{"title":"Start","icon":"eicon-text-align-left"},"center":{"title":"Center","icon":"eicon-text-align-center"},"end":{"title":"End","icon":"eicon-text-align-right"}},"prefix_class":"elementor-align-","default":"","selectors":{"{{WRAPPER}} .pxl-practice-area-grid .item-title":"justify-content: {{VALUE}};"},"condition":{"post_type":["pxl-practice-area"]}}]}]}';
    protected $styles = array(  );
    protected $scripts = array( 'imagesloaded','isotope','ameron-post-grid' );
}