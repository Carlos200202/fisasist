document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    schedulerLicenseKey: "CC-Attribution-NonCommercial-NoDerivatives",
    initialView: 'dayGridMonth',
    locale: "es",
    allDaySlot: false,
    height: "auto", //tamaño del calendario automatico
    timeZone: "UTF", //tiempo de la zona
    selectable: true, //se puede visualizar como se seleciona una casilla
    selectMirror: false,
    themeSystem: "bootstrap5",
    editable: true,
    dayMaxEventRows: 1,
    timeZone: "local",
    slotLabelFormat: {
      hour: "2-digit",
      minute: "2-digit",
      hour24: true,
    }, //se visualizara de esta manera 01:00 AM en la columna de horas
    eventTimeFormat: {
        hour: "2-digit",
        minute: "2-digit",
        hour24: true,
    }, //este se visualizara de la misma manera pero en el titulo del evento creado en fullcalendar
    // eventContent: renderEventContent, //permite agregar una imagen o icono
    events: "/citas/ver-cita",
    eventDidMount: function(info) {
      console.log(info.el)
      $(info.el).tooltip({
        title: info.event.extendedProps.pat_firstname + ' ' + info.event.extendedProps.pat_lastname,
        placement: 'top',
        trigger: 'hover',
        container: 'body'
      });
    },
    eventDrop: (info) => {
      console.log(info);
      let cadena = info.event.startStr;
      let date = cadena.substring(0, 19);
      axios
          .post("/citas/actualizar-drop/" + info.event.id, {
              resourceId: info.event._def.resourceIds[0],
              start: date,
              end: date,
          })
          .then((response) => {
              calendar.refetchEvents();
              Swal.fire({
                  icon: "success",
                  title: "Enviado",
                  text: "Cita actualizada",
              });
          })
          .catch((error) => {
              if (error.response) {
                  calendar.refetchEvents();
                  Swal.fire({
                      icon: "error",
                      title: "Error",
                      text: "No se pudo actualizar la cita",
                  });
              }
          });
  },
  });
  calendar.render();
});