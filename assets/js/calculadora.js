$(document).ready(function(){

	$("#salvar").click(function(){

		var form = new FormData($("#fcal")[0]);
		$.ajax({
			url: 'helper/phpform.php',
			type: 'post',
			dataType: 'json',
			cache: false,
			processData: false,
			contentType: false,
			data: form,
			timeout: 8000,
			success: function(r) {

				$("#resposta").html(r);	
			}
		});
	});
});