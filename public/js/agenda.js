document.addEventListener("DOMContentLoaded", function () {
    let formulario = document.querySelector("#formularioAudiencias");
    var calendarEl = document.getElementById("agenda");
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: "timeGridWeek",
        locale: "es", // idioma en public/js/es.js
        timeZone: "UTC",
        weekends: false,
        allDaySlot: false,
        slotMinTime: "08:00:00",
        slotMaxTime: "16:00:00",
        slotLabelFormat: {
            hour: "numeric",
            minute: "2-digit",
            omitZeroMinute: false,
            meridiem: "short",
        },
        slotDuration: "00:15:00", // duración de cada intervalo de tiempo

        headerToolbar: {
            left: "prev,next today",
            center: "title",
            right: "dayGridMonth,timeGridWeek,timeGridDay,listWeek",
        },

        views: {
            semana: {
                type: "listWeek",
                duration: { weeks: 1 },
                columnFormat: {
                    tipoAudiencia: "Tipo Audiencia",
                    sala: "Sala",
                    magis: "Magistrado",
                },
            },
        },

        events: {
            url: baseURL + "/audiencia/mostrar",
            method: "POST",
            extraParams: {
                _token: formulario._token.value,
            },
        },

        dateClick: function (info) {
            formulario.reset();
            formulario.start.value = info.dateStr + " 09:00:00";
            formulario.end.value = info.dateStr + " 10:00:00";
            $("#audiencia").modal("show");
        },

        eventClick: function (info) {
            var audiencia = info.event;
            axios
                .post(baseURL + "/audiencia/editar/" + audiencia.id)
                .then((respuesta) => {
                    formulario.id.value = respuesta.data.id;
                    formulario.title.value = respuesta.data.title;
                    formulario.start.value = respuesta.data.start;
                    formulario.end.value = respuesta.data.end;
                    formulario.tipoAudiencia.value =
                        respuesta.data.tipoAudiencia;
                    formulario.sala.value = respuesta.data.sala;
                    formulario.magis.value = respuesta.data.magis;
                    formulario.textColor.value = respuesta.data.textColor;
                    formulario.backgroundColor.value =
                        respuesta.data.backgroundColor;
                    formulario.observaciones.value =
                        respuesta.data.observaciones;

                    $("#audiencia").modal("show");
                })
                .catch((error) => {
                    if (error.response) {
                        console.log(error.response.data);
                    }
                });
        },
    });
    calendar.render();

    document
        .getElementById("btnGuardar")
        .addEventListener("click", function () {
            axios
                .post(baseURL + "/audiencia/guardar", {
                    title: formulario.title.value,
                    start: formulario.start.value,
                    end: formulario.end.value,
                    tipoAudiencia: formulario.tipoAudiencia.value,
                    sala: formulario.sala.value,
                    magis: formulario.magis.value,
                    textColor: formulario.textColor.value,
                    backgroundColor: formulario.backgroundColor.value,
                    observaciones: formulario.observaciones.value,
                })
                .then((respuesta) => {
                    calendar.refetchEvents();
                    $("#audiencia").modal("hide");
                })
                .catch((error) => {
                    if (error.response) {
                        console.log(error.response.data);
                    }
                });
        });

    document.getElementById("btnEditar").addEventListener("click", function () {
        axios
            .post(baseURL + "/audiencia/actualizar/" + formulario.id.value, {
                title: formulario.title.value,
                start: formulario.start.value,
                end: formulario.end.value,
                tipoAudiencia: formulario.tipoAudiencia.value,
                sala: formulario.sala.value,
                magis: formulario.magis.value,
                textColor: formulario.textColor.value,
                backgroundColor: formulario.backgroundColor.value,
                observaciones: formulario.observaciones.value,
            })
            .then((respuesta) => {
                calendar.refetchEvents();
                $("#audiencia").modal("hide");
            })
            .catch((error) => {
                if (error.response) {
                    console.log(error.response.data);
                }
            });
    });

    document
        .getElementById("btnEliminar")
        .addEventListener("click", function () {
            enviarDatos("/audiencia/eliminar/" + formulario.id.value);
        });

    function enviarDatos(url) {
        const newUrl = baseURL + url;
        const datos = new FormData(formulario);
        axios
            .post(newUrl, datos)
            .then((respuesta) => {
                calendar.refetchEvents();
                $("#audiencia").modal("hide");
            })
            .catch((error) => {
                if (error.response) {
                    console.log(error.response.data);
                }
            });
    }
});
