<html>
  <head>
    <meta charset="utf-8">
    <title>Desafios</title>
    <link href="../style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" async
  src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.7/MathJax.js?config=TeX-MML-AM_CHTML"></script>
  </head>
  <body>
    <?php
    include "d3func.php";
      function QuestionBuilder(){
        $tipos = array(0,1,2,3,4,5);
        shuffle($tipos);
        $tipo = $tipos[0];
        $aux = $tipo == 0 ? inscrito() : ($tipo == 1 ? tales() : ($tipo == 2 ? alternos() : ($tipo == 3 ? trigonometria() : ($tipo == 4 ? pitagoras() : relacoes()))));
        $questao1 = "<p>1) $aux[0]</p>";
        $solucao1 = "<p>1) $aux[1]</p>";

        $tipo = $tipos[1];
        $aux = $tipo == 0 ? inscrito() : ($tipo == 1 ? tales() : ($tipo == 2 ? alternos() : ($tipo == 3 ? trigonometria() : ($tipo == 4 ? pitagoras() : relacoes()))));
        $questao2 = "<p>2) $aux[0]</p>";
        $solucao2 = "<p>2) $aux[1]</p>";

        $tipo = $tipos[2];
        $aux = $tipo == 0 ? inscrito() : ($tipo == 1 ? tales() : ($tipo == 2 ? alternos() : ($tipo == 3 ? trigonometria() : ($tipo == 4 ? pitagoras() : relacoes()))));
        $questao3 = "<p>3) $aux[0]</p>";
        $solucao3 = "<p>3) $aux[1]</p>";

        $GLOBALS['solucoes'] = "$solucao1<br><br>$solucao2<br><br>$solucao3<br><br>";
        return "$questao1 $questao2 $questao3";
      }

      $desafio = "3";
      $file = fopen("nomes.txt","r");
      $str = fread($file,filesize("nomes.txt"));
      $nomes = explode("\n",$str);
      fclose($file);
      for ($i = 0; $i < count($nomes)-1; $i++){
        // FOLHA DO ALUNO
        echo "<div class=\"pagina\">";
        echo "<br><br><br>";
        echo "<header>";
        echo "<h1>DESAFIO $desafio</h1>";
        echo "<h3>ALUNO(A): <i>$nomes[$i]</i> &nbsp &nbsp &nbsp NOTA:___</h3>";
        echo "</header>";
        echo "<main>";
        echo QuestionBuilder();
        echo "</main>";
        echo "</div>";
        // GABARITO
        echo "<div class=\"pagina\">";
        echo "<br><br><br>";
        echo "<header>";
        echo "<h1>DESAFIO $desafio</h1>";
        echo "<h3>ALUNO(A): <i>$nomes[$i]</i> &nbsp &nbsp &nbsp <b>GABARITO</b></h3>";
        echo "</header>";
        echo "<main>";
        echo $solucoes;
        echo "</main>";
        echo "</div>";
      }
    ?>
  </body>
</html>