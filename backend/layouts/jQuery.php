<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- include summernote-th-TH -->
<script src="plugins/summernote/lang/summernote-th-TH.js"></script>
<!-- Ekko Lightbox -->
<script src="plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

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
        PROVINCE: '#province', // select div สำหรับรายชื่อจังหวัด
        AMPHUR: '#amphur', // select div สำหรับรายชื่ออำเภอ
        DISTRICT: '#district', // select div สำหรับรายชื่อตำบล
        POSTCODE: '#postcode', // input field สำหรับรายชื่อรหัสไปรษณีย์
        arrangeByName: false // กำหนดให้เรียงตามตัวอักษร
    });
</script>
<script type="text/javascript">
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
    $(document).ready(function () {
        if (window.File && window.FileList && window.FileReader) {
            $("#img_learning_name").on("change", function (e) {
                var files = e.target.files,
                    filesLength = files.length;
                for (var i = 0; i < filesLength; i++) {
                    var f = files[i]
                    var fileReader = new FileReader();
                    fileReader.onload = (function (e) {
                        var file = e.target;
                        $("<span class=\"pip\">" +
                            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                            "<br/><span class=\"remove btn btn-block btn-danger btn-flat btn-xs\" title=\"ลบภาพ\"><i class=\"fas fa-times-circle\"></i></span>" +
                            "</span>").insertAfter("#img_learning_name");
                        $(".remove").click(function () {
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
    $(document).ready(function () {
        $("#add").on("click", function () {
            $("#more-youtube_link").append("<div class='form-group'<label for='youtube_link'>ลิงค์เชื่อมโยงวีดีโอ</label><input type='text' class='form-control' id='youtube_link' name='youtube_link[]' placeholder='ลิงค์เชื่อมโยงวีดีโอ'></div>");
        });
        $("#remove").on("click", function () {
            $("#more-youtube_link").children().last().remove();
        });
    });
</script>
<script>
    $(function () {
        $(document).on('click', '[data-toggle="lightbox"]', function (event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });

        $('.filter-container').filterizr({
            gutterPixels: 3
        });
        $('.btn[data-filter]').on('click', function () {
            $('.btn[data-filter]').removeClass('active');
            $(this).addClass('active');
        });
    })
</script>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function () {
        var groupColumn = 2;
        var table = $('#example').DataTable({
            "lengthChange": false,
            "columnDefs": [{
                "visible": false,
                "targets": groupColumn
            }],
            "order": [
                [groupColumn, 'asc']
            ],
            "displayLength": 30,
            "drawCallback": function (settings) {
                var api = this.api();
                var rows = api.rows({
                    page: 'current'
                }).nodes();
                var last = null;

                api.column(groupColumn, {
                    page: 'current'
                }).data().each(function (group, i) {
                    if (last !== group) {
                        $(rows).eq(i).before(
                            '<tr class="group"><td colspan="6">' + group + '</td></tr>'
                        );

                        last = group;
                    }
                });
            },
            "oLanguage": {
                "sEmptyTable": "ไม่มีข้อมูลในตาราง",
                "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
                "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 แถว",
                "sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกแถว)",
                "sInfoThousands": ",",
                "sLengthMenu": "แสดง _MENU_ แถว",
                "sLoadingRecords": "กำลังโหลดข้อมูล...",
                "sProcessing": "กำลังดำเนินการ...",
                "sSearch": "ค้นหา: ",
                "sZeroRecords": "ไม่พบข้อมูล",
                "oPaginate": {
                    "sFirst": "หน้าแรก",
                    "sPrevious": "ก่อนหน้า",
                    "sNext": "ถัดไป",
                    "sLast": "หน้าสุดท้าย"
                },
                "oAria": {
                    "sSortAscending": ": เปิดใช้งานการเรียงข้อมูลจากน้อยไปมาก",
                    "sSortDescending": ": เปิดใช้งานการเรียงข้อมูลจากมากไปน้อย"
                }
            }
        });

        // Order by the grouping
        $('#example tbody').on('click', 'tr.group', function () {
            var currentOrder = table.order()[0];
            if (currentOrder[0] === groupColumn && currentOrder[1] === 'asc') {
                table.order([groupColumn, 'desc']).draw();
            } else {
                table.order([groupColumn, 'asc']).draw();
            }
        });
    });
    $(document).ready(function () {
        $('#select_all').on('click', function () {
            if (this.checked) {
                $('.checkbox').each(function () {
                    this.checked = true;
                });
            } else {
                $('.checkbox').each(function () {
                    this.checked = false;
                });
            }
        });

        $('.checkbox').on('click', function () {
            if ($('.checkbox:checked').length == $('.checkbox').length) {
                $('#select_all').prop('checked', true);
            } else {
                $('#select_all').prop('checked', false);
            }
        });
    });

    function delete_confirm() {
        if ($('.checkbox:checked').length > 0) {
            var result = confirm("คุณแน่ใจว่าจะลบนักเรียนที่เลือก ?");
            if (result) {
                return true;
            } else {
                return false;
            }
        } else {
            alert('กรุณาเลือกอย่างน้อย 1 รายการเพื่อลบ.');
            return false;
        }
    }
</script>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function () {
        var groupColumn = 1;
        var table = $('#example_2').DataTable({
            "lengthChange": false,
            "columnDefs": [{
                "visible": false,
                "targets": groupColumn
            }],
            "order": [
                [groupColumn, 'asc']
            ],
            "displayLength": 30,
            "drawCallback": function (settings) {
                var api = this.api();
                var rows = api.rows({
                    page: 'current'
                }).nodes();
                var last = null;

                api.column(groupColumn, {
                    page: 'current'
                }).data().each(function (group, i) {
                    if (last !== group) {
                        $(rows).eq(i).before(
                            '<tr class="group"><td colspan="6">' + group + '</td></tr>'
                        );

                        last = group;
                    }
                });
            },
            "oLanguage": {
                "sEmptyTable": "ไม่มีข้อมูลในตาราง",
                "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
                "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 แถว",
                "sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกแถว)",
                "sInfoThousands": ",",
                "sLengthMenu": "แสดง _MENU_ แถว",
                "sLoadingRecords": "กำลังโหลดข้อมูล...",
                "sProcessing": "กำลังดำเนินการ...",
                "sSearch": "ค้นหา: ",
                "sZeroRecords": "ไม่พบข้อมูล",
                "oPaginate": {
                    "sFirst": "หน้าแรก",
                    "sPrevious": "ก่อนหน้า",
                    "sNext": "ถัดไป",
                    "sLast": "หน้าสุดท้าย"
                },
                "oAria": {
                    "sSortAscending": ": เปิดใช้งานการเรียงข้อมูลจากน้อยไปมาก",
                    "sSortDescending": ": เปิดใช้งานการเรียงข้อมูลจากมากไปน้อย"
                }
            }
        });

        // Order by the grouping
        $('#example_2 tbody').on('click', 'tr.group', function () {
            var currentOrder = table.order()[0];
            if (currentOrder[0] === groupColumn && currentOrder[1] === 'asc') {
                table.order([groupColumn, 'desc']).draw();
            } else {
                table.order([groupColumn, 'asc']).draw();
            }
        });
    });
    $('#personalityModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var action = button.data('action')
        var name = button.data('name')
        var card_id = button.data('card_id')
        var personality = button.data('personality')
        var personality_description = button.data('realistic')
        var realistic = button.data('realistic')
        var investigative = button.data('investigative')
        var artistic = button.data('artistic')
        var social = button.data('social')
        var conventional = button.data('conventional')
        var enterprising = button.data('enterprising')
        var entrepreneurial_chaacteristics = button.data('entrepreneurial_chaacteristics')
        var cross_cultural_awareness = button.data('cross_cultural_awareness')
        var adaptability = button.data('adaptability')
        var teamwork = button.data('teamwork')
        var career = button.data('career')
        var disciplines = button.data('disciplines')
        var modal = $(this)
        modal.find('.modal-title').text('เพิ่มข้อมูลบุคลิกภาพ ' + name)
        modal.find('#card_id').val(card_id)
        modal.find('#personality').val(personality)
        modal.find('#personality_description').val(personality_description)
        modal.find('#realistic').val(realistic)
        modal.find('#investigative').val(investigative)
        modal.find('#artistic').val(artistic)
        modal.find('#social').val(social)
        modal.find('#conventional').val(conventional)
        modal.find('#enterprising').val(enterprising)
        modal.find('#entrepreneurial_chaacteristics').val(entrepreneurial_chaacteristics)
        modal.find('#cross_cultural_awareness').val(cross_cultural_awareness)
        modal.find('#adaptability').val(adaptability)
        modal.find('#teamwork').val(teamwork)
        modal.find('#career').val(career)
        modal.find('#disciplines').val(disciplines)
        modal.find('#form_p').attr("action", "?Action=" + action)
    })
</script>