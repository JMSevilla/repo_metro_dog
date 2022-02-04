<div>
    <label>Username</label>
    <el-input type="text" placeholder="Enter username" @keyup.enter.native="checkEnter" v-model="taskObject.username" clearable style="margin-top: 10px; margin-bottom: 10px;"></el-input>
    <label>Password</label>
    <el-input type="password" @keyup.enter.native="checkEnter"  placeholder="Enter password" v-model="taskObject.password" clearable show-password style="margin-top: 10px; margin-bottom: 10px;"></el-input>
    <el-button type="primary"  style="margin-top: 10px; margin-bottom: 20px; width: 100%;" v-on:click="onLogin()" v-loading.fullscreen.lock="fullscreenLoading">Login</el-button>
</div>

