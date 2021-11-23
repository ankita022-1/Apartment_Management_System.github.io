<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">
    <style >
        *{
            margin: 0;
            padding: 0;
            box-sizing:border-box ;
        }
        .body{
            background-image: url('css/bg_image/apt_bg2.jpeg');
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;

        }
        .t_form{
            position: absolute;
            top: 10px;
            right: 10px;
        }
        .bg_box{
            width: 95vw;
            height: 95vh;
           display: flex;
           justify-content: center;
           align-items: center;
        }
        .bg_img{
            background-color: black;
            border-radius: 20px;
            opacity: 0.8;            
            animation-name: img;
            animation-duration: 3s;
            animation-fill-mode: forwards;
            animation-timing-function: ease-out;
        }
        #para{
            text-align: center;
            margin: 10px;
            color: white;            
            font-weight: bold;
        }
        @keyframes img{
            0%{
              font-size: 0rem;  
            }
            100%{
                font-size: 2rem;
            }
        }

    </style>
    <!-- Custom CSS -->
    <!-- <link rel="stylesheet" href="app.css"> -->
    <title>Apartment Management System</title>
</head>

<body class="vh-100 gradient-custom align-items-left body" id="bod">
    <header class="bg-dark text-white col px-md-2 py-md-2">
        <div class="h2 d-inline-flex ">Apartment Management System
        </div>
        <form action="" method="POST" class='t_form'>
            <button class="btn btn-outline-success my-2 my-sm-0 " type="submit" name="submit1">HOME PAGE</button>
            <button class="btn btn-outline-success my-2 my-sm-0 " type="submit" name="submit2">Tenant login </button>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit3">Admin login</button>
        </form>
        <?php
             if(isset($_POST['submit1'])){
               header('Location:index.php');
             }
             if(isset($_POST['submit2'])){
               header('Location:tenant/login.php');
             }
             if(isset($_POST['submit3'])){
               header('Location:admin/login.php');
             }
    
         ?>
    </header>

   <div class="bg_box" style="border-radius: 1rem;">
        <div class="bg_img"><p id="para">WELCOME TO OUR APARTMENT MANAGEMENT SYSTEM </p></div>
    </div>
</body>
</html>
