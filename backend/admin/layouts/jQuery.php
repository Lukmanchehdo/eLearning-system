<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../plugins/select2/js/select2.full.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparklines/sparkline.js"></script>
<!-- Morris.js charts -->
<script src="../plugins/raphael/raphael.min.js"></script>
<script src="../plugins/morris.js/morris.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- include summernote-th-TH -->
<script src="../plugins/summernote/lang/summernote-th-TH.js"></script>
<!-- Ekko Lightbox -->
<script src="../plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="../dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>

<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
	window.setTimeout(function () {
		$(".alert").fadeTo(500, 0).slideUp(500, function () {
			$(this).remove();
		});
	}, 2000);

</script>

<script type="text/javascript" src="dist/js/AutoProvince.js"></script>
<script>
	$('body').AutoProvince({
    PROVINCE:   '#province', // select div สำหรับรายชื่อจังหวัด
    AMPHUR:     '#amphur', // select div สำหรับรายชื่ออำเภอ
    DISTRICT:   '#district', // select div สำหรับรายชื่อตำบล
    POSTCODE:   '#postcode', // input field สำหรับรายชื่อรหัสไปรษณีย์
    arrangeByName:    false // กำหนดให้เรียงตามตัวอักษร
});
</script>
<script  type="text/javascript">
  //Initialize Select2 Elements
  $('.select2bs4').select2({
  	theme: 'bootstrap4'
  })
</script>
<script>
	$('#learning_point').summernote({
    lang: 'th-TH', // default: 'en-US'
    placeholder: 'จุดเด่นของภูมิปัญญา',
    tabsize: 2,
    height: 120,
    toolbar: [
    ['style', ['style']],
    ['font', ['bold', 'underline', 'clear']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['table', ['table']],
    ['insert', ['link']],
    ['view', ['fullscreen', 'codeview', 'help']]
    ]
});
	$('#learning_description').summernote({
    lang: 'th-TH', // default: 'en-US'
    placeholder: 'ข้อมูลภูมิปัญญาท้องถิ่น',
    tabsize: 2,
    height: 120,
    toolbar: [
    ['style', ['style']],
    ['font', ['bold', 'underline', 'clear']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['table', ['table']],
    ['insert', ['link']],
    ['view', ['fullscreen', 'codeview', 'help']]
    ]
});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		if (window.File && window.FileList && window.FileReader) {
			$("#img_learning_name").on("change", function(e) {
				var files = e.target.files,
				filesLength = files.length;
				for (var i = 0; i < filesLength; i++) {
					var f = files[i]
					var fileReader = new FileReader();
					fileReader.onload = (function(e) {
						var file = e.target;
						$("<span class=\"pip\">" +
							"<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
							"<br/><span class=\"remove btn btn-block btn-danger btn-flat btn-xs\" title=\"ลบภาพ\"><i class=\"fas fa-times-circle\"></i></span>" +
							"</span>").insertAfter("#img_learning_name");
						$(".remove").click(function(){
							$(this).parent(".pip").remove();
						});
					});
					fileReader.readAsDataURL(f);
				}
			});
		} else {
			alert("Your browser doesn't support to File API")
		}
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {  
		$("#add").on("click", function() {  
			$("#more-youtube_link").append("<div class='form-group'<label for='youtube_link'>ลิงค์เชื่อมโยงวีดีโอ</label><input type='text' class='form-control' id='youtube_link' name='youtube_link[]' placeholder='ลิงค์เชื่อมโยงวีดีโอ'></div>");  
		});  
		$("#remove").on("click", function() {  
			$("#more-youtube_link").children().last().remove();  
		});  
	});  
</script>
<script>
	$(function () {
		$(document).on('click', '[data-toggle="lightbox"]', function(event) {
			event.preventDefault();
			$(this).ekkoLightbox({
				alwaysShowClose: true
			});
		});

		$('.filter-container').filterizr({gutterPixels: 3});
		$('.btn[data-filter]').on('click', function() {
			$('.btn[data-filter]').removeClass('active');
			$(this).addClass('active');
		});
	})
</script>
<script>
	$(function () {
		"use strict";

    //DONUT CHART
    var donut = new Morris.Donut({
    	element: 'sales-chart',
    	resize: true,
    	colors: ["#00a65a", "#3c8dbc", "#ff851b", "#f56954"],
    	data: [
    	{label: "ขณะนี้", value: <?php include("../config/useronline.php"); ?>},
    	{label: "วันนี้", value: <?php echo number_format($strToday,0);?>},
    	{label: "ปีนี้", value: <?php echo number_format($strThisYear,0);?>},
    	{label: "ทั้งหมด", value: <?php echo number_format($strAll,0);?>}
    	],
    	hideHover: 'auto'
    });
});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		pdfMake.fonts = {
			THSarabun: {
				normal: 'THSarabun.ttf',
				bold: 'THSarabun-Bold.ttf',
				italics: 'THSarabun-Italic.ttf',
				bolditalics: 'THSarabun-BoldItalic.ttf'
			},
			THSarabun: {
				normal: 'THSarabunNew.ttf',
				bold: 'THSarabunNew-Bold.ttf',
				italics: 'THSarabunNew-Italic.ttf',
				bolditalics: 'THSarabunNew-BoldItalic.ttf'
			}
		}
		oTable10 = $("#dataTable").dataTable({
			"lengthChange": false,
			"responsive" : true,
			"dom" : 'lBfrtip',
			"pagingType": "full_numbers",
			"colVis": {
				"buttonText": "เปิดปิดคอลัมภ์"
			},
			"language": {
				"sProcessing": "กำลังดำเนินการ...",
				"sLengthMenu": "แสดง_MENU_ แถว",
				"sZeroRecords": "ไม่พบข้อมูล",
				"sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
				"sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 แถว",
				"sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกแถว)",
				"sInfoPostFix": "",
				"sSearch": "ค้นหา:",
				"sUrl": "",
				"oPaginate": {
					"sFirst": "เริ่มต้น",
					"sPrevious": "ก่อนหน้า",
					"sNext": "ถัดไป",
					"sLast": "สุดท้าย"
				}
			},
			"buttons": [
			'copy', 'excel',
				{ // กำหนดพิเศษเฉพาะปุ่ม pdf
				"extend": 'pdf', // ปุ่มสร้าง pdf ไฟล์
				"exportOptions" : {
					columns: ':visible'
				},
				"text": 'PDF', // ข้อความที่แสดง
				"pageSize": 'A4',   // ขนาดหน้ากระดาษเป็น A4
				"customize":function(doc){ // ส่วนกำหนดเพิ่มเติม ส่วนนี้จะใช้จัดการกับ pdfmake
				// กำหนด style หลัก
				doc.defaultStyle = {
					font:'THSarabun',
					fontSize:16
				};
				} // สิ้นสุดกำหนดพิเศษปุ่ม pdf
			},
			,{"extend" : 'print',"title" : '<?php echo $title; ?>'}
				//,'colvis',
				,{"extend" : 'colvis' ,"buttonText": "เปิดปิดคอลัมภ์"},
				],
				"columnDefs ": [ {
					'targets': -1,
					'visible': false
				} ],
				'drawCallback': function(){
					$('input.flat[type="checkbox"]').iCheck({
						checkboxClass: 'icheckbox_minimal-red',
						radioClass: 'iradio_minimal-red'
					});
					$('input.all[type="checkbox"]').on('ifToggled', function (event) {
						var chkToggle;
						$(this).is(':checked') ? chkToggle = "check" : chkToggle = "uncheck";
						$('input.selector:not(.all)').iCheck(chkToggle);
					});
				}
			});
	});
</script>