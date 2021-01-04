<!DOCTYPE html>
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
 <title>Webシステム</title>
</head>
<body>
  <h1>Webシステム</h1>
    <?php
      $link = mysqli_init();
      //connect
      $db = mysqli_real_connect(
        $link, 'localhost', 'adminnn', 'passwordd', 'support_db', 3334);
      if (! $db) {
        exit ('MySQLには接続できません．');
      }
      mysqli_set_charset($link, 'utf8');

      //初期化
      $kamoku = "";
      $sel = 1;
      if(isset($_GET['kamoku'])) {
        // 入力フォームの内容を取得する
        $kamoku = @trim($_GET['kamoku']);
        $sel = @trim($_GET['q1']);
        // selectコマンドを実行する
        if($sel == 1){
          $query="SELECT kamoku, gakusei_t.snumber, sname
                  FROM risyu_t, gakusei_t
                  WHERE 
                  risyu_t.snumber = gakusei_t.snumber
                  AND
                  kamoku LIKE '%$kamoku%'
                  ;";
        }else if($sel == 2){
          $query="SELECT kamoku, gakusei_t.snumber, sname
                  FROM risyu_t, gakusei_t
                  WHERE 
                  risyu_t.snumber = gakusei_t.snumber
                  AND
                  kamoku LIKE '$kamoku'
                  ;";
        }

        $result = mysqli_query($link, $query);
        if (! $result) {
          exit ('コマンドを実行できません．');
        }
      }
    ?>

    <form action="" method="GET">
    <p>
    科目名：<input type="text" name="kamoku" value=" <?php echo $kamoku; ?> "/>
    <br />
    条　件：
    <?php
      if($sel == 1 ){
        echo '<input type="radio" name="q1" value="1" checked> 部分一致';
        echo '<input type="radio" name="q1" value="2"> 完全一致';
      }else if($sel == 2){
        echo '<input type="radio" name="q1" value="1"> 部分一致';
        echo '<input type="radio" name="q1" value="2" checked> 完全一致';
      }
    ?>
    <br />
    <input type="submit" value="送信する"/>
    </p>
    </form>

    <p>
    <?php
      if (isset($kamoku) != "" ) {
        //title
        echo "<table border = \"1\">\n";
        echo "<tr>\n";
        echo "<th>科目名</th>\n";
        echo "<th>履修者ID</th>\n";
        echo "<th>履修者氏名</th>\n";
        echo "</tr>\n";

        //data
        $row_cnt = $result->num_rows;
        for($i=0;$i < $row_cnt;$i++){      
          $row = mysqli_fetch_array($result);
          echo "<tr>\n";
          echo "<td align='right'>" . $row['kamoku'] . "</td>\n";
          echo "<td>" . $row['snumber'] . "</td>\n";
          echo "<td>" . $row['sname'] . "</td>\n";
        }
        echo "</tr>\n";
        echo "</table>\n";
      } 
    ?>
    </p>
</body>
</html>
