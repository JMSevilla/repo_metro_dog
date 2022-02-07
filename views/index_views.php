<div id="v_loginpage">
  <div style="margin-top: 150px;" class="container">
    <div class="row">
      <div style="margin-left: -70px;" class="col-sm">

        </div>
        <div class="col-sm">
               <el-card style="width: 115%;" shadow="always">
              <center>
                 <img src="assets/metrodogs logo.jpg" style="width: 50%; height: auto;" class="img-fluid" alt="No image">
                  </center>
               <?php include("components/LoginForm/Form.php"); ?>
               <el-link type="primary" style="margin-left:75%;"  data-toggle="modal" data-target="#exampleModalCenter">Forget Password?</el-link>
              </el-card>
              <?php include("components/LoginForm/ForgetPassword.php"); ?>
             </div>
             <div class="col-sm">
            
      </div>
    </div>
  </div>

</div>