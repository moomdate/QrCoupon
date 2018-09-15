<?php
@session_start();
include "../config/config.inc.php";
$userF = $_GET['fid'];

$result = $mysqli->query("SELECT * FROM userfake INNER JOIN member ON userfake.f_usid = member.mem_id WHERE userfake.f_fake = '$userF'");
$userID = $result->fetch_row()[1];

$result = $mysqli->query("SELECT SUM(p_value) FROM `point` WHERE p_user_id = $userID");
$coupon = $result->fetch_row()[0];

$das = array('userid' => "$userF", 'coupon' => "$coupon");
//echo json_encode($das);
 if($coupon==NULL)
  $value = 0;
  else 
  $value = $coupon;
?>

<form  method="post" action="" name="tam">
  <div class="form-row">
    <div class="form-group">
      <label for="inputEmail4"><h3>จำนวนแต้ม</h3></label>
      <input type="text" class="form-control" name="update" id="test" value="<?=$value;?>" placeholder="แต้ม">
    </div>
   
  </div>
  <button type="submit" class="btn btn-danger">แก้ไข</button>
  <a href="index.php?ad=ma" class="btn btn-info">ย้อนกลับ</a>
</form>
<?php
if(isset($_POST['update'])){
  include "../config/config.inc.php";
$ex = $_POST['update'];
$useridf = $userF;
$result = $mysqli->query("SELECT * FROM userfake where f_fake = '$useridf'");
$data = $result->fetch_row();
$userid = $data[1];

$result2 = $mysqli->query("SELECT SUM(p_value) FROM `point` WHERE p_user_id = $userid");
$coupon = $result2->fetch_row()[0];

	$result3 = $mysqli->query("DELETE FROM point WHERE p_user_id = $userid ");
//	$cpRe = $coupon - ($ex * 10);
		$mysqli->query("INSERT INTO `point` (`p_id`, `p_qr`, `p_value`, `p_user_id`) VALUES (NULL, 'ex', '$ex', '$userid');");
		//$rest = array("status" => "OK", "cc" => $cpRe);
    header("Refresh:3");
?>
<div class="alert alert-danger" role="alert">
  เสร็จสิ้น
</div>
<?php
}
?>