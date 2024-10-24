(function ($, Drupal, drupalSettings) {
  Drupal.views_svg_animation = Drupal.views_svg_animation || {};
  drupalSettings.svg_animation = drupalSettings.svg_animation || {};

  Drupal.behaviors.views_svg_animation = {
    attach() {
      $('.views-svg-animation:not(.views-svg-animation-processed)').each(
        function (index, element) {
          $(this).addClass('views-svg-animation-processed');
          const w = $(element).width();
          if (w > drupalSettings.svg_animation.breakpoint) {
            drupalSettings.svg_animation.files.forEach(function (item) {
              if (drupalSettings.svg_animation.first_id === undefined) {
                drupalSettings.svg_animation.first_id = item.id;
              }
              const el = document.createElement('div');
              $(el)
                .hide()
                .addClass('svg-image')
                .attr('svg-animation-object-id', item.id)
                .load(item.path, function () {
                  const dirty = $(el).html();
                  $(el).html(DOMPurify.sanitize(dirty));
                  $('.svg-wrapper', element).append(el);
                });
            });
          }
          const event1 = new CustomEvent('svg-animation-init', {
            detail: {
              index,
              context: element,
            },
          });
          document.dispatchEvent(event1);
          $('tbody tr', element).hover(function () {
            const object = $(this).attr('svg-animation-object-id');
            const item = $(this).attr('svg-animation-item-id');
            Drupal.views_svg_animation.showSvgFile(element, object);
            $('.svg-animation-show', element).removeClass('svg-animation-show');
            $('.svg-wrapper .svg-image', element).addClass(
              'svg-animation-show',
            );
            $(`tr[svg-animation-item-id=${item}]`, element).addClass(
              'svg-animation-show',
            );
            $(
              `.svg-wrapper .svg-image[svg-animation-object-id=${object}] #${item}`,
              element,
            ).addClass('svg-animation-show');
            const event2 = new CustomEvent('svg-animation-show-item', {
              detail: {
                context: element,
                object,
                item,
              },
            });
            document.dispatchEvent(event2);
          });
          $('tbody', element).hover(
            function () {
              // Intentionally empty.
            },
            function () {
              $('.svg-animation-show', element).removeClass(
                'svg-animation-show',
              );
              Drupal.views_svg_animation.showSvgFile(
                element,
                drupalSettings.svg_animation.first_id,
              );
              const event3 = new CustomEvent('svg-animation-reset', {
                detail: {
                  context: element,
                },
              });
              document.dispatchEvent(event3);
            },
          );
          $('.svg-wrapper', element).show();
          Drupal.views_svg_animation.showSvgFile(
            element,
            drupalSettings.svg_animation.first_id,
          );
        },
      );
    },
  };

  Drupal.views_svg_animation.showSvgFile = function (element, object) {
    $('.svg-wrapper .svg-image', element).hide();
    $(
      `.svg-wrapper .svg-image[svg-animation-object-id=${object}]`,
      element,
    ).show();
    const event4 = new CustomEvent('svg-animation-show-object', {
      detail: {
        context: element,
        object,
      },
    });
    document.dispatchEvent(event4);
  };
})(jQuery, Drupal, drupalSettings);
