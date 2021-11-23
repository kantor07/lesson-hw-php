<?php
/*
    1. Создать галерею изображений, состоящую из двух страниц:
	    • просмотр всех фотографий (уменьшенных копий);
	    • просмотр конкретной фотографии (изображение 
          оригинального размера) по ее ID в базе данных.
    2. В базе данных создать таблицу, в которой будет храниться 
        информация о картинках (адрес на сервере, размер, имя).
    3. *На странице просмотра фотографии полного размера под 
        картинкой должно быть указано число ее просмотров.
    4. *На странице просмотра галереи список фотографий должен 
        быть отсортирован по популярности. Популярность = число кликов по фотографии.
*/

$link = mysqli_connect('localhost','root','19041983','db_photo_gallery');

$photos = mysqli_query($link, 'SELECT id, address_photo FROM photos ORDER BY view_count DESC');
if(!$photos)exit(mysqli_error());
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
<?php 
while($photo = mysqli_fetch_assoc($photos)) {
    echo 
    '<a href="page2.php?bigImage=' . $photo ['id'] . '">
    <img class= "img" src=' . $photo ['address_photo']. '></a>';
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