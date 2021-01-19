<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">ประเภทแหล่งเรียนรู้</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Portfolio Grid Items-->
        <div class="row">
            <?php
            $i=0;

            $sql = "SELECT * FROM tbl_learning_type";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
             $i++;
             ?>
             <!-- Portfolio Item 1-->
             <div class="col-md-6 col-lg-4 mb-5">
                <a class="portfolio-item mx-auto" href="?menu=learning&learning_type_id=<?php echo $encode = urlencode(encrypt($row['learning_type_id'])); ?>" style="text-decoration: none;">
                    <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                        <div class="portfolio-item-caption-content text-center text-white">
                            <i class="fas fa-book-reader fa-3x"></i>
                            <p><?php echo $row['learning_type_name']; ?></p>
                        </div>
                    </div>
                    <i class="fas fa-book-open h-100 w-100" style="color: #2c3e50 !important;"></i>
                    <h6 align="center">
                        <?php echo $row['learning_type_name']; ?> (<?php $result_1 = $conn->query("SELECT COUNT(*) AS learning_count FROM tbl_learning WHERE learning_type_id = '".$row['learning_type_id']."'");$row_1 = $result_1->fetch_assoc(); echo number_format($row_1["learning_count"]); ?>)
                    </h6>
                </a>
            </div>
        <?php } ?>
    </div>
</div>
</section>