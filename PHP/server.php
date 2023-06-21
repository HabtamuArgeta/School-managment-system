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
 if (isset($_POST['Insert'])) {
  $teacher_id = $_POST['teacher_id'];
  $teacher_name = $_POST['teacher_name'];
  $phone_number = $_POST['phone_number'];
  $age = $_POST['age'];
  $teacher_address = $_POST['teacher_address'];

      $query = "INSERT INTO teacher (teacher_id, teacher_name, phone_number, age, teacher_address) VALUES (:teacher_id, :teacher_name, :phone_number, :age, :teacher_address)";
      $stmt = $conn->prepare($query);
      $stmt->execute(array(':teacher_id' => $teacher_id, ':teacher_name' => $teacher_name, ':phone_number' => $phone_number, ':age' => $age, ':teacher_address' => $teacher_address));
  }


  // php to make updates
if(isset($_POST['submit_updates'])){
  $teacher_id = $_POST['teacher_id'];
  $new_teacher_name = $_POST['new_teacher_name'];
  $new_phone_number = $_POST['new_phone_number'];
  $new_age= $_POST['new_age'];
  $new_teacher_address= $_POST['new_teacher_address'];
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


// php for search form in Update
 if (isset($_POST['searched_submit'])) {
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

  // php for delete
  if(isset($_POST["DeleteData"])){
   $teacher_id = $_POST['teacher_id'];
    $querry="DELETE FROM teacher WHERE teacher_id=:teacher_id";
    $stmt=$conn->prepare($querry);
    $stmt->bindParam(':teacher_id',$teacher_id);
    $stmt->execute();
    if($stmt->rowCount()>0){
      echo '<script>window.parent.handelresponseInDelete("one row is affected");</script>';
    }
}

//Display intered data  
  if (isset($_POST['submit_hidden_form'])) {
      $Querry="SELECT teacher_id, teacher_name, phone_number, age, teacher_address FROM teacher";
      $stmt=$conn->prepare($Querry);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      if(count($result)>0){
        echo "<b>2015 </b>".strtoupper( "<b>$Exit_model_for_takeExam</b>"). " <b>EXAM QUESTIONS</b>";
      }else{
        echo "<b>TEACHER IS NOT ADDED YET </b>";
      }
      foreach($result as $row){
          $col1=$row["teacher_id"];
          $col2=$row["teacher_name"];
          $col3=$row["phone_number"];
          $col4=$row["age"];
          $col5=$row["teacher_address"];

          echo "teacher_id -> $col1 <br>";
          echo "teacher_name -> $col2 <br>";
          echo "phone_number -> $col3 <br>";
          echo "age -> $col4 <br>";
          echo "teacher_address -> $col5 <br>";
          echo "<br>";
      }  
}
}catch (PDOException $e) {
  echo "Error while connecting to database: " . $e->getMessage();
}
?>