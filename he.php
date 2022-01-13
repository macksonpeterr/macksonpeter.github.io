<?php session_start();

    
  $servername = "localhost";
  $username = "shaun";
  $password = "test1234";

  $sql = "SELECT FROM stores";

  try {
     $conn = new PDO("mysql:host=$servername;dbname=stores", $username, $password);

     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $stmt = $conn->prepare("SELECT id, sku, name, price, mb, size FROM stores");
     $stmt->execute();
     echo "";
  } catch (PDOException $e) {
     echo "Connection failed: " . $e->getMessage();
  }

  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

  
  $conn = new PDO("mysql:host=$servername;dbname=stores", $username, $password);

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  if (isset($_POST['delete_checkbox_btn'])) {
    $id = $_POST['id'];
    $cmt = "DELETE FROM stores WHERE id = :id";
    $cmt_run = $conn->prepare($cmt);
    $cmt_exec = $cmt_run->execute(array(":id"=>$id));

    if ($cmt_exec) {
      
    }
    else {
      echo "not yet";
    }

    header("location:index.php");
  }

  


  
   
 



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="pro.css" />
    <style>
      h3 {
        font-weight: normal;
      }

      
      .buu {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        padding-top: 2rem;
        padding-bottom: 2rem;
        justify-content: space-between;
        
      }

      .bu {
        width: 150px;
        margin: 0.5rem;
        border: 1px solid black;
        padding: 2rem;
      }

      .del {
        outline: none;
        border: none;
      }
    </style>
  </head>
  <body>
    <div>
      <ul class="id">
        <li><h3>Product List</h3></li>
        <li>
          <ul>
            <p class="p"><a href="add.php">Add</a></p>
            <p id="delete-product-btn" class="p">Mass Delete</p>
          </ul>
        </li>
      </ul>
      <hr /> 
    </div>
    <div>
      <form action="index.php " method="post">
        
        <input value="Mass Delete"  type="submit" name="delete_checkbox_btn" class="delete_bt" >
        <div class="container" >
        
          <div class="buu">
            <?php foreach (new RecursiveArrayIterator($stmt->fetchAll()) as $stores=>$store) {?></h3>
            <div class="bu">
              <input type="checkbox" name="deleteCheckbox[]" class="delete-checkbox" value="<?php echo $store['id']; ?>">
              
              <h3><input class="del" type="text" name="id" id="id" value="<?php echo $store['id']; ?>"></h3>
              <h3><?php echo $store['sku'] . '<br/>'; ?></h3>
              <h3><?php echo $store['name'] . '<br/>'; ?></h3>
              <h3>$<?php echo $store['price'] . '<br/>'; ?></h3>
              <h3><?php echo $store['mb'] . '<br/>'; ?></h3>
              <h3><?php echo $store['size'] . '<br/>'; ?></h3>
            </div>
            <?php } ?>


          </div>
      </form> 
    </div>
  </body>
</html>
