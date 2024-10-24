(function ($, Drupal, drupalSettings) {

  Drupal.views_svg_animation = Drupal.views_svg_animation || {};
  drupalSettings.svg_animation = drupalSettings.svg_animation || {};

  Drupal.behaviors.views_svg_animation = {
    attach: function () {
      $('.views-svg-animation:not(.views-svg-animation-processed)').each(function (index, element) {
        $(this).addClass('views-svg-animation-processed');
        let w = $(element).width();
        if (w > drupalSettings.svg_animation.breakpoint) {
          drupalSettings.svg_animation.files.forEach(function (item) {
            if (drupalSettings.svg_animation.first_id === undefined) {
              drupalSettings.svg_animation.first_id = item['id'];
            }
            let el = document.createElement('div');
            $(el)
              .hide()
              .addClass('svg-image')
              .attr('svg-animation-object-id', item['id'])
              .load(item['path']);

            $('.svg-wrapper', element).append(el);
          });
        }
        let event = new CustomEvent("svg-animation-init", {
          detail: {
            index: index,
            context: element
          }
        });
        document.dispatchEvent(event);
        $('tbody tr', element).hover(function () {
          let object = $(this).attr('svg-animation-object-id');
          let item = $(this).attr('svg-animation-item-id');
          Drupal.views_svg_animation.showSvgFile(element, object);
          $('.svg-animation-show', element).removeClass('svg-animation-show');
          $('.svg-wrapper .svg-image', element).addClass('svg-animation-show');
          $('tr[svg-animation-item-id='+item+']', element).addClass('svg-animation-show');
          $('.svg-wrapper .svg-image[svg-animation-object-id='+object+'] #'+item, element).addClass('svg-animation-show');
          let event = new CustomEvent("svg-animation-show-item", {
            detail: {
              context: element,
              object: object,
              item: item
            }
          });
          document.dispatchEvent(event);
        });
        $('tbody', element).hover(function () {
          // Intentionally empty.
        }, function () {
          $('.svg-animation-show', element).removeClass('svg-animation-show');
          Drupal.views_svg_animation.showSvgFile(element, drupalSettings.svg_animation.first_id);
          let event = new CustomEvent("svg-animation-reset", {
            detail: {
              context: element
            }
          });
          document.dispatchEvent(event);
        });
        $('.svg-wrapper', element).show();
        Drupal.views_svg_animation.showSvgFile(element, drupalSettings.svg_animation.first_id);
      });
    }
  };

  Drupal.views_svg_animation.showSvgFile = function (element, object) {
    $('.svg-wrapper .svg-image', element).hide();
    $('.svg-wrapper .svg-image[svg-animation-object-id='+object+']', element).show();
    let event = new CustomEvent("svg-animation-show-object", {
      detail: {
        context: element,
        object: object
      }
    });
    document.dispatchEvent(event);
  };

})(jQuery, Drupal, drupalSettings);
