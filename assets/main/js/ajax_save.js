$(document).ready(function () {

	$('input.translate').change(function () {

		var $url = $('#common-data').data('saveurl');
		var $id = $(this).data('id');
		var $translation = $(this).val();
		var $language = $('#common-data').data('language');
		var result_icon = $(this).parent().find('.input-group-addon');

		ajaxSave($url, $id, $language, $translation, result_icon);
	});

});

function ajaxSave(url, id, language, translation, result_icon) {
	$.ajax({
        url: url,
        type: 'POST',
        data: {
        	id : id,
        	language : language,
        	translation : translation,
        },
        beforeSend: function(){
        	result_icon.html('<span class="glyphicon glyphicon-refresh" style="color: #000;"></span>');
        },
        success: function(data){
            setResult(id, data, result_icon);
		},
    });
}

function setResult(id, result, result_icon) {
	var $success = $('#common-data').data('success');
	var $failed = $('#common-data').data('failed');

	if (result === 'saved') {
		result_icon.html('<span class="glyphicon glyphicon-ok" style="color: green;"></span>');
		$("#notif-container").append('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>ID:' + id + '</strong> translation saved.</div>');
	} else {
		result_icon.html('<span class="glyphicon glyphicon-remove" style="color: red;"></span>');
		$("#notif-container").append('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>ID:' + id + '</strong> save unsuccesful.</div>');
	}
}