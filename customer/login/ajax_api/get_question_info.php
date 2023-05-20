<?php

include "../funcs.php";

session_start();
if_not_login_die("Access Denied!");
connect_db();

if(!isset($_REQUEST['id'])) die("ID needed...");

$id = intval($_REQUEST['id']);

$question_data = $db->query("SELECT * FROM questions as q JOIN course as c ON c.CourseID = q.CourseID AND q.QuestionID = $id")->fetch_assoc();

if($question_data["q_flags"] == 1) $badge = "<span class='badge badge-pill badge-info'>Approved</span>";
else if($question_data["q_flags"] == -1) $badge = "<span class='badge badge-pill badge-danger'>Suspended</span>";
else if($question_data["q_flags"] == -2) $badge = "<span class='badge badge-pill badge-danger'>Rejected</span>";
else $badge = "<span class='badge badge-pill badge-warning'>Pending for approval</span>";

$deleted_badge = "<span class='badge badge-pill badge-dark'>DELETED-ACCOUNT</span>";
$e_count = mysqli_num_rows($db->query("SELECT * FROM examquestions Where QuestionID = $question_data[QuestionID]"));

$tfl = array("True", "False");

?>

<table class="table">
	<tr>
		<td>Question Type</td>
		<td><?php echo $question_str_lookup[$question_data["QuestionType"] - 1] ?></td>
	</tr>
	<tr>
		<td>Course</td>
		<td><?php echo htmlspecialchars($question_data["CourseString"]) ?></td>
	</tr>
	<tr>
		<td>Chapter</td>
		<td><?php echo $question_data["Chapter"] ?></td>
	</tr>
	<tr>
		<td>Status</td>
		<td><?php echo $badge ?></td>
	</tr>
	<tr>
		<td>Times Used in exam</td>
		<td><?php echo $e_count ?></td>
	</tr>
	<tr>
		<td>Created Date</td>
		<td><?php echo date('H:i:s d, M Y',strtotime($question_data["time_poseted"])) ?></td>
	</tr>
	<tr>
		<td>Created By</td>
		<td><?php echo $question_data["UserID"] ? htmlspecialchars(get_user_info_by_id($question_data["UserID"])["Name"]) : $deleted_badge; ?></td>
	</tr>
</table>
<br>

<strong class="my-3"><i class="fa fa-question"></i> Question</strong><br>
<div class="alert alert-warning">
	<?php 
		if($question_data["ImageData"])
			echo "<img class='img-fluid rounded mb-3' src='$question_data[ImageData]'>";
	?>
	<strong>
		<?php
			echo htmlspecialchars($question_data["QuestionString"]);
			if($question_data["QuestionType"] == 2){
				$mcres = $db->query("SELECT * FROM MultipleChoice WHERE QuestionID = $question_data[QuestionID] ORDER BY MultipleChoiceID");
				for($k=65;$row_m = $mcres->fetch_assoc();$k++)
				printf("<div class='mx-4 my-1'>%c) %s </div>", $k, htmlspecialchars($row_m["MultipleChoiceString"] ));
			}
		?>
	</strong>
</div>

<strong class="my-3"><i class="fa fa-pencil"></i> Answer</strong> <br>
<div class="alert alert-info">

	<strong>
		<?php
			if($question_data["QuestionType"] == 1)
				echo $tfl[$question_data["Answer"]-1];
			else if($question_data["QuestionType"] == 2)
				echo chr(64+$question_data["Answer"]);
			else
				echo htmlspecialchars($question_data["Answer"]);
		?>
	</strong>
</div>

<?php
	if($question_data["RejectReason"]){
?>

<strong class="my-3"><i class="fa fa-ban"></i> Reject reason </strong> <br>
<div  class="alert alert-danger">
	<strong>
		<?php
				echo htmlspecialchars($question_data["RejectReason"]);
		?>
	</strong>
</div>	

<?php } ?>

<?php
	if($question_data["Comment"]){
?>

<div class="collapse" id="comment">
	<strong class="my-3"><i class="fa fa-comment"></i> Creator's Comment </strong> <br>
	<div  class="alert alert-dark">
		<strong>
			<?php
					echo htmlspecialchars($question_data["Comment"]);
			?>
		</strong>
	</div>	
</div>

<a class="btn btn-warning text-white" data-mdb-toggle="collapse" href="#comment" role="button" aria-expanded="false" aria-controls="comment">
	Comment/Explanation
</a>

<?php } ?>


<?php 
	if($question_data["q_flags"] == 0 || $question_data["q_flags"] == -2)
		printf('<a class="btn btn-danger" href="questions_ls.php?d=%d">DELETE</a>', $question_data['QuestionID']);
?>
