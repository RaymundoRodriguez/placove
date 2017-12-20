
$(document).ready(function() {
	
	
		/* initialize the external events
		-----------------------------------------------------------------*/
	
		$('#external-events div.external-event').each(function() {
		
			// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
			// it doesn't need to have a start or end
			var eventObject = {
				title: $.trim($(this).text()), // use the element's text as the event title
				resource: parseInt($(this).attr('employee'))
			};
			
			// store the Event Object in the DOM element so we can get to it later
			$(this).data('eventObject', eventObject);
			
			// make the event draggable using jQuery UI
			$(this).draggable({
				zIndex: 999,
				revert: true,      // will cause the event to go back to its
				revertDuration: 0  //  original position after the drag
			});
			
		});
	
	
		/* initialize the calendar
		-----------------------------------------------------------------*/
		
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'resourceDay,resourceWeek,resourceNextWeeks,resourceMonth'
        }, 
                        defaultView: 'resourceWeek', 
			resources: 'json-resources.php',
			
		selectable: true,
		selectHelper: true,
		select: function(start, end, allDay,ev,resource) {				
				var title = prompt('Event Title:');
				if (title) {
				if(res)
				{
					$('#calendar').fullCalendar('renderEvent',
						{
							title: title,
							start: start,
							end: end,
							allDay: allDay,
							resource: id
						},
						true // make the event "stick"
					);
				}
				else
				{
					var rid = prompt('resource');
					$('#calendar').fullCalendar('renderEvent',
						{
							title: title,
							start: start,
							end: end,
							allDay: allDay,
							id:resource.id
						},
						true // make the event "stick"
					);
				}
				}
				$('#calendar').fullCalendar('unselect');
			},
//                               select: function(start, end, allDay, jsEvent, view, resource) 
//        {
//            var 
//            title = prompt('event title:'); 
//            if (title) {
//                calendar.fullCalendar('renderEvent',
//
//                {
//                        title: title, 
//                        start: start, 
//                        end: end, 
//                        allDay: allDay, 
//                        resource: resource.id 
//                    }, 
//                    true // make the event "stick" 
//                    ); 
//            }
//            calendar.fullCalendar('unselect'); 
//        },
        resourceRender: function(resource, element, view) 
        { // this is triggered when the resource is rendered, just like eventRender 
        }, 
        eventDrop: function( event, dayDelta, minuteDelta, resource,allDay, revertFunc, jsEvent, ui, view ) 
        {
            alert('event moved to '+event.start+' to '+resource.id+'kkk'+jsEvent+'kkkk'+ui+'asdf'+view);
        },
        eventResize: function( event, dayDelta, minuteDelta, revertFunc, jsEvent, ui, view )
        {
            alert('event was resized, new endtime: '+event.end);
        }, 
        eventClick: function ( event, jsEvent, view ) 
        {
            alert('event '+event.title+' was left clicked');
        }, 
        eventRender: function( event, element, view ) 
        { }, 
        windowResize: function( view ) 
        {
            calendar.fullCalendar('option', 'height', $(window).height() - 40); 
        },
			editable: true,
			droppable: true, // this allows things to be dropped onto the calendar !!!
			drop: function(date, allDay, ev, ui, resource) { // this function is called when something is dropped
			//alert(resource.id);
				// retrieve the dropped element's stored Event Object
				var originalEventObject = $(this).data('eventObject');
				
				// we need to copy it, so that multiple events don't have a reference to the same object
				var copiedEventObject = $.extend({}, originalEventObject);
				//alert(copiedEventObject.resource);
				// assign it the date that was reported
				copiedEventObject.start = date;
				copiedEventObject.allDay = allDay;
				copiedEventObject.resource = resource.id;
				// dropped event of resource a to a cell belonging to resource b?
				if (resource && resource.id != copiedEventObject.resource) {
				//copiedEventObject.resource.id.attr(resource.id);
				    if (!confirm('Wrong column. Do you want me to correct that?')) {
				        copiedEventObject.resource = resource.id;
				    }
				}
				
				// render the event on the calendar
				// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
				$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
				
				// is the "remove after drop" checkbox checked?
				if ($('#drop-remove').is(':checked')) {
					// if so, remove the element from the "Draggable Events" list
					$(this).remove();
				}
				
			}
		});
		
		
	});
