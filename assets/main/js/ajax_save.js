$(document).ready(function () {

	$('.translate').change(function () {

		var $url = $('#common-data').data('saveurl');
		var $id = $(this).data('id');
		var $translation = $(this).val();
		var $language = $('#common-data').data('language');

		ajaxSave($url, $id, $language, $translation);
	});

});

function ajaxSave(url, id, language, translation) {
	$.ajax({
        url: url,
        type: 'POST',
        data: {
        	id : id,
        	language : language,
        	translation : translation,
        },
        beforeSend: function(){
        	
        },
        success: function(data){
            setResult(id, data);
		},
    });
}

function setResult(id, result) {
	var $success = $('#common-data').data('success');
	var $failed = $('#common-data').data('failed');

	if (result === 'saved') {
		$("#notif-container").append('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>ID:' + id + '</strong> translation saved.</div>');
	} else {
		$("#notif-container").append('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>ID:' + id + '</strong> save unsuccesful.</div>');
	}
}