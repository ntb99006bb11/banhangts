
(function ($) {
    "use strict";
jQuery(window).on('elementor:init', function () {
        var NestsearchComplete = 
        elementor.modules.controls.BaseData.extend({
        Searchselect2is: false,
        searchresultsRender: function () {
            var nthis = this;
            var nsttitle = this.getControlValue();
            if (!nsttitle || nsttitle.length == 0) {
                return;
            }
            if (!_.isArray(nsttitle)) {
                nsttitle = [nsttitle];
            }
            nthis.nstaddSpinner();
            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: {
                    id: nsttitle,
                    action: nthis.model.get('render'),
                    post_type: nthis.model.get('post_type'),
                },

                success: function (results) {
                    nthis.Searchselect2is = true; 
                    nthis.model.set('options', results);
                    nthis.render();
                },
            });
        },
        nstaddSpinner: function () {
            this.ui.select.prop('disabled', true);
            this.$el.find('.elementor-control-title').after('<span class="elementor-control-spinner">&nbsp;<i class="fa fa-spinner fa-spin"></i>&nbsp;</span>');
        },
        onReady: function () {
            var nthis = this;
            this.ui.select.select2({
                placeholder: 'Search Product',   
                minimumInputLength: 3,
                allowClear: true,
                ajax: {
                    url: ajaxurl,
                    dataType: 'json',
                    method: 'post',
                    delay: 200,
                    data: function ( params ) {
                        return {
                            q: params.term,
                            action: nthis.model.get('options'),
                            post_type: nthis.model.get('post_type'),
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: data,
                        };
                    },
                    cache: true,
                },
            });

            if (!this.Searchselect2is) {
                this.searchresultsRender();
            }
        },
        onBeforeDestroy: function () {
            if (this.ui.select.data('select2')) {
                this.ui.select.select2('destroy');
            }
            this.$el.remove();
        },
    });
    elementor.addControlView('Nest_select2_get_auto', NestsearchComplete);
});
	
})(jQuery);
