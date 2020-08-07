<?php
    include "inc/header.php";
    include "config.php";
    include "database.php";

    $db = new Database();
    if(isset($_POST["submit"])){
        $name = mysqli_real_escape_string($db->link, $_POST["name"]);
        $email = mysqli_real_escape_string($db->link, $_POST["email"]);
        $skill = mysqli_real_escape_string($db->link, $_POST["skill"]);

        if($name == "" || $email == "" || $skill == ""){
            $error = "<span class='red'>Field Must Not Be empty !!</span>";
        }else{
            $query = "INSERT INTO tbl_user(name, email, skill) VALUES('$name' , '$email', '$skill')";
            $insert = $db->insert($query);
        }
    }

?>
<div class="main pt-1">
<?php if(isset($error)){
        echo $error;
    }
?>
<form action ="create.php" method="post">
<table cellpadding="15" cellspacing="0">
    <tr>
        <td>Name</td>
        <td> <input type="text" name="name" placeholder="Please Enter Your Name"></td>
    </tr>
    <tr>
        <td>Email</td>
        <td> <input type="email" name="email" placeholder="Please Enter Your Email"></td>
    </tr>
    <tr>
        <td>Skill</td>
        <td> <input type="text" name="skill" placeholder="Please Enter Your Skill"></td>
    </tr>
    <tr>
        <td></td>
        <td> 
            <input type="submit" name="submit" Value="Submit">
            <input type="reset" Value="Reset">
    </td>
    </tr>
</table>
</form>
<a class="custom-btn" href="index.php">Go Back</a>







</div>



<?php include "inc/footer.php" ?>