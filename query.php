<?php

if($_GET['name'] != "" && $_GET['email'] != "" && $_GET['query'] != "") {
  include_once("../includes/db_config.php");
  include_once("../includes/function.php");
  
  $name = sanitize_db_input($_GET["name"]);
  $email = sanitize_db_input($_GET["email"]);
  $query = sanitize_db_input($_GET["query"]);
  
  $sql  = "INSERT INTO query (name, email, query)";
  $sql .=  " VALUES('$name', '$email', '$query')";
  
  if ($db->query($sql)) {
      $msg = "Your Query Has be sucessfully noted. We'll get back to you as soon as possible.";
    }
    
    else {
      $msg = "Oops! Something is not right! Try Again later";
    }
}
else {
  $msg = "Oops! Something is not right! Try Again later";
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SINTACS '16 | Submit Query</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3-theme-black.css">
    <style>

        * {
            line-height: 1.2;
            margin: 0;
        }

        html {
            color: #888;
            display: table;
            font-family: sans-serif;
            height: 100%;
            text-align: center;
            width: 100%;
        }

        body {
            display: table-cell;
            vertical-align: middle;
            margin: 2em auto;
          background-color: #f2f2f2;
        }

        h1 {
            color: #555;
            font-size: 2em;
            font-weight: 400;
        }

        p {
            margin: 0 auto;
            width: 280px;
        }

        @media only screen and (max-width: 280px) {

            body, p {
                width: 95%;
            }

            h1 {
                font-size: 1.5em;
                margin: 0 0 0.3em;
            }

        }

    </style>
</head>
<body>
    
          <form class="w3-container w3-card-4 w3-padding-16 w3-white">
          <h1><?php echo $msg; ?></h1>
      <button type="button" class="w3-btn w3-right w3-theme" onClick="window.location.href='http://sintacs.co.in/'">Back</button>
      </form>
</body>
</html>
