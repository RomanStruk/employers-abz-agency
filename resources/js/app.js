require('./bootstrap');

require('admin-lte/plugins/select2/js/select2.full.min');

// moment
global.moment = require('moment');
require('moment/locale/en-gb');
moment.locale('en-gb');

require('admin-lte/plugins/daterangepicker/daterangepicker')
require('admin-lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min')

// bs-custom-file-input
bsCustomFileInput = require('admin-lte/plugins/bs-custom-file-input/bs-custom-file-input.min')

$(function () {
    //Initialize Select2 Elements
    $('.select2').select2();

    //Date range picker
    $('#adddate').datetimepicker({
        format: 'L'
    });

    bsCustomFileInput.init();
})
