<?php
session_start();

    include("classes/connect.php");
    include("classes/login.php");

    $email = "";
    $password = "";

    if(isset($_SESSION['userid']))
    {
        unset($_SESSION['userid']);
    }else{
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $login = new Login();
        $result = $login->evaluate($_POST);

        if($result != "")
        {
        }else
        {
            header("Location: home.php");
            die;
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

    }
?>
<htm lang="eng">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HelloKitty</title>

        <!-- ICON -->
        <link rel="icon" type="image/x-icon" href="images/icon/logo.jpg">

        <link rel="stylesheet" href="cursor.css">

        <!-- Online CSS -->
        <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    </head>
    <style>
        /* Regular CSS */
        a{
            text-decoration: none;
        }
        .round{
            font-family: Varela Round;
        }
        .padding{
            padding: 10rem 8rem 0rem 8rem;
        }
        .small{
            font-size: 0.9rem;
        }
        .regular{
            font-size: 1rem;
        }
        .large{
            font-size: 2rem;
        }
        .x-large{
            font-size: 3rem;
        }
        .maxvh{
            height: 100%;
        }
        .white{
            color: #f2f2f2;
        }
        .big{
            font-weight: bold;
        }
        .pink-bg{
            background-color:#f2559a;
        }
        .black-bg{
            background-color: #000;
        }
        .black{
            color: #000;
        }
        .pink{
            color: #f2559a;
        }
        /* Custom CSS */
        .input input{
            font-weight: light;
            width:  100%;
            padding: 0.2rem 0.5rem 0.2rem 0.5rem;
            margin-bottom: 0.5rem;
            border-radius: 0.5rem;
            border: 1px solid #f2559a;
        }
        .desc{
            background-image: url("images/bg.webp");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
        .input p{
            font-weight: bold;
            margin-bottom: -0.1rem;
        }
        .desc h1{
            margin-bottom: -0.1rem;
        }
        
    </style>
    <body>
        <div class="cursor">

        </div>
        <div class="container-fluid maxvh">
            <div class="row maxvh">
                <div class="col-7 desc round white">
                    <h1 class="large pink">Hello Kitty</h1>
                    <h2 class="regular pink">Social Media</h2>
                </div>
                <div class="col-5 input">
                    <form method="POST">
                        <div class="container padding round regular pink]">
                            <h1 class="text-center x-large pink pinkbr">Welcome</h1>
                            <div class="col pink">
                                <p>Email</p>
                                <input type="text" name="email" value="<?php $email ?>">
                            </div>
                            <div class="col pink">
                                <p>Password</p>
                                <input type="password" name="password" value="<?php $password ?>">
                            </div>
                            <div class="col pinkbr-s whitebr">
                                <input class="pink-bg white pinkbr-s whitebr" type="submit" value="Login">
                            </div>
                            <div class="col pink">
                                <span>Don't have an account? </span><a href="signup.php">Register</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script>
        const cursor = document.querySelector(".cursor");

        document.addEventListener('mousemove', e => {
            cursor.setAttribute("style", "top: "+(e.pageY - 10)+"px; left: "+(e.pageX - 10)+"px;")
        })
        
        document.addEventListener('click', () => {
            cursor.classList.add("expand");

            setTimeout(() => {
                cursor.classList.remove("expand");
            }, 500)
        })  
    </script>
</html>