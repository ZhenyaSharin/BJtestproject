<?php

use App\core\Application;

;?>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
        <title>
            <?php echo($this->title);?>
        </title>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

        <script type="text/javascript" src="js/script.js">
            
        </script>

        <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
        <link rel="stylesheet" href="css/style.css"/>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-dark bg-dark">
                <div class="container">
                    <a class="navbar-brand" href="/">
                        Tasks
                    </a>
                    <?php if (Application::isGuest()) :?>
                    <form class="form-inline my-2 my-lg-0">
                        <a href="/login" class="btn btn-outline-success my-2 my-sm-0">
                            Login
                        </a>
                    </form>
                    <?php else :?>
                    <form class="form-inline my-2 my-lg-0">
                        <a href="/logout" class="btn btn-outline-success my-2 my-sm-0">
                            Logout
                        </a>
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0 ml-4">
                            <li class="nav-item">
                                <a class="nav-link" href="/admin">Admin Page</a>
                            </li>
                        </ul>
                    </form>
                    <?php endif ;?>
                </div>
            </nav>
        </header>
        <div class="container">
            <br>
            <?php if (Application::$app->session->getFlash('success')): ?>
            <div class="alert alert-success">
                <?php echo(Application::$app->session->getFlash('success'))?>;
            </div>
            <?php endif ;?>
            {{ content }}
        </div>
        <footer class="foot">
            <div class="container">
                © All rights not reserved
            </div>
        </footer>
    </body>
</html>