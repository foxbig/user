<!DOCTYPE html>
<?php include("db.php")?>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>進擊的巨人 - Attack Titan</title>
    <style>
        /* ===== 頁面整體樣式設定 ===== */
        body {   
            font-family: "Microsoft JhengHei", sans-serif; /* 使用微軟正黑體 */
            background-color: #111; /* 背景設為深色（黑灰） */
            color: white; /* 所有文字為白色 */
            padding: 20px; /* 頁面內距 */
        }

        /* ===== 排版：角色介紹圖片與文字區塊並排 ===== */
        .character {
            display: flex; /* 水平排列 */
            align-items: center; /* 垂直置中對齊 */
            gap: 30px; /* 圖片與文字區塊的間距 */
        }

        /* ===== 角色圖片樣式 ===== */
        .character img {
            max-width: 300px; /* 最大寬度限制為 300 像素 */
            border-radius: 10px; /* 圖片邊角圓滑處理 */
        }

        /* ===== 技能區塊樣式（整排橫向排列） ===== */
        .skills {
            display: flex; /* 水平排列 */
            gap: 20px; /* 技能卡片間距 */
            margin-top: 20px; /* 與上方角色區塊的間距 */
        }

        /* ===== 每張技能卡片的外觀樣式 ===== */
        .skill {
            background-color: #2c2c2c; /* 深灰底色 */
            padding: 15px; /* 內距 */
            border-radius: 10px; /* 圓角 */
            flex: 1; /* 自動平均寬度 */
        }

        /* ===== 所有標題字的顏色統一設定 ===== */
        h1, h2 {
            color: #ffcc00; /* 金黃色，用以凸顯重點 */
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
    <!-- ===== 巨人名稱與代表語錄區塊 ===== -->
    <h1>進擊的巨人（Attack Titan）</h1>
    <p><i>「歷代進擊的巨人，皆為追求自由而戰。」</i></p>
    
    <!-- ===== 角色介紹區塊（含圖片與敘述） ===== -->
    <div class="character">
        <!-- 巨人圖片：請確認圖檔與本檔案放在同一目錄 -->
        <img src="前端照片/進擊的巨人.jpg" alt="進擊的巨人 圖片">

        <!-- 背景敘述：說明進擊的巨人的象徵與歷史 -->
        <div>
            <h2>自由的象徵</h2>
            <p>
                「進擊的巨人」是九大巨人之一，象徵自由與反抗。
                歷任擁有者皆不甘命運擺布，堅持為理想奮戰。
                其擁有卓越格鬥能力與敏捷行動力，甚至能窺視未來繼承者的記憶，
                成為改寫歷史的關鍵角色。艾連·葉卡就是其中最具代表性的一位。
            </p>
        </div>
    </div>

    <!-- ===== 技能介紹區塊（橫向排列的三項能力） ===== -->
    <div class="skills">
        <!-- 技能 1：格鬥能力強化 -->
        <div class="skill">
            <h2>格鬥能力強化</h2>
            <p>進擊的巨人具有優異的近戰格鬥能力，能迅速行動與破壞，是近戰巨人中的佼佼者。</p>
        </div>

        <!-- 技能 2：未來記憶共享 -->
        <div class="skill">
            <h2>未來記憶共享</h2>
            <p>擁有者能看到未來繼承者的記憶，使其做出改變歷史的抉擇，是推動劇情的重要機制。</p>
        </div>

        <!-- 技能 3：反抗命運的意志 -->
        <div class="skill">
            <h2>反抗命運的意志</h2>
            <p>進擊的巨人不受始祖巨人控制，擁有獨立意志，能抵抗王室力量，是象徵自由的存在。</p>
        </div>
    </div>
    <div class="back">
    <?php
        $sql = "SELECT * FROM `jam` WHERE `jam`='進擊的巨人'";
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