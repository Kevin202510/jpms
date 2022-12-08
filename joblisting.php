<?php include('applicantsviews/head.php'); ?>
    <!-- Preloader Start -->
    
    <!-- Preloader Start -->
    <?php include('applicantsviews/header.php'); ?>
    <main>
 <!-- Hero Area Start-->
 <div class="slider-area ">
            <div class="single-slider slider-height2 d-flex align-items-center" data-background="assets/img/hero/why.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Get your job</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End -->
        <!-- Job List Area Start -->
        <div class="job-listing-area pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <!-- Left content -->
                    
                    <!-- Right content -->
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <!-- Featured_job_start -->
                        <section class="featured-job-area">
                            <div class="container">
                                <!-- Count of Job list Start -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="count-job mb-35">
                                            <span>39, 782 Jobs found</span>
                                            <!-- Select job items start -->
                                            <div class="select-job-items">
                                                <span>Sort by</span>
                                                <select name="select">
                                                    <option value="">None</option>
                                                    <option value="">job list</option>
                                                    <option value="">job list</option>
                                                    <option value="">job list</option>
                                                </select>
                                            </div>
                                            <!--  Select job items End-->
                                        </div>
                                    </div>
                                </div>
                                <!-- Count of Job list End -->
                                <!-- single-job-content -->
                                <?php 
         
                                    include_once("classes/CRUDAPI.php");
                                    $crudapi = new CRUDAPI(); 
                                    if(isset($_POST['findjobs'])){
                                        $jn = "%".$_POST['job_name']."%";
                                        $ja = "%".$_POST['job_address']."%";
                                        $query = " SELECT * FROM `jobs` WHERE jobs_name LIKE '$jn' AND jobs_address LIKE '$ja' ";
                                        $result = $crudapi->getData($query);
                                        $number = 1;
                                        foreach ($result as $key => $data) { 
                                    
                                ?>
                                <div class="single-job-items mb-30">
                                    <div class="job-items">
                                        <div class="company-img">
                                            <a href="#"><img src="assets/img/icon/job-list1.png" alt=""></a>
                                        </div>
                                        <div class="job-tittle job-tittle2">
                                            <a href="#">
                                                <h4><?php echo strtoupper($data['job_company_name']); ?></h4>
                                            </a>
                                            <ul>
                                                <li><?php echo strtoupper($data['jobs_name']); ?></li>
                                                <li><i class="fas fa-map-marker-alt"></i><?php echo strtoupper($data['jobs_address']); ?></li>
                                                <li><?php echo strtoupper($data['job_expected_salary']); ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="items-link items-link2 f-right">
                                        <button style="border-radius:30px;" type="button"  class="btn head-btn21" id="logins">apply</button>
                                        <span>7 hours ago</span>
                                    </div>
                                </div>
                                <?php }}?>
                            </div>
                        </section>
                        <!-- Featured_job_end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Job List Area End -->
        <!--Pagination Start  -->
        <div class="pagination-area pb-115 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="single-wrap d-flex justify-content-center">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                    <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                    <li class="page-item"><a class="page-link" href="#">02</a></li>
                                    <li class="page-item"><a class="page-link" href="#">03</a></li>
                                <li class="page-item"><a class="page-link" href="#"><span class="ti-angle-right"></span></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Pagination End  -->
        
    </main>
<?php include('applicantsviews/footer.php'); ?>
<?php include('applicantsviews/script.php'); ?>



<script>
  $(document).ready(function(){
    $("#registers").click(function(){
        // $("#as_user_id").val($("user_id").val());
       
        $("#exampleModal").modal("show");
    });
    $("#logins").click(function(){
        //    alert("logins");
        // $("#as_user_id").val($("user_id").val());
       $("#exampleModal2").modal("show");
    });
    $("#subreg").prop("disabled",true);
    $("#conuser_passwords").change(function(){
        if ($("#user_passwords").val()==$("#conuser_passwords").val()){
            $("#subreg").prop("disabled",false);
        }else{
            alert("PASSWORD DIDN'T MATCH");
        }
    });
  })
  

 
</script>