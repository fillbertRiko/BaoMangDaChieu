<?php
include('../../admin/config/config.php'); // Kết nối với cơ sở dữ liệu

// Truy vấn để lấy các bài viết
$sql_daily = "SELECT * FROM articlesday WHERE status = 'published' ORDER BY publication_date DESC LIMIT 5"; // Hàng ngày
$sql_highlights = "SELECT * FROM articles WHERE status = 'publication_date' ORDER BY article_id DESC LIMIT 5"; // Nổi bật
$sql_trending = "SELECT * FROM articlesmost WHERE status = 'published' ORDER BY view_count DESC LIMIT 5"; // Đọc nhiều
$sql_extra = "SELECT * FROM articlesmore WHERE status = 'published' ORDER BY publication_date DESC LIMIT 4 OFFSET 5"; // Đọc thêm

$query_daily = mysqli_query($mysqli, $sql_daily);
$query_highlights = mysqli_query($mysqli, $sql_highlights);
$query_trending = mysqli_query($mysqli, $sql_trending);
$query_extra = mysqli_query($mysqli, $sql_extra);
?>

<div class="content">
    <div class="top-tabs">
        <div class="news-daily">
            <h2>Hàng Ngày</h2>
            <hr class="title-hr">
            <?php while ($row = mysqli_fetch_array($query_daily)) { ?>
                <article>
                    <h3><a href="article.php?articleid=<?php echo $row['article_id']; ?>"><?php echo $row['title']; ?></a></h3>
                    <p><?php echo $row['summary']; ?></p>
                </article>
                <hr class="article-hr">
            <?php } ?>
        </div>

        <div class="news-highlights">
            <h2>Nổi Bật</h2>
            <hr class="title-hr">
            <?php while ($row = mysqli_fetch_array($query_highlights)) { ?>
                <article>
                    <h3><a href="article.php?articleid=<?php echo $row['article_id']; ?>"><?php echo $row['title']; ?></a></h3>
                    <p><?php echo $row['summary']; ?></p>
                </article>
                <hr class="article-hr">
            <?php } ?>
        </div>

        <div class="news-trending">
            <h2>Đọc Nhiều</h2>
            <hr class="title-hr">
            <?php while ($row = mysqli_fetch_array($query_trending)) { ?>
                <article>
                    <h3><a href="article.php?articleid=<?php echo $row['article_id']; ?>"><?php echo $row['title']; ?></a></h3>
                    <p><?php echo $row['summary']; ?></p>
                </article>
                <hr class="article-hr">
            <?php } ?>
        </div>
    </div>

    <!-- Tab cuối nằm dưới ba tab trên -->
    <div class="news-extra">
        <h2>Tin Đọc Thêm</h2>
        <hr class="title-hr">
        <div class="extra-content">
            <?php while ($row = mysqli_fetch_array($query_extra)) { ?>
                <article>
                    <h3><a href="article.php?articleid=<?php echo $row['article_id']; ?>"><?php echo $row['title']; ?></a></h3>
                    <p><?php echo $row['summary']; ?></p>
                </article>
                <hr class="article-hr">
            <?php } ?>
        </div>
    </div>
</div>
