<!DOCTYPE html>
<html lang="ja">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title>PHPのふぉーむ</title>
</head>

<body>
    <h2>構成設定確認</h2>
    <?php
        //入力フォームの内容を取得する。
        $name=@trim($_POST['name']);
        $ip=@trim($_POST['ip']);
        $power=@trim($_POST['power']);
        $cool=@trim($_POST['cool']);
        if(isset($_POST['fan'])){
            $fan = $_POST['fan'];
        }else{
            $fan=array();
        }
        $kvm=@trim($_POST['kvmForm']);
        $color=@trim($_POST['color']);

        //power
        if($power=="F"){
            $power = "フルパワー";
        }else if($power=="B"){
            $power= "バランス";
        }else{
           $power= "エコ";
        }

        //cool
        if($cool=="H"){
            $cool = "ハイ";
        }else if($cool=="M"){
            $cool= "ミドル";
        }else{
           $cool= "ロー";
        }

        //fan
        $fanList = "";
        foreach($fan as $h){
            switch($h){
                case "fan1":
                    $fanList .= "●FAN1<br/>";
                    break;
                case "fan2":
                    $fanList .= "●FAN2<br/>";
                    break;
                case "fan3":
                    $fanList .= "●FAN3<br/>";
                    break;
                case "fan4":
                    $fanList .= "●FAN4<br/>";
                    break;
                case "fan5":
                    $fanList .= "●FAN5<br/>";
                    break;
                case "fan6":
                    $fanList .= "●FAN6<br/>";
                    break;
                case "fan7":
                    $fanList .= "●FAN7<br/>";
                    break;
                case "fan8":
                    $fanList .= "●FAN8<br/>";
                    break;
                default:
                    break;
            }     
        }
        if($fanList==""){
            $fanList="直ちにFANを追加してください。";
        }

        //kvm
        if($kvm=="1"){
            $kvm = "利用可";
        }else{
           $kvm= "利用不可";
        }

        //outPut
        echo "<table border=\"1\"  style=\"background-color: ".$color.";\">\n";
        echo "<tr><td>ホスト名</td><td>" . $name . "</td></tr>\n";
        echo "<tr><td>IPアドレス</td><td>" . $ip . "</td></tr>\n";
        echo "<tr><td>電源</td><td>" . $power . "</td></tr>\n";
        echo "<tr><td>冷却</td><td>" . $cool . "</td></tr>\n";
        echo "<tr><td>使用FAN</td><td>" . $fanList . "</td></tr>\n";
        echo "<tr><td>KVM利用</td><td>" . $kvm . "</td></tr>\n";
        echo "</table>\n";
    ?>
    <p><a href="index.html">フォームに戻る</a></p>
</body>
</html>