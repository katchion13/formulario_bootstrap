<html>
<head>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<style>
nav.cp_navi *, nav.cp_navi *:after, nav.cp_navi *:before {
	-webkit-box-sizing: border-box;
	        box-sizing: border-box;
}
nav.cp_navi a {
	text-decoration: none;
}
nav.cp_navi {
	margin: 2em 0;
	text-align: center;
}
.cp_navi .cp_pagination {
	display: inline-block;
	margin-top: 0em;
	padding: 0 0.5em;
	color:#fff;
	background-color: #edced0;
}
.cp_navi .cp_pagenum {
	font-size: 1em;
	line-height: 2.5em;
	display: block;
	float: left;
	padding: 0 25px;
	transition: 400ms ease;
	letter-spacing: 0.1em;
	color: #ffffff;
}
	
.cp_navi .cp_pagenum:hover,
.cp_navi .cp_pagenum.current {
	font-weight: bold;
	color: #ffffff;
	background-color: #ffe4e1;
}
.cp_navi .cp_pagenum.prev:hover,
.cp_navi .cp_pagenum.next:hover {
	color: #ffe4e1;
	background-color: transparent;
}
@media only screen and (max-width: 960px) {
	.cp_navi .cp_pagination {
		margin-top: 50px;
		padding: 0 10px;
	}
	.cp_navi .cp_pagenum {
	font-size: 0.8em;
	line-height: 2.5em;
	padding: 0 15px;
	}
	.cp_navi .cp_pagenum.prev,
	.cp_navi .cp_pagenum.next {
		padding: 0 10px;
	}
}
@media only screen and (min-width: 120px) and (max-width: 767px) {
	.cp_navi .cp_pagenum {
	display: none;
	padding: 0 14px;
	}
	.cp_navi .cp_pagenum:nth-of-type(2) {
	position: relative;
	padding-right: 50px;
	}
	.cp_navi .cp_pagenum:nth-of-type(2)::after {
	font-size: 1.2em;
	position: absolute;
	top: 0;
	left: 45px;
	content: '...';
	}
	.cp_navi .cp_pagenum:nth-child(-n+3),
	.cp_navi .cp_pagenum:nth-last-child(-n+3) {
		display: block;
	}
	.cp_navi .cp_pagenum:nth-last-child(-n+4) {
		padding-right: 14px;
	}
	.cp_navi .cp_pagenum:nth-last-child(-n+4)::after {
		content: none;
	}
	.cp_navi .cp_pagenum.prev,
	.cp_navi .cp_pagenum.next {
		padding: 0 5px;
	}
</style>
  
  
</head>
      
      
<body><div class="container">
 <h2>専門課程のお勉強ページ
 </h2>
  <p>Bootstrapを使ったレスポンシブテーブルにテスト用のデータベースの内容をアップ</p>
      <table class="table"><thead><tr class="danger">
    <th width="3% "> ID:</th>
  <th width="7% ">ページ:     </th>
 <th width="45% "> 正解:</th>
 <th width="45% "> 間違い:</th></tr>
<?php include("conn.php");
	$consulta = mysqli_query($con,"SELECT * FROM `senmon_katei`;");$num = mysqli_num_rows($consulta);
	$usuario = mysqli_fetch_assoc($consulta);
        $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
        $cmd = "select * from senmon_katei";
        $departamento = mysqli_query($con,$cmd);
        $total = mysqli_num_rows($departamento);
        $registros = 5;
        $numPaginas = ceil($total/$registros);
        $inicio = ($registros*$pagina)-$registros;
        $cmd = "select * from senmon_katei limit $inicio,$registros";
        $departamento = mysqli_query($con,$cmd);
        $total = mysqli_num_rows($departamento);
        while ($departamentos = mysqli_fetch_array($departamento)) {
			echo"<tr >";
			echo"<td>".  $departamentos['ID']. "</td>";
	    	    echo"<td>". $departamentos['pg']."</td>";
                        echo"<td>". $departamentos['ok']."</td>";
                        echo"<td>". $departamentos['not01']."</td>";
   echo"</tr>";} ?>  </tbody></table></div>
<center><font size="3" face="Meiryo" color=" #000"><?php echo "<div class=cp_navi>";
            echo "<div class=cp_pagination>";
                for($i = 1; $i < $numPaginas + 1; $i++) {
                    echo "<span aria-current=page class=cp_pagenum current><a href='index.php?pagina=$i'>".$i."  </a> </span>"; } 
            echo "</div>";
     echo "</div>";      
?>
</font></center>
    </body>
</html>

