<div id="v_usermanagement">
    <div class="container">
        <?php
        $title = "User Access Management";
        $description = "Here is where you can Search / Modify and  Add User Informations";
        include("components/admin_components/admin_title.php");
        ?>


    </div>
    <el-card shadow="always">
    <!-- Start of Modal -->
    <el-form status-icon :model="addUser" :rules="rules" ref="ruleForm">
    <el-button type="primary" style="float:right;" @click="dialogVisible = true">Add User</el-button>
   <el-dialog title="COMPLETE USER INFORMATION":visible.sync="dialogVisible" width="100px;" :modal-append-to-body="false" style="margin-left:10%; margin-top:-70px;" :before-close="handleClose">

   <h4 style="margin-top:-20px;"><i class="fas fa-user"></i>&nbspPrimary Information</h4>
    <hr>
    <div class="row" style="margin-top:10px;">


        <div class="col">
                 <el-form-item label="Firstname" prop="firstname">
                    <el-input type="text" clearable  placeholder="Enter firstname" v-model="addUser.firstname"></el-input>
                </el-form-item>
        </div>
        <div class="col">
                 <el-form-item label="Lastname" prop="lastname">
                    <el-input type="text" clearable  placeholder="Enter lastname" v-model="addUser.lastname"></el-input>
                </el-form-item>
        </div>
        <div class="col">
                 <el-form-item label="Contact Number" prop="contactNumber">
                    <el-input type="text" clearable placeholder="Enter contact number" v-model="addUser.contactNumber" maxlength="11" minlength="11">
                    </el-input>
                </el-form-item>
        </div>
    </div>

    <div class="row">
        <div class="col">
                 <el-form-item label="Primary Address" prop="primary_address">
                    <el-input type="textarea" :rows="2" placeholder="Enter primary address" v-model="addUser.primary_address">
                    </el-input>
                </el-form-item>
        </div>
        <div class="col">
                <el-form-item label="Secondary Address (Optional)" prop="secondary_address">
                    <el-input type="textarea" :rows="2" placeholder="Enter secondary address" v-model="addUser.secondary_address">
                    </el-input>
                </el-form-item>
        </div>
     </div>

     <div class="row">
             <div class="col">
                <el-form-item label="Metro Dog Branch" prop="mdbranch">
                <el-select style="width: 100%;" v-model="addUser.mdbranch" filterable placeholder="Select Branch">
                <el-option>
                </el-option>
                 </el-select>
                 </el-form-item>
             </div>
             <div class="col">
                    <el-form-item label="Email" prop="email">
                            <el-input type="text" placeholder="Enter email" v-model="addUser.email">
                            </el-input>
                        </el-form-item>
             </div>
    </div>

     <h4 style="margin-top:10px;"><i class="fas fa-user-shield"></i>&nbspUser Credentials and Password</h4>
    <hr>
    <div class="row" style="margin-top:10px;">

        <div class="col">
            <el-form-item label="Username" prop="username">
                <el-input type="text" clearable placeholder="Enter username" v-model="addUser.username"></el-input>
            </el-form-item>
        </div>
        <div class="col">
            <el-form-item label="Password" prop="password">
                <el-input type="text" clearable show-password placeholder="Enter password" v-model="addUser.password"></el-input>
            </el-form-item>
        </div>

        <div class="col">
            <el-form-item label="Confirm Password" prop="conpass">
                <el-input type="text" clearable show-password placeholder="Confirm your password" v-model="addUser.conpass"></el-input>
            </el-form-item>
        </div>
    </div>

    <div class="row" style="margin-top:10px;">

        <div class="col">
            <el-form-item label="User Type (Log in as)" prop="user_type">
            <el-select style="width: 100%;" v-model="addUser.user_type" filterable placeholder="Select User Type">
                    <el-option>
                    </el-option>
                </el-select>
            </el-form-item>
        </div>

        <div class="col">
            <el-form-item label="Security Question" prop="sec_question">
                <el-select style="width: 100%;" v-model="addUser.sec_question" filterable placeholder="Select security question">
                    <el-option>
                    </el-option>
                </el-select>
            </el-form-item>
        </div>

        <div class="col">
            <el-form-item label="Security Answer" prop="sec_answer">
                <el-input type="text" clearable  placeholder="Enter security answer" v-model="addUser.sec_answer"></el-input>
            </el-form-item>
        </div>

    </div>
    <span slot="footer" class="dialog-footer">
    <el-button  @click="dialogVisible = false">Cancel</el-button>
    <el-button type="success" @click="dialogVisible = false">Save Changes</el-button>
    </span>
    </el-dialog>
    </el-form>
    <!-- End of Modal -->


    <!-- Table --> 
    <el-table
    :data="tableData.filter(data => !search || data.name.toLowerCase().includes(search.toLowerCase()))"
    style="width: 100%;" >
    <el-table-column label="ID" prop="id">
    </el-table-column>
    <el-table-column label="Firstname" prop="name">
    </el-table-column>
    <el-table-column label="Lastname" prop="lname">
    </el-table-column>
    <el-table-column label="Email Address" prop="email">
    </el-table-column>
    <el-table-column label="Contact Number" prop="contact">
    </el-table-column>
    <el-table-column label="Address" prop="address">
    </el-table-column>
    <el-table-column label="User Status" prop="status">
    </el-table-column>


    <el-table-column align="left">
      <template slot="header" slot-scope="scope">
        <el-input v-model="search" size="large" placeholder="Type to search"/>
      </template>
      <template slot-scope="scope">
        <el-button size="mini">Edit</el-button>
        <el-button size="mini">Inactive</el-button>
      </template>
    </el-table-column>
  </el-table>

    <div class="block" style="margin-top:20px;">
    <el-pagination
        background
        layout="prev, pager, next"
        :total="50">
    </el-pagination>
    </div>

  </el-card>
</div>
   