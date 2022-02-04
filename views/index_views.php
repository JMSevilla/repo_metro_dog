<div id="v_loginpage">
  <div style="margin-top: 100px;" class="container">
    <div class="row">
      <div style="margin-left: -70px;" class="col-sm">

        </div>
        <div class="col-sm">
               <el-card style="width: 120%;" shadow="always">
              <center>
                 <img src="assets/metrodogs logo.jpg" style="width: 50%; height: auto;" class="img-fluid" alt="No image">
                  </center>
               <?php include("components/LoginForm/Form.php"); ?>
               <el-link type="primary" style="margin-left:75%;"  data-toggle="modal" data-target="#exampleModalCenter">Forget Password?</el-link>
              </el-card>
             </div>
             <div class="col-sm">
            
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
       <div class="modal-body">

                      <div class="text-center">
                          <h3><i class="fa fa-lock fa-4x"></i></h3>
                          <h2 class="text-center">Forgot Password?</h2>
                          <p>You can reset your password here.</p>
                            <div class="panel-body">
                              
                              <form class="form">
                                <fieldset>
                                  <div class="form-group">
                                    <div class="input-group">
                                      <span class="input-group-addon"></span>
                                      
                                      <el-form-item label="Security Question" prop="sec_question">
                                    <el-input type="text" style="margin-bottom: 10px;" v-model="adminTask.sec_question"></el-input>
                                   </el-form-item>
                                    <el-form-item label="Security Answer" prop="sec_answer">
                                    <el-input type="text" clearable style="margin-bottom: 10px;" placeholder="Enter security answer" v-model="adminTask.sec_answer"></el-input>
                                   </el-form-item>
                                    </div>
                                  </div>
                                 
                                </fieldset>
                              </form>
                              
                            </div>
                        </div>


       </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>