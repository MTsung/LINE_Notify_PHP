<?php
    include_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.rawgit.com/TeaMeow/TocasUI/2.3.2/dist/tocas.css" rel='stylesheet'>
    <script src="https://cdn.rawgit.com/TeaMeow/TocasUI/2.3.2/dist/tocas.js"></script>
    <title>LINE Notify 範例 | MTsung</title>
</head>
<body>

    <!-- 主要容器 -->
    <div class="ts very narrow container">
        <div class="ts divider"></div>
        <?php if(isset($_SESSION["apiRateLimit"])): ?>
            <a class="ts negative button" href="revoke.php">解除連動</a>
        <?php else: ?>
            <a class="ts positive button" href="authorization.php">連動</a>
        <?php endif; ?>
        <div class="ts divider"></div>
        <?php if(isset($_SESSION["apiRateLimit"])): ?>
            <p>每小時調用 API 次數 ：<?=$_SESSION["apiRateLimit"]["X-RateLimit-Limit"]?></p>
            <p>每小時剩餘 API 次數 ：<?=$_SESSION["apiRateLimit"]["X-RateLimit-Remaining"]?></p>
            <p>重置限制的時間 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;：<?=date("Y-m-d H:i:s",$_SESSION["apiRateLimit"]["X-RateLimit-Reset"])?></p>
        <?php else: ?>
            <p>尚未連動</p>
        <?php endif; ?>

        <div class="ts divider"></div>
        <!-- 表單 -->
        <form class="ts relaxed form" method="POST" action="snedNotify.php">

            <!-- 單個欄位 -->
            <div class="field">
                <label>訊息</label>
                <textarea rows="5" name="message" required></textarea>
            </div>
            <!-- / 單個欄位 -->

            <!-- 單個欄位 -->
            <div class="field">
                <label>縮圖網址</label>
                <input type="text" name="imageThumbnail">
                <small>如有圖片，圖片與縮圖皆為必填</small>
            </div>
            <!-- / 單個欄位 -->

            <!-- 單個欄位 -->
            <div class="field">
                <label>圖片網址</label>
                <input type="text" name="imageFullsize">
                <small>如有圖片，圖片與縮圖皆為必填</small>
            </div>
            <!-- / 單個欄位 -->

            <!-- 按鈕 -->
            <button class="ts fluid primary button" type="submit">傳送</button>
            <!-- / 按鈕 -->

            <!-- 提示 -->
            <div class="ts center aligned mini basic fitted message">
            </div>
            <!-- / 提示 -->
        </form>
        <!-- / 表單 -->
    </div>
    <!-- / 主要容器 -->
</body>
</html>