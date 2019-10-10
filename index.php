<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--JQUERY-->
    <script src="./js/jquery-3.4.1.js"></script>
    
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--Font awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <script src="https://kit.fontawesome.com/0cd95c0d58.js" crossorigin="anonymous"></script>
    <!--Custom CSS-->
    <link rel="stylesheet" type="text/css" href="./css/stylewelcome.css">

    <title>Welcome <?php echo $username;?></title>
</head>
<body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">NAVs-ToDo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user"></i> <?php echo $username;?>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="resetpass.php"><i class="fas fa-unlock"></i>&nbsp;Reset Password</a>
                    <a class="dropdown-item" href="logout.php"><i class="fab fa-angellist"></i>&nbsp;Log Out</a>
                    </div>
                </li>
                </ul>
            </div>
        </nav>
    </header>


    <div class="text-center text-light my-4">
        <h1 class="mb-4">Welcome <?php echo $username;?>, here is your to do list...</h1>
    </div>

    <div class="container">
        <div class="text-center text-light my-4">
            <h3 class="task-center form-header"> Search Tasks</h3>
            <form class="search" action="">
                <input class="form-control m-auto" type="text" name="search" placeholder="Search Todos">
            </form>
        </div>
       
        <div class="form-header my-3 d-flex justify-content-between">
            <span>Tasks</span>
            <span>Due Date</span>
            <span>Delete/Edit Tasks</span>
        </div>
       

        <ul class="list-group todos mx-auto text-light">