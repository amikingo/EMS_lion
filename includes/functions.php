<?php

//-------------------------Score Letter Grade -------------------------------

function getScoreLetterGrade($score){

    $letterGrade = "";
    if ($score > 100){
      return error;
    }
     else if($score >=95){
      $letterGrade = "A+";
     }
     else if($score >= 80)
     {
        $letterGrade = "A";
     }
     else if($score >= 78){
        $letterGrade = "A-";
     }
     else if($score >= 75){
        $letterGrade = "B+";
     }
     else if($score >= 70){
         $letterGrade = "B";
     }
     else if($score >= 65){
        $letterGrade = "B-";
     }
      else if($score >= 60){
        $letterGrade = "C+";
     }
      else if($score >= 45){
        $letterGrade = "C";
     }
     else if($score >= 40){
        $letterGrade = "C-";
     }
     else if($score >= 35){
         $letterGrade = "D";
     }
     else if ($score <= 34){
      $letterGrade = "F";
     }
     return $letterGrade;
}

// -------------------------- Score Grade Point -------------------------

function getScoreGradePoint($score){

    $gradePoint = "";

     if($score >= 80)
     {
        $gradePoint = 4.00;
     }
     else if($score >= 78){
        $gradePoint = 3.75;
     }
     else if($score >= 75){
      $gradePoint = 3.50;
   }
     else if($score >= 70){
        $gradePoint = 3.00;
     }
     else if($score >= 65){
         $gradePoint = 2.75;
     }
     else if($score >= 60){
        $gradePoint = 2.50;
     }
      else if($score >= 45){
        $gradePoint = 2.00;
     }
      else if($score >= 40){
        $gradePoint = 1.75;
     }
     else if($score >= 35){
        $gradePoint = 1.00;
     }
     else if($score <= 34){
         $gradePoint = 0.00;
     }

     return $gradePoint;
}

// -------------------------- Class of Diploma -------------------------

function getClassOfDiploma($gpa){

    $classOfDiploma = "";

     if($gpa >= 3.50)
     {
        $classOfDiploma = "Distinction";
     }
     else if($gpa >= 3.00){
        $classOfDiploma = "Upper Credit";
     }
     else if($gpa >= 2.50){
       $classOfDiploma = "Lower Credit";
     }
     else if($gpa >= 2.00){
         $classOfDiploma = "Pass";
     }
     else if($gpa < 2.00){
        $classOfDiploma = "Fail";
     }

     return $classOfDiploma;
}


?>
