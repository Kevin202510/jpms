<?php 
  
    include_once("classes/CRUDAPI.php");
    $crudapi = new CRUDAPI();

  ?>

<?php include('layouts/head.php'); ?>
<?php include('layouts/header.php'); ?>
<?php include('layouts/sidebaremployeer.php'); ?>

<section class="section profile">
<div class="container-fluid">
  <div class="card">
    
    <div class="card-body">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Full NAme</th>
            <th scope="col">Address</th>
            <th scope="col">Salary</th>
            
          </tr>
        </thead>
        <tbody>
        <?php 
            $query = "SELECT * FROM `users` LEFT JOIN roles ON roles.id = users.user_role_id Left JOIN applicant_additional_info ON roles.id = users.user_role_id where users.user_role_id = 4";
            $result = $crudapi->getData($query);
            $number = 1;
            foreach ($result as $key => $data) {
        ?>
            <tr>
              <th scope="row"><?php echo $number; ?></th>
              
              <td><?php echo strtoupper($data["user_fname"]." ".$data["user_lname"]); ?></td>
              <td><?php echo strtoupper($data["address"]) ?></td>
              <td><?php echo strtoupper($data["aai_expected_salary"]) ?></td>
              
              <td>
                        <div class="items-link items-link2 f-right">
                          <a href="viewapplicant.php"><i style="font-size:30px;" class="bi bi-eye-fill"></i></a>
                       </div>
              </td>
            </tr>
          <?php $number++; } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</section>

<?php include('layouts/footer.php'); ?>