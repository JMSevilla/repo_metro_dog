<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        </div>
                            <div class="modal-body">

                                  <div class="text-center">
                                      <h3><i class="fa fa-lock fa-2x"></i></h3>
                                      <h2 class="text-center">Forgot Password?</h2>
                                      <p>You can reset your password here.</p>
                                        <div class="panel-body" style="text-align: left;">
                                          <i class="fas fa-user"></i><label for="username">&nbspUsername</label>
                                            <el-input type="text" v-model="taskObject.username" style="margin-top: 10px; margin-bottom: 10px;" disabled=true;></el-input>

                                            <i class="fas fa-question"></i><label for="username">&nbspSecurity Question</label>
                                            <el-input type="text" v-model="taskObject.sec_question" style="margin-top: 10px; margin-bottom: 10px;" disabled=true;></el-input>

                                            <i class="fas fa-poll-h"></i><label for="username">&nbspAnswer</label>
                                            <el-input type="text" placeholder="Enter Security Answer" v-model="taskObject.sec_answer" style="margin-top: 10px; margin-bottom: 10px;"></el-input>

                                          <div class="row">
                                          <div class="col">
                                          <i class="fas fa-key"></i><label for="username">&nbspNew Password</label>
                                          <el-input type="text" placeholder="Enter New Password" clearable show-password v-model="taskObject.newPass" style="margin-top: 10px; margin-bottom: 10px;" required=true;></el-input>
                                          </div>
                                          <div class="col">
                                          <i class="fas fa-check-double"></i><label for="username">&nbspConfirm Password</label>
                                          <el-input type="text" placeholder="Confirm Password" clearable show-password v-model="taskObject.conPass" style="margin-top: 10px; margin-bottom: 10px;" required=true;></el-input>
                                          </div>
                                            </div>
                                      </div>

                                    </div>
                        </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success">Save Changes</button>
      </div>
    </div>
  </div>
</div>