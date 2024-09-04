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
      function QuestionBuilder(){
        
        $questao1 = "<p>1 - </p>";

        
        $solucao1 = "<p><b>1) R: </b></p>";

        
        $questao2 = "<p>2 - </p>";

        
        $solucao2 = "<p><b>2) R:</b></p>";


        $questao3 = "<p>2 - </p>";


        $solucao3 = "<p><b>2) R:</b></p>";

        $GLOBALS['solucoes'] = "$solucao1<br><br>$solucao2<br><br>$solucao3";
        return "$questao1<br><br><br><br><br><br><br><br><br><br><br><br>$questao2<br><br><br><br><br><br><br><br><br><br><br><br>$questao3<br><br>";
      }

      $sala = $_POST["sala"];
      $desafio = "1";
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