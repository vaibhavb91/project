<?php include('db_connect.php') ?>
<?php
$twhere ="";
if($_SESSION['login_type'] != 1)
  $twhere = "  ";
?>
<!-- Info boxes -->
 <div class="col-12">
          <div class="card">
            <div class="card-body">
              Welcome <?php echo $_SESSION['login_name'] ?>!
            </div>
          </div>
  </div>
  <hr>
  <?php 

    $where = "";
    if($_SESSION['login_type'] == 2){
      $where = " where manager_id = '{$_SESSION['login_id']}' ";
    }elseif($_SESSION['login_type'] == 3){
      $where = " where concat('[',REPLACE(user_ids,',','],['),']') LIKE '%[{$_SESSION['login_id']}]%' ";
    }
     $where2 = "";
    if($_SESSION['login_type'] == 2){
      $where2 = " where p.manager_id = '{$_SESSION['login_id']}' ";
    }elseif($_SESSION['login_type'] == 3){
      $where2 = " where concat('[',REPLACE(p.user_ids,',','],['),']') LIKE '%[{$_SESSION['login_id']}]%' ";
    }
    ?>
        
        <div class="container">
  <div class="row">
    <!-- First Box -->
    <div class="col-md-3 col-sm-6">
      <div class="small-box bg-light shadow-sm border">
        <div class="inner">
          <h3><?php echo $conn->query("SELECT * FROM project_list $where")->num_rows; ?></h3>
          <p>Total Projects</p>
        </div>
        <div class="icon">
          <i class="fa fa-layer-group"></i>
        </div>
      </div>
    </div>

    <!-- Second Box -->
    <div class="col-md-3 col-sm-6">
      <div class="small-box bg-light shadow-sm border">
        <div class="inner">
          <h3><?php echo $conn->query("SELECT * FROM project_list $where")->num_rows; ?></h3>
          <p>Total Projects</p>
        </div>
        <div class="icon">
          <i class="fa fa-layer-group"></i>
        </div>
      </div>
    </div>

    <!-- Third Box -->
    <div class="col-md-3 col-sm-6">
      <div class="small-box bg-light shadow-sm border">
        <div class="inner">
          <h3><?php echo $conn->query("SELECT * FROM project_list $where")->num_rows; ?></h3>
          <p>Total Projects</p>
        </div>
        <div class="icon">
          <i class="fa fa-layer-group"></i>
        </div>
      </div>
    </div>

    <!-- Fourth Box -->
    <div class="col-md-3 col-sm-6">
      <div class="small-box bg-light shadow-sm border">
        <div class="inner">
          <h3><?php echo $conn->query("SELECT * FROM project_list $where")->num_rows; ?></h3>
          <p>Total Projects</p>
        </div>
        <div class="icon">
          <i class="fa fa-layer-group"></i>
        </div>
      </div>
    </div>
  </div>
</div>

