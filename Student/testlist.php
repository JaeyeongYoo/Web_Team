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
      <li><a href="./tablelist.html">시험 목록</a></li>
      <li><a href="./testdetail.html">시험 상세</a></li>
    </ul>
  </nav>

  <section>
    <h1>시험 목록</h1>
      <div align="right">
        <div class="info1">
        <form action="testlist.php" method="POST">
          <select id="opt" name="Sorted_By" onchange="optionValue()">
            <option value="testname">시험명</option>
            <option value="profname">교수자명</option>
            <option value="valid">응시/미응시</option>
          </select>
        </div>
        <div class="info2">
          <input type="text" id="input" name="TestName" placeholder="시험을 검색하시오">
          <input type="submit" name="sorted" value="확인">
        </div>
        </form>
      </div>
      <div align="center">
        <table id="list">
          <tr class="table">
            <th>시험명</th>
            <th>생성자명</th>
            <th>응시기간</th>
            <th>응시여부</th>
            <th>성적</th>
            <th>총배</th>
          </tr>
          <!--<tbody>-->
          <!--테이블 내용은 데이터베이스 mysql에서 sorting상태로 내보내면 될듯-->
<?php
          if(isset[$_POST['Sorted_by']]) and isset($_POST['TestName'])){
            $sort_value = $_POST['Sorted_by'];
            $test_value = $_POST['TestName'];

            $sqlquery = "SELECT * FROM 테이블 WHERE 테스트이름 LIKE '%$test_value$' ORDERED BY $sort_value DESC";
            #######################################################333333333

            $result = mysqli_query($conn, $sqlquery);
            while($row = mysqli_fetch_array($result)){
              echo '<tr>
                <td>'.$row[시험이름].'</td>
                <td>'.$row[교수이름].'</td>
                <td>'.$row[응시기간].'</td>
                <td>'.$row[응시여부/없으면 그냥 html형으로 넣으셈].' </td>
                <td>5/25</td>
                <td>90</td>
              </tr>'
              ##############################################################3
            }
          }

?>
      </table>
    </div>
  </section>

  <footer> Copyright (c) 2019 Webprogramming </footer>

  <script>
    function searching(){
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById('input');
      filter = input.value.toUpperCase();
      table = document.getElementById("list");
      tr = table.getElementsByTagName("tr");

      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];

        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter)>-1){
            tr[i].style.display = "";
          }
          else{
            tr[i].style.display = "none";
          }
        }
      }
    }
  </script>

</body>

</html>
