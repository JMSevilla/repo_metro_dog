<div id="v_adminSelection">
    <div style="margin-top: 20px; " class="container">
        <el-card shadow="always" style="padding: 50px;">
            <center>
                <img src="assets/metrodogs logo.jpg" alt="metrodogs logo" style="width:20%; height: 20%;">
            </center>
            <h2 style="text-align:center; text-transform: uppercase;">~ welcome {{platformObject.fname}} , please select system ~</h2>
            <hr style="margin-bottom:50px;">

            <div class="row">
                <div class="col-6">
                    <a href="#" class="btn btn-fix">
                        <img class="card-img-top" style="width:78%;" src="assets/adminselect.webp" alt="Administrator Image">
                        <div class="card-block ">
                            <p class="card-text "><small class="text-muted">click to proceed to admin dashboard</small></p>
                        </div>
                    </a>
                </div>

                <div class="col-6">
                    <a href="#" class="btn btn-fix">
                        <img class="card-img-top" style="width:100%;" src="assets/payrollselect.jpg" alt="Payroll System Image">
                        <div class="card-block ">
                            <p class="card-text "><small class="text-muted">click to proceed to payroll system</small></p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-4">

                </div>

                <div class="col-4">
                    <el-card style="margin-top:20px;margin-bottom: 20px;" shadow="always">
                    <center>
                        <h5>Logged in as : {{platformObject.role}}</h5>
                        <span>User: {{platformObject.fname + " " + platformObject.lname}}</span>
                    </center>
                    </el-card>
                    <button class="btn btn-block btn-danger" @click="onLogout"> Logout</button>
                </div>

                <div class="col-4">

                </div>

            </div>
        </el-card>
    </div>
</div>