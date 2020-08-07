<?php
    include "inc/header.php";
    include "config.php";
    include "database.php";

    $db = new Database();
    $id = $_GET["id"];
    $sql = "SELECT * FROM tbl_user WHERE id=$id";
    $getData = $db->select($sql)->fetch_assoc();

    if(isset($_POST["update"])){
        $name = mysqli_real_escape_string($db->link, $_POST["name"]);
        $email = mysqli_real_escape_string($db->link, $_POST["email"]);
        $skill = mysqli_real_escape_string($db->link, $_POST["skill"]);
        

        if($name == "" || $email == "" || $skill == ""){
            $error = "<span class='red'>Field Must Not Be empty !!</span>";
        }else{
            $query = "UPDATE tbl_user 
            SET name = '$name',
            email = '$email',
            skill = '$skill' WHERE id=$id";
            $insert = $db->update($query);
        }
    }

    if(isset($_POST["delete"])){
        $query = "DELETE FROM tbl_user WHERE id=$id";
        $delete = $db->delete($query);

    }


?>
<div class="main pt-1">
<?php if(isset($error)){
        echo $error;
    }
?>
<form action ="update.php?id=<?php echo $id;?>" method="post">
<table cellpadding="15" cellspacing="0">

    <tr>
        <td>Name</td>
        <td> <input type="text" name="name" Value="<?php echo $getData["name"];?>"></td>
    </tr>
    <tr>
        <td>Email</td>
        <td> <input type="email" name="email" Value="<?php echo $getData["email"];?>"></td>
    </tr>
    <tr>
        <td>Skill</td>
        <td> <input type="text" name="skill" Value="<?php echo $getData["skill"];?>"></td>
    </tr>
    <tr>
        <td></td>
        <td> 
            <input class="updt" type="submit" name="update" Value="Update">
            <input class="del" type="submit" name="delete" Value="Delete">
    </td>
    </tr>
</table>
</form>
<a class="custom-btn" href="index.php">Go Back</a>







</div>



<?php include "inc/footer.php" ?>