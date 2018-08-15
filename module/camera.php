<style type="text/css">
body, html {
  height: 100%;
  background-repeat: no-repeat;
  background-color: #f7dcd9;
}
</style>
<div class="text-center">
  <h4>Scaner</h4>
  <div class="text-center">
    <script type="text/javascript" src="js/instascan.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <video id="preview"> </video>
    <script type="text/javascript">
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
      scanner.addListener('scan', function (content) {
        console.log(content);
        //var myKeyVals = { A1984 : 1, A9873 : 5, A1674 : 2, A8724 : 1, A3574 : 3, A1165 : 5 }
        var saveData = $.ajax({
          type: 'POST',
          url: "module/checkCoupon.php",
          data: {cp:content},
          dataType: "text",
          success: function(resultData) {
            console.log(resultData);
            var saveData2 = $.ajax({
              type: 'POST',
              url: "member/getCoupon.php",
              data: "",
              dataType: "text",
              success: function(resultData) {
               // alert();
                $('.modal').modal('show');
                $("#detail").text(`ได้รับ ${resultData} แต้ม`);
                //document.getElementById('tam').innerHTML = resultData+" แต้ม";
              }
            });
          }
        });
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
  <div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">สำเร็จ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="detail"></p>
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-info" data-dismiss="modal" id="okC">OK</button>
      </div>
    </div>
  </div>
</div>