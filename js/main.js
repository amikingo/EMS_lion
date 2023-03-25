var last_fetched_courses = "";

function update_courses(department_id){
	jQuery.ajax({
		type: 'GET',
		url: "ajax_api/get_courses.php",
		data: {"id" : department_id},
		success: function(resp) {
			last_fetched_courses = JSON.parse(resp);
			jQuery('#program_select option[value=""]').prop('selected', true);
			jQuery("#program_select").removeAttr('disabled');
		}
	});
}

function update_courses_by_program(program_id){
	var items = "<option value='' selected disabled>Select Course</option>";
	jQuery.each(last_fetched_courses, function(key, value){
		if(value.program_id == program_id)
			items += `<option value="${value.id}">${value.name}</option>`;
	});
	jQuery("#course_select").html(items);
	jQuery("#course_select").removeAttr('disabled');
}

function update_chapters(course_id){
	jQuery.each(last_fetched_courses, function(key, value){ // bad idea ...but anyway
		if(value.id == course_id){
			var items = "<option value='' disabled>Select Chapters</option>";
			for (var i = 1; i <= value.chapters; i++) items += `<option value="${i}">Chapter ${i}</option>`;
				jQuery("#chapters_select").html(items);
			jQuery("#chapters_select").removeAttr('disabled');
			return;
		}
	});	
}

jQuery(document).ready(function(){

	jQuery('body').tooltip({selector: "[data-mdb-toggle='tooltip']", trigger: 'hover'});

	jQuery("#program_select").on("change", function(){
		update_courses_by_program(jQuery(this).val());
	});

	jQuery("#department_select").on("change", function(){
		update_courses(jQuery(this).val());
	});

	jQuery("#course_select").on("change", function(){
		update_chapters(jQuery(this).val());
	});


	jQuery("select[multiple]").mousedown(function(e){
		e.preventDefault();

		var select = this;
		var scroll = select .scrollTop;

		e.target.selected = !e.target.selected;

		setTimeout(function(){select.scrollTop = scroll;}, 0);

		jQuery(select).focus();
	}).mousemove(function(e){e.preventDefault()});
});
