<?php 
	include '../connect/headadmin.php';
	include 'list-group.php';
	
	$arr_building = array();
	$rows = mysqli_query($con,"SELECT * FROM manage_location  ");			
	$rec = mysqli_fetch_array($rows);
?>
<style type="text/css">
	
</style>
<div class="content-wrapper">
	<!-- Main content -->
    <section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box box-default color-palette-box">
						<div class="callout callout-success">
							<h4><i class="fa fa-fw fa-building-o"></i> ตำแหน่ง</h4>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<div class="col-md-4" style="text-align:right;">
										<label for="location_name">ชื่อห้องพัก</label>
									</div>
									<div class="col-md-6" style="text-align:left;">
										<input type="text" class="form-control" id="location_name" name="location_name" placeholder="ชื่อห้องพัก" value ="<?php echo $rec['location_name'];?>" onblur="localtion2(this.value);">
									</div>
								</div>
								</br>
								<div class="col-md-12">
									<br/>
									<div class="col-md-4" style="text-align:right;">
										<label for="lat">ที่อยู่</label>
									</div>
									<div class="col-md-6" style="text-align:left;">
										<textarea type="text" class="form-control" id="location" name="location"  rows="4" placeholder="ที่อยู่" ><?php echo $rec['location'];?></textarea>
									</div>
								</div>
								<div class="col-md-12">
									<br/>
									<div class="col-md-4" style="text-align:right;">
										<label for="lat">เบอร์โทร</label>
									</div>
									<div class="col-md-6" style="text-align:left;">
										<input type="text" class="form-control" id="location_tel" name="location_tel"  rows="4" value="<?php echo $rec['location_tel'];?>" placeholder="เบอร์โทร" >
									</div>
								</div>
								<div class="col-md-12" style="display:none;">
									<br/>
									<div class="col-md-4" style="text-align:right;">
										<label for="lat">ที่อยู่ตาม GOOGLE MAP</label>
									</div>
									<div class="col-md-6" style="text-align:left;">
										<input type="text" class="form-control" id="location_google" name="location_google"   placeholder="ที่อยู่" value="https://www.google.com/maps/search/?api=1&query=">
										<input type="text" class="form-control" id="location_google2" name="location_google2"  value="<?php echo $rec['location_name']?>" placeholder="ที่อยู่">
									</div>
								</div>
							</div>
							
							<div class="form-group" style="text-align:right;">
								<button id="btnsave" class="btn btn-success" type="button" onclick="save_localtion();">บันทึกตำแหน่ง</button>
							</div>								
						</div>
					</div>
				</div>
				
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>
	<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>	

<?php include '../connect/footer.php'?>
<script type="text/javascript" charset="utf-8">
	function localtion2(val){
		$('#location_google2').val(val);
	}
	
	function save_localtion(){
		var location_name        = $("#location_name").val();
		var location 		     = $("#location").val();
		var location_google      = $("#location_google").val()+$("#location_google2").val();
		var location_tel 		 = $("#location_tel").val();
		$.ajax({
			url: 'chk_data.php',
			type: 'POST',
			dataType: 'html',
			data: {chk_data:'save_localtion', location_name:location_name,location:location,location_google:location_google,location_tel,location_tel},
			success: function(data) {
				if(data.trim() ==1){
					alert("บันทึกตำแหน่งเรียบร้อยแล้ว");
					window.location.reload()();
				}
				
			}
		});
	}
	</script>																																																			