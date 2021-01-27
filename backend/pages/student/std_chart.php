<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>จัดการข้อมูลนักเรียน</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">จัดการข้อมูลนักเรียน</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <?php
        $sqlSelect = "SELECT * FROM tbl_student INNER JOIN tbl_personality ON tbl_student.card_id = tbl_personality.card_id WHERE
        tbl_student.card_id = '" . decrypt(urldecode(@$_GET['card_id'])) . "' AND tbl_student.std_code = '" . decrypt(urldecode(@$_GET['std_code'])) . "'";
        $result = $conn->query($sqlSelect);
        $row = $result->fetch_assoc();
        if (! empty($row)) {
            $i=0;
            ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">ข้อมูลนักเรียน</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body p-0">

                        <div class="card-body">
                            <?php  echo $row['prefix'].$row['name'].' '.$row['surname']; ?>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?php  echo $row['personality']; ?></h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="card-body">
                            <?php  echo $row['personality_description']; ?>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="card-body">
                            <div id="container"></div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="card-body">
                            <table class="table table-bordered table-hover table-sm">
                                <thead>
                                    <tr align="center">
                                        <th scope="col" width="80%">บุคลิกภาพ</th>
                                        <th scope="col" width="20%">คะแนน</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1. นิยมความจริง</td>
                                        <td align="center"><?php  echo $row['realistic']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>2. ชอบค้นหา</td>
                                        <td align="center"><?php  echo $row['investigative']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>3. ใฝ่ศิลปะ</td>
                                        <td align="center"><?php  echo $row['artistic']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>4. ชอบสังคม</td>
                                        <td align="center"><?php  echo $row['social']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>5. อนุรักษนิยม</td>
                                        <td align="center"><?php  echo $row['conventional']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>6. แคล่วคล่องว่องไว</td>
                                        <td align="center"><?php  echo $row['enterprising']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>7. ใฝ่ประกอบการ</td>
                                        <td align="center"><?php  echo $row['entrepreneurial_chaacteristics']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>8. ตระหนักข้ามวัฒนธรรม</td>
                                        <td align="center"><?php  echo $row['cross_cultural_awareness']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>9. ความสามารถในการปรับตัว</td>
                                        <td align="center"><?php  echo $row['adaptability']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>10. การทำงานเป็นทีม</td>
                                        <td align="center"><?php  echo $row['teamwork']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="card-body" style="position: static;">
                            <div id="container_line"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">แนวทางการแนะแนว :</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body p-0">

                        <div class="card-body">
                            <div class="card">
                                <div class="card-header">
                                    อาชีพที่เหมาะสม :
                                </div>
                                <div class="card-body">
                                    <?php  echo $row['career']; ?>

                                </div>
                            </div>
                            <hr>
                            <div class="card">
                                <div class="card-header">
                                    สาขาวิชาที่สอดคล้อง :
                                </div>
                                <div class="card-body">
                                    <?php  echo $row['disciplines']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

<?php }else{ ?>

<div class="p-3 mb-2 text-white bg-warning" role="alert" align="center">
    รายละเอียดยังไม่บันทึก
</div>

<?php } ?>
<div class="form-group" style="margin: 25px;">
    <!-- <p align="center" class="non-printable">
        <button onclick="window.print()" class="btn btn-success btn-flat"><i class="fas fa-print"></i> Print this page</button>
    </p> -->
    </dir>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<!-- <script src="https://code.highcharts.com/modules/exporting.js"></script> -->
<?php
$sqlSelect = "SELECT * FROM tbl_student INNER JOIN tbl_personality ON tbl_student.card_id = tbl_personality.card_id WHERE
tbl_student.card_id = '" . decrypt(urldecode(@$_GET['card_id'])) . "' AND tbl_student.std_code = '" . decrypt(urldecode(@$_GET['std_code'])) . "'";
$result = $conn->query($sqlSelect);
$row = $result->fetch_assoc();
if (! empty($row)) {
    $i=0;
    ?>
<script type="text/javascript" charset="utf-8">
    Highcharts.chart('container', {

        chart: {
            polar: true,
            type: 'line'
        },

        title: {
            text: null,
            x: -80
        },

        pane: {
            size: '80%'
        },

        xAxis: {
            categories: ['นิยมความจริง', 'ชอบค้นหา', 'ใฝ่ศิลปะ', 'ชอบสังคม', 'อนุรักษนิยม', 'แคล่วคล่องว่องไว', 'ใฝ่ประกอบการ', 'ตระหนักข้ามวัฒนธรรม', 'ความสามารถในการปรับตัว', 'การทำงานเป็นทีม'],
            tickmarkPlacement: 'on',
            lineWidth: 0
        },

        yAxis: {
            gridLineInterpolation: 'polygon',
            lineWidth: 0,
            min: 0
        },

        tooltip: {
            shared: true,
            pointFormat: '<span style="color:{series.color}">{series.name}: <b>{point.y:,.0f}</b><br/>'
        },

        legend: {
            align: 'right',
            verticalAlign: 'middle',
            layout: 'vertical'
        },
        credits: {
            enabled: false
        },
        series: [{
            showInLegend: false,
            name: 'บุคลิกภาพ',
            data: [ <?php echo $row['realistic'].
                ' ,'.$row['investigative'].
                ' ,'.$row['artistic'].
                ' ,'.$row['social'].
                ' ,'.$row['conventional'].
                ' ,'.$row['enterprising'].
                ' ,'.$row['entrepreneurial_chaacteristics'].
                ' ,'.$row['cross_cultural_awareness'].
                ' ,'.$row['adaptability'].
                ' ,'.$row['teamwork']; ?>
            ],
            pointPlacement: 'on'
        }],

        responsive: {
            rules: [{
                condition: {
                    maxWidth: '100%'
                },
                chartOptions: {
                    legend: {
                        align: 'center',
                        verticalAlign: 'bottom',
                        layout: 'horizontal'
                    },
                    yAxis: {
                        labels: {
                            align: 'left',
                            x: 0,
                            y: -5
                        },
                        title: {
                            text: null
                        }
                    },
                    subtitle: {
                        text: null
                    },
                    credits: {
                        enabled: false
                    }
                }
            }]
        }

    });

     <?php
        $sqlSelect_line = "SELECT
        MIN(tbl_pe.realistic) AS min_re, 
        MIN(tbl_pe.investigative) AS min_in, 
        MIN(tbl_pe.artistic) AS min_ar, 
        MIN(tbl_pe.social) AS min_so, 
        MIN(tbl_pe.conventional) AS min_co, 
        MIN(tbl_pe.enterprising) AS min_en, 
        MIN(tbl_pe.entrepreneurial_chaacteristics) AS min_ent, 
        MIN(tbl_pe.cross_cultural_awareness) AS min_cr, 
        MIN(tbl_pe.adaptability) AS min_ad, 
        MIN(tbl_pe.teamwork) AS min_te, 
        MAX(tbl_pe.realistic) AS max_re, 
        MAX(tbl_pe.investigative) AS max_in, 
        MAX(tbl_pe.artistic) AS max_ar, 
        MAX(tbl_pe.social) AS max_so, 
        MAX(tbl_pe.conventional) AS max_co, 
        MAX(tbl_pe.enterprising) AS max_en, 
        MAX(tbl_pe.entrepreneurial_chaacteristics) AS max_ent, 
        MAX(tbl_pe.cross_cultural_awareness) AS max_cr, 
        MAX(tbl_pe.adaptability) AS max_ad, 
        MAX(tbl_pe.teamwork) AS max_te
        FROM
        tbl_personality AS tbl_pe
        INNER JOIN
        tbl_student AS tbl_st
        ON 
        tbl_pe.card_id = tbl_st.card_id
        WHERE
        tbl_st.school_id = '" . @$row['school_id'] . "'";
        $result_line = $conn->query($sqlSelect_line);
        $row_line = $result_line->fetch_assoc();
        if (! empty($row_line)) {
            $i=0;
            ?>

            Highcharts.chart('container_line', {

                title: {
                    text: null
                },

                subtitle: {
                    text: null
                },

                yAxis: {
                    title: {
                        text: 'คะแนน'
                    }
                },

                xAxis: {
                    accessibility: {
                        rangeDescription: 'Range: 2010 to 2017'
                    }
                },

                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle'
                },

                plotOptions: {
                    series: {
                        label: {
                            connectorAllowed: false
                        },
                        pointStart: 2010
                    }
                },

                credits: {
                    enabled: false
                },

                series: [{
                    name: 'ขอบบน',
                    data: [ <?php echo $row_line['max_re'].
                    ' ,'.$row_line['max_in'].
                    ' ,'.$row_line['max_ar'].
                    ' ,'.$row_line['max_so'].
                    ' ,'.$row_line['max_co'].
                    ' ,'.$row_line['max_en'].
                    ' ,'.$row_line['max_ent'].
                    ' ,'.$row_line['max_cr'].
                    ' ,'.$row_line['max_ad'].
                    ' ,'.$row_line['max_te']; ?>
                    ]
                }, {
                    name: 'คะแนน',
                    data: [ <?php echo $row['realistic'].
                    ' ,'.$row['investigative'].
                    ' ,'.$row['artistic'].
                    ' ,'.$row['social'].
                    ' ,'.$row['conventional'].
                    ' ,'.$row['enterprising'].
                    ' ,'.$row['entrepreneurial_chaacteristics'].
                    ' ,'.$row['cross_cultural_awareness'].
                    ' ,'.$row['adaptability'].
                    ' ,'.$row['teamwork']; ?>
                    ]
                }, {
                    name: 'ขอบล่าง',
                    data: [ <?php echo $row_line['min_re'].
                    ' ,'.$row_line['min_in'].
                    ' ,'.$row_line['min_ar'].
                    ' ,'.$row_line['min_so'].
                    ' ,'.$row_line['min_co'].
                    ' ,'.$row_line['min_en'].
                    ' ,'.$row_line['min_ent'].
                    ' ,'.$row_line['min_cr'].
                    ' ,'.$row_line['min_ad'].
                    ' ,'.$row_line['min_te']; ?>
                    ]
                }],

                responsive: {
                    rules: [{
                        condition: {
                            maxWidth: 500
                        },
                        chartOptions: {
                            legend: {
                                layout: 'horizontal',
                                align: 'center',
                                verticalAlign: 'bottom'
                            }
                        }
                    }]
                }

            });
        </script>
    <?php } } ?>
</section>
</div>