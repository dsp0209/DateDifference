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
<html>
    <head>
        <title>Soap клиент</title>
    </head>
    <body>
        <form method="POST" action="">
            <input type="text" name="startDate">
            <input type="text" name="endDate">
            <input type="submit" value="Отправить">
        </form>
        <?php
        if(isset($result)){
         echo $result;
      }
        ?>
    </body>
</html>
