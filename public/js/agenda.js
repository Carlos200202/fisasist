document.addEventListener("DOMContentLoaded", function () {
    let form = document.getElementById("form");
    let formView = document.getElementById("formView");
    let formUpdate = document.getElementById("formUpdate");
    var calendarEl = document.getElementById("agenda");
    var calendar = new FullCalendar.Calendar(calendarEl, {
        schedulerLicenseKey: "CC-Attribution-NonCommercial-NoDerivatives",
        locale: "es",
        initialView: "resourceTimeGrid", //vista inicial
        slotMinTime: "06:00:00", //comienzo del horario de citas
        slotMaxTime: "19:00:00", //fin del horario de citas
        allDaySlot: false, //quita la opcion de agendar todo el dia
        slotEventOverlap: false, //determina si los eventos deben superponerse visualmente
        scrollTimeReset: false, //indica si la vista debe desplazarse
        rerenderDelay: 500, // tiempo en cargar ciertas cosas
        eventDurationEditable: false, // quita el resizing
        height: "auto", //tamaño del calendario automatico
        timeZone: "UTF", //tiempo de la zona
        slotDuration: "1:00", //duracion de cada evento en la tabla (quita la opcion de media hora que trae por defecto)
        selectable: true, //se puede visualizar como se seleciona una casilla
        selectMirror: false,
        eventStartEditable: true, //Permite que las horas de inicio de los eventos se puedan editar arrastrando
        nowIndicator: true, //deja una linea mostrando la hora actual
        eventOverlap: false,
        editable: true, // allow event dragging
        eventResourceEditable: true,
        timeZone: "local",
        buttonText: {
            today: "Hoy",
            month: "Mes",
            list: "lista",
            resourceTimeGrid: "Agendar",
        },
        headerToolbar: {
            left: "title",
            center: "",
            right: "prev,next today,resourceTimeGrid,dayGridMonth,listDay",
        }, //modifica el header del resource
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
        resources: resource,
        events: "/citas/ver-cita",
        dateClick: (info) => {
            form.reset();
            let cadena = info.dateStr;
            let date = cadena.substring(0, 19);
            // console.log("time: ", date);
            form.start.value = date;
            form.end.value = date;
            form.resourceId.value = info.resource._resource.id;
            var actual = new Date();
            // console.log(info);
            // console.log("actual: " + actual);
            if (info.date >= actual) {
                $("#event").modal("show");
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "No se puede solicitar una cita en una fecha vencida",
                });
            }
        },
        eventDrop: (info) => {
            let cadena = info.event.startStr;
            let date = cadena.substring(0, 19);
                axios
                    .post("/citas/actualizar-cita/" + info.event.id, {
                        resourceId: info.event._def.resourceIds[0],
                        start: date,
                        end: date
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
        eventClick: (info) => {
            
            var event = info.event;
            formView.pat_document.value = info.event.extendedProps.pat_document;
            formView.pat_firstname.value = info.event.extendedProps.pat_firstname;
            formView.pat_lastname.value = info.event.extendedProps.pat_lastname;
            formView.description.value = info.event.extendedProps.description;
            formView.id.value = info.event.id;

            let cadena = info.event.startStr;
            let date = cadena.substring(0, 19);
            formUpdate.pat_document.value = info.event.extendedProps.pat_document;
            formUpdate.pat_firstname.value = info.event.extendedProps.pat_firstname;
            formUpdate.description.value = info.event.extendedProps.description;
            formUpdate.resourceId.value = info.event._def.resourceIds[0];
            document
                .getElementById("btnActualizar")
                .addEventListener("click", function () {
                const datosUpdate = new FormData(formUpdate);
                axios
                    .post("/citas/actualizar-cita/" + info.event.id, datosUpdate)
                    .then((response) => {
                        calendar.refetchEvents();
                        $("#eventActualizar").modal("hide");
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
                });
            document
                .getElementById("btnEliminar")
                .addEventListener("click", function () {
                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: "btn btn-success",
                            cancelButton: "btn btn-danger",
                        },
                        buttonsStyling: false,
                    });

                    swalWithBootstrapButtons
                        .fire({
                            title: "Quieres eliminar este registro?",
                            text: "Estas apunto de eliminar una cita!",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonText: "Eliminar",
                            cancelButtonText: "Cancelar",
                            reverseButtons: true,
                        })
                        .then((result) => {
                            if(result.isConfirmed){
                                axios
                                    .post("/citas/borrar-cita/" + info.event.id)
                                    .then((respuesta) => {
                                        respuesta.data.id;
                                        calendar.refetchEvents();
                                        $("#eventView").modal("hide");
                                        swalWithBootstrapButtons.fire(
                                            "Eliminado!",
                                            "El registro ha sido eliminado.",
                                            "success"
                                        );
                                    })
                                    .catch((error) => {
                                        if(error.response){
                                            console.log(error.response.data);
                                        }
                                    });
                            }else if(result.dismiss === Swal.DismissReason.cancel){
                                swalWithBootstrapButtons.fire(
                                    "Cancelado",
                                    "No eliminaste el registro",
                                    "error"
                                );
                            }
                        });
                });

            axios
                .post("/citas/editar-cita/" + info.event.id)
                .then((respuesta) => {
                    respuesta.data.id;
                    $("#eventView").modal("show");
                })
                .catch((error) => {
                    if (error.response) {
                        console.log(error.response.data);
                    }
                });
        },
        eventContent: (info) => {
            switch (info.event.extendedProps.fist_name) {
                case 'Freddie Mercury':
                    color = '#FFFF33'
                break;
                case 'David Bowie':
                    color = '#CCC'
                break;
                case 'Freddie Mercury':
                    color = '#000'
                break;
            
            }
            return {
                html: `
                <div class="content-event">
                    <img
                    class="image-event"
                    src=""
                    alt=""
                    />
                    <div
                    class="box-event"
                    style="background-color: ${color} "
                    ></div>
                    <img
                    class="flag-event"
                    src="https://${info.event.extendedProps.flag_img}"
                    alt=""
                    />
                </div>`,
            };
        },
    });
    calendar.render();
    document
        .getElementById("btnGuardar")
        .addEventListener("click", function () {
            sendData("/citas/agendar");
        });
    document
        .getElementById("btnModificar")
        .addEventListener("click", function () {
            $("#eventView").modal("hide");
            $("#eventActualizar").modal("show");
        });
    
    function sendData(url) {
        const datos = new FormData(form);
        axios
            .post(url, datos)
            .then((response) => {
                calendar.refetchEvents();
                $("#event").modal("hide");
                Swal.fire({
                    icon: "success",
                    title: "Enviado",
                    text: "Cita registrada",
                });
            })
            .catch((error) => {
                if (error.response) {
                    calendar.refetchEvents();
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: "No se puedo agendar la cita",
                    });
                }
            });
    }
});

let resource = [
    {
        id: "01",
        title: "AB0",
        eventBackgroundColor: "#FDF9C4",
    },
    {
        id: "02",
        title: "AB1",
        eventBackgroundColor: "#FDF9C4",
    },
    {
        id: "03",
        title: "AB2",
        eventBackgroundColor: "#FDF9C4",
    },
    {
        id: "04",
        title: "AB3",
        eventBackgroundColor: "#FDF9C4",
    },
    {
        id: "05",
        title: "AB4",
        eventBackgroundColor: "#FDF9C4",
    },
    {
        id: "06",
        title: "MIX5",
        eventBackgroundColor: "#C5C6C8",
    },
    {
        id: "07",
        title: "MIX6",
        eventBackgroundColor: "#C5C6C8",
    },
    {
        id: "08",
        title: "CER7",
        eventBackgroundColor: "#FFDA9E",
    },
    {
        id: "09",
        title: "CER8",
        eventBackgroundColor: "#FFDA9E",
    },
    {
        id: "10",
        title: "CER9",
        eventBackgroundColor: "#FFDA9E",
    },
    {
        id: "11",
        title: "MAN1",
        eventBackgroundColor: "#84b6f4",
    },
    {
        id: "12",
        title: "MAN2",
        eventBackgroundColor: "#84b6f4",
    },
    {
        id: "13",
        title: "MAN3",
        eventBackgroundColor: "#84b6f4",
    },
    {
        id: "14",
        title: "MAN4",
        eventBackgroundColor: "#84b6f4",
    },
    {
        id: "15",
        title: "MAN5",
        eventBackgroundColor: "#84b6f4",
    },
    {
        id: "16",
        title: "MAN6",
        eventBackgroundColor: "#84b6f4",
    },
    {
        id: "17",
        title: "MAN7",
        eventBackgroundColor: "#84b6f4",
    },
    {
        id: "18",
        title: "MAN8",
        eventBackgroundColor: "#84b6f4",
    },
    {
        id: "19",
        title: "GIM1",
        eventBackgroundColor: "#77dd77",
    },
    {
        id: "20",
        title: "GIM2",
        eventBackgroundColor: "#77dd77",
    },
    {
        id: "21",
        title: "GIM3",
        eventBackgroundColor: "#77dd77",
    },
    {
        id: "22",
        title: "GIM4",
        eventBackgroundColor: "#77dd77",
    },
    {
        id: "23",
        title: "GIM5",
        eventBackgroundColor: "#77dd77",
    },
    {
        id: "24",
        title: "GIM6",
        eventBackgroundColor: "#77dd77",
    },
    {
        id: "25",
        title: "GIM7",
        eventBackgroundColor: "#77dd77",
    },
    {
        id: "26",
        title: "GIM8",
        eventBackgroundColor: "#77dd77",
    },
    {
        id: "27",
        title: "GIM9",
        eventBackgroundColor: "#77dd77",
    },
    {
        id: "28",
        title: "PIS1",
        eventBackgroundColor: "#F67280",
    },
    {
        id: "29",
        title: "PIS2",
        eventBackgroundColor: "#F67280",
    },
    {
        id: "30",
        title: "PIS3",
        eventBackgroundColor: "#F67280",
    },
    {
        id: "31",
        title: "AC1",
        eventBackgroundColor: "#8FBBAF",
    },
    {
        id: "32",
        title: "AC2",
        eventBackgroundColor: "#8FBBAF",
    },
    {
        id: "33",
        title: "AC3",
        eventBackgroundColor: "#8FBBAF",
    },
    {
        id: "34",
        title: "COM1",
    },
    {
        id: "35",
        title: "COM2",
    },
    {
        id: "36",
        title: "COM3",
    },
    {
        id: "37",
        title: "COM4",
    },
    {
        id: "38",
        title: "COM5",
    },
];
