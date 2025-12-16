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
    include "d2func.php";
      function QuestionBuilder(){
        $tipo = rand(0,4);
        $aux = $tipo == 0 ? triLLL() : ($ipo == 1 ? triLAL() : ($tipo == 2 ? triALA() : ($tipo == 3 ?trap() : paral())));
        $questao1 = "$aux[0]";
        $solucao1 = "$aux[1]";

        $aux = semTri();
        $questao2 = "$aux[0]";
        $solucao2 = "$aux[1]";

        $GLOBALS['solucoes'] = "$solucao1<br><br>$solucao2<br><br>";
        return "$questao1 $questao2";
      }

      $desafio = "2";
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