<!DOCTYPE html>
<?php include("db.php")?>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>進擊的巨人 - 顎之巨人</title>
    <style>
        body {
            font-family: "Microsoft JhengHei", sans-serif;
            background-color: #111;
            color: white;
            padding: 20px;
        }
        .character {
            display: flex;
            align-items: center;
            gap: 30px;
        }
        .character img {
            max-width: 300px;
            border-radius: 10px;
        }
        .skills {
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }
        .skill {
            background-color: #2c2c2c;
            padding: 15px;
            border-radius: 10px;
            flex: 1;
        }
        h1, h2 {
            color: #ffcc00;
        }
        .fixed-bottom-button {
        position: fixed;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        text-align: center;
        z-index: 100;
        }
        .back {
            width: 30%;
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }
        .RIP {
            
            background-color: #2c2c2c;
            padding: 15px;
            border-radius: 10px;
            flex: 1;
        }
        .RIP img{
            width: 300px;
            height: 300px;
        }
    </style>
</head>
<body>
    <h1>顎之巨人</h1>
    <p><i>「速度與力量並存的攻擊型巨人。」</i></p>

    <div class="character">
        <img src="前端照片/顎之巨人.jpg" alt="顎之巨人 圖片">
        <div>
            <h2>快速攻擊型</h2>
            <p>
                顎之巨人擁有超高的速度與強大的咬合力，能迅速攻擊並穿透敵人防線。擁有。
            </p>
        </div>
    </div>

    <div class="skills">
        <div class="skill">
            <h2>強大咬合力</h2>
            <p>顎之巨人能夠輕易咬碎堅硬物體，甚至摧毀裝甲。</p>
        </div>
        <div class="skill">
            <h2>極速運動</h2>
            <p>其機動性極高，能快速穿越戰場。</p>
        </div>
        <div class="skill">
            <h2>高度敏捷</h2>
            <p>其能迅速閃避敵人攻擊，擁有靈活的戰鬥風格。</p>
        </div>
    </div>
    <div class="back">
    <?php
        $sql = "SELECT * FROM `jam` WHERE `jam`='顎之巨人'";
        $result = mysqli_query($link, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
    $img = htmlspecialchars($row['jam_img']);
    $name = htmlspecialchars($row['jam_name']);
    
    echo '
    
    <div class="RIP" align="center">
        <h2>歷代巨人使用者</h2>
        <img src="巨人/' . $img . '" alt="' . $name . '">
        <h3>' . $name . '</h3>
    </div>';
}
?>
</div>
    <div class="fixed-bottom-button">
  <input type="button" value="回首頁" onclick="location.href='main.php'">
</div>
</body>
</html>