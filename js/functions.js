$(function() {
			$( "#slider-range" ).slider({
			range: true,
			min: 0,
			max: 300,
			values: [ 100, 200 ],
			slide: function( event, ui ) {
				$( "#amount" ).val(ui.values[ 0 ] + "  " + ui.values[ 1 ]);
			}
			});
			$( "#amount" ).val( $("#slider-range").slider( "values", 0 ) +
			"  " + $( "#slider-range" ).slider( "values", 1));
});

$(document).ready(function() {
					 $('#searchForm').submit(function(){
						 event.preventDefault();
						 var url = $(this).attr('action');
						 var datos = $(this).serialize();
						 $.ajax({
					 type: 'POST',
					 url: url,
					 data: datos,
           success: function(data) {
              $('#content').fadeIn(1000).html(data);
           }
					});
			});
});

$(document).ready(function() {
		$('.paginate').live('click', function(){
		$('#content').html('<div class="loading"><img src="Images/loading.gif" width="70px" height="70px"/></div>');
		var page = $(this).attr('data');
		var dataString = 'page='+page;
		$.ajax({
            type: "POST",
            url: "php/pagination.php",
            data: dataString,
            success: function(data) {
               $('#content').fadeIn(1000).html(data);
            }
        });
    	});
		});
