<?php
 $dbName = "login";
 $hostName = "localhost";
 $userName="root";
 $password="";
  try{
    $conn = new  PDO("mysql:host=$hostName;dbname=$dbName", $userName, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // IF LOGIN PAGE IS SUBMITED
    $login_usrname=$login_pass="";
    if(isset($_POST['loginSubmit'])){
        $login_usrname=$_POST['Username'];
        $login_pass=$_POST['Password'];
        if(empty($login_usrname) || empty($login_pass)){// if one of the field is empty.
          echo '<script>window.parent.handelError("All feilds are required");</script>';
        }
        else{//if all feild is filled.
         echo '<script>window.parent.handelError("");</script>';
         $sql = "SELECT userName, usr_password FROM user WHERE userName='$login_usrname' AND usr_password='$login_pass'";
         $stmt = $conn->prepare($sql);
         $stmt->execute();
         $result = $stmt->fetch(PDO::FETCH_ASSOC);
         if($result){
         echo '<script>window.parent.handelError("");</script>';
         echo '<script>window.parent.redirectPageToHome();</script>';
         }
         else
         echo '<script>window.parent.handelError("Invalid credentials. Please try again");</script>';
      }

    }
    
    // IF SIGN UP PAGE IS SUBMITED;
    $usrname=$pass=$conf_pass="";
    if(isset($_POST['signUpSubmit'])){
        $usrname=$_POST['regUsername'];
        $pass=$_POST['regPassword'];
        $conf_pass=$_POST['confirmedPass'];

        if(empty($usrname) || empty($pass)||empty($conf_pass)){// if one of the field is empty.
          echo '<script>window.parent.handelError("All feilds are required");</script>';
        }
        else{//if all feild is filled.
         echo '<script>window.parent.handelError("");</script>';
         if($pass == $conf_pass){// if password match.
         echo '<script>window.parent.handelError("");</script>';
         $sql = "SELECT userName FROM user WHERE userName='$usrname'";
         $stmt = $conn->prepare($sql);
         $stmt->execute();
         $result = $stmt->fetch(PDO::FETCH_ASSOC);
         if(!$result){
          $sql="INSERT INTO USER(userName, usr_password,con_password) VALUES (:userName,:usr_password,:con_password)";
          $stmt=$conn->prepare($sql);
          $stmt->execute(array(':userName'=>$usrname,':usr_password'=>$pass,':con_password'=>$conf_pass));
          echo '<script>window.parent.redirectPageToLogin();</script>';
         }else{
          echo '<script>window.parent.handelError("'.$usrname.' is already registerd");</script>';
         }
        
       }
       else{// if password didn't match.
        echo '<script>window.parent.handelError("Password didnt match");</script>';
       }
      }
       
    }

  }catch(PDOException $e){
  echo "Error while connectiing to database".$e->getMessage();
  }

?>