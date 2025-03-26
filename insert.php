<?php
include ("connectDB.php");

try {
    $addDonor = "INSERT INTO donors (Username, Password, Name, DOB, Gender, BloodGroup, Mobile, Email, City)
    VALUES ('$_POST[userName]', 
            '$_POST[password]',
            '$_POST[fullname]', 
            '$_POST[dob]',
            '$_POST[gender]',
            '$_POST[bloodgroup]', 
            '$_POST[phone]',    
            '$_POST[email]',
            '$_POST[town]')";

    if ($con->query($addDonor) === TRUE) {
        echo "<script>
                alert('Added Successfully');
                window.location.href = 'index.html';
              </script>";
    } else {
        throw new Exception($con->error, $con->errno);
    }

} catch (Exception $e) {
    if ($e->getCode() === 1062) {
        echo "<script>
                alert('Username already exists. Please choose a different username.');
                window.history.back();
              </script>";
    } else {
        echo "<script>
                alert('Not added: " . addslashes($e->getMessage()) . "');
                window.history.back();
              </script>";
    }
} finally {
    $con->close();
}
?>