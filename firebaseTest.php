<?php
    require_once 'firebaseLib.php';
    // --- This is your Firebase URL
    $url = 'https://hackntu-c8663.firebaseio.com/';
    // --- Use your token from Firebase here
    $token = 'h1aX3FcGVNUMIxh1dGuqYmUQ7NFuRuaKiMFzsWgt';
    // --- Here is your parameter from the http GET
    $data1 = $_GET['data1'];
    $data2 = $_GET['data2'];
    $data3 = $_GET['data3'];
    $data4 = $_GET['data4'];
    // --- $arduino_data_post = $_POST['name'];
    // --- Set up your Firebase url structure here

    /// --- Making calls
    $fb = new fireBase($url, $token);

    date_default_timezone_set ('Asia/Taipei');
    $now = (string)date("YmdHis");
    echo $now;
    $response = $fb->set("/dataA/" . $now . "/data1/", $data1);
    $response = $fb->set("/dataA/" . $now . "/data2/", $data2);
    $response = $fb->set("/dataA/" . $now . "/data3/", $data3);
    $response = $fb->set("/dataB/" . $now . "/data4/", $data4);
    sleep(2);