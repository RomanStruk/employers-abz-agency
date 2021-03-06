require('./bootstrap');
require('admin-lte');

require('admin-lte/plugins/select2/js/select2.full.min');

// moment
global.moment = require('moment');
require('moment/locale/en-gb');
moment.locale('en-gb');

//Mask
require('admin-lte/plugins/inputmask/jquery.inputmask.min')

//Date Picker
require('admin-lte/plugins/daterangepicker/daterangepicker')
require('admin-lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min')

// bs-custom-file-input
bsCustomFileInput = require('admin-lte/plugins/bs-custom-file-input/bs-custom-file-input.min')

//dataTables
require('admin-lte/plugins/datatables/jquery.dataTables');
require('admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4');
require('admin-lte/plugins/datatables-buttons/js/buttons.bootstrap4.min');
require('admin-lte/plugins/datatables-responsive/js/dataTables.responsive');
require('admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4');

