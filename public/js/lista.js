document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('list');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: "es",
        allDaySlot: false,
        timeZone: 'local',
        initialView: 'listDay',
        // customize the button names,
        // otherwise they'd all just say "list"
        views: {
        listDay: { buttonText: 'Dia' },
        listWeek: { buttonText: 'Semana' },
        listMonth: { buttonText: 'Mes' }
        },
        themeSystem: "bootstrap5",
        headerToolbar: {
        left: 'title',
        center: '',
        right: 'listDay,listWeek,listMonth'
        },
        events: "/citas/ver-cita",
        eventContent: (info) => {
            image = 0;
            var complexity = info.event.extendedProps.complexity

            switch (complexity) {
                case 'ALTA':
                    image = 'img/paciente_calta.png'
                    break;
                case 'MEDIA':
                    image = 'img/paciente_cmedia.png'
                    break;
                case 'BAJA':
                    image = 'img/paciente_cbaja.png'
                    break;
            }

            return {
                html: `
                <div class="content-event d-flex justify-content-between" data-bs-toggle="tooltip" data-bs-placement="top"
                data-bs-custom-class="custom-tooltip"
                data-bs-title="${info.event.extendedProps.pat_firstname}">
                    
                    <img
                    class="image-event" 
                    src="http://127.0.0.1:8000/${image}"
                    style="width: 20px"
                    />
                    <div
                    class="box-event"
                    style="background-color: ${info.event.extendedProps.fiste_hexcolor}; width: 20px; height: 20px"
                    >
                    </div>
                    <p>${info.event.extendedProps.pat_firstname} ${info.event.extendedProps.pat_lastname} ${info.event.extendedProps.pat_second_lastname} ${info.event.extendedProps.pat_gender} ${info.event.extendedProps.pat_ages} ${info.event.extendedProps.date_start}</p>
                </div>`,
            };
        },
    });
    calendar.render();
  });


// <img
// class="flag-event"
// src="https://${info.event.extendedProps.flag_img}"
// alt="flag"
// />