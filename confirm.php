<?php if(isset($_GET['date'])) { $date = $_GET['date']; } if(isset($_GET['time'])) { $time = $_GET['time']; }
    if($date == 32){
        $MonthDate = "6月1日";
    }else{
        $MonthDate = "5月".$date."日";
    }
?>
<?php include('dbconnect.php'); ?>
<?php
session_start();
//$username = $_SESSION['name'];
if (isset($_SESSION['index'])) {//ログインしているとき
    $username = $_SESSION['dantai'];
    $link = '<a href="logout.php">ログアウト</a>';
    $form_style = "none";
    $body_style = "block";
} else {//ログインしていない時
    header("Location:loginform.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>駐輪場予約サイト/予約状況</title>
        <meta name="description" content="" />
        <link rel="stylesheet" href="confirm.css">
        <link rel="stylesheet" href="style.css">
        <!-- Favicon設定-->
        <link rel="apple-touch-icon" href="file/favicon/apple-touch-icon.png">
        <link type="image/x-icon" rel="icon" href="file/favicon/favicon.ico">
        <!--  Google Font 読み込み  -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Zen+Kaku+Gothic+New:wght@500;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <a href="index.php"><h1>駐輪場予約サイト</h1></a>
            <details>
                <summary><?php if (isset($username) ){echo $username;} ?></summary>
                <li><a href="hr_detail.php">予約状況確認</a></li>
                <li><a href="logout.php">ログアウト</a></li>
            </details>
        </header>
        <div id="contents">
            <a href="index.php"><h1 id="backToTop">トップに戻る</h1></a>
            
            <div id="content_1">
                <h1>予約完了画面</h1>
                <h2>　以下の内容で予約が完了しました。下記の注意事項を確認の上、利用開始時刻の５分前までに駐輪場にお越しください。</h2>
                <table id="table_container">
                    <tr>
                        <td class="table_left">日時：</td><td class="table_right"><?php echo $MonthDate; ?></td>
                    </tr>
                    <tr>
                        <td class="table_left">時間帯：</td><td class="table_right"><?php echo $time; ?></td>
                    </tr>
                    <tr>
                        <td class="table_left">予約団体：</td><td class="table_right"><?php echo $username; ?></td>
                    </tr>
                </table>
                <h1>使用にあたって</h1>
                <p id="caution_1" class="caution">木材加工、ネジの打ち込み、電動工具の使用が可能</p>
                <p id="caution_2" class="caution">電動のこぎり、チェーンソー。釘の使用は禁止</p>
                <p id="caution_3" class="caution">使用可能な塗料は水性のもののみ(アクリル絵の具/ポスターカラーなど)</p>
                <p id="caution_4" class="caution">塗装の際はブルーシートの上に更に新聞紙等の雑紙を敷く</p>
            </div>
        </div>

        <!--jQuery読み込み-->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script>let table = document.getElementById("table_container");let add_code = "";</script>
    </body>
</html>