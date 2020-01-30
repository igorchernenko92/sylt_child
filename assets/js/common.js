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



        function initOwl() {
            var sync1 = $("#sync1");
            var sync2 = $("#sync2");
            var slidesPerPage = 4; //globaly define number of elements per page
            var syncedSecondary = true;

            sync1.owlCarousel({
                items: 1,
                slideSpeed: 2000,
                nav: true,
                autoplay: false,
                dots: true,
                loop: true,
                responsiveRefreshRate: 200,
                navText: ['<svg width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>', '<svg width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
            }).on('changed.owl.carousel', syncPosition);

            sync2
                .on('initialized.owl.carousel', function() {
                    sync2.find(".owl-item").eq(0).addClass("current");
                })
                .owlCarousel({
                    items: slidesPerPage,
                    dots: true,
                    nav: true,
                    smartSpeed: 200,
                    slideSpeed: 500,
                    slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
                    responsiveRefreshRate: 100
                }).on('changed.owl.carousel', syncPosition2);

            function syncPosition(el) {
                //if you set loop to false, you have to restore this next line
                //var current = el.item.index;

                //if you disable loop you have to comment this block
                var count = el.item.count - 1;
                var current = Math.round(el.item.index - (el.item.count / 2) - .5);

                if (current < 0) {
                    current = count;
                }
                if (current > count) {
                    current = 0;
                }

                //end block

                sync2
                    .find(".owl-item")
                    .removeClass("current")
                    .eq(current)
                    .addClass("current");
                var onscreen = sync2.find('.owl-item.active').length - 1;
                var start = sync2.find('.owl-item.active').first().index();
                var end = sync2.find('.owl-item.active').last().index();

                if (current > end) {
                    sync2.data('owl.carousel').to(current, 100, true);
                }
                if (current < start) {
                    sync2.data('owl.carousel').to(current - onscreen, 100, true);
                }
            }

            function syncPosition2(el) {
                if (syncedSecondary) {
                    var number = el.item.index;
                    sync1.data('owl.carousel').to(number, 100, true);
                }
            }

            sync2.on("click", ".owl-item", function(e) {
                e.preventDefault();
                var number = $(this).index();
                sync1.data('owl.carousel').to(number, 300, true);
            });
        }
        initOwl();



    };
    listingGallery();


});


