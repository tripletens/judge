(function($) {
    function isempty(el) {
        for (var i = 0; i < el.length - 1; i++) {
            if (!$.trim(el[i].value) && el[i] != el.phone2) {
                console.log(el[i]);
                return true;
            }
        }
    }



    function isvalidEmail(el) {
        var rgx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return rgx.test(el);
    }

    function isvalidPassword(p, c) {
        if (p.length < 6) {
            alert('Password must be greater than 6 characters');
            return false;
        } else {
            if (p != c) {
                alert('your Password did not match');
                return false;
            } else {
                return true;
            }
        }
    }


    function isvalidNumber(el) {
        var rgx = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,10}$/im;
        return rgx.test(el);
    }

    $('form#create').on('submit', function(e) {

        var elements = this.elements;

        if (isempty(elements)) {
            alert('field empty');
            e.preventDefault();
            return;
        } else if (elements.email) {
            if (!isvalidEmail(elements.email.value)) {
                alert('Email Validation Failed');
                e.preventDefault();
                return;
            }
        } else if (elements.phone) {
            if (!isvalidNumber(elements.phone.value)) {
                alert('invalid Number');
                e.preventDefault();
                return;
            }
        } else if (elements.password) {
            if (!isvalidPassword(elements.password.value, elements.confpass.value)) {
                alert('password error');
                e.preventDefault();
                return;
            }
        }
    });


    if ($('.bxslider').length) {
        var slider = $('.bxslider').bxSlider({
            mode: 'horizontal'
        });

        $('#reload-slider').click(function(e) {
            e.preventDefault();
            slider.reloadSlider({
                mode: 'fade',
                auto: true,
                pause: 1000,
                speed: 500
            });
        });
    }

    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });
    $('.scrollup').click(function() {
        $("html, body").animate({ scrollTop: 0 }, 1000);
        return false;
    });

    wow = new WOW({}).init();


})(jQuery);
