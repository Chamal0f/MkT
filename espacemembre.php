<?php include('connexionbdd.php'); ?>
    <?php session_start(); ?>
        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="utf-8" />
            <link rel="stylesheet" href="SiteMkT.css" />
            <title>Team MkT</title>
         
        </head>

        <body>
          
            <?php include('header.php'); ?>
           
         <?php include("footer.php"); ?>
              
          <?php if(isset($_SESSION['pseudo'])){ include("chat.php");} ?>
       
                  
        </body>

        </html>