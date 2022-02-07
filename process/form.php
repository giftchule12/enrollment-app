<?php
    require '../includes/connection.php';
    require '../includes/sanitize.php';                                                                                          

    if (isset($_POST['submit'])){
        $secret = "6LfwnUoeAAAAAIoT2bEIg4s6jycyYMTEmMKdcWFd";
        $response = $_POST['g-recaptcha-response'];
        $remoteip = $_SERVER['REMOTE_ADDR'];
        $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip";
        $data = file_get_contents($url);
        $row = json_decode($data, true);
        
        if ($row['success'] == "true"){
          $fname = sanitizeString($_POST['fname']);
          $lname = sanitizeString($_POST['lname']);
          $dob = sanitizeString($_POST['dob']);
          $gender = sanitizeString($_POST['gender']);
          $email = sanitizeString($_POST['email']);
          $postal = sanitizeString($_POST['postal']);
          $physical = sanitizeString($_POST['postal']);
          $district = sanitizeString($_POST['physical']);
          $main = sanitizeString($_POST['main']);
          $alternate = sanitizeString($_POST['alternate']);
          $emg = sanitizeString($_POST['emg']);
          $campus = sanitizeString($_POST['campus']);
          $prog = sanitizeString($_POST['prog']);
          $intake = sanitizeInt($_POST['intake']);

          $query = "INSERT INTO students (fname, lname, dob, gender, email, postal_add, physical_add, district, main_number, alt_number, emg_number, campus, prog, intake)
                    VALUES ('$fname', '$lname', '$dob', '$gender', '$email', '$postal' , '$physical', '$district', '$main', '$alternate', '$emg', '$campus', '$prog', '$intake')";

          if ($conn->query($query) === TRUE) {
              echo '<script>';
              echo 'alert("Student enrolled successfully");';
              echo 'document.location.href = "../index.html";';
              echo '</script>';
            } else {
              echo '<script>';
              echo 'alert("Something is wrong please try again");';
              echo 'document.location.href = "../index.html";';
              echo '</script>';
            }
            
            $conn->close();
          }

          else{
            echo '<script>';
            echo 'alert("Please confirm that you are not a robot");';
            echo 'document.location.href = "../index.html";';
            echo '</script>';
          }
      }

    
?>