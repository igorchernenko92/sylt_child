jQuery(document).ready(function($) {

    $("form.wpsight-listings-search").attr("autocomplete", "off");

    var initMultiselect = function () {
        var $selectItems = $(".listings-search-field .multiselect");
        var options = {};

        function init () {
            $selectItems.multipleSelect(options);
        }

        if ($selectItems.length) init();
    };
    initMultiselect();

    var initSelect2 = function () {
        var $selectItem = $(".listings-search-field-select2 select");

        var options = {
            multiple: true,
            closeOnSelect: false,
            placeholder: "Select features"
        };

        function init () {
            $selectItem.select2(options);
            $selectItem.val(null).trigger("change");
        }

        if ($selectItem.length) init();
    };
    initSelect2();

    var initIonRange = function () {
        var $range = $(".ion-range-slider");
        var $rangeData = null;
        var $rangeMin = $(".listing-search-min");
        var $rangeMax = $(".listing-search-max");
        var $listingResetBtn = $(".listings-search-reset");
        var $selectOffer = $(".listing-search-offer");
        var $selectOfferStartValue = $selectOffer.val();

        var selectOffer = [
            {
                name: 'sale',
                data: {
                    min: 50000,
                    max: 2000000,
                    step: 25000
                }
            },
            {
                name: 'rent',
                data: {
                    min: 300,
                    max: 2000,
                    step: 50
                }
            }
        ];

        var options = {
            type: "double",
            skin: "round",
            min: selectOffer[1].data.min,
            max: selectOffer[1].data.max,
            from: selectOffer[1].data.min,
            to: selectOffer[1].data.max,
            step: selectOffer[1].data.step,
            prefix: "$",
            onStart: outputFirstValues,
            onChange: outputValues,
            onFinish: outputValues
        };


        function outputFirstValues () {
            outputValues({
                from: selectOffer[1].data.min,
                to: selectOffer[1].data.max
            });
        }

        function outputValues (data) {
            $rangeMin.attr("value", data.from);
            $rangeMax.attr("value", data.to);
        }

        function initRange () {
            $range.ionRangeSlider(options);
            $rangeData = $range.data("ionRangeSlider");
        }

        function changeRange(type) {
            type = (type === "") ? "rent" : type;

            var resultOffer = selectOffer.find(function (cur) {
                return cur.name === type;
            });

            $rangeData.update({
                min: resultOffer.data.min,
                max: resultOffer.data.max,
                from: resultOffer.data.min,
                to: resultOffer.data.max,
                step: resultOffer.data.step
            });

            outputValues({
                from: resultOffer.data.min,
                to: resultOffer.data.max
            });
        }

        function setEventSelectOffer () {
            changeRange($selectOfferStartValue);

            $selectOffer.on("change", function () {
                curOffer = $(this).val();

                changeRange(curOffer);
            });
        }

        function setEventListingResetBtn () {
            $listingResetBtn.on("click", function () {
                changeRange($selectOffer.val());
            });
        }

        if ($range.length) initRange();
        if ($selectOffer.length) setEventSelectOffer();
        if ($listingResetBtn.length) setEventListingResetBtn();
    };
    initIonRange();

});
