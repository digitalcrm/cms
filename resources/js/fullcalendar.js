import { Calendar } from '@fullcalendar/core';
import momentPlugin from '@fullcalendar/moment'
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';
import timeGridPlugin from '@fullcalendar/timegrid';
import listPlugin from '@fullcalendar/list';


// Full calendar
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new Calendar(calendarEl, {
      plugins: [ momentPlugin, dayGridPlugin, timeGridPlugin, listPlugin, interactionPlugin ],
      initialView: 'dayGridMonth',
      themeSystem: 'bootstrap',
      displayEventTime : false,
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
      eventColor: '#1b2961',
    });

    calendar.render();
});
