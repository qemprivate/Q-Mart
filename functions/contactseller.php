<?php

    include '../include/config.php';

    // Get seller email
    $sqlSeller = "SELECT email FROM users WHERE id=" . $_REQUEST['sid'];

    try{
        $query = $db->query($sqlSeller);

        $query->setFetchMode(PDO::FETCH_ASSOC);

        $row = $query->fetch();

        $to = $row['email'];

        }
        catch(PDOException $e) {
            die($e->getMessage());
        }

    // Send email
    $from = $_REQUEST['email'];
    $subject = $_REQUEST['mtitle'];
    $msg = $_REQUEST['msg'];
    $header = "From: " . $_REQUEST['email'] . "\r\n";
    mail($to, $subject, $msg, $header);


    // Go to product edit page
    $myUrl = "Location: ../product.php?id=" . $_REQUEST['pid'];
    header($myUrl);

?>