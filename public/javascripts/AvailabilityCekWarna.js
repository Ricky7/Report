<script src="jqueryAva.js" type="text/javascript"></script>
pic1 = new Image(16, 16); 
pic1.src = "../images/loader.gif";

$(document).ready(function(){

	$("#item_color").change(function() { 

		var itc = $("#item_color").val();

		if(usr.length >= 3)
		{
			$("#status").html('<img align="absmiddle" src="loader.gif" /> Checking availability...');

			$.ajax({ 
				type: "POST", 
				url: "check.php", 
				data: "item_color="+ itc, 
				success: function(msg){ 

					$("#status").ajaxComplete(function(event, request, settings){ 

						if(msg == 'OK')
						{ 
							$("#item_color").removeClass('object_error'); // if necessary
							$("#item_color").addClass("object_ok");
							$(this).html(' <img align="absmiddle" src="../images/accepted.png" /> ');
						} 
						else 
						{ 
							$("#item_color").removeClass('object_ok'); // if necessary
							$("#item_color").addClass("object_error");
							$(this).html(msg);
						}
						else
						{
							$("#status").html('The item_color should have at least 3 characters.');
							$("#item_color").removeClass('object_ok'); // if necessary
							$("#item_color").addClass("object_error");
						}
					});
				};
			});
		}	
	});
});

