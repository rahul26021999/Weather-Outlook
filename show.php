<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Weather main</title>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtutXhEzPAscNfF_Qnx7MOPbfx1WqFvWc&libraries=places&callback=initMap" async defer></script>

    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- stylesheet -->
    <link href="StyleSheet/show.css" type="text/css" rel="stylesheet">
    <!-- script -->
    <script src="index.js" type="text/javascript"></script>

</head>

<body>

    <?php
        if($_GET["temp_type"] == "f"){
            $temp_type = "f";
            
        }else{
            $temp_type ="c";
        }
    ?>
    <h1>Weather Outlook</h1>
    <?php
        include 'dailyWeather.php';
        $date =date("d", substr($array_1[1]["time"], 0, 10));
        $day = date("l", $array_1[1]["time"]);
        if (strpos($array_1[1]['summary'], 'cloudy')) {
            $className = 'fas fa-cloud-sun';
        }
        else if (strpos($array_1[1]['summary'], 'clear')) {
            $className = 'fas fa-sun';
        }
        else if (strpos($array_1[1]['summary'], 'rainy')) {
            $className = 'fas fa-cloud-showers-heavy';
        }
        else if (strpos($array_1[1]['summary'], 'Foggy')) {
            $className = 'fas fa-smog';
        }
        else{
            $className = 'fas fa-sun';
        }
        if($temp_type == "c")
        {
            $main_temp = ($array_1[1]["temperatureHigh"] - 32) * 5/9 ;
        }else{
            $main_temp = $array_1[1]["temperatureHigh"];
        }
        echo '<div class="main_date">'.$day.' '.$date.'</div>';
        echo '<div class="'.$className.' main_big_icon"></div>';
        echo '<div class="main_temperature">'.round($main_temp).'</div>';
        echo '<div class="main_summary">'.$array_1[1]["summary"].'</div>';
        echo '<div class="main_wind">Wind Speed : '.$array_1[1]["windSpeed"].'</div>';
        echo '<div class="main_visibility">Visibility : '.$array_1[1]["visibility"].'</div>';
        echo '<div class="main_humidity">Humidity : '.$array_1[1]["humidity"].'</div>';


        include 'hourlyWeather.php';
        echo '<hr class="marginTop">';
        echo '<div class="heading">Daily</div>';
        echo '<hr>';
        echo '<div id="wrapper">';
            foreach($array_1 as $key => $value)
            {
                if (strpos($value['summary'], 'cloudy')) {
                    $className = 'fas fa-cloud-sun';
                }
                else if (strpos($value['summary'], 'clear')) {
                    $className = 'fas fa-sun';
                }
                else if (strpos($value['summary'], 'rainy')) {
                    $className = 'fas fa-cloud-showers-heavy';
                }
                else if (strpos($value['summary'], 'Foggy')) {
                    $className = 'fas fa-smog';
                }
                else{
                    $className = 'fas fa-sun';
                }
                if($temp_type == "c")
                {
                    $tempHigh = ($value["temperatureHigh"] - 32) * 5/9 ;
                    $tempLow=($value["temperatureLow"] - 32) * 5/9 ;
                }else{
                    $tempHigh = $value["temperatureHigh"];
                    $tempLow=$value["temperatureLow"];
                }
                
                $date =date("d", substr($value["time"], 0, 10));
                $day = date("l", $value["time"]);
                echo '<div id="box">';
                echo '<div id="date">'.$day.' '.$date.'</div>';
                    echo '<div class="'.$className.' main_icon"></div>';
                    echo '<div id="temp">';
                        echo '<div id="high_temp">'.round($tempHigh).'<span class="fas fa-temperature-high temp_icon" style="font-size:17px;"></span></div>';
                        echo '<div id="low_temp">'.round($tempLow).'<span class="fas fa-temperature-low temp_icon" style="font-size:10px;"></span></div>';
                    echo '</div>';
                    echo '<div id="summary">'.$value["summary"].'</div>';
                echo '</div>';
                    
            }
            echo '</div>';
            echo '<hr>';

            echo '<div class="heading">Hourely</div>';
            echo '<hr>';
            echo '<div id="wrapper">';
                foreach($array_hourly as $key => $value)
                {
                    if (strpos($value['summary'], 'cloudy')) {
                        $className = 'fas fa-cloud-sun';
                    }
                    else if (strpos($value['summary'], 'clear')) {
                        $className = 'fas fa-sun';
                    }
                    else if (strpos($value['summary'], 'rainy')) {
                        $className = 'fas fa-cloud-showers-heavy';
                    }
                    else if (strpos($value['summary'], 'Foggy')) {
                        $className = 'fas fa-smog';
                    }
                    else{
                        $className = 'fas fa-sun';
                    }
                    if($temp_type == "c")
                    {
                        $main_temp = ($value["temperature"] - 32) * 5/9 ;
                    }else{
                        $main_temp = $value["temperature"];
                    }
                            $date =date("H", substr($value["time"], 0, 10));
                            echo '<div id="box">';
                            echo '<div id="date">'.$day.' '.$date.'</div>';
                            echo '<div class="'.$className.' main_icon"></div>';
                                echo '<div id="temp">';
                                    echo '<div id="high_temp">'.round($main_temp).'<span class="fas fa-temperature-high" style="font-size:10px;"></span></div>';
                                echo '</div>';
                                echo '<div id="summary">'.$value["summary"].'</div>';
                            echo '</div>';
                        
                }
                echo '</div>';
     
     ?>
</body>

</html>