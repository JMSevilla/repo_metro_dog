<div>
    <el-form status-icon :model="adminTask" :rules="rules" ref="ruleForm" label-position="top">
        <div class="row">
            <div class="col-sm">
                <el-form-item label="Firstname" prop="firstname">
                    <el-input type="text" clearable style="margin-bottom: 10px;" placeholder="Enter firstname" v-model="adminTask.firstname"></el-input>
                </el-form-item>
            </div>
            <div class="col-sm">
                <el-form-item label="Lastname" prop="lastname">
                    <el-input type="text" clearable style="margin-bottom: 10px;" placeholder="Enter lastname" v-model="adminTask.lastname"></el-input>
                </el-form-item>
            </div>
        </div>
        <div class="row" style="margin-top: 20px;">
            <div class="col-sm">
                <el-form-item label="Primary Address" prop="primary_address">
                    <el-input type="textarea" :rows="2" placeholder="Enter primary address" v-model="adminTask.primary_address" style="width: 100%; margin-bottom: 10px;">
                    </el-input>
                </el-form-item>
            </div>
            <div class="col-sm">
                <el-form-item label="Secondary Address (Optional)" prop="secondary_address">
                    <el-input type="textarea" :rows="2" placeholder="Enter secondary address" v-model="adminTask.secondary_address" style="width: 100%; margin-bottom: 10px;">
                    </el-input>
                </el-form-item>
            </div>
        </div>
        <div class="row" style="margin-top: 20px;">
            <div class="col-sm">
                <el-form-item label="Metro Dog Branch" prop="mdbranch">
                <el-select style="width: 100%;" v-model="adminTask.mdbranch" filterable placeholder="Select Branch">
                <el-option v-for="item in optionsBranch" :key="item.branch" :label="item.branch" :value="item.branch">
                </el-option>
                 </el-select>
                 </el-form-item>
            </div>
            <div class="col-sm">
                <el-form-item label="Contact Number" prop="contactNumber">
                    <el-input type="text" clearable placeholder="Enter contact number" v-model="adminTask.contactNumber" maxlength="11" minlength="11"
                     style="width: 100%; margin-bottom: 10px;">
                    </el-input>
                </el-form-item>
            </div>
            <div class="col-sm">
                <el-form-item label="Email" prop="email">
                    <el-input type="text" placeholder="Enter email" v-model="adminTask.email" style="width: 100%; margin-bottom: 10px;">
                    </el-input>
                </el-form-item>
            </div>
        </div>
        <el-form-item style="float: right; margin-top: 10px; margin-bottom: 20px;">
            <div style="display: flex;">
                <el-button type="primary" plain size="medium" @click="onNextInfo('ruleForm')">Next</el-button>
            </div>
        </el-form-item>
    </el-form>
</div>
