$(function() {
	function moveWidget(event, ui) {
		console.log('moving');
	}

	function deployWidget(event, ui) {
		console.log('deploy!');
	}

	$('#volante-widgets .volante-widget').draggable({    
	    helper: 'clone',
	    appendTo: 'body',
	    revert: 'invalid',
	    connectToSortable: '.volante-region',
	    zIndex: 100,
	   	cursor: 'move',
	   	start: function(event, ui) {
	   		moveWidget(event, ui);
	   	},
	   	stop: function(event, ui) {
	   		deployWidget(event, ui);
	   	}
	});

	$('.volante-region').each(function(i, elem) {
	    var dropzone = $(elem);
	    dropzone.droppable({
	        drop: function(event, ui) {
	            if( ! ui.draggable.data('decorated') && dropzone.data('default_decorator')) {
	                var decorator = $('#volante-decorator-' + dropzone.data('default_decorator')).html();  
	                ui.draggable.html(decorator.replace('{splitter}', '<div class="decorator-inner">' + ui.draggable.html() + '</div>'));
	                ui.draggable.data('decorated', true);
	            }
	            else if(ui.draggable.data('decorated') && ! dropzone.data('default_decorator')) {
	                ui.draggable.html(ui.draggable.find('.decorator-inner').html());
	                ui.draggable.data('decorated', false);
	            }
	        },
	    }).sortable({
  		    cursor: 'move',
	        connectWith: '.volante-region'
	    });
	});
});