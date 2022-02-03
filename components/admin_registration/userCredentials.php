<div>
    <el-form status-icon :model="adminTask" :rules="rules" ref="ruleForm" label-position="top">
        <el-form-item label="Username" prop="username">
            <el-input type="text" clearable style="margin-bottom: 10px;" placeholder="Enter username" v-model="adminTask.username"></el-input>
        </el-form-item>
        <el-form-item label="Password" prop="password">
            <el-input type="text" clearable show-password style="margin-bottom: 10px;" placeholder="Enter password" v-model="adminTask.password"></el-input>
        </el-form-item>
        <el-form-item label="Confirm Password" prop="conpass">
            <el-input type="text" clearable show-password style="margin-bottom: 10px;" placeholder="Confirm your password" v-model="adminTask.conpass"></el-input>
        </el-form-item>
        <el-form-item label="Security Question" prop="sec_question">
            <el-select style="width: 100%;" v-model="adminTask.sec_question" filterable placeholder="Select security question">
                <el-option v-for="item in optionsQuestions" :key="item.question" :label="item.question" :value="item.question">
                </el-option>
            </el-select>
        </el-form-item>
        <el-form-item label="Security Answer" prop="sec_answer">
            <el-input type="text" clearable style="margin-bottom: 10px;" placeholder="Enter security answer" v-model="adminTask.sec_answer"></el-input>
        </el-form-item>
        <el-form-item style="float: right; margin-top: 10px; margin-bottom: 20px;">
            <div style="display: flex;">
                <el-button type="primary" plain size="medium" @click="onBack">Back</el-button>
                <el-button type="primary" plain size="medium" @click="onNextInfo('ruleForm')">Next</el-button>
            </div>
        </el-form-item>
    </el-form>
</div>