function attach_empty(e) {
	$("#pbreak-cont").html(`<div class="page-break">&nbsp;</div>`.repeat(+e + 1));
}

function change_code(e) {
	var searchParams = new URLSearchParams(window.location.search);
	searchParams.set('code', e.value);
	var newParams = searchParams.toString();
	window.location.href = "exam_preview.php?" + newParams;
}

function general_directions(e){!e ? $("#main_final_banner").show() : $("#main_final_banner").hide();}