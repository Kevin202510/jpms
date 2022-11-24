<?php include('applicantsviews/head.php'); ?>
    <!-- Preloader Start -->
    
    <!-- Preloader Start -->
    <?php include('applicantsviews/headerapplicant.php'); ?>
  <?php    
  include_once("admin panel/classes/CRUDAPI.php");
    $crudapi = new CRUDAPI(); ?>
    <main>
        <!-- Our Services Start -->
        <div class="our-services" style="margin-bottom:20px;">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        MY PROFILE
                    </div>
                    <div class="card-body">
                        <form>
                        <?php 
                                $query = "SELECT * FROM `users` LEFT JOIN roles ON roles.id = users.user_role_id LEFT JOIN applicant_additional_info on users.user_role_id where users.user_role_id = 4";
                                $result = $crudapi->getData($query);
                                foreach ($result as $key => $data) {
                            ?>
                        <div class="form-group">
                          
                              <img style="width:200px; " src="profiles/limboprofile.webp">
                            
                              </div>

                        </div>
                      

                            <div class="form-group">
                                <label for="exampleInputEmail1">Full Name</label>
                                <p><?php echo strtoupper($data["user_fname"]." ".$data["user_lname"]); ?></p>
                               
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Address</label>
                                <p><?php echo strtoupper($data["address"]) ?></p>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Contact</label>
                                <p><?php echo strtoupper($data["user_contact"]) ?></p>
                                
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Email</label>
                                <p><?php echo strtoupper($data["user_email"]) ?></p>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Expected Salary</label>
                                <p><?php echo strtoupper($data["aai_expected_salary"]) ?></p>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Prepered location</label>
                                <p><?php echo strtoupper($data["aai_location"]) ?></p>
                            </div>
                         
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>
<?php include('applicantsviews/footer.php'); ?>
<?php include('applicantsviews/script.php'); ?>