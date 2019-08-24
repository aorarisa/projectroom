<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- Select2 -->
<script src="../../bower_components/bootstrap-select/js/bootstrap-select.js"></script> 
<!-- DataTables --> 
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- bootstrap datetimepicker -->
<script src="../../bower_components/bootstrap-datetimepicker/js/jquery.datetimepicker.full.js"></script>
<script src="../../bower_components/jquery-ui/ui/datepicker.js"></script> 

<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
	
		$('.selectpicker').selectpicker();
		
		$('.i-number1').blur(function(){
			format_number(this.id, '1', '0');
		});
		$('.i-number2').blur(function(){
			format_number(this.id, '2', '0');
		});
		$('.i-number3').blur(function(){
			format_number(this.id, '3', '0');
		});
		$('.i-digits').blur(function(){
			format_number(this.id, '0', '0');
		});
		$('input[type=text]').click(function(){
			var number = parseFloat($(this).val());
			if(number == 0){
				$(this).val('');
			}
		});
		<?php if(count($_SESSION) == 0){?> 
		chk_logout().trigger('change');
		<?php }?>
	});
	function format_number(id,digit,before)
	{
		before = typeof before !== 'undefined' ? before : '0';
		var num = $('#'+id).val();
		var num0 = num.split(',').join('');
		var num1 = parseFloat(num0);
		if($.isNumeric(num1))
		{
			var p = num1.toFixed(digit).split(".");
			if(before == "" || before == "0"){
				var x= p[0].split("").reverse().reduce(function(acc, num, i, orig) {
					return  num + (i && !(i % 3) ? "," : "") + acc;
				}, "");
				}else{
				var x = pad (p[0], before);
			}
			if(digit > 0){
				var y = x + "." + p[1];
				}else{
				var y = x;
			}
			$('#'+id).val(y);
		}
		else
		{
			$('#'+id).val('0');
		}
	}
	
  	function addCommas(nStr)
	{
		nStr += '';
		x = nStr.split('.');
		x1 = x[0];
		x2 = x.length > 1 ? '.' + x[1] : '';
		var rgx = /(\d+)(\d{3})/;
		while (rgx.test(x1)) {
			x1 = x1.replace(rgx, '$1' + ',' + '$2');
		}
		return x1 + x2;
	}
	$('#example').DataTable({
		"oLanguage": {
			"sEmptyTable":     "ไม่มีข้อมูลในตาราง",
			"sInfo":           "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
			"sInfoEmpty":      "แสดง 0 ถึง 0 จาก 0 แถว",
			"sInfoFiltered":   "(กรองข้อมูล _MAX_ ทุกแถว)",
			"sInfoPostFix":    "",
			"sInfoThousands":  ",",
			"sLengthMenu":     "แสดง _MENU_ แถว",
			"sLoadingRecords": "กำลังโหลดข้อมูล...",
			"sProcessing":     "กำลังดำเนินการ...",
			"sSearch":         "ค้นหา: ",
			"sZeroRecords":    "ไม่พบข้อมูล",
			"oPaginate": {
				"sFirst":    "หน้าแรก",
				"sPrevious": "ก่อนหน้า",
				"sNext":     "ถัดไป",
				"sLast":     "หน้าสุดท้าย"
			},
			"oAria": {
				"sSortAscending":  ": เปิดใช้งานการเรียงข้อมูลจากน้อยไปมาก",
				"sSortDescending": ": เปิดใช้งานการเรียงข้อมูลจากมากไปน้อย"
			}
		}
	});
	
	var loc = window.location.href; // returns the full URL
	
	if (/manage_buidling.php/.test(loc)) {
		$('#manage_buidling').addClass('active'); 
		$('#room').addClass('active');
		
	}
	if (/index.php/.test(loc)) {
		$('#index.php').addClass('active'); 
		$('#index').addClass('active');
		
	} 
	if (/manage_class.php/.test(loc)) {
		$('#manage_class').addClass('active'); 
		$('#room').addClass('active');
		
	} 
	if (/manage_room.php/.test(loc)) {
		$('#manage_room').addClass('active'); 
		$('#room').addClass('active');
		
	}
	if (/manage_typeroom.php/.test(loc)) {
		$('#manage_typeroom').addClass('active'); 
		$('#room').addClass('active');
		
	} 
	if (/manage_news.php/.test(loc)) {
		$('#manage_news').addClass('active'); 
		$('#news').addClass('active');
		
	}
	if (/manage_member.php/.test(loc)) {
		$('#manage_member').addClass('active'); 
		$('#member').addClass('active ');
	}
	if (/manage_booking.php/.test(loc)) {
		$('#manage_booking').addClass('active'); 
		$('#booking').addClass('active ');
		
		}	if (/manage_satisfaction.php/.test(loc)) {
		$('#manage_satisfaction').addClass('active'); 
		$('#satisfaction').addClass('active ');
		
		}	if (/manage_location.php/.test(loc)) {
		$('#manage_location').addClass('active'); 
		$('#location').addClass('active');
		
	}
	function chk_logout(){
		$.ajax({
			url: '../form/chk_data.php',
			type: 'POST',
			dataType: 'html',
			data: {chk_data:'chk_logout'},
			success: function(data) {
				if(data.trim() == '1'){
					window.location.href = '../index.php';
				}	
			}
		});
	} 
</script>