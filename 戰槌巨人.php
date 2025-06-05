<!DOCTYPE html>
<?php include("db.php")?>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>進擊的巨人 - 戰鎚巨人</title>
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
    <h1>戰鎚巨人（War Hammer Titan）</h1>
    <p><i>「掌握戰場的力量。」</i></p>

    <div class="character">
        <img src="前端照片/戰槌巨人.jpg" alt="戰鎚巨人 圖片">
        <div>
            <h2>強大武器創造者</h2>
            <p>
                戰鎚巨人能夠在戰鬥中創造各種強大的武器，如戰鎚、盾牌等，並具有強大的遠程攻擊能力。曾由萊納·布朗的父親家族持有。
            </p>
        </div>
    </div>

    <div class="skills">
        <div class="skill">
            <h2>戰鎚創造</h2>
            <p>可根據戰鬥需要創造強大的武器，包括戰鎚、長槍等。</p>
        </div>
        <div class="skill">
            <h2>遠程攻擊</h2>
            <p>擁有強大的遠程投擲能力，可發射武器進行攻擊。</p>
        </div>
        <div class="skill">
            <h2>堅固防護</h2>
            <p>創造的武器和裝甲能有效保護其自身免受攻擊。</p>
        </div>
    </div>
    <div class="back">
    <?php
        $sql = "SELECT * FROM `jam` WHERE `jam`='戰槌巨人'";
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
