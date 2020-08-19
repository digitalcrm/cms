require('./bootstrap');

import $ from 'jquery';
window.$ = window.jQuery = $;

// window.Swal = require('sweetalert2');
import Swal from 'sweetalert2';
window.Swal = window.sweetalert2 = Swal;

import 'jquery-ui/ui/widgets/datepicker.js';

import'admin-lte/plugins/datatables/jquery.dataTables.min.js';
import'admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js';
import'admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js';
import'admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js';
import'admin-lte/plugins/select2/js/select2.full.min.js';


// Datepicket Code
$('#datepicker').datepicker();

//Datatable
$("#example1").DataTable({
    "responsive": true,
    "autoWidth": false,
  });

//Initialize Select2 Elements
$('.select2').select2();

//Initialize Select2 Elements
$('.select2bs4').select2({
    theme: 'bootstrap4'
});

//Sweetalert Test
// const Toast = Swal.mixin({
// toast: true,
// position: 'top-end',
// showConfirmButton: false,
// timer: 3000
// });

// $('.swalDefaultSuccess').click(function() {
// Toast.fire({
//     icon: 'success',
//     title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
// })
// });



