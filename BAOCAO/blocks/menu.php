<div class="left">
    <?php
    $kq = layDanhMuc($conn);
    while ($r = mysqli_fetch_array($kq)) {
    ?>
        <a href="index.php?page=blocks/sptheodm.php&id=<?php echo $r["Maloai"] ?>">
            <?php if ($r["hidden"] == '0') { ?>
                <div class="danhmuc">
                    <?php
                    echo $r["Tenloai"];
                    ?>
                </div>
            <?php } ?>
        </a>
    <?php
    }
    ?>
</div>
<div class="right">

</div>