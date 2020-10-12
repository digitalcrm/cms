require('./bootstrap');

import $ from 'jquery';
window.$ = window.jQuery = $;

// window.Swal = require('sweetalert2');
import Swal from 'sweetalert2';
window.Swal = window.sweetalert2 = Swal;

import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';
import timeGridPlugin from '@fullcalendar/timegrid';
import listPlugin from '@fullcalendar/list';




import 'jquery-ui/ui/widgets/datepicker.js';
import'admin-lte/plugins/datatables/jquery.dataTables.min.js';
import'admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js';
import'admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js';
import'admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js';
import'admin-lte/plugins/select2/js/select2.full.min.js';
// import'admin-lte/plugins/jquery/jquery.min.js';
// import'admin-lte/plugins/moment/moment.min.js';
import'admin-lte/plugins/daterangepicker/daterangepicker.js';


// Datepicket Code
$('#datepicker').datepicker();

//Datatable
$("#example1").DataTable({
    'responsive': true,
    'autoWidth': false,
    'ordering': false,
  });

//Initialize Select2 Elements
$('.select2').select2();

//Initialize Select2 Elements
$('.select2bs4').select2({
    theme: 'bootstrap4'
});

// Full calendar
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new Calendar(calendarEl, {
      plugins: [ dayGridPlugin, timeGridPlugin, listPlugin, interactionPlugin ],
      initialView: 'dayGridMonth',
      themeSystem: 'bootstrap',
      selectable:true,
      editable:true,
      headerToolbar: {
        left: 'today,prev,next',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      events: [
        {
          title: 'All Day Event',
          start: '2020-10-01',
        },
        {
          title: 'Long Event',
          start: '2020-10-07',
          end: '2020-10-10'
        },
        {
          groupId: '999',
          title: 'Repeating Event',
          start: '2020-10-10T16:00:00'
        },
        {
          groupId: '999',
          title: 'Repeating Event',
          start: '2020-10-16T16:00:00'
        },
        {
          title: 'Conference',
          start: '2020-10-11',
          end: '2020-10-13'
        },
        {
          title: 'Meeting',
          start: '2020-10-12T10:30:00',
          end: '2020-10-12T12:30:00'
        },
        {
          title: 'Lunch',
          start: '2020-10-12T12:00:00'
        },
        {
          title: 'Meeting',
          start: '2020-10-12T14:30:00'
        },
        {
          title: 'Birthday Party',
          start: '2020-10-13T07:00:00'
        },
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2020-10-28'
        }
      ]
    });

    calendar.render();
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



