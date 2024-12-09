( function( $ ) {
    /**
     * @param $scope The Widget wrapper element as a jQuery element
     * @param $ The jQuery alias
     */
    
    var PxlAccordionHandler = function( $scope, $ ) {
        $scope.find(".pxl-accordion").ready(function() {
            var ac_item = document.getElementsByClassName("pxl-ac-item");
            let min_height = 0;
            for (let i = 0; i < ac_item.length; i++) {
                min_height += ac_item[i].offsetHeight;
            }
            document.getElementsByClassName("pxl-accordion")[0].style.minHeight = min_height + 180 + "px";

        });

        $scope.find(".pxl-accordion .pxl-ac-item .pxl-ac-title").on("click", function(e){
            e.preventDefault();
            var target = $(this).data("target");
            var parent = $(this).parents(".pxl-accordion");
            var active_items = parent.find(".pxl-ac-title.active");
            $.each(active_items, function (index, item) {
                var item_target = $(item).data("target");
                if(item_target != target){
                    console.log('aaa');
                    $(item).removeClass("active");
                    $(this).parent().removeClass("active");
                    $(item_target).slideUp(400);
                }
            });
            $(this).parent().toggleClass("active");
            $(this).toggleClass("active");
            $(target).slideToggle(400);
        });
    };
    // Make sure you run this code under Elementor.
    $( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_accordion.default', PxlAccordionHandler );
    } );
} )( jQuery );