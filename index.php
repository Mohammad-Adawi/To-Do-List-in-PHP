<?php
  session_start(); 

  if ( isset( $_POST['reset'] ) )
  {
    session_unset();
    session_destroy();
    session_start();
  }
 
  if ( !isset( $_SESSION['todos'] ) )
  { 
    $_SESSION['todos'] = array();
  }
  
  if ( isset( $_POST )  ) 
  {          
      array_push( $_SESSION['todos'], $_POST['todo'] );
    }
 
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Form Handling</title>
</head>
<body>
  <h1>Add a To-Do</h1>
     <p>
    <?php echo $message;  ?>
  </p>
  <form action="./index.php" method="POST">
  
  
    <label for="todo">
      Enter a new task:
      <input type="text" name="todo" id="todo">
    </label>
    <input type="submit" value="Add to list">
    
        <input type="submit" name="reset" value="Reset" id="reset">
  </form>
 
  <?php if ( !empty( $_SESSION['todos'] ) ) : ?>
    <h2>To-Do Items:</h2>
    <ul>
      <?php foreach ( $_SESSION['todos'] as $todo ) :  ?>
        <li>
          <input type="checkbox">
          <?php echo $todo; ?>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>


  <h3>Debugging</h3>
  
  <pre>
  Click to Expnad!
    <strong>SESSION:</strong>
    <?php var_dump( $_SESSION ); ?>
  </pre>
  <pre>
    <strong>POST:</strong>
    <?php var_dump( $_POST ); ?>
  </pre>
  
 </body>
</html>