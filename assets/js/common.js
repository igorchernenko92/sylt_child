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
        var options = {};

        function init () {
            $selectItems.select2(options);
        }

        if ($selectItems.length) init();
    };
    initSelect2();

});
