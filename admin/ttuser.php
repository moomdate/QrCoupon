<?php
@session_start();
include "../config/config.inc.php";
?>
<style type="text/css">
body, html {
  height: 100%;
  background-repeat: no-repeat;
  background-color: #fce5fb;
}
.inputDefi{
  display: none;
}
</style>
<div class="text-center" id="scanner">
  <h4>จัดการแต้ม User</h4>
  <div class="text-center">
    <script type="text/javascript" src="../js/instascan.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <video id="preview"> </video>
    <script type="text/javascript">
      var userrr;
      var cpppp;
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
      scanner.addListener('scan', function (content) {
        //console.log(content);
        //var myKeyVals = { A1984 : 1, A9873 : 5, A1674 : 2, A8724 : 1, A3574 : 3, A1165 : 5 }
        window.location.href = `index.php?ad=mamcp&fid=${content}`;//
        //saveData.error(function() { alert("Something went wrong"); });
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });
    </script>
  </div>
</div>