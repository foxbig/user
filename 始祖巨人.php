<!DOCTYPE html>
<?php include("db.php")?>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>進擊的巨人 - 始祖巨人</title>
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
    <h1>始祖巨人</h1>
    <p><i>「掌控所有巨人的力量。」</i></p>

    <div class="character">
        <img src="前端照片/始祖巨人.jpg" alt="始祖巨人 圖片">
        <div>
            <h2>全巨人之源</h2>
            <p>
                始祖巨人擁有操控所有巨人的能力，且能夠改變歷史的走向。其力量曾由尤米爾·弗里茲與艾連·葉卡等人持有。
            </p>
        </div>
    </div>

    <div class="skills">
        <div class="skill">
            <h2>巨人操控</h2>
            <p>能夠操控其他無垢巨人，並發動巨人潮。</p>
        </div>
        <div class="skill">
            <h2>記憶操控</h2>
            <p>能夠改變繼承者的記憶，甚至改寫歷史。</p>
        </div>
        <div class="skill">
            <h2></h2>
            <p></p>
        </div>
    </div>
    <div class="back">
    <?php
        $sql = "SELECT * FROM `jam` WHERE `jam`='始祖巨人'";
        $result = mysqli_query($link, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
    $img = htmlspecialchars($row['jam_img']);
    $name = htmlspecialchars($row['jam_name']);
    
    echo '
    
    <div class="RIP" align="center">
        <h2>歷代巨人使用者</h2>
        <img src="巨人/'. $img .'" alt="' . $name . '">
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
