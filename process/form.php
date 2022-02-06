\<?php
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
          echo "Valid";
        }
        else{
          echo "Invalid";
        }
      }

    /* $fname = sanitizeString($_POST['fname']);
    $lname = sanitizeString($_POST['lname']);
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $postal = $_POST['postal'];
    $physical = $_POST['postal'];
    $district = $_POST['physical'];
    $main = $_POST['main'];
    $alternate = $_POST['alternate'];
    $emg = $_POST['emg'];
    $campus = $_POST['campus'];
    $prog = $_POST['prog'];
    $intake = $_POST['intake'];
    
    print $fname;
    print "</br>";
    print $lname;

    $query = "INSERT INTO students (fname, lname, dob, gender, email, postal_add, physical_add, district, main_number, alt_number, emg_number, campus, prog, intake)
              VALUES ('$fname', '$lname', '$dob', '$gender', '$email', '$postal' , '$physical', '$district', '$main', '$alternate', '$emg', '$campus', '$prog', '$intake')";

    if ($conn->query($query) === TRUE) {
        echo '<script>alert("Student enrolled successfully.")</script>';
      } else {
        echo "Error: " . $qu0ery . "<br>" . $conn->error;
      }
      
      $conn->close(); */
?>