$(".onlyId").each(function(){$(this).keypress(function(e){var code=e.charCode;
if(((code>=48)&&(code<=57))||code==45||code==0){
	return true;
}
else{
	return false;
}
});});

$("#stuid").each(function(){$(this).keypress(function(e){

		var code=e.charCode;
		$id = $(this);
		if ($id.val().length === 2 || $id.val().length === 8) {
			$id.val($id.val() + '-');
		}

		if((code>=48)&&(code<=57)){
			return true;
		}
		else{
			return false;
		}
});});

$(".onlyChars").each(function(){$(this).keypress(function(e){var code=e.charCode;
if(((code>=65)&&(code<=90))||((code>=97)&&(code<=122))||code==32||code==44||code==46||code==0){
	return true;
}
else{
	return false;
}
});});

$(".phnNum").each(function(){$(this).keypress(function(e){var code=e.charCode;
if(((code>=48)&&(code<=57))||code==0){
	return true;
}
else{
	return false;
}
});});

$(".onlyFloat").each(function(){$(this).keypress(function(e){var code=e.charCode;
if(((code>=48)&&(code<=57))||code==46||code==0){
	return true;
}
else{
	return false;
}
});});

$(function () {
    $('[data-toggle="tooltip"]').tooltip();
});

jQuery(function($){
   $("#phone").mask("+880-99999?9999999", { "placeholder": "" });
});

jQuery(function($){
   $("#stuID").mask("99-99999-9", { "placeholder": "" });
});

function confirmation(){
	var r = confirm("Are you sure ?");
	return r ? true : false;
}