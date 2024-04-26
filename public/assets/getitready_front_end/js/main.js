/*--------------------------------------------------------------
## Meanmenu Activated
--------------------------------------------------------------*/
jQuery(document).ready(function ($) {
    $.noConflict();

    $('.thia').theiaStickySidebar({
        additionalMarginTop: 90
    });


    $(window).scroll(function () {
        var sticky = $('.header-area'), scroll = $(window).scrollTop();

        if (scroll >= 40) {
            sticky.addClass('fixed');
        } else {
            sticky.removeClass('fixed');

        }
    });


    $('.button2').click(function (e) {
        //alert('23232');
        var button_classes, value = +$('.counter2').val();
        button_classes = $(e.currentTarget).prop('class');
        if (button_classes.indexOf('up_count2') !== -1) {
            value = (value) + 1;
        } else {
            value = (value) - 1;
        }
        value = value < 0 ? 0 : value;
        $('.counter2').val(value);
    });

    $('.counter2').click(function () {
        $(this).focus().select();
    });

    $('.button').click(function (e) {
        var button_classes, value = +$('.counter').val();
        button_classes = $(e.currentTarget).prop('class');
        if (button_classes.indexOf('up_count') !== -1) {
            value = (value) + 1;
        } else {
            value = (value) - 1;
        }
        value = value < 0 ? 0 : value;
        $('.counter').val(value);
    });

    $('.counter').click(function () {
        $(this).focus().select();
    });


    $('.buttons').click(function (e) {
        var button_classes, value = +$('.counter1').val();
        button_classes = $(e.currentTarget).prop('class');
        if (button_classes.indexOf('up_count1') !== -1) {
            value = (value) + 1;
        } else {
            value = (value) - 1;
        }
        value = value < 0 ? 0 : value;
        $('.counter1').val(value);
    });
    $('.counter1').click(function () {
        $(this).focus().select();
    });


    /*--------------------------------------------------------------
    ## Owl Carousel Activated
    --------------------------------------------------------------*/
    $('.slider-area').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        autoplay: true,
        autoplaySpeed: 2000,
        autoplayTimeout: 6000,
        navSpeed: 1000,
        mouseDrag: false,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

    $(".slider-area").on('translate.owl.carousel', function () {
        $('.slider-text p').removeClass('fadeInUp animated').css("opacity", "0");
        $('.slider-text h1').removeClass('fadeInRight animated').css("opacity", "0");
        $('.slider-text ul li a').removeClass('fadeInDown animated').css("opacity", "0");
    });

    $(".slider-area").on('translated.owl.carousel', function () {
        $('.owl-item.active .slider-text p').addClass('fadeInUp animated').css("opacity", "1");
        $('.owl-item.active .slider-text h1').addClass('fadeInRight animated').css("opacity", "1");
        $('.owl-item.active .slider-text ul li a').addClass('fadeInDown animated').css("opacity", "1");
    });


    /*--------------------------------------------------------------
    ## Owl Carousel Activated
    --------------------------------------------------------------*/
    $('.coutomer-warp').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        autoplay: true,
        autoplaySpeed: 2000,
        autoplayTimeout: 6000,
        navSpeed: 1000,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    })


    /*--------------------------------------------------------------
    ## Owl Carousel Activated
    --------------------------------------------------------------*/
    $('.clients-info').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        autoplay: true,
        autoplaySpeed: 2000,
        autoplayTimeout: 6000,
        navSpeed: 1000,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })
    /*--------------------------------------------------------------
    ## Owl Carousel Activated
    --------------------------------------------------------------*/
    $('.clint-logo-area').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        autoplay: true,
        autoplaySpeed: 2000,
        autoplayTimeout: 6000,
        navSpeed: 1000,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 5
            }
        }
    })
    $('.fathare-img-warp').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        autoplay: true,
        autoplaySpeed: 2000,
        autoplayTimeout: 2000,
        navSpeed: 1000,
        dots: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })

    $('.testimonial-warp').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        autoplay: true,
        autoplaySpeed: 2000,
        autoplayTimeout: 2000,
        navSpeed: 1000,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 3
            }
        }
    })

    $('.testimonial_info').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        autoplay: true,
        autoplaySpeed: 2000,
        autoplayTimeout: 6000,
        navSpeed: 1000,
        dots: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });


    $(".tab-wrapper.v1 .item .tab-btn a").click(function (e) {
        e.preventDefault();

        var _item = $(this).closest(".item");
        var _hasClass = "selected";
        var _all = $(".tab-wrapper.v1 .item");

        if (_item.hasClass(_hasClass)) {
            _item
                .find(".tab-btn a em")
                .removeClass("mdi-minus")
                .addClass("mdi-plus")
                .closest(".item")
                .find(".tab-content")
                .stop()
                .slideUp(400, function () {
                    _item.removeClass("selected");
                });
        } else {
            _all
                .find(".tab-btn a em")
                .removeClass("mdi-minus")
                .addClass("mdi-plus")
                .closest(".item")
                .find(".tab-content")
                .stop()
                .slideUp(400, function () {
                    _all.removeClass("selected");
                });

            _item
                .find(".tab-btn a em")
                .removeClass("mdi-plus")
                .addClass("mdi-minus")
                .closest(".item")
                .find(".tab-content")
                .stop()
                .slideDown(400, function () {
                    _item.addClass("selected");
                });
        }
    });

    $(".tab-wrapper.v2 .tab-btn a").click(function (e) {
        e.preventDefault();

        var _this = $(this);
        var _hasClass = "selected";
        var _category = _this.data("category");
        var _content = $(".tab-wrapper.v2 .tab-content .item");
        var _all = $(".tab-wrapper.v2 .tab-btn a");

        if (_this.hasClass(_hasClass)) {
        } else {
            _all
                .removeClass(_hasClass)
                .find("em")
                .removeClass("mdi-minus")
                .addClass("mdi-plus");
            _this
                .addClass(_hasClass)
                .find("em")
                .removeClass("mdi-plus")
                .addClass("mdi-minus");

            _content.each(function () {
                var _value = $(this).data("value");

                $(this)
                    .removeClass(_hasClass)
                    .stop()
                    .hide();

                if (_value == _category) {
                    $(this)
                        .stop()
                        .fadeIn("slow", function () {
                            $(this).addClass(_hasClass);
                        });
                }
            });
        }
    });

    var onlyThisDates = ['01/01/2019', '12/12/2018', '13/12/2018', '14/12/2018'];


    $('#start_date').datepicker({
        format: "dd/mm/yyyy",
        startDate: "0d",
        changeMonth: true,
        changeYear: true,
        minDate: 0,
        autoclose: true,
        beforeShowDay: function (date) {
            var dmy = date.getDate() + '/' + (date.getMonth() + 1) + '/' + date.getFullYear();
            return (onlyTheseDates.indexOf(dmy) != -1);
        }
    });


    /**  Date Picker   */
    // $('#start_date').datepicker({
    //     format: 'dd/mm/yyyy',
    //     startDate: '0d',
    //     autoclose: true,
    //
    //
    //
    // });
    /**  End Date Picker */


    /**  Extra Function plus minus  */

    $(document).on('click', '.btn-number', function (e) {
        e.preventDefault();

        fieldName = $(this).attr('data-field');
        type = $(this).attr('data-type');
        var input = $("input[name='" + fieldName + "']");
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal)) {
            if (type == 'minus') {

                if (currentVal > input.attr('min')) {
                    input.val(currentVal - 1).change();
                }
                if (currentVal == input.attr('min')) {
                    input.val(parseInt(input.attr('min'))).change();
                    $(this).closest('.uc_extras').find('input[type="checkbox"]:checked').prop('checked', false);
                    // alert('Sorry, the maximum value was reached.');
                }

            } else if (type == 'plus') {

                if (currentVal < input.attr('max')) {
                    input.val(currentVal + 1).change();
                }
                if (parseInt(input.val()) == input.attr('max')) {
                    // $(this).attr('disabled', true);
                    alert('Sorry, the maximum value was reached.');
                }

            }
        } else {
            input.val(1);
        }
    });
    $(document).on('keyup', '.input-number', function (e) {
        e.preventDefault();
        var max = parseInt($(this).attr('max'));
        var min = parseInt($(this).attr('min'));
        var currentVal = parseInt($(this).val());
        if (!isNaN(currentVal)) {

            if (currentVal < min) {

                $(this).val(min).change();

                $(this).closest('.uc_extras').find('input[type="checkbox"]:checked').prop('checked', false);


            } else if (currentVal > max) {
                $(this).val(max).change();
                alert('Sorry, the maximum value was reached.');

            } else {
                $(this).val(currentVal).change();
            }
        } else {
            $(this).val('');
        }
    });

    $('.input-number').focusin(function () {
        $(this).data('oldValue', $(this).val());
    });

    /**  End Extra Function plus minus */


    /**  End Add More service Button */
    $('#add-more-service').hide();
    $('input:checkbox[name=more_service]').change(function () {
        var more_service = $("input:checkbox[name=more_service]:checked").val();
        if (more_service == 1) {
            $('#add-more-service').show();
            $('.more_service').html('Remove');
        } else if (more_service != 1) {
            $('#add-more-service').hide();
            $('.more_service').html('Add another service');
        }
    });
    /**  End Add More service Button */

    /** End Service select PopUp */
    $(document).on("change", '#service_type_ch', function (e) {
        // alert('working');
        var self = this;
        var service_id = $(self).val();
        var myArray = new Array(8, 9,11);
        if ($.inArray(parseInt(service_id), myArray) !== -1) {
            $(self).prop('checked', false);
            $('#service_type_ch option[value=' + service_id + ']').prop("selected", false);
            $('#myModal').modal('show');
        }

    });
    /** End Service select PopUp */


});


function openNav() {
    document.getElementById("mySidenav").style.width = "200px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}


