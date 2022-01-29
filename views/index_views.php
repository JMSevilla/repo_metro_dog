<body style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(66,53,53,1) 100%, rgba(0,212,255,1) 100%);">
  <div class="container" style="margin-top: 100px; width:100%;">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
              <img src="resources/metrodogs logo.jpg" class="rounded mx-auto d-block" style="width:30%; height:30%; margin-bottom:5%;">
              <h5 style="text-align:center;">LOGIN TO YOUR ACCOUNT</h5>
            <hr class="mb-4">
            <form>
            
            <!-- For Username -->
            <div class="input-group mb-3">
              <div class="form-floating flex-grow-1">
                <input type="text" class="form-control" id="username" placeholder="Username" required="">
                <label for="username">Username</label>
              </div>
            </div>
              
            <!-- For Password -->
            <div class="input-group mb-3">
              <div class="form-floating flex-grow-1">
                <input type="password" class="form-control" id="password" placeholder="Password" required="">
                <label for="password">Password</label>
              </div>
                <span class="input-group-text"><i class="fas fa-eye-slash" id="togglePassword"></i></span>
            </div>
              
              <!-- Login Submit -->
                <div class="d-grid">
                <button class="btn btn-primary btn-login btn-lg text-uppercase fw-bold" type="submit"> LOG
                  IN </button>
                </div>  

            </form>
          </div> 
        </div>
      </div>
    </div>   
  </div>

<footer class="page-footer font-small special-color-dark pt-4">
  <div class="footer-copyright text-center py-3" style="color:white; display:0p;">© 2022 Copyright:
  <a href=""> METRODOG</a>
  </div>
</footer>
  </body>


  <script>
const togglePassword = document.querySelector("#togglePassword");
const password = document.querySelector("#password");

togglePassword.addEventListener("click", function () {
   
// toggle the type attribute
const type = password.getAttribute("type") === "password" ? "text" : "password";
password.setAttribute("type", type);

// toggle the eye icon
this.classList.toggle('fa-eye');
  this.classList.toggle('fa-eye-slash');
});
</script>


