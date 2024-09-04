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
        $aux = pir();
        $questao1 = "$aux[0]";
        $solucao1 = "$aux[1]";

        $aux = troncopir();
        $questao2 = "$aux[0]";
        $solucao2 = "$aux[1]";
        $GLOBALS['solucoes'] = "$solucao1<br><br>$solucao2";
        return "$questao1<br><br><br>$questao2";
      }

      $sala = $_POST["sala"];
      $desafio = "3";
      $file = fopen("Sala $sala.txt","r");
      $str = fread($file,filesize("Sala $sala.txt"));
      $nomes = explode("\n",$str);
      fclose($file);
      for ($i = 0; $i < count($nomes)-1; $i++){
        // FOLHA DO ALUNO
        echo "<div>";
        echo "<br><br><br>";
        echo "<header>";
        echo "<h1>SALA $sala<br>DESAFIO $desafio</h1>";
        echo "<h3>ALUNO(A): <i>$nomes[$i]</i> &nbsp &nbsp &nbsp NOTA:___</h3>";
        echo "</header>";
        echo "<main>";
        echo QuestionBuilder();
        echo "</main>";
        echo "</div>";
        // GABARITO
        echo "<div>";
        echo "<br><br><br>";
        echo "<header>";
        echo "<h1>SALA $sala<br>DESAFIO $desafio</h1>";
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