<!DOCTYPE html>
<?php include("db.php")?>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>進擊的巨人 - 獸之巨人</title>
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
    <h1>獸之巨人（Beast Titan）</h1>
    <p><i>「遠程投擲與指揮巨人。」</i></p>

    <div class="character">
        <img src="前端照片/獸之巨人.jpg" alt="獸之巨人 圖片">
        <div>
            <h2>遠程指揮</h2>
            <p>
                獸之巨人擁有遠距投擲物品的能力，並且能指揮其他無垢巨人。曾由齊柏·柯瓦爾擁有，是敵人中一個非常危險的角色。
            </p>
        </div>
    </div>

    <div class="skills">
        <div class="skill">
            <h2>遠程攻擊</h2>
            <p>可投擲巨石、物品作為遠程攻擊，威力巨大。</p>
        </div>
        <div class="skill">
            <h2>指揮無垢巨人</h2>
            <p>擁有指揮其他無垢巨人的能力，操控敵方戰場。</p>
        </div>
        <div class="skill">
            <h2>非人類智慧</h2>
            <p>其擁有較高的智慧，能進行戰略指揮。</p>
        </div>
    </div>
    <div class="back">
    <?php
        $sql = "SELECT * FROM `jam` WHERE `jam`='獸之巨人'";
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