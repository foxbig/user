<!DOCTYPE html>
<?php include("db.php")?>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>進擊的巨人 - 鎧之巨人</title>
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
    <h1>鎧之巨人（Armored Titan）</h1>
    <p><i>「堅不可摧的戰士之盾。」</i></p>

    <div class="character">
        <img src="前端照片/鎧之巨人.jpg" alt="鎧之巨人 圖片">
        <div>
            <h2>防禦型戰士</h2>
            <p>
                鎧之巨人以其全身堅硬盔甲著稱，是攻防一體的重裝戰士。
                曾由萊納·布朗持有，在戰場上能抵擋大多數火力，並以蠻力突擊破壞敵方防線。
            </p>
        </div>
    </div>

    <div class="skills">
        <div class="skill">
            <h2>盔甲覆體</h2>
            <p>身體被堅硬裝甲覆蓋，能抵擋砲火與巨人攻擊。</p>
        </div>
        <div class="skill">
            <h2>衝撞破壞</h2>
            <p>利用自身重量與衝撞力，破壞城牆與建築物。</p>
        </div>
        <div class="skill">
            <h2>持久戰能力</h2>
            <p>盔甲提供優異防護，使其能承受長時間戰鬥。</p>
        </div>
    </div>
     <div class="back">
    <?php
        $sql = "SELECT * FROM `jam` WHERE `jam`='鎧之巨人'";
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
