<?php
/*
    Строить фотогалерею, не указывая статичные ссылки к файлам, 
    а просто передавая в функцию построения адрес папки с 
    изображениями. Функция сама должна считать список файлов и 
    построить фотогалерею со ссылками в ней.
*/
$dirs = scandir('./images');                //проверяем есть ли в текущей папке папка images 
$images = [];                               //создаем пустой массив images
foreach ($dirs as $dir) {                   //перебираем содержимое папки images
    if ($dir !== '.' && $dir !== '..') {    //выбираем не папки
        if (!is_file($dir)) {                //находим файлы
            $images[] = $dir;               //передаем все найденые файлы в массив images
        }
    }
}
?> 

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Фотогалерея</title>
</head>
<body>
<header>
        <div class='headerText'>Фотогалерея</div>
</header>
<main>
<div class= "imgDiv">
<? foreach($images as $image) {
   echo 
   '<a href="/images/' . $image . '" target="_blank">
   <img class= "img" src="/images/' . $image . '"></a>';
}
?>
</div>
</main>
</body>
</html>


<style type="text/css">
 /*стилей не много, поэтому не подключала их отдельно*/
body {
    background-color: #d8da3d; 
}

.headerText {
    color:green;
    font-size: 30px;
    text-align: center;
    padding-bottom: 10px;
}

.imgDiv {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    flex-wrap: wrap;
    margin: 10px; 

}
.img {
    max-width: 300px;
    height: 200px;
    border: 2px solid green;
    margin: 10px;
} 

.img:hover {
    transform: scale(1.3); 
    border: 5px solid black; 
}
</style>