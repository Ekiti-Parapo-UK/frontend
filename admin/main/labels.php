<?php
@$schooltype=$_SESSION["schooltype"];
if($schooltype=='Non-Tertiary') {
$lab1="Classes";
$lab2="Subjects";
$lab3="Subject";
$lab4="Class";
$lab5="Term";
$lab6="Sections";
$lab7="Section";
$lab8="Teacher/Exams Officer";
//get subcategory
$querrr=mysqli_query($con,"select id, subcat FROM subscriptions where account='$account' limit 1") or die(mysqli_error($con));
while($subb = mysqli_fetch_array($querrr)) { $subcatsch=$subb[1]; }
//--------
}
else {
$lab1="Levels";
$lab2="Courses";
$lab3="Course";
$lab4="Level";
$lab5="Semester";
$lab6="Departments";
$lab7="Department";
$lab8="Lecturer/Exams Officer";
}
?>