jQuery(document).ready(function($) {

    var customSelect = function () {
        var $selectItems = $(".listings-search-field .multiselect");

        function initMultiselect () {
            $selectItems.multipleSelect();
        }

        if ($selectItems.length) initMultiselect();

    };
    customSelect();

});
