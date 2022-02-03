<div class="container">
    <div class="row">
        <div class="col-sm">
            <el-card shadow="always">
                <h5>Primary Information</h5>
                <hr>
                <el-input type="text" clearable style="margin-bottom: 10px;" v-model="adminTask.firstname" placeholder="First Name" disabled="true"></el-input>
                <el-input type="text" clearable style="margin-bottom: 10px;" placeholder="Last Name" v-model="adminTask.lastname" disabled="true"></el-input>
                <el-input type="textarea" :rows="2" placeholder="Primary address" style="width: 100%; margin-bottom: 10px;" v-model="adminTask.primary_address" disabled="true"></el-input>
                <el-input type="textarea" :rows="2" placeholder="Secondary address" style="width: 100%; margin-bottom: 10px;" v-model="adminTask.secondary_address"disabled="true"></el-input>
                <el-input type="text" clearable placeholder="Contact number" maxlength="11" minlength="11" v-model="adminTask.contactNumber" disabled="true"style="width: 100%; margin-bottom: 10px;">
                </el-input>
                <el-input type="text" placeholder="Email Address" style="width: 100%; margin-bottom: 10px;" v-model="adminTask.email" disabled="true"></el-input>
            </el-card>  
        </div>

        <div class="col-sm">
            <el-card shadow="always">
                <h5>User Credentials Information</h5>
                <hr>
                <el-input type="text" clearable style="margin-bottom: 10px;" placeholder="Username" v-model="adminTask.username" disabled="true"></el-input>
                <el-input type="text" clearable show-password style="margin-bottom: 10px;" placeholder="Password" v-model="adminTask.password" disabled="true"></el-input>
                <el-select style="width: 100%;" filterable placeholder="Security question" v-model="adminTask.sec_question" disabled="true">
                <el-option v-for="item in options" :key="item.value" :label="item.label" :value="item.value">
                </el-option>
                </el-select>
                <el-input type="text" clearable style="margin-bottom: 10px; margin-top:10px;" placeholder="Security answer" v-model="adminTask.sec_answer" disabled="true"></el-input>

            </el-card>
            
        </div>
    </div>
                <div style="display: flex; float:right; margin-bottom: 20px;">
                <el-button type="primary" plain size="medium" @click="onBack">Back</el-button>
                <el-button type="primary" plain size="medium" @click="onNextInfo('ruleForm')">Sign Up</el-button>
                 </div>
</div>