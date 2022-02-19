<div id="v_profilemanage">

    <div class="container">
        <?php
        $title = "My Profile";
        $description = "Here is where you can Edit your personal informations";
        include("components/admin_components/admin_title.php");
        ?>
    
    <div class="row">
        <div class="col-4">
            <el-card shadow="always">
                 <center>
                
                        <div class="pic-holder">
                            <!-- uploaded pic shown here -->
                            <img id="profilePic" class="pic" src="https://source.unsplash.com/random/150x150" alt="Profile Picture">

                            <label for="newProfilePhoto" class="upload-file-block">
                            <div class="text-center">
                                <div class="mb-2">
                                <i class="fa fa-camera fa-2x"></i>
                                </div>
                                <div class="text-uppercase">
                                Update <br /> Profile Photo
                                </div>
                            </div>
                            </label>
                            <Input class="uploadProfileInput" type="file" name="profile_pic" id="newProfilePhoto" accept="image/*" style="display: none;" />
                        </div>

                        </hr>
                        <p class="text-info text-center small">Note: Selected image will not be uploaded anywhere. </br> It's just for demonstration purposes.</p>
              
                    <hr>
                </center>
                    
                    <label>First Name:</label><br>
                    <label>Last Name:</label><br>
                    <label>Primary Address:</label><br>
                    <label>Branch:</label><br>
                    <label>Email:</label>

            </el-card>
            </div>
            <div class="col-8">
           <el-card shadow="always">
            <el-tabs v-model="activeName" @tab-click="handleClick">

                <el-tab-pane label="PRIMARY INFORMATION" name="first">
                <div class="row" style="margin-top: 10px;">
                    <div class="col">
                    <label>First Name:</label>
                            <el-input type="text" disabled="true"></el-input>
                    </div>
                    <div class="col">
                    <label>Last Name:</label>
                            <el-input type="text" disabled="true"></el-input>
                    </div> 
                </div>
                
                <div class="row" style="margin-top: 10px;">
                    <div class="col">
                    <label>Contact Number:</label>
                            <el-input type="text" disabled="true"></el-input>
                    </div>
            
                    <div class="col">
                        <label>Email Address</label>
                    <el-input type="text" disabled="true">
                        </el-input>
                    </div>
                </div>

                <div class="row" style="margin-top: 10px;">
                    <div class="col">
                        <label>Branch</label>
                    <el-select style="width: 100%;" filterable placeholder="Select Branch" disabled="true">
                            <el-option>
                            </el-option>
                        </el-select>
                    </div>
                    <div class="col">
                    <label>Primary Address:
                            <el-input type="textarea" :rows="2" style="width: 100%;" disabled="true"></el-input>
                    </label>
                    </div>
                    <div class="col">
                    <label>Secondary Address:
                            <el-input type="textarea" :rows="2" style="width: 100%;" disabled="true"></el-input>
                    </label>
                    </div>
                </div>

                <div style="margin-top:40px; text-align:right">
                <el-button type="info">Edit</el-button> 
                <el-button type="success" @click="updateProfile()">Save Changes</el-button>    
                </div> 
                </el-tab-pane>

                <el-tab-pane label="USER CREDENTIALS" name="second">
                
                <div class="row" style="margin-top:10px;">
                <div class="col">
                  <label>Username:</label>
                        <el-input type="text" disabled="true"></el-input>
                </div>
                <div class="col">
                <label>Password:</label> 
                        <el-input type="password" show-password disabled="true"></el-input>
                        <div class="accordion" id="accordionExample">
                            <button class="btn btn-link collapsed" style="float:right;" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                              Change Password
                          </button>
                        </div>
                 </div>
                </div>
                <div class="row" style="margin-top:10px;">

                <div class="col">
                <label>User Type:</label>
                        <el-select style="width: 100%;" filterable placeholder="Select User Type" disabled="true">
                            <el-option value="1" label="Administrator">
                            </el-option>
                            <el-option value="2" label="Cashier">
                            </el-option>
                        </el-select>
                </div>

                <div class="col">
                <label>Security Question:</label>
                        <el-select style="width: 100%;" filterable placeholder="Select security question" disabled="true">
                            <el-option>
                            </el-option>
                        </el-select>
                </div>

                <div class="col">
                <label>Security Answer:</label>
                        <el-input type="text" placeholder="Enter security answer" disabled="true"></el-input>
                    </el-form-item>
                </div>

                     
                </div>
                <hr>
                     <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                         
                        <div class="row">
                          <div class="col">
                          <el-input type="password" show-password clearable placeholder="Enter New Password"></el-input>
                          </div>

                          <div class="col">
                          <el-input type="password" show-password clearable placeholder="Confirm Password"></el-input>
                          </div>
                        </div>
                     </div>
           
                <div style="margin-top:40px; text-align:right">
                <el-button type="success" @click="updateProfile()">Save Changes</el-button>    
                </div> 
                </el-tab-pane>

            </el-tabs>
              
        </el-card>
        </div>
    </div>
    </div>
</div>
                             