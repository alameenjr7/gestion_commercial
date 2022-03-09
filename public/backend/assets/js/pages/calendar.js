"use strict";

var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0');
var yyyy = today.getFullYear();
today = mm + '/' + dd + '/' + yyyy;


$('#calendar').fullCalendar({

    header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
    },

    defaultDate: today,
    editable: true,
    droppable: true, // this allows things to be dropped onto the calendar
    drop: function() {
        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
            // if so, remove the element from the "Draggable Events" list
            $(this).remove();
        }
    },
    eventLimit: false, // allow "more" link when too many events
    events: [
        {
            title: 'All Day Event',
            start: '2018-07-01',
            className: 'bg-info',

        }
    ]
});

