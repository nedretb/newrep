<?php
    include "dbh.php";

    if(!isset($_POST['submit'])){
        
        $errorEmpty = false;
        $fullname = $_POST['fullname'];
        $idNumb = $_POST['jmb'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];

        if(empty($fullname) || empty($idNumb) || empty($dob) || empty($gender)){
           echo "<span style=\"color: red\">you need to enter all fields</span>";
            $errorEmpty = true;
        }
        else{
            $x = new Dbh();
            $x->create($fullname, $idNumb, $dob, $gender);
            echo "<span style=\"color: green\">great job</span>";
        }
        /*
        if (!empty($fullname) || !empty($idNumb) || !empty($dob) || !empty($gender)){
            
            echo "Successfull addition";
        }
        else{
            echo "<span>you need to enter all fields</span>";
            $errorEmpty = true;
        }*/
    
    }
    else{
        echo "<span style=\"color: red\">error sumhwer</span>";
    }
?>

<script>
    $("#fullname, #jmb, #dob, #gender").removeClass("input-error");
    var errorEmpty = "<?php echo $errorEmpty; ?>";

    if(errorEmpty == true){
        $("#fullname, #jmb, #dob, #gender").addClass("input-error");
    }
    else{
        $("#fullname, #jmb, #dob, #gender").val("");
    }
</script>