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
        var $rangeMin = $(".range-min");
        var $rangeMax = $(".range-max");

        var options = {
            type: "double",
            skin: "round",
            min: 0,
            max: 1000,
            from: 200,
            to: 800,
            prefix: "$",
            onChange: function (data) {
                console.log(data);
            }
        };

        function init () {
            $range.ionRangeSlider(options);
        }

        if ($range.length) init();
    };
    initIonRange();

});
