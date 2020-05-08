<?php
  session_start();
  $conn = mysqli_connect('localhost',아이디, 비밀번호, 데이터베이스명)
  #################################################################
?>
<!DOCTYPE html>
<html>

<head>
  <title>Online Test</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../templatedesign.css">

</head>
<body>
  <header>
    <a href="./tablelist.html">
      SKKU Online Test
    </a>
  </header>
  <nav>
    <ul>
      <h1>MENU</h1>
      <li><a href="./tablelist.html"> 시험 목록 </a></li>
      <li><a href="./tabledetail.html"> 시험 상세</a></li>
    </ul>
  </nav>

  <section>
    <form action="" method="GET">
      <div align="center">
        <h1>미응시</h1>
        <table id="list" style="margin-top: 30px">
          <tr class="table">
            <th>시험 이름</th> <!--시험을 클릭했을 경우 해당 시험이 뜨도록 -->
            <th>시험 시작</th>
          </tr>
          <!--<tbody>-->
          <!--테이블 내용은 데이터베이스 mysql에서 sorting상태로 내보내면 될듯-->
<?php
          $sqlquery - "SELECT * FROM candidate WHERE userid = examid";
          ###########################################################
          $result = mysqli_query($conn, $sqlquery);
          while($row = mysqli_fetch_array($result)){
            echo "<tr><td>".$row['testname']."</td><td><<input type='button' name='start' value='시작' onclick='alert('시험이 시작됩니다'); location.href='testpage.html''></td></tr>"
            ###################################################
            #####query의 column이름을 모르니 부탁################
            ###################################################
          }
?>

      </table>
    </div>
    </form>
    <hr color="#09331d">
    <div align="center">
      <h1>응시</h1>
      <table id="list" style="margin-top: 30px">
        <tr class="table">
          <th colspan="2">시험 이름</th>
          <th colspan="2">배점</th>
          <th colspan="2">총점</th>
        </tr>
<?php
        $sqlquery = "SELECT"; #이미 응시를 한 시험의 이름과 배점과 총점을 가져와야함
        #근데 밑에 배점표를 하나만 띄울 수 있으니 그냥
        #하나만 불러오자
        #하나만 불러오는거면 while문 안씀
        $result = mysqli_query($conn, $sqlquey);
        $row = mysqli_fetch_array($result);
        echo '<tr id="ox">
          <td id="ox" colspan="2">'.$row[시험이름].'</td>
          <td id="ox" colspan="2">'.$row[배점].'</td>
          <td id="ox" colspan="2">'.$row[총점].'</td>
        </tr>'
?>
        <tr>
          <td>1</td>
          <td>O</td>
          <td>2</td>
          <td>X</td>
          <td>3</td>
          <td>O</td>
        </tr>
        <tr>
          <td>4</td>
          <td>O</td>
          <td>5</td>
          <td>X</td>
          <td></td>
          <td></td>
        </tr>
?>
    </table>
    </div>
  </section>

  <footer> Copyright (c) 2019 Webprogramming </footer>
  <script>
    function starttest(testname){

      alert("시험이 시작됩니다.");
      location.href="testpage.html"+testname;
    }
  </script>

</body>

</html>
