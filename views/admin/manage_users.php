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

        <el-button type="primary" style="float:right; margin-top: 10px; margin-bottom: 20px;" @click="dialog = true">Add User</el-button>

        <table class="table table-hover table-bordered table-outline">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody> 
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>

        <div class="block" style="margin-top:20px;">
            <el-pagination background layout="prev, pager, next" :total="50">
            </el-pagination>
        </div>

    </el-card>
    <!-- <el-dialog title="COMPLETE USER INFORMATION" :visible.sync="dialogVisible" width="100px;" style="margin-left:10%; margin-top:-70px;" :before-close="handleClose">

    </el-dialog> -->

    <!-- Start of Modal -->
    <el-dialog :modal-append-to-body="false" title="Tips" :visible.sync="dialog" width="50%" style="margin-top:-70px;" :before-close="handleClose">
        <el-form status-icon :model="addUser" :rules="rules" ref="ruleForm">
            <h4 style="margin-top:-20px;"><i class="fas fa-user"></i>&nbspPrimary Information</h4>
            <hr>
            


            <div class="row" style="margin-top:10px;">
                <div class="col">
                    <el-form-item label="Firstname" prop="firstname">
                        <el-input type="text" clearable placeholder="Enter firstname" v-model="addUser.firstname"></el-input>
                    </el-form-item>
                </div>
                <div class="col">
                    <el-form-item label="Lastname" prop="lastname">
                        <el-input type="text" clearable placeholder="Enter lastname" v-model="addUser.lastname"></el-input>
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
                            <el-option v-for="item in optionsBranch" :key="item.branchName" :label="item.branchName" :value="item.branchName">
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
                            <el-option value="1" label="Administrator">
                            </el-option>
                            <el-option value="2" label="Cashier">
                            </el-option>
                        </el-select>
                    </el-form-item>
                </div>

                <div class="col">
                    <el-form-item label="Security Question" prop="sec_question">
                        <el-select style="width: 100%;" v-model="addUser.sec_question" filterable placeholder="Select security question">
                            <el-option v-for="item in optionsQuestions" :key="item.question" :label="item.question" :value="item.question">
                            </el-option>
                        </el-select>
                    </el-form-item>
                </div>

                <div class="col">
                    <el-form-item label="Security Answer" prop="sec_answer">
                        <el-input type="text" clearable placeholder="Enter security answer" v-model="addUser.sec_answer"></el-input>
                    </el-form-item>
                </div>

            </div>

        </el-form>
        <span slot="footer" class="dialog-footer">
            <el-button @click="dialog = false">Cancel</el-button>
            <el-button type="primary" @click="onFinish('ruleForm')">Save Changes</el-button>
        </span>
    </el-dialog>
    <!-- End of Modal -->
</div>
