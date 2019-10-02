<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Weather main</title>

    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php require("API_KEY.php");?>&libraries=places&callback=initMap" async defer></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- stylesheet -->
    <link href="StyleSheet/index.css" type="text/css" rel="stylesheet">
    <!-- script -->
    <script src="index.js" type="text/javascript"></script>

</head>

<body onload="initialize();">
    <div id="wrapper">
        <div id="brandName">Weather Outlook</div>
        <div id="title_type">Personalise your weather content</div>
        <hr>
        <div id="title_type">Show Temperature In</div>
        <form action="show.php" method="GET" onsubmit="return checkForLocation();">
            <div id="radio_container">
                <input type="radio" name="temp_type" value="f" checked>
                <label>Fahrenheit</label>
                <input type="radio" name="temp_type" value="c">
                <label>Celsius</label>
            </div>
            <div id="checkbox_container">
                <input type="checkbox" name="auto_detect" id="auto_detect" onclick="autoDetect();">
                <label>Detect my location</label>
            </div>
            <br>
            <input id="autocomplete" placeholder="Enter your address" onfocus="geolocate()" type="text"></input><br>
            <input type="hidden" id="lat" name="lat">
            <input type="hidden" id="long" name="long">
            <input type="submit" value="start">
        </form>
    </div>

</body>

</html>