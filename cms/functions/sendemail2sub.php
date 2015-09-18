<?php

    include '../../include/config.php';

    // Get admin email
    $sqlAdmin = "SELECT * FROM settings";

    try{
        $query = $db->query($sqlAdmin);

        $query->setFetchMode(PDO::FETCH_ASSOC);

        $row = $query->fetch();

        $from = $row['email'];

        }
        catch(PDOException $e) {
            die($e->getMessage());
        }

    
    // Get Subscribers Emails
    $sqlSubscribers = "SELECT * FROM subscribers";

    $subject = $_REQUEST['mtitle'];
    $msg = $_REQUEST['msg'];
    $header = "From: " . $from . "\r\n";

    foreach ($db->query($sqlSubscribers) as $rowEmail) {

        // Send email
        $to = $rowEmail['subscriber'];
        
        mail($to, $subject, $msg, $header);

    }



    // Go to product edit page
    $myUrl = "Location: ../index.php?p=sendemail";
    header($myUrl);

?>