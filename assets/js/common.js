jQuery(document).ready(function($) {

    $("form.wpsight-listings-search").attr("autocomplete", "off");

    var initMultiselect = function () {
        var $selectItems = $(".listings-search-field .multiselect");
        var $listingResetBtn = $(".listings-search-reset");
        var options = {};

        function init () {
            $selectItems.multipleSelect(options);
            $(".ms-select-all").find("span").text("Select / Unselect all");
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
                        min: "200",
                        max: "10000000"
                    }
                ]
            },
            {
                offer: 'sale',
                data: [
                    {
                        min: "200",
                        max: "600"
                    },
                    {
                        min: "601",
                        max: "900"
                    },
                    {
                        min: "901",
                        max: "1200"
                    }
                ]
            },
            {
                offer: 'rent',
                data: [
                    {
                        min: "80.000",
                        max: "150.000"
                    },
                    {
                        min: "150.001",
                        max: "200.000"
                    }
                ]
            }
        ];


        function setMinMaxPrices (index) {
            var curPricesData = pricesData.find(function (cur) {
                return cur.offer === curOffer;
            });

            $priceMin.attr("value", curPricesData.data[index].min);
            $priceMax.attr("value", curPricesData.data[index].max);
        }

        function setPricesOptions () {
            $pricesSelect.find("option").remove();

            var curPricesData = pricesData.find(function (cur) {
               return cur.offer === curOffer;
            });

            curPricesData.data.forEach(function (cur, index) {
                var text = cur.min + " - " + cur.max;
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

});
