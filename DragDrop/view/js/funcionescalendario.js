function vehiculosasignados(id_proyecto)
{
    $.post('../../DragDrop/controller/controllervehiculos.php', {
        id_proyecto: id_proyecto
    },
    function() {

    });
    eventoscalendario(id_proyecto);
}

function eventoscalendario(id_proyecto)
{
    //    if(opcion==3)
    //    {
    $.post('../../DragDrop/controller/controllereventoscalendario.php', {
        id_proyecto: id_proyecto
    },
    function() {

    });


    drag(id_proyecto);
//    }
//    else if(opcion==2)
//    {
//        $.post('../../DragDrop/controller/controllereventoscalendario.php', {
//            id_proyecto: id_proyecto
//        },
//        function() {
//
//            });
//    }
}

function drag(id_proyecto)
{
    //    alert(id_proyecto);
    //   var capa=$("#divDragDrop");
    //    capa.
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();
    $("#divDragDrop").load("../../DragDrop/view/viewDragAndDrop.php",
            {
                id_proyecto: id_proyecto
            }, function() {
        //                 $("#optionConductores").html(data);

        //        conductoresasignados(id_proyecto);


        /* initialize the external events
         -----------------------------------------------------------------*/

        $('#external-events div.external-event').each(function() {

            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            var eventObject = {
                title: $.trim($(this).text()), // use the element's text as the event title
                //                resource: parseInt($(this).attr('employee')),
                id: $(this).attr('id'),
                name: $(this).attr('name'),
                identificador: $(this).attr('identificador'), //			title: 'Repeating Event',
                opcion: $(this).attr('opcion'),
                start: new Date(y, m, d + 4, 16, 0),
                allDay: false,
                color: $(this).attr('color')
            };
            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);
            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 999,
                revert: true, // will cause the event to go back to its
                revertDuration: 0  //  original position after the drag
            });
        });
        //
        //$("#calendar, #conductores" ).droppable({
        //        accept:'div',
        //        activeClass: "hola",
        ////        hoverClass: "ui-state-hover",                                   
        //        drop: function( ev, ui ) {
        //            //   $('li').attr("style","display:inline;");
        //            //            ui.draggable.appendTo(this).fadeIn();
        //            var variable=true;
        //            $(this).append($(ui.draggable)); 
        //        }
        //    });
        /* initialize the calendar
         -----------------------------------------------------------------*/
        $("#jj").show();
        $('#calendar').fullCalendar({
            theme: true,
            firstDay: 1,
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
//             monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles',
                'Jueves', 'Viernes', 'Sábado'],
//             dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
            buttonText: {
                today: 'hoy',
                month: 'mes',
                week: 'semana',
                day: 'día'},
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'resourceDay,resourceWeek,resourceNextWeeks,resourceMonth'
            },
            defaultView: 'resourceWeek',
            resources: '../../DragDrop/controller/controllerresourcevehiculos.php',
            selectable: true,
            events: '../../DragDrop/controller/controllereventosconductor.php',
            selectHelper: true,
            //            select: function(start, end, allDay, ev, resource) {
            //
            //                var title = prompt('Event Title:');
            //                if (title) {
            //                    if (res)
            //                    {
            //                        $('#calendar').fullCalendar('renderEvent',
            //                                {
            //                                    title: title,
            //                                    start: start,
            //                                    end: end,
            //                                    allDay: allDay,
            //                                    resource: id
            //                                },
            //                        true // make the event "stick"
            //                                );
            //                    }
            //                    else
            //                    {
            //                        var rid = prompt('resource');
            //                        $('#calendar').fullCalendar('renderEvent',
            //                                {
            //                                    title: title,
            //                                    start: start,
            //                                    end: end,
            //                                    allDay: allDay,
            //                                    id: resource.id
            //                                },
            //                        true // make the event "stick"
            //                                );
            //                    }
            //                }
            //                $('#calendar').fullCalendar('unselect');
            //            },
            //            select: function(start, end, allDay, jsEvent, view, resource) 
            //            {
            //                var 
            //                title = prompt('event title:'); 
            //                if (title) {
            //                    calendar.fullCalendar('renderEvent',
            //
            //                    {
            //                            title: title, 
            //                            start: start, 
            //                            end: end, 
            //                            allDay: allDay, 
            //                            resource: resource.id 
            //                        }, 
            //                        true // make the event "stick" 
            //                        ); 
            //                }
            //                calendar.fullCalendar('unselect'); 
            //            },
            eventDragStart: function(resource, element, view, jsEvent, ui, event)
            {
//                $("#DeleteEvent").show(200);
                //               var dragged = [ ui.helper[0], event ];
                //               alert(dragged);
                //                alert(resource.title);
                //            alert(resource.id);

                //cal.fullCalendar('removeEvents', )

                //                conductoresasignados(resource, element, view,ui,event);
            },
            eventDragStop: function(resource, element, view, jsEvent, ui, event)
            {
                //                $("#DeleteEvent").droppable({
                //
                //                    //eventDragStop: function(resource, element, view,event, jsEvent)
                //                    //            {
                //                    //                $(".refresh-driver").hide(200);
                //                    //                vehiculosasignados(id_proyecto);
                //            
                //                                
                //                    ////                    accept:'div',
                //                    //                    //        activeClass: "hola",
                //                    hoverClass: "ui-state-hover",  
                //                    droppable: true,                   
                //                    drop: function( ev, ui ) {
                //                    
                //                        alert(resource.id)
                //                    
                //                        //   $('li').attr("style","display:inline;");
                //                        //            ui.draggable.appendTo(this).fadeIn();
                //                        //                        var variable=true;
                //                        //                    var originalEventObject = $(this).data('eventObject');
                //                        //                    var copiedEventObject = $.extend({}, originalEventObject);
                //                        //                    $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
                //                   
                //                        //                    $('#calendar').fullCalendar('removeEvents',eventid);
                //                        $('#calendar').fullCalendar('removeEventSource',resource.id);
                //                        $(this).append($(ui.draggable)); 
                //                    }
                //                });
            },
            eventMouseover: function(event, domEvent) {

                //                var terminado=false;
                if (event.terminado == 1) {
                    //                    event.color="red";
                }
                else {
                    //                var layer = '<div id="events-layer" class="fc-transparent" style="position:absolute; width:100%; height:100%; top:-1px; text-align:right; z-index:100"><a><img src="../../DragDrop/view/js/delete.png" title="Eliminar" width="14" id="delbut' + event.id + '" border="0" style="padding-right:-1px; padding-top:0px;" /></a></div>';
                    var layer = '<div id="events-layer" class="fc-transparent" style="position:absolute; width:100%; height:100%; top:-1px; text-align:right; z-index:100"><a><img src="../../DragDrop/view/js/terminado.png" title="Terminar" width="14" id="edbut' + event.id + '" border="0" style="padding-right:-3px; padding-top:0px;" /></a><a><img src="../../DragDrop/view/js/delete.png" title="Eliminar" width="14" id="delbut' + event.id + '" border="0" style="padding-right:1px; padding-top:0px;" /></a></div>';
                    $(this).append(layer);
                    //                $(this).css('color', 'red');
                    $("#delbut" + event.id).hide();
                    $("#delbut" + event.id).fadeIn(300);
                    $("#delbut" + event.id).click(function() {
                        //                    alert(event.identificador);
                        $(function() {
                            $("#ventanAlertas").html("Estas seguro que deseas eliminarlo?");
                            $("#ventanAlertas").attr('style', 'visible');
                            $("#ventanAlertas").dialog({
                                modal: true,
                                title: 'Fecha municipio',
                                show: 'explode',
                                hide: 'explode',
                                buttons: {
                                    Aceptar: function() {
                                        var id_vehiculo = parseInt(event.resource);
                                        $('#calendar').fullCalendar('removeEvents', event.id);
                                        $.post("../../DragDrop/controller/controllereliminareventos.php", {
                                            identificador: event.identificador,
                                            opcion: event.opcion,
                                            id_vehiculo: id_vehiculo
                                        },
                                        function()
                                        {
//                                            eventoscalendario(id_proyecto);
//                            $("#calendar").fullCalendar('refetchEvents');
                                        }
                                        );
                                        $(this).dialog("close");

                                    },
                                    Cancelar: function() {

                                        $(this).dialog("close");

                                    }
                                }
                            });
                        });

                    });
                    $("#edbut" + event.id).hide();
                    $("#edbut" + event.id).fadeIn(300);
                    $("#edbut" + event.id).click(function() {
                        //                    var title = prompt('Current Event Title: ' + event.title + '\n\nNew Event Title: '+event.identificador);

                        $(function() {
                            $("#ventanAlertas").html("Estas seguro que deseas terminarlo?");
                            $("#ventanAlertas").attr('style', 'visible');
                            $("#ventanAlertas").dialog({
                                modal: true,
                                title: 'Fecha municipio',
                                show: 'explode',
                                hide: 'explode',
                                buttons: {
                                    Aceptar: function() {
                                        var id_vehiculo = parseInt(event.resource);
                                        $.post("../../DragDrop/controller/controllerTerminarEventosConTelMuni.php", {
                                            identificador: event.identificador,
                                            opcion: event.opcion,
                                            id_vehiculo: id_vehiculo
                                        },
                                        function()
                                        {
//                                            eventoscalendario(id_proyecto);
//                            $("#calendar").fullCalendar('refetchEvents');
                                        }
                                        );
                                        $(this).dialog("close");

                                    },
                                    Cancelar: function() {

                                        $(this).dialog("close");

                                    }
                                }
                            });
                        });
                    });

                }

                //                				var layer =	'<div id="events-layer" class="fc-transparent" style="position:absolute; width:100%; height:100%; top:-1px; text-align:right; z-index:100"><a><img src="../../images/editbt.png" title="edit" width="14" id="edbut'+event.id+'" border="0" style="padding-right:3px; padding-top:2px;" /></a><a><img src="../../images/delete.png" title="delete" width="14" id="delbut'+event.id+'" border="0" style="padding-right:5px; padding-top:2px;" /></a></div>';
                //				$(this).append(layer);
                //				$("#delbut"+event.id).hide();
                //				$("#delbut"+event.id).fadeIn(300);
                //				$("#delbut"+event.id).click(function() {
                //					$.post("delete.php", {eventId: event.id});
                //					calendar.fullCalendar('refetchEvents');
                //				});
                //				$("#edbut"+event.id).hide();
                //				$("#edbut"+event.id).fadeIn(300);
                //				$("#edbut"+event.id).click(function() {
                //					var title = prompt('Current Event Title: ' + event.title + '\n\nNew Event Title: ');
                //					
                //					if(title){
                //						$.post("update_title.php", {eventId: event.id, eventTitle: title});
                //						calendar.fullCalendar('refetchEvents');
                //					}
                //				});
                //			},   
                //			
                //			eventMouseout: function(calEvent, domEvent) {
                //				$("#events-layer").remove();
                //			},
            },
            eventMouseout: function(calEvent, domEvent) {
                $("#events-layer").remove();
                //                $(this).a¿css('color', 'red');
            },
            resourceRender: function(resource, element, view)
            { // this is triggered when the resource is rendered, just like eventRender 


            },
            eventDrop: function(event, dayDelta, minuteDelta, resource, allDay, revertFunc, jsEvent, ui, view)
            {
                if (event.teminado == 1)
                {
                } else if (event.terminado == 0) {
                    var id_vehiculo = 0;
                    var fechainicio = ($.fullCalendar.formatDate(event.start, 'yyyy-MM-dd'));
                    //                    alert(fechainicio);

                    var fechafin = ($.fullCalendar.formatDate(event.end, 'yyyy-MM-dd'));
                    //                alert('fecha inicio' + fechainicio + ' fecha fin: ' + fechafin+' resource'+event.resource+' nombre'+event.name+' identificador'+ event.identificador+' opcion'+event.opcion);
                    id_vehiculo = parseInt(event.resource);
                    if (fechafin == '')
                    {
                        fechafin = fechainicio;
                    }

                    $.post("../../DragDrop/controller/controllerModificarDatosConduTeleMuni.php",
                            {
                                id_vehiculo: id_vehiculo,
                                id_conductor: event.identificador,
                                fecha_inicio: fechainicio,
                                fecha_fin: fechafin,
                                identificador: event.identificador,
                                opcion: event.opcion,
                                eventDrop: 'drop'

                            }, function()
                    {

                    });

                }
            },
            eventResize: function(event, dayDelta, minuteDelta, revertFunc, jsEvent, ui, view)
            {
                if (event.teminado == 1)
                {
                } else if (event.terminado == 0) {
                    var id_vehiculo = "";
                    var eventDrop = 0;

                    var fechainicio = ($.fullCalendar.formatDate(event.start, 'yyyy-MM-dd'));
                    //                    alert(fechainicio);

                    var fechafin = ($.fullCalendar.formatDate(event.end, 'yyyy-MM-dd'));
//                alert('fecha inicio' + fechainicio + ' fecha fin: ' + fechafin + ' resource' + event.resource + ' nombre' + event.name + ' identificador' + event.identificador + ' opcion' + event.opcion);
                    if (fechafin == '')
                    {
                        fechafin = fechainicio;
                    }
                    $.post("../../DragDrop/controller/controllerModificarDatosConduTeleMuni.php",
                            {
                                id_vehiculo: event.resource,
                                id_conductor: event.identificador,
                                fecha_inicio: fechainicio,
                                fecha_fin: fechafin,
                                identificador: event.identificador,
                                opcion: event.opcion,
                                eventDrop: 'resize'

                            }, function()
                    {

                    });
                }
            },
            eventClick: function(event, jsEvent, view)
            {
//                                var fechainiciode = ($.fullCalendar.formatDate(event.fechainiciod, 'yyyy-MM-dd'));

                var fechafin = false;

                $(function() {
                    if (event.opcion == "municipio") {
                        $("#fecha").remove();
                        //                          $("#delegacionnom").remove();
                        //                                $("#fecha_inicio").remove();
                        //                                $("#fecha_fin").remove();
                        ////// capturar las fechas de cada delegacion 
                        $("#capturar_fecha").html('<div id="fecha"> <h3  align="center" >Municipio: <div id="delegacionnom" > </div></h3> <div id="fecha_inicio" class="ui-corner-bottom ui-corner-top ">Fecha inicio: </div> <br /> <div id="fecha_fin" class="ui-corner-bottom ui-corner-top ">Fecha final: </div> <br /> <div id="terminar_delegacion" class="ui-corner-bottom ui-corner-top "> </div><br /><input type="button" value="Guardar" id="guardar_delegacion" class="ui-state-default ui-corner-bottom ui-corner-top" style="font-family: sans-serif,"Times New Roman",times,serif; font-size: 12px; font-weight: bold; " /> <input type="button" value="Cancelar" id="cancelar_delegacion" class="ui-state-default ui-corner-bottom ui-corner-top" style="font-family: sans-serif,"Times New Roman",times,serif; font-size: 12px; font-weight: bold; " /> </div>');
                        $("#capturar_fecha").show();


                        $("#delegacionnom").html("" + event.title + "");
                        $("#fecha_inicio").append("<input type='text' id='fecha_inicio" + event.identificador + "' name='" + event.name + "' value='" + event.fechainiciod + "' />");
                        $("#fecha_fin").append("<input type='text'  id='fecha_fin" + event.identificador + "' name='" + event.name + "' value='" + event.fechafind + "' disabled='disabled' />");
                        $("#terminar_delegacion").append(" <input type='checkbox'  id='terminar_delegacion" + event.identificador + "' value='Terminar" + event.identificador + "' /> Terminar municipio");



                        $.datepicker.setDefaults($.datepicker.regional["es"]);
                        $("#fecha_inicio" + event.identificador + "").datepicker({
                            dateFormat: 'yy-mm-dd',
                            firstDay: 1
                        });
                        $("#fecha_fin" + event.identificador + "").datepicker({
                            dateFormat: 'yy-mm-dd',
                            firstDay: 1
                        });

                        //terminar delegacion
                        $("#terminar_delegacion" + event.identificador + "").on({
                            click: function() {
                                if ($("#terminar_delegacion" + event.identificador + "").is(':checked')) {
                                    $("#fecha_fin" + event.identificador + "").removeAttr("disabled");
                                    fechafin = true;
                                    terminarDelegacion(1, event, jsEvent, view, id_proyecto);
                                }

                            }
                        });

                        if (fechafin === false) {
                            terminarDelegacion(0, event, jsEvent, view, id_proyecto);
                            $("#fecha_fin" + event.identificador + "").attr("disabled", true);
//                            $("#fecha_fin" + event.identificador + "").val("");
                            fechafin = false;
                        }


                        $("#cancelar_delegacion").bind({
                            click: function() {
                                $("#capturar_fecha").hide();
                            }

                        });
                    }
                    //                else
                    //                if (event.opcion == "conductor")
                    //                {
                    //                    $("#ventanAlertas").html("Esta seguro de terminar el " + event.opcion + " " + event.title + "?");
                    //                    $("#ventanAlertas").attr('style', 'visible');
                    //                    $("#ventanAlertas").dialog({
                    //                        modal: false,
                    //                        title: 'Delegacion',
                    //                        show: 'explode',
                    //                        hide: 'explode',
                    //                        buttons: {
                    //                            Aceptar: function() {
                    //                                //     $.post("../../DragDrop/controller/controllerGuardarDatosConduTeleMunicipios.php",
                    //                                //                        {
                    //                                //                            id_vehiculo: resource.identificador,
                    //                                //                            id_conductor: copiedEventObject.name,
                    //                                //                            fecha_inicio: fechainicio,
                    //                                //                            fecha_fin: fechafin,
                    //                                //                            identificador: copiedEventObject.identificador,
                    //                                //                            opcion: copiedEventObject.opcion
                    //                                //
                    //                                //                        }, function()
                    //                                //                {
                    //                                //
                    //                                //                });
                    //                                $(this).dialog("close");
                    //                            //                                    $("#tabla_Admin_Proyectos").trigger("reloadGrid");
                    //
                    //                            }
                    //                        }
                    //                    });
                    //                }
                    //                else
                    //                if (event.opcion == "telefono")
                    //                {
                    //                    $("#ventanAlertas").html("Esta seguro de terminar el " + event.opcion + " " + event.title + "?");
                    //                    $("#ventanAlertas").attr('style', 'visible');
                    //                    $("#ventanAlertas").dialog({
                    //                        modal: false,
                    //                        title: 'Delegacion',
                    //                        show: 'explode',
                    //                        hide: 'explode',
                    //                        buttons: {
                    //                            Aceptar: function() {
                    //                                //     $.post("../../DragDrop/controller/controllerGuardarDatosConduTeleMunicipios.php",
                    //                                //                        {
                    //                                //                            id_vehiculo: resource.identificador,
                    //                                //                            id_conductor: copiedEventObject.name,
                    //                                //                            fecha_inicio: fechainicio,
                    //                                //                            fecha_fin: fechafin,
                    //                                //                            identificador: copiedEventObject.identificador,
                    //                                //                            opcion: copiedEventObject.opcion
                    //                                //
                    //                                //                        }, function()
                    //                                //                {
                    //                                //
                    //                                //                });
                    //                                $(this).dialog("close");
                    //                            //                                    $("#tabla_Admin_Proyectos").trigger("reloadGrid");
                    //
                    //                            }
                    //                        }
                    //                    });
                    //                }
                });
            },
            //            eventClick: function(event, jsEvent, view)
            //            {
            //                alert('event ' + event.title + ' was left clicked');
            //            },
            eventRender: function(event, element, view)
            {
            },
            eventEdit: function(event, element, view)
            {

            },
            windowResize: function(view)
            {
                //                calendar.fullCalendar('option', 'height', $(window).height() - 40);
            },
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar !!!
            drop: function(date, allDay, ev, ui, resource, view) { // this function is called when something is dropped
                //                alert(resource.identificador);
                // retrieve the dropped element's stored Event Object
                var originalEventObject = $(this).data('eventObject');
                // we need to copy it, so that multiple events don't have a reference to the same object
                var copiedEventObject = $.extend({}, originalEventObject);
                //alert(copiedEventObject.resource);
                // assign it the date that was reported
                copiedEventObject.start = date;
                copiedEventObject.allDay = allDay;
                copiedEventObject.resource = resource.id;
                //                alert(copiedEventObject.opcion
                //                if(copiedEventObject.color === '') {
                //                copiedEventObject.color = 'red';
                //					}
                //                alert(copiedEventObject.identificador);
                var fechainicio = ($.fullCalendar.formatDate(copiedEventObject.start, 'yyyy-MM-dd'));
                //                    alert(fechainicio);

                var fechafin = ($.fullCalendar.formatDate(copiedEventObject.start, 'yyyy-MM-dd'));
                //                    alert(fechafin);
                //                    alert('fecha: evento' + copiedEventObject.id + ' id_vehiculo' + resource.id);

                //                alert('fecha:' + date + '  evento' + copiedEventObject.name + ' id_vehiculo' + resource.id);

                // dropped event of resource a to a cell belonging to resource b?
                //                if (resource && resource.id != copiedEventObject.resource) {
                //                    //copiedEventObject.resource.id.attr(resource.id);
                //                    if (!confirm('Wrong column. Do you want me to correct that?')) {
                //                        copiedEventObject.resource = resource.id;
                //                    }
                //                }
                //                
                $.post("../../DragDrop/controller/controllerGuardarDatosConduTeleMunicipios.php",
                        {
                            id_vehiculo: resource.id,
                            id_conductor: copiedEventObject.name,
                            fecha_inicio: fechainicio,
                            fecha_fin: fechafin,
                            identificador: copiedEventObject.identificador,
                            opcion: copiedEventObject.opcion

                        },
                function()
                {
//                                                        eventoscalendario(id_proyecto);
//                            $("#calendar").fullCalendar('refetchEvents');
                }
                );

                // render the event on the calendar
                // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

                // is the "remove after drop" checkbox checked?
                //				if ($('#drop-remove').is(':checked')) {
                // if so, remove the element from the "Draggable Events" list
//                $(this).remove(); /// para remover el elemento
                //	
                //							}
                //                setTimeout("alert('hello')",1250);

            }

        });
    });
}
function terminarDelegacion(terminard, event, jsEvent, view, id_proyecto) {

    $("#guardar_delegacion").bind({
        click: function() {

            $.post("../../DragDrop/controller/controllerModificarDatosConduTeleMuni.php",
                    {
                        id_vehiculo: event.id,
                        id_conductor: event.identificador,
                        fecha_inicio: $("#fecha_inicio" + event.identificador + "").val(),
                        fecha_fin: $("#fecha_fin" + event.identificador + "").val(),
                        identificador: event.identificador,
                        opcion: "municipiofe",
                        terminar: terminard
                    }, function(data) {
                //  alert(data);

                $(function() {
                    $("#ventanAlertas").html("Fecha guardada correctamente");
                    $("#ventanAlertas").attr('style', 'visible');
                    $("#ventanAlertas").dialog({
                        modal: true,
                        title: 'Fecha municipio',
                        show: 'explode',
                        hide: 'explode',
                        buttons: {
                            Aceptar: function() {
                                $(this).dialog("close");
                                eventoscalendario(id_proyecto);
                                $("#capturar_fecha").hide();
                            }
                        }
                    });
                });
            });
        }

    });

}
function conductoresasignados(resource, element, view, ui)
{
    //    alert("hhh");
    //    $(".refresh-driver").show();
    //    $("#external-events").load('../../DragDrop/controller/controllermostrarconductoresasignados.php',{
    //        id_proyecto:id_proyecto
    //    },function()
    //
    //    {
    var eventid = resource.id;
//    alert(eventid);
//        });

//            }
}

function isDefined(variable) {
    return (typeof (window[variable]) != "undefined");
}
