jQuery(document).ready(function($) {
    // $("form.wpsight-listings-search").attr("autocomplete", "off");
    var initMultiselect = function () {
        $selectItems = $(".listings-search-field .multiselect");
        var $listingResetBtn = $(".listings-search-reset");

        function init () {
             test = $selectItems.multipleSelect();
            $(".ms-select-all").find("span").text(child_string.select_all);
        }

        function setEventListingResetBtn () {
            $listingResetBtn.on("click", function () {
                $selectItems.multipleSelect('uncheckAll');

                eraseCookie('options');
                eraseCookie('locationValue');
                eraseCookie('typeValue');
                eraseCookie('featureValue');
                eraseCookie('offerValue');
                eraseCookie('priceValue');
            });
        }
        if ($selectItems.length) init();
        if ($listingResetBtn.length) setEventListingResetBtn();

        url = new URL(window.location.href);
        var locationParam = url.searchParams.getAll("location[]");
        var typeParam = url.searchParams.getAll("listing-type[]");
        var featureParam = url.searchParams.getAll("feature[]");
        var items = $.merge(locationParam, typeParam, featureParam);

        if ( locationParam.length !== 0 ) {
            $('.listings-search-field-location .ms-parent .ms-choice .placeholder').text(getCookie('locationValue'));
        }

        if ( typeParam.length !== 0 ) {
            $('.listings-search-field-listing-type .ms-parent .ms-choice .placeholder').text(getCookie('typeValue'));
            console.log(getCookie('typeValue'));
        }

        if ( featureParam.length !== 0 ) {
            $('.listings-search-field-feature .ms-parent .ms-choice .placeholder').text(getCookie('featureValue'));

        }

        if ( items.length !== 0 ) {
            $selectItems.multipleSelect('setSelects', getCookie('options'));
        }

    };
    initMultiselect();

    //grap all data after submit and add cookies
    $('form.wpsight-listings-search').submit(function( e ) {
        var locationValue =  $('.listings-search-field-location .multiselect button span').text();
        var typeValue =  $('.listings-search-field-listing-type .multiselect button span').text();
        var featureValue =  $('.listings-search-field-feature .multiselect button span').text();
        var offerValue =  $('.listing-search-offer').val();
        var priceValue =  $('.listing-search-prices').val();

        setCookie('locationValue', locationValue, 10);
        setCookie('typeValue', typeValue, 10);
        setCookie('featureValue', featureValue, 10);
        setCookie('offerValue', offerValue, 10);
        setCookie('priceValue', priceValue, 1);

        options = [];
        options.push($('.listings-search-field-location select').val());
        options.push($('.listings-search-field-listing-type select').val());
        options.push($('.listings-search-field-feature select').val());

        setCookie('options', options);
    });

    //catch click to previous page in browser
    if (window.performance && window.performance.navigation.type == window.performance.navigation.TYPE_BACK_FORWARD) {
        $('.listings-search-field-location .ms-parent .ms-choice .placeholder').text(getCookie('locationValue'));
        $('.listings-search-field-listing-type .ms-parent .ms-choice .placeholder').text(getCookie('typeValue'));
        $('.listings-search-field-feature .ms-parent .ms-choice .placeholder').text(getCookie('featureValue'));
        $selectItems.multipleSelect('setSelects', getCookie('options'));

        // initChangePricesLogic();

        $('.listing-search-offer').val(getCookie('offerValue')).trigger('change');

    }


    var initChangePricesLogic = function () {
        var $offerSelect = $(".listing-search-offer");
        var $pricesSelect = $(".listing-search-prices");
        var $listingResetBtn = $(".listings-search-reset");
        var $priceMin = $(".listing-search-min");
        var $priceMax = $(".listing-search-max");

        var curOffer = $offerSelect.val() ? $offerSelect.val() : "default";
        var curIndex;
        var pricesData = [
            {
                offer: 'default',
                data: [
                    {
                        min: child_string.price_label,
                        del: "",
                        max: ""
                    }
                ]
            },
            {
                offer: 'rent',
                data: [
                    {
                        min: "0",
                        del: " - ",
                        max: "500"
                    },
                    {
                        min: "500",
                        del: " - ",
                        max: "1.000"
                    },
                    {
                        min: "1.000",
                        del: " - ",
                        max: "2.500"
                    },
                    {
                        min: "2.500",
                        del: " - ",
                        max: "4.000"
                    },
                    {
                        min: "4.000",
                        del: "+ ",
                        max: ""
                    }
                ]
            },
            {
                offer: 'sale',
                data: [
                    {
                        min: "0",
                        del: " - ",
                        max: "250.000"
                    },
                    {
                        min: "250.000",
                        del: " - ",
                        max: "500.000"
                    },
                    {
                        min: "500.000",
                        del: " - ",
                        max: "800.000"
                    },
                    {
                        min: "800.000",
                        del: " - ",
                        max: "1.200.000"
                    },
                    {
                        min: "1.200.000",
                        del: " - ",
                        max: "1.600.000"
                    },
                    {
                        min: "1.600.000",
                        del: "+ ",
                        max: ""
                    }
                ]
            }
        ];

        function changeMinMax(state) {
            if (state) {
                $priceMin.attr("name", "min");
                $priceMax.attr("name", "max");
            } else {
                $priceMin.removeAttr("name");
                $priceMax.removeAttr("name");
            }
        }
        changeMinMax(false);

        function setMinMaxPrices (index) {
            var curPricesData = pricesData.find(function (cur) {
                return cur.offer === curOffer;
            });

            var minPrice = curPricesData.data[index].min.replace(/\./g, "");
            var maxPrice = curPricesData.data[index].max.replace(/\./g, "");


            $priceMin.attr("value", minPrice);

            if (maxPrice.length) {
                $priceMax.attr("value", maxPrice);
            }
            else {
                $priceMax.removeAttr("name");
            }
        }

        function setPricesOptions () {
            $pricesSelect.find("option").remove();

            var curPricesData = pricesData.find(function (cur) {
                return cur.offer === curOffer;
            });

            if (curPricesData.offer === "default") {
                $pricesSelect.attr("disabled", "disabled");
            } else {
                $pricesSelect.removeAttr("disabled");
            }

            curPricesData.data.forEach(function (cur, index) {
                var text = cur.min + cur.del + cur.max;
                var tag = "<option value='" + index + "'>" + text + "</option>";
                $pricesSelect.append(tag)
            });

            setMinMaxPrices(0);

        }

        function initSelectPrice () {
            setPricesOptions();

            $offerSelect.on("change", function () {
                curOffer = $(this).val() ? $(this).val() : "default";
                if (curOffer === "default") changeMinMax(false);
                else changeMinMax(true);

                setPricesOptions();
            });

            $pricesSelect.on("change", function () {
                curIndex = $(this).val();
                changeMinMax(true);
                setMinMaxPrices(curIndex);
            });
        }

        function setEventListingResetBtn () {
            $listingResetBtn.on("click", function () {
                curOffer = "default";
                setPricesOptions();
            });
        }


        if ($offerSelect.length && $pricesSelect.length) initSelectPrice();
        if ($listingResetBtn.length) setEventListingResetBtn();
    };
    initChangePricesLogic();

    var headerSearch = function () {
        var $btn = $(".header-search-btn");
        var $search = $(".wrap-header-search");

        function init() {
            $btn.on("click", function () {
                $search.toggleClass("active");
            });
        }

        if ($btn.length && $search.length) init();
    };
    headerSearch();

    var listingGallery = function () {
        var $main = $(".wpsight-listing-gallery .gallery-main");
        var $thumbnails = $(".wpsight-listing-gallery .gallery-thumbnails");

        function initPhotoswipe() {
            var container = [];
            var $targetItems = $('.gallery-main').find('.swiper-slide');

            $targetItems.each(function() {
                var item = {
                    src: $(this).attr('href'),
                    w: 1300,
                    h: 1300
                };
                container.push(item);
            });

            $targetItems.click(function(event) {
                event.preventDefault();

                var $pswp = $('.pswp')[0],
                    options = {
                        index: $(this).index(),
                        bgOpacity: 0.85,
                        showHideOpacity: true
                    };

                var gallery = new PhotoSwipe($pswp, PhotoSwipeUI_Default, container, options);

                gallery.init();
            });
        }

        function initSwiper() {
            var thumbnailsSwiper = new Swiper($thumbnails, {
                spaceBetween: 10,
                slidesPerView: 5,
                allowTouchMove: false,
                simulateTouch: false,
                navigation: {
                    nextEl: '.gallery-thumbnails .swiper-button-next',
                    prevEl: '.gallery-thumbnails .swiper-button-prev',
                },
                breakpoints: {
                    0: {
                        slidesPerView: 2,
                        allowTouchMove: true,
                    },
                    480: {
                        slidesPerView: 3
                    },
                    768: {
                        slidesPerView: 5,
                        allowTouchMove: false,
                    }
                }
            });

            var mainSwiper = new Swiper($main, {
                spaceBetween: 10,
                navigation: {
                    nextEl: '.gallery-main .swiper-button-next',
                    prevEl: '.gallery-main .swiper-button-prev',
                },
                thumbs: {
                    swiper: thumbnailsSwiper
                },
                on: {
                    init: function () {
                        initPhotoswipe()
                    }
                },
            });

            $thumbnails.find(".swiper-slide").on("mousedown", function () {
                mainSwiper.slideTo($(this).index());
                thumbnailsSwiper.slideTo($(this).index());
            });
        }

        if ($main.length && $thumbnails.length) initSwiper();
    };
    listingGallery();

    function setCookie(key, value, expiry) {
        var expires = new Date();
        expires.setTime(expires.getTime() + (expiry * 24 * 60 * 60 * 1000));
        document.cookie = key + '=' + value + ';path=/' + ';expires=' + expires.toUTCString();
    }

    function getCookie(key) {
        var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
        return keyValue ? keyValue[2] : null;
    }

    function eraseCookie(key) {
        var keyValue = getCookie(key);
        setCookie(key, keyValue, '-1');
    }

    var priceParam = url.searchParams.getAll("min");
    if ( priceParam.length !== 0 ) {
        $('.listing-search-prices').val(getCookie('priceValue'));
    }

});
