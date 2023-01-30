<!DOCTYPE html>
<html lang="vn">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning view in Laravel</title>
</head>
<body>
    <header>  <h1>Header -Home</h1> 
<!-- <h2><?php //echo $datatitle ?></h2> -->
   <h2><?php //echo $title ?></h2>
 </header>
    <main>
        <H1>Noi dung 1</H1>
        <!-- <h2><?php// echo $contentdata ?></h2> -->
        <h2><?php //echo $content ?></h2>
    </main>
    <footer>
        <h1>FOOTER -Home</h1>
      <!-- <h2><?php //echo $footerdata ?></h2> -->
        <h2><?php //echo $footer?></h2>
        <h1>{{$Webcome}}</h1>
    </footer>
    <hr>
@for ($i=1;$i<10;$i++)
    <p>Phan tu: {{$i}}</p>
@endfor
</body>
</html>