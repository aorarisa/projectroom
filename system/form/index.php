<?php 
	include '../connect/headadmin.php';
	include 'list-group.php';
	?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple-active color-palette">
            <div class="inner">
              <h3><?php echo $rec_countbooking;?></h3>

              <p>การจอง</p>
            </div>
            <div class="icon">
              <i class=" fa fa-fw fa-shopping-cart"></i>
            </div>
            <a href="manage_booking.php" class="small-box-footer">ข้อมูลเพิ่มเติม <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $rec_countroom;?></h3>

              <p>ห้องว่าง</p>
            </div>
            <div class="icon">
              <i class="fa fa-fw fa-university"></i>
            </div>
            <a href="manage_room.php" class="small-box-footer">ข้อมูลเพิ่มเติม <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
             <h3><?php echo $rec_countmember;?></h3>

              <p>สมาชิก</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="manage_member.php" class="small-box-footer">ข้อมูลเพิ่มเติม <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $percen;?><sup style="font-size: 20px">%</sup></h3>

              <p>ความพึ่งพอใจ</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="manage_satisfaction.php" class="small-box-footer">ข้อมูลเพิ่มเติม<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
     
<?php include '../connect/footer.php'?>
