<?php
function validateDate($date, $format = 'Y-m-d')
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}
if(!empty($_POST['startDate']) && !empty($_POST['endDate'])){
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];
if(validateDate($startDate) == TRUE && validateDate($endDate) == TRUE){
if($startDate < $endDate){
    $client = new SoapClient(
    "http://localhost/soapserv/dateDifference.wsdl" );
$result = $client->getDateDifference($startDate,$endDate);
}else{
    echo "Некорректная дата";
}
}else{
print("Не правильный формат даты");
}
}
?>
<!doctype html>
<html>
    <head>
        <title>Soap клиент</title>
        <link rel="stylesheet" href="CSS/style.css">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta charset="utf-8">
        
    </head>
    <body>
        <header>
            <div class="logo">
                DEAMON
            </div>
        </header>
       
        <div class="main-content">
            <form method="POST" action="" class="main-content">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
                        <input type="text" name="startDate" placeholder="Введите начальную дату:">   
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
                        <input type="text" name="endDate" placeholder="Введите конечную дату:">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                        <input type="submit" value="Отправить">
                    </div>
                </div> <!---- End .row ----->        
            </form>  
        </div><!---- End .main-content ---->
        
        <footer>
            Copyright © 2016 <a href="https://vk.com/pastushenko_danial" target="_blank">Demon.ru</a>
        </footer>
        
        <?php
        if(isset($result)){
         echo $result;
      }
        ?>
    </body>
</html>
