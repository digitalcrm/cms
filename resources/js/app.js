require('./bootstrap');

import $ from 'jquery';
window.$ = window.jQuery = $;

// window.Swal = require('sweetalert2');
import Swal from 'sweetalert2';
window.Swal = window.sweetalert2 = Swal;

import { Calendar } from '@fullcalendar/core';
import momentPlugin from '@fullcalendar/moment'
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
      plugins: [ momentPlugin, dayGridPlugin, timeGridPlugin, listPlugin, interactionPlugin ],
      initialView: 'dayGridMonth',
      themeSystem: 'bootstrap',
      height: 600,
      selectable:true,
      editable:true,
      headerToolbar: {
        left: 'today,prev,next',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      eventClick: function(info) {
          var eventObj = info.event;
        //   console.log(eventObj.extendedProps.description);
        if (eventObj.extendedProps.customer > 0) {
          alert(
            'Want\'s to view ' + eventObj.title + '.\n' +
            'Will open ' + eventObj.url + ' in a new tab'
          );

          window.open(eventObj.url);

          info.jsEvent.preventDefault(); // prevents browser from following link in current tab.
        } else {
          alert('Clicked ' + eventObj.title);
        }
      },
      eventDidMount: function(info) {
        $(info.el).tooltip({
            title: info.event.extendedProps.description,
            trigger: 'hover',
          })
        //   .on('show.bs.tooltip', function(e) {
        //     var link = $(this);
        //     var obj = e.event;
        //     var data = '';
        //     data += '<ul>';
        //     data += '<li>Muhammad Salah</li>';
        //     data += '	<li>Muhammad Salah</li>';
        //     data += '	<li>and a gazillion more...</li>';
        //     data += '</ul>';
        //     link.attr('data-original-title', data);
        //     setTimeout(function() {
        //       if (link.is(':hover')) {
        //         link.tooltip("dispose").tooltip("show");
        //       }
        //     }, 1000);
        // });
      },
      events: '/bookingeventdata',
      eventColor: '#378006',
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



