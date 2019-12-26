jQuery(document).ready(function($) {

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
        var $selectItems = $(".listings-search-field-select2 select");
        var options = {
            multiple: true,
            closeOnSelect: false
        };

        function init () {
            $selectItems.select2(options);
        }

        if ($selectItems.length) init();
    };
    initSelect2();

    var initIonRange = function () {
        var $range = $(".ion-range-slider");
        var $rangeData = null;
        var $rangeMin = $(".listing-search-min");
        var $rangeMax = $(".listing-search-max");
        var $selectOffer = $(".listing-search-offer");

        var selectOffer = [
            {
                name: 'sale',
                data: {
                    min: 50000,
                    max: 2000000
                }
            },
            {
                name: 'rent',
                data: {
                    min: 300,
                    max: 2000
                }
            }
        ];

        var options = {
            type: "double",
            skin: "round",
            min: selectOffer[0].data.min,
            max: selectOffer[0].data.max,
            from: selectOffer[0].data.min,
            to: selectOffer[0].data.max,
            prefix: "$",
            onLoad: outputFirstValues,
            onChange: outputValues,
            onFinish: outputValues
        };


        function outputFirstValues () {
            // $rangeMin.attr("value", rangeValues.from);
            // $rangeMax.attr("value", rangeValues.to);
        }

        function outputValues (data) {
            $rangeMin.attr("value", data.from);
            $rangeMax.attr("value", data.to);
        }

        function initRange () {
            $range.ionRangeSlider(options);
            $rangeData = $range.data("ionRangeSlider");
        }

        function setEventSelectOffer () {
            $selectOffer.on("change", function () {
                curOffer = $(this).val();

                var resultOfferKey = (curOffer === "") ? "sale" : curOffer;

                var resultOffer = selectOffer.find(function (cur) {
                    return cur.name === resultOfferKey;
                });

                $rangeData.update({
                    min: resultOffer.data.min,
                    max: resultOffer.data.max,
                    from: resultOffer.data.min,
                    to: resultOffer.data.max,
                });

                outputValues({
                    from: resultOffer.data.min,
                    to: resultOffer.data.max
                });
            });
        }

        if ($range.length) initRange();
        if ($selectOffer.length) setEventSelectOffer();
    };
    initIonRange();

});
