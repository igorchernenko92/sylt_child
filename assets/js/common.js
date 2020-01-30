jQuery(document).ready(function($) {
    $("form.wpsight-listings-search").attr("autocomplete", "off");

    var initMultiselect = function () {
        var $selectItems = $(".listings-search-field .multiselect");
        var $listingResetBtn = $(".listings-search-reset");
        var options = {};

        function init () {
            $selectItems.multipleSelect(options);
            $(".ms-select-all").find("span").text(child_string.select_all);
        }

        function setEventListingResetBtn () {
            $listingResetBtn.on("click", function () {
                $selectItems.multipleSelect('uncheckAll');
            });
        }

        if ($selectItems.length) init();
        if ($listingResetBtn.length) setEventListingResetBtn();
    };
    initMultiselect();

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
                        min: "0",
                        del: " - ",
                        max: "1.600.000+"
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


        function setMinMaxPrices (index) {
            var curPricesData = pricesData.find(function (cur) {
                return cur.offer === curOffer;
            });

            var minPrice = curPricesData.data[index].min.replace(/\./g, "");
            var maxPrice = curPricesData.data[index].max.replace(/\./g, "");

            $priceMin.attr("value", minPrice);
            if (maxPrice.length) $priceMax.attr("value", maxPrice);
            else $priceMax.attr("value", minPrice);
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
                setPricesOptions();
            });

            $pricesSelect.on("change", function () {
                curIndex = $(this).val();
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
    }
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
                    w: $(this).data("width"),
                    h: $(this).data("height")
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

});
