<style type="text/css">
body, html {
  height: 100%;
  background-repeat: no-repeat;
  background-color: #ecbfff;
}
.inputDefi{
  display: none;
}
</style>
<div class="text-center" id="scanner">
  <h4>แลกซื้อ</h4>
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
        var saveData = $.ajax({
          type: 'POST',
          url: "exCp.php",
          data: {uf:content},
          dataType: "text",
          success: (data2)=> {
           var data = JSON.parse(data2);
           $("#scanner").slideToggle( "slow", function() {
            $("#inputEx").slideToggle( "slow", function() {
              //console.log(data);
               //var dataaaa =  JSON.stringify(data2);
               userrr = data['userid'];
               cpppp = data['coupon'];
               $("#dataRes").val(data['coupon']);
               $("#userid").val(data['userid']);
             });
          });

         },
         error:(data)=>{
          console.log("error");
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
</div>

<div class="container">
  <dir id="inputEx" class="inputDefi">
    <div class="row justify-content-md-center">
      <div class="col-md-3">
        <form>
          <fieldset>
            <div class="form-group">
              <label class="control-label">คูปอง</label>
              <input class="form-control" id="dataRes" disabled>
            </div>
            <div class="form-group">
              <label class="control-label">User</label>
              <input class="form-control" id="userid" disabled>
            </div>
          <!--<div class="form-group">
            <label class="control-label">After:</label>
            <div class="input-group"><span class="input-group-btn"><button type="button" class="btn btn-default">-</button></span><input id="after" class="form-control" type="text" value="1" min="1" max="10" style="text-align: center;"><span class="input-group-btn"><button type="button" class="btn btn-default">+</button></span></div>
          </div>*-->
          <div class="form-group">
            <label class="control-label">แก้ว:</label>
            <div class="input-group "><span class="input-group-btn">
              <button type="button" class="btn btn-danger">-</button></span>
              <input id="colorful" class="form-control" value="0" type="number" value="1" min="1" max="100" style="text-align: center;" >
              <span class="input-group-btn">
                <button type="button" class="btn btn-success">+</button></span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label">แก้ว:</label>
              <div class="input-group ">
                <button type="button" id="ccsubmit" class="btn btn-info btn-block"> แลก</button>

              </div>
            </div>

          </fieldset>
        </form>
      </div>
    </div>
    <script type="text/javascript">
      $(document).ready(function(){

        $("#okC").click(function(){
         location.reload();
       });
        var input1 = parseInt($("#colorful").val());
        var input2 = parseInt($("#colorful").val());
        var cp = parseInt(cpppp);
        var userId = userrr;
        $("#ccsubmit").click(function(){

          var saveData2 = $.ajax({
            type: 'POST',
            url: "cc.php",
            data: {exc:input1,userid:userrr},
            dataType: "text",
            success: (data2)=> {
              var resp =JSON.parse(data2);
             // console.log(resp["status"]);
              if(resp['status']=="OK"){
               $('.modal').modal('show');
               $("#detail").text(`แลกสำเร็จ  ${input1} แก้ว ,เหลือ ${resp['cc']} แต้ม`);
                //console.log("ssssssssssss");
              }
            },
            error:(data)=>{
              alert("error");
             // console.log("error");
            }
          });
        });
        $(".btn.btn-success").click(function(){ //up
         if(input1<cpVal(cpppp)){
          input1=input1+1;
        }

        //console.log("cp",cpppp);
        //console.log("cpval",cpVal(cpppp));

        $("#colorful").val(input1);
      });
        $(".btn.btn-danger").click(function(){ //down
          if(input1>0){
            input1=input1-1;
          }
          $("#colorful").val(input1);
        });
      });
      function cpVal(data){
       var cc =  data/10;
       /*if(data%10==5){
         cc =  Math.floor(cc);
       }*/
       return Math.floor(cc);
     }
     function cpLal(data){
       var cc =  data%=10;
       return cc;
     }
   </script>
 </dir>
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