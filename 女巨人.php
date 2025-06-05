<!DOCTYPE html>
<?php include("db.php")?>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>進擊的巨人 - 女巨人</title>
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
            width:10px;
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
    <h1>女巨人（Female Titan）</h1>
    <p><i>「靈活與智慧並存的戰士。」</i></p>

    <div class="character">
        <img src="前端照片/女巨人1.jpg" alt="女巨人 圖片">
        <div>
            <h2>萬能型戰鬥者</h2>
            <p>
                女巨人具備出色的戰鬥技巧與高機動性，
                並能吸引其他無垢巨人，是具戰略價值的存在。
                安妮·雷恩哈特是其主要持有者。
            </p>
        </div>
    </div>

    <div class="skills">
        <div class="skill">
            <h2>晶化防禦</h2>
            <p>可局部硬化身體以防禦與攻擊。</p>
        </div>
        <div class="skill">
            <h2>召喚無垢巨人</h2>
            <p>透過吼叫引來無垢巨人，擾亂敵人。</p>
        </div>
        <div class="skill">
            <h2>高機動性</h2>
            <p>行動迅速靈活，擅長格鬥與突襲。</p>
        </div>
    </div>
<div class="back">
        <?php
        $sql = "SELECT * FROM `jam` WHERE `jam`='女巨人'";
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