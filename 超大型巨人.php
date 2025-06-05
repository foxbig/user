<!DOCTYPE html>
<?php include("db.php")?>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>進擊的巨人 - 超大型巨人</title>
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
    <h1>超大型巨人（Colossal Titan）</h1>
    <p><i>「核彈樣的傷害」</i></p>

    <div class="character">
        <img src="前端照片/超大型巨人.jpg" alt="超大型巨人 圖片">
        <div>
            <h2>毀滅象徵</h2>
            <p>
                以其龐大體型與蒸氣爆發而聞名，超大型巨人能瞬間摧毀城牆與城市。
                曾由貝爾托特與亞爾敏持有。
            </p>
        </div>
    </div>

    <div class="skills">
        <div class="skill">
            <h2>高熱蒸氣防禦</h2>
            <p>釋放高溫蒸氣阻止敵人接近。</p>
        </div>
        <div class="skill">
            <h2>瞬間崩解爆炸</h2>
            <p>化身時可造成巨大爆炸破壞周遭環境。</p>
        </div>
        <div class="skill">
            <h2>絕對力量</h2>
            <p>其體型與力量在九大巨人中無可匹敵。</p>
        </div>
    </div>
    <div class="back">
    <?php
        $sql = "SELECT * FROM `jam` WHERE `jam`='超大型巨人'";
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