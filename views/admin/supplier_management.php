<div id="v_suppliermanage">

    <div class="container">
        <?php
        $title = "Supplier Management";
        $description = "Here is where you can Modify/Add Suppliers";
        include("components/admin_components/admin_title.php");
        ?>
    </div>
    

    <el-card shadow=always>
        <el-input type="text"  style="width:20%;" clearable placeholder="Search"></el-input>
        <el-button type="success" style="float:right;" @click="table = true">Add New Supplier</el-button>
        <br><br>    
    <table class="table table-hover table-bordered table-outline" style="text-align:center;">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Supplier Name</th>
                    <th scope="col">List of Items</th>
                    <th scope="col">Full Address</th>
                    <th scope="col">Branch</th>
                    <th scope="col">Contact Address</th>
                    <th scope="col">Supplier Representative</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody> 
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Otto</td>
                    <td>Active</td>
                    <td><el-button
                    size="mini"
                    type="info">Edit</el-button>
                    <el-button
                    size="mini"
                    type="danger">Delete</el-button></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Otto</td>
                    <td>Active</td>
                    <td><el-button
                    size="mini"
                    type="info">Edit</el-button>
                    <el-button
                    size="mini"
                    type="danger">Delete</el-button></td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry the Bird</td>
                    <td>@twitter</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>Active</td>
                    <td><el-button
                    size="mini"
                    type="info">Edit</el-button>
                    <el-button
                    size="mini"
                    type="danger">Delete</el-button></td>
                </tr>

            </tbody>
        </table>
        <div class="block" style="margin-top:20px;">
            <el-pagination background layout="prev, pager, next" :total="50">
            </el-pagination>
        </div>
     </el-card>
  
    
<el-drawer :visible.sync="table" direction="rtl" size="40%" :modal-append-to-body="false">
   <div class="container">
       <div class="row">
           <div class="col">
               <h4 style="text-align: center;">New Supplier</h2>
               <label>Supplier Name:</label>
               <el-input type="text" clearable placeholder="Enter Supplier Name"></el-input>
               <label> Supplier Address </label>
               <el-input type="textarea" row="5" clearable placeholder="Enter Supplier Address"></el-input>
               <label>Contact Number:</label>
               <el-input type="text" clearable placeholder="Enter Contact Number"></el-input>
               <label>Branch:</label>
               <el-input type="text" clearable placeholder="Enter Branch"></el-input>
               <label>Supplier Representative:</label>
               <el-input type="text" clearable placeholder="Supplier Representative"></el-input>
               <label>Terms:</label>
               <el-select style="width: 100%;" filterable placeholder="Select Terms">
                            <el-option>
                            </el-option>
                        </el-select>
               <label>List of Items:</label>
               <div class="row">
                   <div class="col-4">
               <el-select style="width: 100%;" filterable placeholder="Select Category">
                            <el-option>
                            </el-option>
                        </el-select>
                    </div>

                    <div class="col-3">
                        <el-input clearable placeholder="Brand Name">
                            
                        </el-input>
                    </div>

                    <div class="col-3">
                        <el-input clearable placeholder="Brand Name">
                            
                        </el-input>
                    </div>
                    <div class="col-1">
                        <el-button type="info" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">+</el-button>
                    </div>
                </div>
           </div>
       </div>
       <div class="demo-drawer__footer" style="margin-top: 10px;">
        <div class="row"> 
                <div class="col">
                <el-button style="width:100%;" @click="table = false">Cancel</el-button>
                </div>
                <div class="col">   
                <el-button style="width:100%;" type="primary":loading="false" @click ="addSupplier()">Add Supplier</el-button>
                </div>
            </div>
        </div>
 </div>
</el-drawer>



</div>