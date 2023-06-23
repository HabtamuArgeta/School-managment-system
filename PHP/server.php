<?php
// Connect to database
$dbName = "school_db";
$hostName = "localhost";
$userName="root";
$password="";
try {
    $conn = new PDO("mysql:host=$hostName;dbname=$dbName", $userName, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

  // To Add teacher
 if (isset($_POST['addTeacher'])) {
  $teacher_id = $_POST['teacher_id'];
  $teacher_name = $_POST['teacher_name'];
  $phone_number = $_POST['phone_number'];
  $age = $_POST['age'];
  $teacher_address = $_POST['teacher_address'];

      $query = "INSERT INTO teacher (teacher_id, teacher_name, phone_number, age, teacher_address) VALUES (:teacher_id, :teacher_name, :phone_number, :age, :teacher_address)";
      $stmt = $conn->prepare($query);
      $stmt->execute(array(':teacher_id' => $teacher_id, ':teacher_name' => $teacher_name, ':phone_number' => $phone_number, ':age' => $age, ':teacher_address' => $teacher_address));
  }
// To Add student
if (isset($_POST['addStudent'])) {
  $student_id = $_POST['student_id'];
  $student_name = $_POST['student_name'];
  $student_address = $_POST['student_address'];
  $student_email = $_POST['student_email'];
  $phone_number = $_POST['phone_number'];

  $query = "INSERT INTO student (student_id, student_name, student_address, student_email, phone_number) VALUES (:student_id, :student_name, :student_address, :student_email, :phone_number)";
  $stmt = $conn->prepare($query);
  $stmt->execute(array(':student_id' => $student_id, ':student_name' => $student_name, ':student_address' => $student_address, ':student_email' => $student_email, ':phone_number' => $phone_number));
}

// To Add course
if (isset($_POST['addCourse'])) {
  $course_id = $_POST['course_id'];
  $course_name = $_POST['course_name'];
  $student_id = $_POST['student_id'];
  $class_id = $_POST['class_id'];
  $course_type = $_POST['course_type'];

  $query = "INSERT INTO course (course_id, course_name, student_id, class_id, course_type) VALUES (:course_id, :course_name, :student_id, :class_id, :course_type)";
  $stmt = $conn->prepare($query);
  $stmt->execute(array(':course_id' => $course_id, ':course_name' => $course_name, ':student_id' => $student_id, ':class_id' => $class_id, ':course_type' => $course_type));
}

// To Add administration
if (isset($_POST['addAdministration'])) {
  $admin_id = $_POST['admin_id'];
  $admin_name = $_POST['admin_name'];
  $admin_address = $_POST['admin_address'];

  $query = "INSERT INTO administration (admin_id, admin_name, admin_address) VALUES (:admin_id, :admin_name, :admin_address)";
  $stmt = $conn->prepare($query);
  $stmt->execute(array(':admin_id' => $admin_id, ':admin_name' => $admin_name, ':admin_address' => $admin_address));
}

// To Add class
if (isset($_POST['addClass'])) {
  $class_id = $_POST['class_id'];
  $class_type = $_POST['class_type'];
  $student_id = $_POST['student_id'];
  $class_name = $_POST['class_name'];

  $query = "INSERT INTO class (class_id, class_type, student_id, class_name) VALUES (:class_id, :class_type, :student_id, :class_name)";
  $stmt = $conn->prepare($query);
  $stmt->execute(array(':class_id' => $class_id, ':class_type' => $class_type, ':student_id' => $student_id, ':class_name' => $class_name));
}

// To Add school
if (isset($_POST['addSchool'])) {
  $school_name = $_POST['school_name'];
  $school_type = $_POST['school_type'];

  $query = "INSERT INTO school (school_name, school_type) VALUES (:school_name, :school_type)";
  $stmt = $conn->prepare($query);
  $stmt->execute(array(':school_name' => $school_name, ':school_type' => $school_type));
}

// To Add registration
if (isset($_POST['addRegistration'])) {
  $registration_id = $_POST['registration_id'];
  $registration_date = $_POST['registration_date'];
  $registration_number = $_POST['registration_number'];
  $course_id = $_POST['course_id'];
  $registration_name = $_POST['registration_name'];
  $student_id = $_POST['student_id'];
  $registration_type = $_POST['registration_type'];

  $query = "INSERT INTO registration (registration_id, registration_date, registration_number, course_id, registration_name, student_id, registration_type) VALUES (:registration_id, :registration_date, :registration_number, :course_id, :registration_name, :student_id, :registration_type)";
  $stmt = $conn->prepare($query);
  $stmt->execute(array(':registration_id' => $registration_id, ':registration_date' => $registration_date, ':registration_number' => $registration_number, ':course_id' => $course_id, ':registration_name' => $registration_name, ':student_id' => $student_id, ':registration_type' => $registration_type));
}


// php for search from teacher
if (isset($_POST['searcheForTeacher'])) {
  $teacher_id = $_POST['teacher_id'];
 $Querry="SELECT teacher_id, teacher_name, phone_number, age, teacher_address FROM teacher WHERE  teacher_id=$teacher_id";
 $stmt=$conn->prepare($Querry);
 $stmt->execute();
 $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
 if(count($result)==0){
   echo '<script>window.parent.handleErrorResponse("No row with teacher_id='.$teacher_id.'");</script>';
 }else{
 foreach($result as $row){
     $col1=$row["teacher_id"];
     $col2=$row["teacher_name"];
     $col3=$row["phone_number"];
     $col4=$row["age"];
     $col5=$row["teacher_address"];
     
   }
 echo '<script>window.parent.handleResponse("'.$col1.'","'.$col2.'","'.$col3.'","'.$col4.'","'.$col5.'");</script>';
 }
}

// PHP for search from student
if (isset($_POST['searchForStudent'])) {
  $student_id = $_POST['student_id'];
  $query = "SELECT student_id, student_name, student_address, student_email, phone_number FROM student WHERE student_id = $student_id";
  $stmt = $conn->prepare($query);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  if (count($result) == 0) {
    echo '<script>window.parent.handleErrorResponse("No row with student_id='.$student_id.'");</script>';
  } else {
    foreach($result as $row) {
      $col1 = $row["student_id"];
      $col2 = $row["student_name"];
      $col3 = $row["student_address"];
      $col4 = $row["student_email"];
      $col5 = $row["phone_number"];
    }
    echo '<script>window.parent.handleResponse1("'.$col1.'","'.$col2.'","'.$col3.'","'.$col4.'","'.$col5.'");</script>';
  }
}

// PHP for search from course
if (isset($_POST['searchForCourse'])) {
  $course_id = $_POST['course_id'];
  $query = "SELECT course_id, course_name, student_id, class_id, course_type FROM course WHERE course_id = $course_id";
  $stmt = $conn->prepare($query);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  if (count($result) == 0) {
    echo '<script>window.parent.handleErrorResponse("No row with course_id='.$course_id.'");</script>';
  } else {
    foreach($result as $row) {
      $col1 = $row["course_id"];
      $col2 = $row["course_name"];
      $col3 = $row["student_id"];
      $col4 = $row["class_id"];
      $col5 = $row["course_type"];
    }
    echo '<script>window.parent.handleResponse2("'.$col1.'","'.$col2.'","'.$col3.'","'.$col4.'","'.$col5.'");</script>';
  }
}

// PHP for search from administration
if (isset($_POST['searchForAdministration'])) {
  $admin_id = $_POST['admin_id'];
  $query = "SELECT admin_id, admin_name, admin_address FROM administration WHERE admin_id = $admin_id";
  $stmt = $conn->prepare($query);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  if (count($result) == 0) {
    echo '<script>window.parent.handleErrorResponse("No row with admin_id='.$admin_id.'");</script>';
  } else {
    foreach($result as $row) {
      $col1 = $row["admin_id"];
      $col2 = $row["admin_name"];
      $col3 = $row["admin_address"];
    }
    echo '<script>window.parent.handleResponse3("'.$col1.'","'.$col2.'","'.$col3.'");</script>';
  }
}

// PHP for search from class
if (isset($_POST['searchForClass'])) {
  $class_id = $_POST['class_id'];
  $query = "SELECT class_id, class_type, student_id, class_name FROM class WHERE class_id = $class_id";
  $stmt = $conn->prepare($query);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  if (count($result) == 0) {
    echo '<script>window.parent.handleErrorResponse("No row with class_id='.$class_id.'");</script>';
  } else {
    foreach($result as $row) {
      $col1 = $row["class_id"];
      $col2 = $row["class_type"];
      $col3 = $row["student_id"];
      $col4 = $row["class_name"];
    }
    echo '<script>window.parent.handleResponse4("'.$col1.'","'.$col2.'","'.$col3.'","'.$col4.'");</script>';
  }
}

// PHP for search from school
if (isset($_POST['searchForSchool'])) {
  $school_ID = $_POST['school_ID'];
  $query = "SELECT school_name, school_type, school_ID FROM school WHERE school_ID = $school_ID";
  $stmt = $conn->prepare($query);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  if (count($result) == 0) {
    echo '<script>window.parent.handleErrorResponse("No row with school_ID='.$school_ID.'");</script>';
  } else {
    foreach($result as $row) {
      $col1 = $row["school_name"];
      $col2 = $row["school_type"];
      $col3 = $row["school_ID"];
    }
    echo '<script>window.parent.handleResponse5("'.$col1.'","'.$col2.'","'.$col3.'");</script>';
  }
}

// PHP for search from registration
if (isset($_POST['searchForRegistration'])) {
  $registration_id = $_POST['registration_id'];
  $query = "SELECT registration_id, registration_date, registration_number, course_id, registration_name, student_id, registration_type FROM registration WHERE registration_id = $registration_id";
  $stmt = $conn->prepare($query);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  if (count($result) == 0) {
    echo '<script>window.parent.handleErrorResponse("No row with registration_id='.$registration_id.'");</script>';
  } else {
    foreach($result as $row) {
      $col1 = $row["registration_id"];
      $col2 = $row["registration_date"];
      $col3 = $row["registration_number"];
      $col4 = $row["course_id"];
      $col5 = $row["registration_name"];
      $col6 = $row["student_id"];
      $col7 = $row["registration_type"];
    }
    echo '<script>window.parent.handleResponse6("'.$col1.'","'.$col2.'","'.$col3.'","'.$col4.'","'.$col5.'","'.$col6.'","'.$col7.'");</script>';
  }
}


  // php to make updates
if(isset($_POST['UpdateTeacher'])){
  $teacher_id = $_POST['teacher_id'];
  $new_teacher_name = $_POST['teacher_name'];
  $new_phone_number = $_POST['phone_number'];
  $new_age= $_POST['age'];
  $new_teacher_address= $_POST['teacher_address'];
//   $sql = "UPDATE teacher SET teacher_name='$new_teacher_name', phone_number='$new_phone_number', age='$new_age', teacher_address='$new_teacher_address' WHERE teacher_id='$teacher_id'";
    $querry="UPDATE teacher SET teacher_id=:teacher_id,teacher_name=:teacher_name,phone_number=:phone_number,age=:age,teacher_address=:teacher_address WHERE teacher_id=:teacher_id";
    $stmt=$conn->prepare($querry);
    $stmt->execute(array(':teacher_id'=>$teacher_id,':teacher_name'=>$new_teacher_name,':phone_number'=>$new_phone_number,':age'=>$new_age,':teacher_address'=>$new_teacher_address));
    if($stmt->rowCount()>0){
    echo '<script>window.parent.handleSuccessUpdateResponse("Data updated successfully");</script>';
    }else{
      echo '<script>window.parent.handleSuccessUpdateResponse("Errror while updating");</script>';
    }
}


if(isset($_POST['UpdateStudent'])){
  $student_id = $_POST['student_id'];
  $new_student_name = $_POST['student_name'];
  $new_student_address = $_POST['student_address'];
  $new_student_email = $_POST['student_email'];
  $new_phone_number = $_POST['phone_number'];

  $query = "UPDATE student SET student_name=:student_name, student_address=:student_address, student_email=:student_email, phone_number=:phone_number WHERE student_id=:student_id";
  $stmt = $conn->prepare($query);
  $stmt->execute(array(':student_name'=>$new_student_name, ':student_address'=>$new_student_address, ':student_email'=>$new_student_email, ':phone_number'=>$new_phone_number, ':student_id'=>$student_id));

  if($stmt->rowCount()>0){
    echo '<script>window.parent.handleSuccessUpdateResponse("Data updated successfully");</script>';
  }else{
    echo '<script>window.parent.handleSuccessUpdateResponse("Error while updating");</script>';
  }
}

if(isset($_POST['UpdateCourse'])){
  $course_id = $_POST['course_id'];
  $new_course_name = $_POST['course_name'];
  $new_student_id = $_POST['student_id'];
  $new_class_id = $_POST['class_id'];
  $new_course_type = $_POST['course_type'];

  $query = "UPDATE course SET course_name=:course_name, student_id=:student_id, class_id=:class_id, course_type=:course_type WHERE course_id=:course_id";
  $stmt = $conn->prepare($query);
  $stmt->execute(array(':course_name'=>$new_course_name, ':student_id'=>$new_student_id, ':class_id'=>$new_class_id, ':course_type'=>$new_course_type, ':course_id'=>$course_id));

  if($stmt->rowCount()>0){
    echo '<script>window.parent.handleSuccessUpdateResponse("Data updated successfully");</script>';
  }else{
    echo '<script>window.parent.handleSuccessUpdateResponse("Error while updating");</script>';
  }
}

if(isset($_POST['UpdateAdministration'])){
  $admin_id = $_POST['admin_id'];
  $new_admin_name = $_POST['admin_name'];
  $new_admin_address = $_POST['admin_address'];

  $query = "UPDATE administration SET admin_name=:admin_name, admin_address=:admin_address WHERE admin_id=:admin_id";
  $stmt = $conn->prepare($query);
  $stmt->execute(array(':admin_name'=>$new_admin_name, ':admin_address'=>$new_admin_address, ':admin_id'=>$admin_id));

  if($stmt->rowCount()>0){
    echo '<script>window.parent.handleSuccessUpdateResponse("Data updated successfully");</script>';
  }else{
    echo '<script>window.parent.handleSuccessUpdateResponse("Error while updating");</script>';
  }
}

if(isset($_POST['UpdateClass'])){
  $class_id = $_POST['class_id'];
  $new_class_type = $_POST['class_type'];
  $new_student_id = $_POST['student_id'];
  $new_class_name = $_POST['class_name'];

  $query = "UPDATE class SET class_type=:class_type, student_id=:student_id, class_name=:class_name WHERE class_id=:class_id";
  $stmt = $conn->prepare($query);
  $stmt->execute(array(':class_type'=>$new_class_type, ':student_id'=>$new_student_id, ':class_name'=>$new_class_name, ':class_id'=>$class_id));

  if($stmt->rowCount()>0){
    echo '<script>window.parent.handleSuccessUpdateResponse("Data updated successfully");</script>';
  }else{
    echo '<script>window.parent.handleSuccessUpdateResponse("Error while updating");</script>';
  }
}
  

if(isset($_POST['UpdateSchool'])){
  $school_id = $_POST['school_ID'];
  $new_school_name = $_POST['school_name'];
  $new_school_type = $_POST['school_type'];

  $query = "UPDATE school SET school_name=:school_name, school_type=:school_type WHERE school_ID=:school_ID";
  $stmt = $conn->prepare($query);
  $stmt->execute(array(':school_name'=>$new_school_name, ':school_type'=>$new_school_type, ':school_ID'=>$school_id));

  if($stmt->rowCount()>0){
    echo '<script>window.parent.handleSuccessUpdateResponse("Data updated successfully");</script>';
  }else{
    echo '<script>window.parent.handleSuccessUpdateResponse("Error while updating");</script>';
  }
}


if(isset($_POST['UpdateRegistration'])){
  $registration_id = $_POST['registration_id'];
  $new_registration_date = $_POST['registration_date'];
  $new_registration_number = $_POST['registration_number'];
  $new_course_id = $_POST['course_id'];
  $new_registration_name = $_POST['registration_name'];
  $new_student_id = $_POST['student_id'];
  $new_registration_type = $_POST['registration_type'];

  $query = "UPDATE registration SET registration_date=:registration_date, registration_number=:registration_number, course_id=:course_id, registration_name=:registration_name, student_id=:student_id, registration_type=:registration_type WHERE registration_id=:registration_id";
  $stmt = $conn->prepare($query);
  $stmt->execute(array(':registration_date'=>$new_registration_date, ':registration_number'=>$new_registration_number, ':course_id'=>$new_course_id, ':registration_name'=>$new_registration_name, ':student_id'=>$new_student_id, ':registration_type'=>$new_registration_type, ':registration_id'=>$registration_id));

  if($stmt->rowCount()>0){
    echo '<script>window.parent.handleSuccessUpdateResponse("Data updated successfully");</script>';
  }else{
    echo '<script>window.parent.handleSuccessUpdateResponse("Error while updating");</script>';
  }
}


  // delete teacher data
  if(isset($_POST["DeleteTeacher"])){
   $teacher_id = $_POST['teacher_id'];
    $querry="DELETE FROM teacher WHERE teacher_id=:teacher_id";
    $stmt=$conn->prepare($querry);
    $stmt->bindParam(':teacher_id',$teacher_id);
    if($stmt->execute()){
      echo '<script>window.parent.handelresponseInDelete("one row is affected");</script>';
    }
}
// delete student data 
if(isset($_POST["DeleteStudent"])){
  $student_id = $_POST['student_id'];
   $query = "DELETE FROM student WHERE student_id=:student_id";
   $stmt = $conn->prepare($query);
   $stmt->bindParam(':student_id', $student_id);
   if($stmt->execute()){
     echo '<script>window.parent.handelresponseInDelete("One row is affected");</script>';
   }
}
// delete course  data 
if(isset($_POST["DeleteCourse"])){
  $course_id = $_POST['course_id'];
   $query = "DELETE FROM course WHERE course_id=:course_id";
   $stmt = $conn->prepare($query);
   $stmt->bindParam(':course_id', $course_id);
   if($stmt->execute()){
     echo '<script>window.parent.handelresponseInDelete("One row is affected");</script>';
   }
}

// delete admin data 
if(isset($_POST["DeleteAdministration"])){
  $admin_id = $_POST['admin_id'];
   $query = "DELETE FROM administration WHERE admin_id=:admin_id";
   $stmt = $conn->prepare($query);
   $stmt->bindParam(':admin_id', $admin_id);
   if($stmt->execute()){
     echo '<script>window.parent.handelresponseInDelete("One row is affected");</script>';
   }
}

// delete class  data 
if(isset($_POST["DeleteClass"])){
  $class_id = $_POST['class_id'];
   $query = "DELETE FROM class WHERE class_id=:class_id";
   $stmt = $conn->prepare($query);
   $stmt->bindParam(':class_id', $class_id);
   if($stmt->execute()){
     echo '<script>window.parent.handelresponseInDelete("One row is affected");</script>';
   }
}

// delete school data 
if(isset($_POST["DeleteSchool"])){
  $school_id = $_POST['school_ID'];
   $query = "DELETE FROM school WHERE school_ID=:school_ID";
   $stmt = $conn->prepare($query);
   $stmt->bindParam(':school_ID', $school_id);
   if($stmt->execute()){
     echo '<script>window.parent.handelresponseInDelete("One row is affected");</script>';
   }
}

// delete registration  data 
if(isset($_POST["DeleteRegistration"])){
  $registration_id = $_POST['registration_id'];
   $query = "DELETE FROM registration WHERE registration_id=:registration_id";
   $stmt = $conn->prepare($query);
   $stmt->bindParam(':registration_id', $registration_id);
   if($stmt->execute()){
     echo '<script>window.parent.handelresponseInDelete("One row is affected");</script>';
   }
}


//Display teacher intered data  
  if (isset($_POST['displayTeacher'])) {
      $Querry="SELECT teacher_id, teacher_name, phone_number, age, teacher_address FROM teacher";
      $stmt=$conn->prepare($Querry);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      if(count($result)>0){
        echo "<b>HERE ARE RECORD OF TEACHERS ADDED </b><br><br>";
      }else{
        echo "<b>TEACHER IS NOT ADDED YET </b>";
      }
  echo "<table style='border-collapse: collapse;width:70%;'>";
  foreach ($result as $row) {
     $col1 = $row["teacher_id"];
     $col2 = $row["teacher_name"];
     $col3 = $row["phone_number"];
     $col4 = $row["age"];
     $col5 = $row["teacher_address"];

     echo "<tr>";
     echo "<td colspan='2' style='border: 1px solid black;text-align:center'><b>One teacher Info</b> </td>";
     echo "</tr>";

     echo "<tr>";
     echo "<td style='border: 1px solid black;'>Teacher_id</td>";
     echo "<td style='border: 1px solid black;'>$col1</td>";
     echo "</tr>";

     echo "<tr>";
     echo "<td style='border: 1px solid black;'>Teacher_name</td>";
     echo "<td style='border: 1px solid black;'>$col2</td>";
     echo "</tr>";

     echo "<tr>";
     echo "<td style='border: 1px solid black;'>Phone_number</td>";
     echo "<td style='border: 1px solid black;'>$col3</td>";
     echo "</tr>";

     echo "<tr>";
     echo "<td style='border: 1px solid black;'>Age</td>";
     echo "<td style='border: 1px solid black;'>$col4</td>";
     echo "</tr>";

     echo "<tr>";
     echo "<td style='border: 1px solid black;'>Teacher_address</td>";
     echo "<td style='border: 1px solid black;'>$col5</td>";
     echo "</tr>";
     echo "<br>";
   }
  echo "</table>";

}

// Display entered data for student
if (isset($_POST['displayStudent'])) {
  $query = "SELECT student_id, student_name, student_address, student_email, phone_number FROM student";
  $stmt = $conn->prepare($query);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  if (count($result) > 0) {
    echo "<b>HERE ARE RECORDS OF STUDENTS ADDED</b><br><br>";
  } else {
    echo "<b>NO STUDENT RECORDS FOUND</b>";
  }
  echo "<table style='border-collapse: collapse; width: 70%;'>";
  foreach ($result as $row) {
    $col1 = $row["student_id"];
    $col2 = $row["student_name"];
    $col3 = $row["student_address"];
    $col4 = $row["student_email"];
    $col5 = $row["phone_number"];

    echo "<tr>";
    echo "<td colspan='2' style='border: 1px solid black; text-align: center'><b>One student Info</b> </td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td style='border: 1px solid black;'>Student_id</td>";
    echo "<td style='border: 1px solid black;'>$col1</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td style='border: 1px solid black;'>Student_name</td>";
    echo "<td style='border: 1px solid black;'>$col2</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td style='border: 1px solid black;'>Student_address</td>";
    echo "<td style='border: 1px solid black;'>$col3</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td style='border: 1px solid black;'>Student_email</td>";
    echo "<td style='border: 1px solid black;'>$col4</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td style='border: 1px solid black;'>Phone_number</td>";
    echo "<td style='border: 1px solid black;'>$col5</td>";
    echo "</tr>";
    echo "<br>";
  }
  echo "</table>";
}

// Display entered data for course
if (isset($_POST['displayCourse'])) {
  $query = "SELECT course_id, course_name, student_id, class_id, course_type FROM course";
  $stmt = $conn->prepare($query);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  if (count($result) > 0) {
    echo "<b>HERE ARE RECORDS OF COURSES ADDED</b><br><br>";
  } else {
    echo "<b>NO COURSE RECORDS FOUND</b>";
  }
  echo "<table style='border-collapse: collapse; width: 70%;'>";
  foreach ($result as $row) {
    $col1 = $row["course_id"];
    $col2 = $row["course_name"];
    $col3 = $row["student_id"];
    $col4 = $row["class_id"];
    $col5 = $row["course_type"];

    echo "<tr>";
    echo "<td colspan='2' style='border: 1px solid black; text-align: center'><b>One course Info</b> </td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td style='border: 1px solid black;'>Course_id</td>";
    echo "<td style='border: 1px solid black;'>$col1</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td style='border: 1px solid black;'>Course_name</td>";
    echo "<td style='border: 1px solid black;'>$col2</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td style='border: 1px solid black;'>Student_id</td>";
    echo "<td style='border: 1px solid black;'>$col3</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td style='border: 1px solid black;'>Class_id</td>";
    echo "<td style='border: 1px solid black;'>$col4</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td style='border: 1px solid black;'>Course_type</td>";
    echo "<td style='border: 1px solid black;'>$col5</td>";
    echo "</tr>";
    echo "<br>";
  }
  echo "</table>";
}

// Display entered data for administration
if (isset($_POST['displayAdministration'])) {
  $query = "SELECT admin_id, admin_name, admin_address FROM administration";
  $stmt = $conn->prepare($query);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  if (count($result) > 0) {
    echo "<b>HERE ARE RECORDS OF ADMINISTRATION ADDED</b><br><br>";
  } else {
    echo "<b>NO ADMINISTRATION RECORDS FOUND</b>";
  }
  echo "<table style='border-collapse: collapse; width: 70%;'>";
  foreach ($result as $row) {
    $col1 = $row["admin_id"];
    $col2 = $row["admin_name"];
    $col3 = $row["admin_address"];

    echo "<tr>";
    echo "<td colspan='2' style='border: 1px solid black; text-align: center'><b>One administration Info</b> </td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td style='border: 1px solid black;'>Admin_id</td>";
    echo "<td style='border: 1px solid black;'>$col1</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td style='border: 1px solid black;'>Admin_name</td>";
    echo "<td style='border: 1px solid black;'>$col2</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td style='border: 1px solid black;'>Admin_address</td>";
    echo "<td style='border: 1px solid black;'>$col3</td>";
    echo "</tr>";
    echo "<br>";
  }
  echo "</table>";
}

// Display entered data for class
if (isset($_POST['displayClass'])) {
  $query = "SELECT class_id, class_type, student_id, class_name FROM class";
  $stmt = $conn->prepare($query);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  if (count($result) > 0) {
    echo "<b>HERE ARE RECORDS OF CLASSES ADDED</b><br><br>";
  } else {
    echo "<b>NO CLASS RECORDS FOUND</b>";
  }
  echo "<table style='border-collapse: collapse; width: 70%;'>";
  foreach ($result as $row) {
    $col1 = $row["class_id"];
    $col2 = $row["class_type"];
    $col3 = $row["student_id"];
    $col4 = $row["class_name"];

    echo "<tr>";
    echo "<td colspan='2' style='border: 1px solid black; text-align: center'><b>One class Info</b> </td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td style='border: 1px solid black;'>Class_id</td>";
    echo "<td style='border: 1px solid black;'>$col1</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td style='border: 1px solid black;'>Class_type</td>";
    echo "<td style='border: 1px solid black;'>$col2</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td style='border: 1px solid black;'>Student_id</td>";
    echo "<td style='border: 1px solid black;'>$col3</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td style='border: 1px solid black;'>Class_name</td>";
    echo "<td style='border: 1px solid black;'>$col4</td>";
    echo "</tr>";
    echo "<br>";
  }
  echo "</table>";
}

// Display entered data for school
if (isset($_POST['displaySchool'])) {
  $query = "SELECT school_ID, school_name, school_type FROM school";
  $stmt = $conn->prepare($query);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  if (count($result) > 0) {
    echo "<b>HERE ARE RECORDS OF SCHOOLS ADDED</b><br><br>";
  } else {
    echo "<b>NO SCHOOL RECORDS FOUND</b>";
  }
  echo "<table style='border-collapse: collapse; width: 70%;'>";
  foreach ($result as $row) {
    $col1 = $row["school_ID"];
    $col2 = $row["school_name"];
    $col3 = $row["school_type"];

    echo "<tr>";
    echo "<td colspan='2' style='border: 1px solid black; text-align: center'><b>One school Info</b> </td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td style='border: 1px solid black;'>School_ID</td>";
    echo "<td style='border: 1px solid black;'>$col1</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td style='border: 1px solid black;'>School_name</td>";
    echo "<td style='border: 1px solid black;'>$col2</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td style='border: 1px solid black;'>School_type</td>";
    echo "<td style='border: 1px solid black;'>$col3</td>";
    echo "</tr>";
    echo "<br>";
  }
  echo "</table>";
}


// Display entered data for registration
if (isset($_POST['displayRegistration'])) {
  $query = "SELECT registration_id, registration_date, registration_number, course_id, registration_name, student_id, registration_type FROM registration";
  $stmt = $conn->prepare($query);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  if (count($result) > 0) {
    echo "<b>HERE ARE RECORDS OF REGISTRATIONS</b><br><br>";
  } else {
    echo "<b>NO REGISTRATION RECORDS FOUND</b>";
  }
  echo "<table style='border-collapse: collapse; width: 70%;'>";
  foreach ($result as $row) {
    $col1 = $row["registration_id"];
    $col2 = $row["registration_date"];
    $col3 = $row["registration_number"];
    $col4 = $row["course_id"];
    $col5 = $row["registration_name"];
    $col6 = $row["student_id"];
    $col7 = $row["registration_type"];

    echo "<tr>";
    echo "<td colspan='2' style='border: 1px solid black; text-align: center'><b>One Registration Info</b> </td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td style='border: 1px solid black;'>Registration_id</td>";
    echo "<td style='border: 1px solid black;'>$col1</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td style='border: 1px solid black;'>Registration_date</td>";
    echo "<td style='border: 1px solid black;'>$col2</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td style='border: 1px solid black;'>Registration_number</td>";
    echo "<td style='border: 1px solid black;'>$col3</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td style='border: 1px solid black;'>Course_id</td>";
    echo "<td style='border: 1px solid black;'>$col4</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td style='border: 1px solid black;'>Registration_name</td>";
    echo "<td style='border: 1px solid black;'>$col5</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td style='border: 1px solid black;'>Student_id</td>";
    echo "<td style='border: 1px solid black;'>$col6</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td style='border: 1px solid black;'>Registration_type</td>";
    echo "<td style='border: 1px solid black;'>$col7</td>";
    echo "</tr>";
    echo "<br>";
  }
  echo "</table>";
}


}catch (PDOException $e) {
  echo "Error while connecting to database: " . $e->getMessage();
}
?>