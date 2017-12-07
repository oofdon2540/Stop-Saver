<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/Operations/Ops.php';
require_once __DIR__ . '/Operations/connection.php';
(new Dotenv\Dotenv(__DIR__ . '/Operations'))->load();
$bus = getBus(request()->get('id'));

requireAuth();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://use.fontawesome.com/e175f0cc50.js"></script>
    <script
      src="https://code.jquery.com/jquery-3.2.1.min.js"
      integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
      crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <link rel="stylesheet" href="/css/index.css">
    <link rel="shortcut icon" href="/logo.ico"> 
  </head>
  <body>
    <nav>
      <div class="nav-wrapper teal">
        <div class="container">
          <a href="/" class="brand-logo"><i class="material-icons">directions_bus</i>Stop Saver</a>
          <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down">

            <?php if(!isAuthenticated()) : ?>
            <li><a href="/login.php">Login</a></li>
            <li><a href="/register.php">Register</a></li>
            <?php else: ?>
            <li><a href="/bus.php">List of Buses</a></li>
            <li><a href="/add.php">Add a New Bus</a></li>
            <li><a href="/SignUp/Ologout.php">Logout</a></li>
            <?php endif; ?>
          </ul>
          <ul class="side-nav" id="mobile-demo">
            <?php if(!isAuthenticated()) : ?>
            <li><a href="/login.php">Login</a></li>
            <li><a href="/register.php">Register</a></li>
            <?php else: ?>
            <li><a href="/bus.php">List of Buses</a></li>
            <li><a href="/add.php">Add a New Bus</a></li>
            <li><a href="/SignUp/Ologout.php">Logout</a></li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>

    <header class="header">
      <div class="container center-align">
        <h1>Edit</h1>
        <p><?php //echo $page_subtitle; ?></p>
      </div>
    </header>

   <div class="container">
  <div class="card-panel">

    <form method="post" action="/CRUD/Oedit.php">
      <input type="hidden" name="id" value="<?php echo $bus['id']; ?>"/>
      <label>Journey</label>
      <input type="text" id="title" name="title" placeholder="Bus Title" value="<?php echo $bus['title']; ?> ">
      <label>Description</label>
      <input type="text" name="description" placeholder="Description of the bus" value=<?php echo $bus['stopno']; ?> />
      <button class="btn waves-effect waves-light" type="submit" name="action">
        Update Bus
        <i class="material-icons right">send</i>
      </button>
    </form>

  </div>
</div>
      <script type="text/javascript">
        $( document ).ready(function(){
          $(".button-collapse").sideNav();
        })
      </script>

</body>
</html>