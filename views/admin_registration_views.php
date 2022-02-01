<div id="v_adminreg">
    <div style="margin-top: 100px;" class="container">
        <el-card shadow="always" style="margin-bottom: 50px;">
            <div class="container" style="padding: 15px;">
                <h3>Administrator Account Registration</h3>
                <el-steps :active="active">
                    <el-step title="User Information" description="Here you can provide user information"></el-step>
                    <el-step title="User Credentials Safety Check" description="Fill up the security questions and answers"></el-step>
                    <el-step title="Data Preview" description="Here you can preview the informations you provide"></el-step>
                </el-steps>
                <div v-if="active == 1">
                    <h4 style="margin-top: 50px;">Primary Information</h4>
                    <hr>
                    <?php include("components/admin_registration/userInfo.php"); ?>
                </div>
                <div v-else-if="active == 2">
                    <h4 style="margin-top: 50px;">User Credentials & Security Questions and Answers</h4>
                    <hr>
                    <?php include("components/admin_registration/userCredentials.php"); ?>
                </div>
                <div v-else-if="active == 3">
                    <h4 style="margin-top: 50px;">Data Preview</h4>
                    <hr>
                    <?php include("components/admin_registration/dataPreview.php"); ?>
                </div>
            </div>
        </el-card>
    </div>
</div>