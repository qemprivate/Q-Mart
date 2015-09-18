<?php

    include '../include/config.php';

    // Get admin email
      $sqlSettings = "SELECT * FROM settings";
      
      try{
        $querySettings = $db->query($sqlSettings);

        $querySettings->setFetchMode(PDO::FETCH_ASSOC);

        $rowSettings = $querySettings->fetch();

        }
        catch(PDOException $e) {
            die($e->getMessage());
        }

    // Send email
    $to = $rowSettings['email'];
    $from = $_REQUEST['email'];
    $subject = $_REQUEST['msubject'];
    $msg = $_REQUEST['message'];
    $header = "From: " . $from . "\r\n";
    mail($to, $subject, $msg, $header);


    // Go to product edit page
    $myUrl = "Location: ../index.php";
    header($myUrl);

?>