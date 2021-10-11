<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>conversão de moedas api</title>
</head>
<body>
<?php

    $uri = $_SERVER["REQUEST_URI"];
    $url = explode('/',$uri);

    $convercao["valorConvertido"] = $url[2]*$url[5];

    if((count($url) != 6) or ($url[5] == '')){
        echo 'a url deve ser no seguinte formato : http://localhost:8000/exchange/{amount}/{from}/{to}/{rate}';
        return 'a url deve ser no seguinte formato : http://localhost:8000/exchange/{amount}/{from}/{to}/{rate}';
    }

    if(($url[3] == 'BRL') or ($url[3] =='USD') or ($url[3] =='EUR')) {
        switch ($url[4]) {
            case "USD":
                $convercao["simboloMoeda"] = "$";
                break;
            case "EUR":
                $convercao["simboloMoeda"] = '€';
                break;
            case "BRL":
                $convercao["simboloMoeda"] = "R$";
                break;
            default:
                echo 'a url deve ser conter BRL, USD, ou EUR. para as moedas q serao convertidas';
                return 'a url deve ser conter BRL, USD, ou EUR. para as moedas q serao convertidas';
        }
    }
    else{
        echo ' a moeda a ser convertida deve ser: BRL, USD ou EUR';
        return ' a moeda a ser convertida deve ser: BRL, USD ou EUR';
    }
    if($url[3] == $url[4]){
        echo 'deve se converter de uma moeda para outra';
        return 'deve se converter de uma moeda para outra';
    }

    var_dump($convercao);
    $convercao = json_encode($convercao);

    echo $convercao;
?>
</body>
</html>