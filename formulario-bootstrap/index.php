<html>
<head>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
      
      
<body><div class="container">
 <h2>レスポンシブテーブル</h2>
  <p>Bootstrapを使ったレスポンシブテーブルにテスト用のデータベースの内容をアップ</p>
      <table class="table">
    <thead>  
      
  <tr class="danger">
    <th>Código:</th>
    <th>Descri&ccedil;&atilde;o</th>
      </tr>
<?php include("conn.php");
	$consulta = mysqli_query($con,"SELECT * FROM `departamento`;");$num = mysqli_num_rows($consulta);
	$usuario = mysqli_fetch_assoc($consulta);
        $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
        $cmd = "select * from departamento";
        $departamento = mysqli_query($con,$cmd);
        $total = mysqli_num_rows($departamento);
        $registros = 10;
        $numPaginas = ceil($total/$registros);
        $inicio = ($registros*$pagina)-$registros;
        $cmd = "select * from departamento limit $inicio,$registros";
        $departamento = mysqli_query($con,$cmd);
        $total = mysqli_num_rows($departamento);
        while ($departamentos = mysqli_fetch_array($departamento)) {
			echo"<tr >";
			echo"<td>".  $departamentos['cod_depto']. "</td>";
                        echo"<td>". $departamentos['descr_depto']."</td>";
   echo"</tr>";} ?>  </tbody></table></div>

<br><center><font size="3" face="Verdana"><?php 
for($i = 1; $i < $numPaginas + 1; $i++) {
      echo "<a href='index.php?pagina=$i'>".$i."</a> ";  } ?><br><br>
</font></center>
</div>     
    </body>
</html>