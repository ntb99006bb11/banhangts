'use strict';

(function($) {
  var woobt_timeout = null;

  $(function() {
    woobt_settings();

    // options page
    woobt_options();

    // arrange
    woobt_arrange();

    // button
    woobt_button();

    // default products
    woobt_default_products();

    // single product
    woobt_disable();
    woobt_init_count();
    woobt_custom_qty();

    // smart related
    woobt_source_init();
    woobt_build_label();
    woobt_terms_init();
    woobt_enhanced_select();
    woobt_combination_terms_init();
    woobt_sortable();
  });

  $(document).on('click touch', '.woobt_displaying', function(e) {
    e.preventDefault();

    if ($(this).hasClass('woobt_displaying_open')) {
      $('.woobt_show_if_displaying').hide();
    } else {
      $('.woobt_show_if_displaying').show();
    }

    $(this).toggleClass('woobt_displaying_open');
  });

  $(document).on('click touch', '.woobt-import-export', function(e) {
    // open import/export popup
    e.preventDefault();

    var ids = $('#woobt_selected').find('input, select').serialize() || 0;

    if (!$('#woobt_import_export').length) {
      $('body').append('<div id=\'woobt_import_export\'></div>');
    }

    $('#woobt_import_export').html('Loading...');

    $('#woobt_import_export').dialog({
      minWidth: 460,
      title: 'Import/Export',
      modal: true,
      dialogClass: 'wpc-dialog',
      open: function() {
        $('.ui-widget-overlay').bind('click', function() {
          $('#woobt_import_export').dialog('close');
        });
      },
    });

    var data = {
      action: 'woobt_import_export', ids: ids, nonce: woobt_vars.nonce,
    };

    $.post(ajaxurl, data, function(response) {
      $('#woobt_import_export').html(response);
    });
  });

  $(document).on('click touch', '.woobt-import-export-save', function(e) {
    if (confirm('Are you sure?')) {
      $(this).addClass('disabled');

      var ids = $('.woobt_import_export_data').val();
      var data = {
        action: 'woobt_import_export_save', ids: ids, nonce: woobt_vars.nonce,
      };

      $.post(ajaxurl, data, function(response) {
        $('#woobt_import_export').dialog('close');
        $('#woobt_selected ul').html(response);
        woobt_arrange();
      });
    }
  });

  $(document).on('click touch', '#woobt_search_settings_btn', function(e) {
    // open search settings popup
    e.preventDefault();

    var title = $('#woobt_search_settings').attr('data-title');

    $('#woobt_search_settings').
        dialog({
          minWidth: 540,
          title: title,
          modal: true,
          dialogClass: 'wpc-dialog',
          open: function() {
            $('.ui-widget-overlay').bind('click', function() {
              $('#woobt_search_settings').dialog('close');
            });
          },
        });
  });

  $(document).on('click touch', '#woobt_search_settings_update', function(e) {
    // save search settings
    e.preventDefault();

    $('#woobt_search_settings').addClass('woobt_search_settings_updating');

    var data = {
      action: 'woobt_update_search_settings',
      nonce: woobt_vars.nonce,
      limit: $('.woobt_search_limit').val(),
      sku: $('.woobt_search_sku').val(),
      id: $('.woobt_search_id').val(),
      exact: $('.woobt_search_exact').val(),
      sentence: $('.woobt_search_sentence').val(),
      same: $('.woobt_search_same').val(),
      types: $('.woobt_search_types').val(),
    };

    $.post(ajaxurl, data, function(response) {
      $('#woobt_search_settings').removeClass('woobt_search_settings_updating');
    });
  });

  $(document).on('change', 'select.woobt_change_price', function() {
    woobt_options();
  });

  $(document).on('change', 'select.woobt_atc_button', function() {
    woobt_button();
  });

  $(document).on('change', 'select.woobt_default', function() {
    woobt_default_products();
  });

  // disable
  $(document).on('click touch', '#woobt_disable', function() {
    woobt_disable();
    woobt_init_count();
  });

  // set optional
  $(document).on('click touch', '#woobt_custom_qty', function() {
    woobt_custom_qty();
  });

  // add text
  $(document).on('click touch', '.woobt_add_text', function(e) {
    e.preventDefault();

    var $this = $(this);

    $this.addClass('disabled');
    $('.woobt_selected').addClass('woobt_selected_loading');

    var data = {
      action: 'woobt_add_text', nonce: woobt_vars.nonce,
    };

    $.post(ajaxurl, data, function(response) {
      $('#woobt_selected ul').append(response);
      $('.woobt_selected').removeClass('woobt_selected_loading');
      $this.removeClass('disabled');
    });
  });

  // search input
  $(document).on('keyup', '#woobt_keyword', function() {
    if ($('#woobt_keyword').val() != '') {
      $('#woobt_loading').show();

      if (woobt_timeout != null) {
        clearTimeout(woobt_timeout);
      }

      woobt_timeout = setTimeout(woobt_ajax_get_data, 300);

      return false;
    }
  });

  // actions on search result items
  $(document).on('click touch', '#woobt_results li', function() {
    $(this).children('.woobt-remove').html('×');
    $('#woobt_selected ul').append($(this));
    $('#woobt_results').html('').hide();
    $('#woobt_keyword').val('');
    woobt_arrange();
    woobt_init_count();

    return false;
  });

  // actions on selected items
  $(document).on('click touch', '#woobt_selected .woobt-remove', function() {
    $(this).parent().remove();
    woobt_init_count();

    return false;
  });

  // hide search result box if click outside
  $(document).on('click touch', function(e) {
    if ($(e.target).closest($('#woobt_results')).length == 0) {
      $('#woobt_results').html('').hide();
    }
  });

  function woobt_disable() {
    if ($('#woobt_disable').is(':checked')) {
      $('.woobt_table_enable').hide();
    } else {
      $('.woobt_table_enable').show();
    }
  }

  function woobt_custom_qty() {
    if ($('#woobt_custom_qty').is(':checked')) {
      $('.woobt_tr_show_if_custom_qty').show();
      $('.woobt_tr_hide_if_custom_qty').hide();
      $('#woobt_sync_qty').prop('checked', false);
    } else {
      $('.woobt_tr_show_if_custom_qty').hide();
      $('.woobt_tr_hide_if_custom_qty').show();
    }
  }

  function woobt_settings() {
    // hide search result box by default
    $('#woobt_results').html('').hide();
    $('#woobt_loading').hide();

    // show or hide limit
    if ($('#woobt_custom_qty').is(':checked')) {
      $('.woobt_tr_show_if_custom_qty').show();
      $('.woobt_tr_hide_if_custom_qty').hide();
      $('#woobt_sync_qty').prop('checked', false);
    } else {
      $('.woobt_tr_show_if_custom_qty').hide();
      $('.woobt_tr_hide_if_custom_qty').show();
    }
  }

  function woobt_options() {
    if ($('select.woobt_change_price').val() == 'yes_custom') {
      $('.woobt_change_price_custom').show();
    } else {
      $('.woobt_change_price_custom').hide();
    }
  }

  function woobt_button() {
    if ($('select.woobt_atc_button').val() == 'separate') {
      $('select.woobt_show_this_item').
          val('yes').
          trigger('change').
          prop('disabled', 'disabled');
    } else {
      $('select.woobt_show_this_item').prop('disabled', false);
    }
  }

  function woobt_default_products() {
    if ($('select.woobt_default').val() != 'none') {
      $('.woobt_show_if_default_products').show();
    } else {
      $('.woobt_show_if_default_products').hide();
    }
  }

  function woobt_init_count() {
    let count = '';

    if ($('#woobt_disable').is(':checked')) {
      count = '(Disabled)';
    } else if ($('li.woobt_options').length && $('#woobt_selected').length) {
      count = '(' + $('#woobt_selected .woobt-li-product').length + ')';
    }

    if (count !== '') {
      if ($('li.woobt_options a span.count').length) {
        $('li.woobt_options a span.count').html(count);
      } else {
        $('<span class="count">' + count + '</span>').
            appendTo($('li.woobt_options a'));
      }
    }
  }

  function woobt_arrange() {
    $('#woobt_selected ul').sortable({
      handle: '.woobt-move',
    });
  }

  function woobt_ajax_get_data() {
    // ajax search product
    woobt_timeout = null;

    var ids = [];

    $('#woobt_selected').find('.woobt-li-product').each(function() {
      ids.push($(this).attr('data-id'));
    });

    var data = {
      action: 'woobt_get_search_results',
      nonce: woobt_vars.nonce,
      woobt_keyword: $('#woobt_keyword').val(),
      woobt_id: $('#post_ID').val(),
      woobt_ids: ids.join(),
    };

    $.post(ajaxurl, data, function(response) {
      $('#woobt_results').show();
      $('#woobt_results').html(response);
      $('#woobt_loading').hide();
    });
  }

  // smart rules

  $(document).on('change', '.woobt_source_selector', function() {
    var $this = $(this);
    var type = $this.data('type');
    var $rule = $this.closest('.woobt_rule');

    woobt_source_init(type, $rule);
    woobt_build_label($rule);
    woobt_terms_init();
  });

  $(document).on('change', '.woobt_terms', function() {
    var $this = $(this);
    var type = $this.data('type');
    var apply = $(this).
        closest('.woobt_rule').
        find('.woobt_source_selector_' + type).
        val();

    $this.data(apply, $this.val().join());
  });

  $(document).on('change', '.woobt_combination_selector', function() {
    woobt_combination_terms_init();
  });

  $(document).on('click touch', '.woobt_combination_remove', function() {
    $(this).closest('.woobt_combination').remove();
  });

  $(document).on('click touch', '.woobt_rule_heading', function(e) {
    if ($(e.target).closest('.woobt_rule_remove').length === 0 &&
        $(e.target).closest('.woobt_rule_duplicate').length === 0) {
      $(this).closest('.woobt_rule').toggleClass('active');
    }
  });

  $(document).on('click touch', '.woobt_new_combination', function(e) {
    var $combinations = $(this).
        closest('.woobt_tr').
        find('.woobt_combinations');
    var key = $(this).
        closest('.woobt_rule').data('key');
    var name = $(this).data('name');
    var type = $(this).data('type');
    var data = {
      action: 'woobt_add_combination',
      nonce: woobt_vars.nonce,
      key: key,
      name: name,
      type: type,
    };

    $.post(ajaxurl, data, function(response) {
      $combinations.append(response);
      woobt_combination_terms_init();
    });

    e.preventDefault();
  });

  $(document).on('click touch', '.woobt_new_rule', function(e) {
    e.preventDefault();
    $('.woobt_rules').addClass('woobt_rules_loading');

    var name = $(this).data('name');
    var data = {
      action: 'woobt_add_rule', nonce: woobt_vars.nonce, name: name,
    };

    $.post(ajaxurl, data, function(response) {
      $('.woobt_rules').append(response);
      woobt_source_init();
      woobt_build_label();
      woobt_terms_init();
      woobt_enhanced_select();
      woobt_combination_terms_init();
      $('.woobt_rules').removeClass('woobt_rules_loading');
    });
  });

  $(document).on('click touch', '.woobt_rule_duplicate', function(e) {
    e.preventDefault();
    $('.woobt_rules').addClass('woobt_rules_loading');

    var $rule = $(this).closest('.woobt_rule');
    var rule_data = $rule.find('input, select, button, textarea').
        serialize() || 0;
    var name = $(this).data('name');
    var data = {
      action: 'woobt_add_rule',
      nonce: woobt_vars.nonce,
      name: name,
      rule_data: rule_data,
    };

    $.post(ajaxurl, data, function(response) {
      $(response).insertAfter($rule);
      woobt_source_init();
      woobt_build_label();
      woobt_terms_init();
      woobt_enhanced_select();
      woobt_combination_terms_init();
      $('.woobt_rules').removeClass('woobt_rules_loading');
    });
  });

  $(document).on('click touch', '.woobt_rule_remove', function(e) {
    e.preventDefault();

    if (confirm('Are you sure?')) {
      $(this).closest('.woobt_rule').remove();
    }
  });

  $(document).on('click touch', '.woobt_expand_all', function(e) {
    e.preventDefault();

    $('.woobt_rule').addClass('active');
  });

  $(document).on('click touch', '.woobt_collapse_all', function(e) {
    e.preventDefault();

    $('.woobt_rule').removeClass('active');
  });

  $(document).on('click touch', '.woobt_conditional_remove', function(e) {
    e.preventDefault();

    if (confirm('Are you sure?')) {
      $(this).closest('.woobt_conditional_item').remove();
    }
  });

  function woobt_terms_init() {
    $('.woobt_terms').each(function() {
      var $this = $(this);
      var type = $this.data('type');
      var apply = $this.closest('.woobt_rule').
          find('.woobt_source_selector_' + type).
          val();

      $this.selectWoo({
        ajax: {
          url: ajaxurl, dataType: 'json', delay: 250, data: function(params) {
            return {
              q: params.term,
              action: 'woobt_search_term',
              taxonomy: apply,
              nonce: woobt_vars.nonce,
            };
          }, processResults: function(data) {
            var options = [];
            if (data) {
              $.each(data, function(index, text) {
                options.push({id: text[0], text: text[1]});
              });
            }
            return {
              results: options,
            };
          }, cache: true,
        }, minimumInputLength: 1,
      });

      if (apply !== 'all' && apply !== 'products' && apply !== 'combination') {
        // for terms only
        if ((typeof $this.data(apply) === 'string' ||
            $this.data(apply) instanceof String) && $this.data(apply) !== '') {
          $this.val($this.data(apply).split(',')).change();
        } else {
          $this.val([]).change();
        }
      }
    });
  }

  function woobt_combination_terms_init() {
    $('.woobt_apply_terms').each(function() {
      var $this = $(this);
      var taxonomy = $this.closest('.woobt_combination').
          find('.woobt_combination_selector').
          val();

      $this.selectWoo({
        ajax: {
          url: ajaxurl, dataType: 'json', delay: 250, data: function(params) {
            return {
              q: params.term,
              action: 'woobt_search_term',
              taxonomy: taxonomy,
              nonce: woobt_vars.nonce,
            };
          }, processResults: function(data) {
            var options = [];
            if (data) {
              $.each(data, function(index, text) {
                options.push({id: text[0], text: text[1]});
              });
            }
            return {
              results: options,
            };
          }, cache: true,
        }, minimumInputLength: 1,
      });
    });

  }

  function woobt_source_init(type = 'apply', $rule) {
    if (typeof $rule !== 'undefined') {
      var apply = $rule.find('.woobt_source_selector_' + type).
          find(':selected').
          val();
      var text = $rule.find('.woobt_source_selector_' + type).
          find(':selected').
          text();

      $rule.find('.woobt_' + type + '_text').text(text);
      $rule.find('.hide_' + type).hide();
      $rule.find('.show_if_' + type + '_' + apply).show();
      $rule.find('.show_' + type).show();
      $rule.find('.hide_if_' + type + '_' + apply).hide();
    } else {
      $('.woobt_source_selector').each(function(e) {
        var type = $(this).data('type');
        var $rule = $(this).closest('.woobt_rule');
        var apply = $(this).find(':selected').val();
        var text = $(this).find(':selected').text();

        $rule.find('.woobt_' + type + '_text').text(text);
        $rule.find('.hide_' + type).hide();
        $rule.find('.show_if_' + type + '_' + apply).show();
        $rule.find('.show_' + type).show();
        $rule.find('.hide_if_' + type + '_' + apply).hide();
      });
    }
  }

  function woobt_sortable() {
    $('.woobt_rules').sortable({handle: '.woobt_rule_move'});
  }

  function woobt_enhanced_select() {
    $(document.body).trigger('wc-enhanced-select-init');
  }

  function woobt_build_label($rule) {
    if (typeof $rule !== 'undefined') {
      var apply = $rule.find('.woobt_source_selector_apply').
          find('option:selected').
          text();
      var get = $rule.find('.woobt_source_selector_get').
          find('option:selected').
          text();

      $rule.find('.woobt_rule_label').
          html('Apply for: ' + apply + ' <span>FBT products: ' + get +
              '</span>');
    } else {
      $('.woobt_rule ').each(function() {
        var $this = $(this);
        var apply = $this.find('.woobt_source_selector_apply').
            find('option:selected').
            text();
        var get = $this.find('.woobt_source_selector_get').
            find('option:selected').
            text();

        $this.find('.woobt_rule_label').
            html('Apply for: ' + apply + ' <span>FBT products: ' + get +
                '</span>');
      });
    }
  }
})(jQuery);