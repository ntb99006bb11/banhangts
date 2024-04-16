(function ($) {
  "use strict";

  // boxed layout switcher
  if ($(".boxed-switcher").length) {
    $(".boxed-switcher").on("click", function () {
      $("body").toggleClass("boxed-wrapper");
    });
  }

  // color switcher

  if ($("#colorschemeOptions").length) {
    var cssPath = $("#colorschemeOptions").data('css-path');
    $("#colorschemeOptions").styleSwitcher({
      hasPreview: false,
      fullPath: cssPath,
      defaultThemeId: 'creote-color-switcher-css',
      cookie: {
        expires: 999,
        isManagingLoad: true
      }
    });
  }

  if ($(".style-switcher").length) {
    $("#switcher-toggler").on("click", function (e) {
      e.preventDefault();
      $(".style-switcher").toggleClass("active");
    });
  }

})(jQuery);