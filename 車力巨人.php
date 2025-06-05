<!DOCTYPE html>
<?php include("db.php")?>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>進擊的巨人 - 車力巨人</title>
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
    <h1>車力巨人（Cart Titan）</h1>
    <p><i>「持久與機動性兼具的支援型巨人。」</i></p>

    <div class="character">
        <img src="前端照片/車力巨人.jpg" alt="車力巨人 圖片">
        <div>
            <h2>支援型角色</h2>
            <p>
                車力巨人擁有極高的耐久性與機動性，能長時間執行長途運輸與支援工作。曾由皮特·尤馬持有，是一個非常實用的戰場角色。
            </p>
        </div>
    </div>

    <div class="skills">
        <div class="skill">
            <h2>高度耐力</h2>
            <p>車力巨人具有極高的耐久性，能在長時間戰鬥中維持狀態。</p>
        </div>
        <div class="skill">
            <h2>優秀機動性</h2>
            <p>具有出色的機動性，能靈活地穿梭於戰場。</p>
        </div>
        <div class="skill">
            <h2>載運能力</h2>
            <p>可承擔物資運輸及支援作戰，擔任重要後勤角色。</p>
        </div>
    </div>
<div class="back">
    <?php
        $sql = "SELECT * FROM `jam` WHERE `jam`='車力巨人'";
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