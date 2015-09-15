$(document).ready(function () {
	$('#general-settings-language-select').change(function () {
		$('#general-setting-language').submit();
	});

	$('#language-category-filter').change(function () {
		$('#language-translation-module #translation-table tbody tr').slideUp('fast');
		$('#language-translation-module #translation-table tbody tr.cat_' + $(this).val()).slideDown('fast');
	});
});