<?php
@session_start();
include "../config/config.inc.php";


?>
<div class="table-responsive">
  <table class="table">
    <tr>
        <th>
        username
        </th>
        <th>
        id
        </th>
    </tr>
<?php
$result = $mysqli->query("SELECT * FROM userfake INNER JOIN member ON userfake.f_usid = member.mem_id ");
while($userID = $result->fetch_array()){
/*
$result = $mysqli->query("SELECT SUM(p_value) FROM `point` WHERE p_user_id = $userID");
$coupon = $result->fetch_row()[0];
$das = array('userid' => "test", 'coupon' => "$coupon");
echo json_encode($das);
*/
?>

    <tr>
        <td>
        <a href="index.php?ad=mamcp&fid=<?=$userID['f_fake'];?>"><?=$userID['mem_username'];?></a>
        </td>
        <td>
        <?=$userID['f_fake'];?>
        </td>
    </tr>
  
<?php
}
?>
</table>
</div>