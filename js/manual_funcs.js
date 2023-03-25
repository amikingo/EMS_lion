function update_content(input){
	require("docx2html")(input.files[0],
		{
			container: document.querySelector("#exam-view")
		}
	).then(
		function(result){
	        input.value="";
	        document.querySelector("#exam-view").innerHTML = result.toString();
	    }
    )
}

function save_exam(){
	var e_form = document.getElementById("exam-info");
	var exam_data = document.getElementById("exam-view").innerHTML;

	if(e_form.checkValidity()){
		document.getElementById("exam_str").value = exam_data;
		e_form.submit();
	}
	else 
		alert("Fill All Exam Information. Course and Title Required");

	return 0;
}

function remove_after(){
	document.getElementById("temp-msg").remove();
}

setTimeout(remove_after, 1000 * 4);
