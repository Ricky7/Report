function removeNotAllowedChars($input) {
   $input.val($input.val().replace(/[^0-9]/g, ''));
}

$('#purchase_price')
.keyup(function() {
	var $input = $(this);
	removeNotAllowedChars($input);
	})
 .change(function() {
  var $input = $(this);
  removeNotAllowedChars($input);
});

$('#selling_price')
.keyup(function() {
	var $input = $(this);
	removeNotAllowedChars($input);
	})
 .change(function() {
  var $input = $(this);
  removeNotAllowedChars($input);
});

$('#sold_price')
.keyup(function() {
	var $input = $(this);
	removeNotAllowedChars($input);
	})
 .change(function() {
  var $input = $(this);
  removeNotAllowedChars($input);
});
