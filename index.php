<?php
    include "inc/header.php";
    include "config.php";
    include "database.php";

    $db = new Database();
    $sql = "SELECT * FROM tbl_user ORDER BY id DESC";
    $read = $db->select($sql);

?>
<div class="main pt-1">
    <?php if(isset($_GET["msg"])){
        echo "<span class='green'>".$_GET["msg"]."</span>";
    }?>

<table class="tabone" cellpadding="15" cellspacing="0" border="1">
    <tr>
        <th width="10%">Serial</th>
        <th width="25%">Name</th>
        <th width="30%">Email</th>
        <th width="15%">Skill</th>
        <th width="20%">Action</th>
    </tr>
    <?php if($read){
        $i = 1;
        while($row = $read->fetch_assoc()){ ?>
    <tr>
        <td><?php echo $i++;?></td>
        <td><?php echo $row["name"];?></td>
        <td><?php echo $row["email"];?></td>
        <td><?php echo $row["skill"];?></td>

        <td>
            <a class="indx-btn" href="update.php?id=<?php echo $row["id"];?>">Edit</a> 
        </td>
    </tr>
    <?php }}else{ ?>
        <p>Data is Not Availbale!!</p>
    <?php } ?>
</table>
<a class="custom-btn" href="create.php">Create</a>








</div>



<?php include "inc/footer.php" ?>