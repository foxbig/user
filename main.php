<?php
include("db.php");

//檢查是否登入
if (!isset($_SESSION["id"])) {
    header("location:index.php"); 
    exit();
}

$id = $_SESSION["id"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>進擊的巨人</title>
    <style>
        body {
            background-color: #1f1f1f;
            color: #fff;
            font-family: 'Arial', sans-serif;
            margin: 0;  /* 這行去除了所有元素的外邊距，讓元素之間的間隔為 0 */
            padding: 0; /* 這行去除了所有元素的內邊距，讓元素內容與邊框之間的空白為 0 */
        }
        header {
            background-color: #333;
            padding: 20px;
            text-align: center;
            font-size: 2rem;/* 設定字體大小為 2rem，'rem'是相對於根元素的字體大小的單位 */
            text-transform: uppercase;/* 將文字轉換為大寫字母 */
        }
        .hero {
            background-image: url("前端照片/gu達.png");
            background-size: cover;
            background-position: center;
            height: 400px;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 3rem;
            color: #fff;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }
        .hero h1 {
            font-size: 4rem;
            font-weight: bold;
        }
        .container {
            padding: 20px;
        }
        .section-title {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #ffcc00;
        }
        .section-content {
            font-size: 1.2rem;
            line-height: 1.6;
            color: #e0e0e0;
        }
        .footer {
            background-color: #333;
            padding: 10px;
            text-align: center;
            font-size: 1rem;
            color: #fff;
        }
        a {
            color: #ffcc00;
            text-decoration: none;
        }
        .aa, .bb, .cc, .dd, .ee, .ff, .gg, .hh{
            display: inline-block;
            width: 350px;
            height: 281px;
            transition: background-image 1s ease-in-out;
            background-repeat: no-repeat;
            
        }
        .aa:hover, .bb:hover, .cc:hover, .dd:hover, .ee:hover, .ff:hover, .gg:hover, .hh:hover{
            display: inline-block;
            width: 350px;
            height: 281px;
            background-repeat: no-repeat;
        }
        .ii{
            display: inline-block;
            width: 850px;
            height: 478px;
            transition: background-image 1s ease-in-out;
            background-repeat: no-repeat;
            margin: 10px;  
        }
        .ii:hover{
            display: inline-block;
            width: 850px;
            height: 385px;
            background-repeat: no-repeat;
        }

        .aa {
            background-image: url("前端照片/亞妮.jpg");
        }

        .aa:hover {
            background-image: url("前端照片/女巨人1.jpg");
        }

        .bb {
            background-image: url("前端照片/萊納.jpg");
        }

        .bb:hover {
            background-image: url("前端照片/鎧之巨人.jpg");
        }

        .cc {
            background-image: url("前端照片/貝爾托特.jpg");
        }

        .cc:hover {
            background-image: url("前端照片/超大型巨人.jpg");
        }
        .dd {
            background-image: url("前端照片/法爾克.jpg");
        }

        .dd:hover {
            background-image: url("前端照片/顎之巨人.jpg");
        }
        .ee {
            background-image: url("前端照片/皮克.jpg");
        }

        .ee:hover {
            background-image: url("前端照片/車力巨人.jpg");
        }

        .ff {
            background-image: url("前端照片/吉克.jpg");
        }

        .ff:hover {
            background-image: url("前端照片/獸之巨人.jpg");
        }

        .gg {
            background-image: url("前端照片/僕人.jpg");
        }

        .gg:hover {
            background-image: url("前端照片/戰槌巨人.jpg");
        }
        .hh {
            background-image: url("前端照片/梟.jpg");
        }

        .hh:hover {
            background-image: url("前端照片/進擊的巨人.jpg");
        }
        .ii {
            background-image: url("前端照片/123.jpg");
        }
        .ii:hover {
            background-image: url("前端照片/BOSS.jpg");
        }
        .menu {
            position: fixed;
            top: 0;
            left: -250px;
            width: 250px;
            height: 100%;
            background: #333;
            transition: left 0.3s ease;
            padding-top: 50px;
        }
        .menu a {
            display: block;
            padding: 15px;
            color: white;
            text-decoration: none;
        }
        .menu a:hover {
            background: #555;
        }
        .menu-toggle {
            font-size: 30px;
            cursor: pointer;
            background: none;
            border: none;
            color: rgba(255, 255, 255, 0.81);
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 9999;
        }
        .menu-toggle {
            font-size: 30px;
            cursor: pointer;
            background: none;
            border: none;
            color: rgba(255, 255, 255, 0.81);
            position: fixed; /* 改這裡 */
            top: 10px;
            left: 10px;
            z-index: 9999;
        }
        
        .menu.open {
            left: 0;
        }
        .giants-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
}

.card {
    text-align: center;
    color: #fff;
}

.card p {
    margin: 8px 0 0;
    font-size: 2rem;
    color:rgb(255, 255, 255);
}
.carde {
    text-align: center;
    color: #fff;
}

.carde p {
    margin: 8px 0 0;
    font-size: 2rem;
    color:rgb(255, 255, 255);
}

    </style>
</head>
<script>
    function toggleMenu() {
        document.getElementById("menu").classList.toggle("open");
    }
</script>
<body>
<button class="menu-toggle" onclick="toggleMenu()">☰</button>

<div class="menu" id="menu" >
    <a href="myacc.php">我的帳號</a>
    <a href="shop2.php">周邊商城</a>
<?php if ($_SESSION["type"] != "u"): ?>
    <a href="add_shop.php">申請販賣商品</a>
    <a href="go.php">賣出紀錄</a>
<?php endif; ?>
<?php if ($_SESSION["type"] == "a"): ?>
    <a href="allbuy.php">所有訂單管理</a>
    <a href="add_jam.php">新增歷代巨人</a>
<?php endif; ?>
    <a href="logout.php">登出</a>
</div>

<header>
    進擊的巨人
</header>
<div class="hero">
    <h1>自由の奴隸</h1>
</div>
<div class="container">
    <section>
        <h2 class="section-title">故事背景</h2>
        <p class="section-content">
            《進擊的巨人》是一部由諫山創所創作的日本漫畫，故事講述了人類在被巨人侵略的世界中掙扎求存的故事。主角·葉卡與他的伙伴們一起，誓言要與巨人戰鬥，並尋找解開世界秘密的答案。
        </p>
    </section>
    <section>
        <h2 class="section-title">主要角色</h2>
        <p class="section-content">
            1. 艾連·葉卡（Eren Yeager） - 本作的主角，擁有強烈的復仇心與決心。<br>
            2. 米卡莎·阿克曼（Mikasa Ackerman） - 被艾連一家收養，具有極高的戰鬥天賦。<br>
            3. 阿爾敏·阿諾德（Armin Arlert） - 艾連的朋友，具有出色的智慧與策略思維。
        </p>
    </section>
</div>
    <h2 class="section-title">九大巨人</h2>
    <div class="giants-container">
    <div class="card">
        <a href="女巨人.php"><div class="aa"></div></a>
        <p>女巨人</p>
    </div>
    <div class="card">
        <a href="鎧之巨人.php"><div class="bb"></div></a>
        <p>鎧之巨人</p>
    </div>
    <div class="card">
        <a href="超大型巨人.php"><div class="cc"></div></a>
        <p>超大型巨人</p>
    </div>
    <div class="card">
        <a href="顎之巨人.php"><div class="dd"></div></a>
        <p>顎之巨人</p>
    </div>
    <div class="card">
        <a href="車力巨人.php"><div class="ee"></div></a>
        <p>車力巨人</p>
    </div>
    <div class="card">
        <a href="獸之巨人.php"><div class="ff"></div></a>
        <p>獸之巨人</p>
    </div>
    <div class="card">
        <a href="戰槌巨人.php"><div class="gg"></div></a>
        <p>戰槌巨人</p>
    </div>
    <div class="card">
        <a href="進擊的巨人.php"><div class="hh"></div></a>
        <p>進擊的巨人</p>
    </div>
    <div class="carde">
        <a href="始祖巨人.php"><div class="ii"></div></a>
        <p>始祖巨人</p>
    </div>
</div>
<div class="footer">
    <p>@ 2025 進擊的巨人愛好者</p>
</div>
<iframe
  src="https://www.youtube.com/embed/LtOeDWYfTos?autoplay=1&loop=1&playlist=LtOeDWYfTos&controls=0&showinfo=0&autohide=1"
  frameborder="0"
  allow="autoplay"
  style="width:0; height:0; border:none;"id="music">
</iframe>
</body>
</html>