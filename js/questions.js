var multi_choice = `
		<div class="question">
			<div class="question-no">#@</div><br>
			<span class="image_space"></span>
			<div class="">
				<textarea placeholder="Question..." name="question[$]" class="question-data form-control" maxlength="500" required></textarea>
			</div>
			<div class="multi">
				<div class = "choice">
					<label>A)</label>
					<input type="text" class="std-input choicei" name="choice_a[$]"  autocomplete="off" required> <input type="radio" name="answer[$]" value="1" required> <br>
				</div>
				<div class = "choice">
					<label>B)</label>
					<input type="text" class="std-input choicei" name="choice_b[$]"  autocomplete="off" required> <input type="radio" name="answer[$]" value="2"> <br>
				</div>
				<div class = "choice">
					<label>C)</label>
					<input type="text" class="std-input choicei" name="choice_c[$]"  autocomplete="off" required> <input type="radio" name="answer[$]" value="3"> <br>
				</div>
				<div class = "choice">
					<label>D)</label>
					<input type="text" class="std-input choicei" name="choice_d[$]"  autocomplete="off" required> <input type="radio" name="answer[$]" value="4"> <br>
				</div>
			</div>

			<div class="collapse mt-3" id="comment$">
				<textarea placeholder="Explain/Comment on question..." name="comment[$]" class="question-data form-control" maxlength="500"></textarea>
			</div>

			<br>
			<div class="row">
				<div class="col multi-buttons">
					<button data-mdb-toggle='tooltip' title='Add Choice' data-mdb-trigger='hover' onclick='add_choice(this)' type="button">+</button>
					<button data-mdb-toggle='tooltip' title='Remove Choice' data-mdb-trigger='hover' onclick='del_choice(this)' type="button">-</button>
				</div>

				<lable data-mdb-toggle="tooltip" title="Attach Figure"  data-mdb-trigger="hover" class = "form-upload-con icon-btn btn btn-primary">
					<input type="file" class="form-control" accept="image/*">
					<i class="fa fa-image text-white"></i>
				</lable>

				<a class="icon-btn btn btn-warning text-white" data-mdb-toggle="collapse" href="#comment$" role="button" aria-expanded="false" aria-controls="comment$">
					<i class="fa fa-comment"></i>
				</a>
			</div>

		</div>
		`;
var true_false = `
		<div class="question">
			<div class="question-no">#@</div><br>
			<textarea placeholder="Question..." name="question[$]" class="question-data form-control" maxlength="500" required></textarea>
			<div class="true">
				<label class="mx-1">True </label><input type="radio" name="answer[$]" value="1" required>
				<i class="mx-3"></i>
				<label class="mx-1">False </label><input type="radio" name="answer[$]" value="2">
			</div>

			<div class="collapse mt-3" id="comment$">
				<textarea placeholder="Explain/Comment on question..." name="comment[$]" class="question-data form-control" maxlength="500"></textarea>
			</div>

			<br>
			<div class="row">
				<div class="col multi-buttons">

				</div>

				<a class="icon-btn btn btn-warning text-white" data-mdb-toggle="collapse" href="#comment$" role="button" aria-expanded="false" aria-controls="comment$">
					<i class="fa fa-comment"></i>
				</a>
			</div>
		</div>
		`;

var matching = `
		<div class="question">
			<div class="question-no">#@</div><br>
			Match <input type="text" class="form-control question-data" name="question[$]  autocomplete="off" required> With
			<input type="text" class="form-control" name="answer[$] autocomplete="off" required>

			<div class="collapse mt-3" id="comment$">
				<textarea placeholder="Explain/Comment on question..." name="comment[$]" class="question-data form-control" maxlength="500"></textarea>
			</div>

			<br>
			<div class="row">
				<div class="col multi-buttons">

				</div>

				<a class="icon-btn btn btn-warning text-white" data-mdb-toggle="collapse" href="#comment$" role="button" aria-expanded="false" aria-controls="comment$">
					<i class="fa fa-comment"></i>
				</a>
			</div>
		</div>
		`;




var fill_the_blank = `
		<div class="question">
			<div class="question-no">#@</div><br>
			<textarea placeholder="Before Blank" name="question[$]" class="question-data form-control short-aa req1" maxlength="500" required></textarea>
			<input type="text" class="form-control my-3" placeholder="Answer" name="answer[$]" required>
			<textarea placeholder="After Blank" name="question1[$]" class="question-data form-control short-aa req2" maxlength="500" required></textarea>
		
			<div class="collapse mt-3" id="comment$">
				<textarea placeholder="Explain/Comment on question..." name="comment[$]" class="question-data form-control" maxlength="500"></textarea>
			</div>

			<br>
			<div class="row">
				<div class="col multi-buttons">

				</div>

				<a class="icon-btn btn btn-warning text-white" data-mdb-toggle="collapse" href="#comment$" role="button" aria-expanded="false" aria-controls="comment$">
					<i class="fa fa-comment"></i>
				</a>
			</div>

		</div>
		`;


var short_answer = `
		<div class="question">
			<div class="question-no">#@</div><br>
			<span class="image_space"></span>
			<textarea placeholder="Question..." name="question[$]" class="question-data form-control short-aa" maxlength="500" required></textarea>
			<textarea placeholder="Answer..." name="answer[$]" class="question-data form-control short-aa my-3" maxlength="500" required></textarea>

			<div class="collapse mt-3" id="comment$">
				<textarea placeholder="Explain/Comment on question..." name="comment[$]" class="question-data form-control" maxlength="500"></textarea>
			</div>

			<br>
			<div class="row">
				<div class="col multi-buttons">

				</div>

				<lable data-mdb-toggle="tooltip" title="Attach Figure"  data-mdb-trigger="hover" class = "form-upload-con icon-btn btn btn-primary">
					<input type="file" class="form-control" accept="image/*">
					<i class="fa fa-image text-white"></i>
				</lable>

				<a class="icon-btn btn btn-warning text-white" data-mdb-toggle="collapse" href="#comment$" role="button" aria-expanded="false" aria-controls="comment$">
					<i class="fa fa-comment"></i>
				</a>
			</div>
		
		</div>
		`;


const types = ["", true_false, multi_choice, short_answer, matching, fill_the_blank];

var questions = document.getElementById("questions");
var questions_class = document.getElementsByClassName("question");



function changed_type(i){
	if(!questions_class.length)
		questions.innerHTML += types[i].replace(/\$/g, 0).replace("@", 1);
	else{

		if($(".question-data").first().val() != ""){
			if(!confirm("Are you sure? question(s) you have entered will be destoryed"))
				return;
		}
		var str_types = "", length_c = questions_class.length;
		while(questions_class[0]){
			var len = length_c - questions_class.length;
			str_types += types[i].replace(/\$/g, len).replace("@", len+1);
			questions_class[0].parentNode.removeChild(questions_class[0]);
		}
		questions.innerHTML += str_types;
	}
}

function add_question(){
	var indx = document.getElementById('types').value;
	if(indx)
		questions.insertAdjacentHTML(
			"beforeend",
			types[indx].replace(/\$/g, questions_class.length).
						replace("@", questions_class.length+1)
		);
}

function add_choice(elem){
	var closest_q = $(elem).closest('.question');
	var multi = $(closest_q).find('.multi').first();

	var count  = $(multi).find('.choice').length
	var rindex = $('.question').index(closest_q)
	var letter = String.fromCharCode(65 + count);
	var lleter = letter.toLowerCase();
	//alert(count)
	if(count > 8)return;

	$(multi).append(`
		<div class = "choice">
			<label>${letter})</label>
			<input type="text" class="std-input choicei" name="choice_${lleter}[${rindex}]" 
		 	autocomplete="off" required> <input type="radio" name="answer[${rindex}]" value="${count+1}"> <br>
		</div>
	`);

}

function del_choice(elem){
	var closest_q = $(elem).closest('.question');
	var multi = $(closest_q).find('.multi').first();

	var count = $(multi).find('.choice').length

	if(count > 4){
		$(multi).find('.choice').last().remove()
	}
}

function remove_question(){
	if(questions_class.length > 1)
		questions_class[questions_class.length - 1].remove();
}


const toBase64 = file => new Promise((resolve, reject) => {
	const reader = new FileReader();
	reader.readAsDataURL(file);
	reader.onload = () => resolve(reader.result);
	reader.onerror = error => reject(error);
});

async function insert_image(_this) {
	var closest_q = $(_this).closest('.question');
	var rindex = $('.question').index(closest_q)
	const file = _this.files[0];
	var img_data = await toBase64(file);
	// inefficient and insecure upload ...
	$(closest_q).find('.image_space').html(`
			<img class='img-fluid rounded mb-3' src='${img_data}'>
			<input type="hidden" name="q_image[${rindex}]" value="${img_data}">
		`);
	document.getElementById(_this).value = "";
}

$(document).ready(function(){
	add_question();

   	$(document).on('input', '.req1, .req2', function(e){

   		req1= $(this).parent().find('.req1').first();
   		req2= $(this).parent().find('.req2').first();

   		if($(this).is('.req1')){
   			if(!$(this).val().length)
   				req2.prop('required', 1);
   			else
   				req2.prop('required', 0);
   		}else{
   			if(!$(this).val().length)
   				req1.prop('required', 1);
   			else
   				req1.prop('required', 0);
   		}
   	});




   	$(document).on('change', '.form-upload-con input', function(e){
   		insert_image(this);
   	});

});