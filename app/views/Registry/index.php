<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Examen | S2Team</title>

    <!-- Favicon -->
    <link rel="icon" type="image/vnd.microsoft.icon" href="./public/favicon.ico">

    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Font Awesome CDN -->
    <script src="https://use.fontawesome.com/874f423953.js"></script>

    <link rel="stylesheet" href="./public/assets/style.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="./home">Gestion de Menu</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="./home">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="./registry">Registry</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main class="main">
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col-md-6">
                    <form action="./registry/new" method="post" id="formAdd" data-list="./registry/menus/name">
                        <div class="form-group">
                            <label for="inTxtName">Name:</label>
                            <input type="text" class="form-control" id="inTxtName" name="inTxtName" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="selTypeMenu">Menu Type:</label>
                            <select class="form-control" id="selTypeMenu" name="selTypeMenu" required>
                                <option value="0" selected>Main</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="boxTxtDescription">Description:</label>
                            <textarea class="form-control" id="boxTxtDescription" name="boxTxtDescription"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">
                            <i class="fa fa-floppy-o" aria-hidden="true"></i> Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <div class="modal fade bd-example-modal-sm" id="modalOK" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Registro Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">Exito!</div>
            </div>
        </div>
        </div>    

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script src="./public/assets/main.js"></script>
</body>
</html>