<?php 
  
  $servername = "localhost";
  $username = "shaun";
  $password = "test1234";


  
  if (isset($_POST['submit'])) {
    echo htmlspecialchars($_POST['sku']) . '<br/>';
    echo htmlspecialchars($_POST['name']) . '<br/>';
    echo htmlspecialchars($_POST['price']) . '<br/>';
    echo htmlspecialchars($_POST['mb']) . '<br/>';
    echo htmlspecialchars($_POST['size']) . '<br/>';

    
    $sku = $_POST['sku'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $mb = $_POST['mb'];
    $size = $_POST['size'];

   try {
    $conn = new PDO("mysql:host=$servername;dbname=stores", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO stores (sku, name, price, mb, size) VALUES('$sku', '$name', '$price', '$mb', '$size')";
    $conn->exec($sql);
    echo "New record created successfully";
   } catch (PDOException $e) {
    echo $sql . ' <br/>' . $e->getMessage();
   }


   
   
    header('location: index.php');    
  }

  

    
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="add.css" />
    <style>
      label, select {
        padding: 0;
        
        margin-top: 1.5rem;
        margin-bottom: 0.3rem;
      }


      header {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        margin: 0;
        padding: 0;
        height: 80px;
      }

      .dd {
        display: inline-block;
        margin-top: 1.2rem;
        margin-bottom: 0;
      }

      input, select {
        outline: none;
        height: 1.7rem;
        border: 0.5px solid black;
        border-radius: 4px;
      }

      .p {
        padding-left: 1rem;
        font-size: 1.35rem;
      }

      body {
        background:  rgb(243, 222, 222);
        
      }

      #product_form {
        margin-top: 0;
        display: grid;
        flex-direction: column;
        justify-content: space-between;
        margin-left: 1rem;
        padding-bottom: 2rem;
        
      }

      label {
        text-align: justify;
      }

      button {
        color: white;
        background: black;
        visibility: visible;
        border-radius: 10px;
        border: none;
        height: 1.7rem;
        margin-left: 2rem;
        width: 7rem;
      }

      .t {
        text-align: center;
        font-size: 1rem;
        padding-top: 0.5rem;
        padding-bottom: 1rem;
      }

      select {
        outline: none;
        border: 1px solid black;
        
        background:  rgb(243, 222, 222);
      }






    </style>
  </head>
  <body>

    <form  action="add.php" method="POST">

      
         <header>
          <p class="p" >Add Product</p>
          <div class="dd">
            
          <button class="but" name="submit" type="submit">Submit</button>
          <button name="cancel" onclick="history.back();" type="reset">Cancel</button>
          </div>
          
        </header>
        <hr>
         
        <div id="product_form" >
      
          <label for="sku">SKU</label>
          <input id="sku" name="sku"  required type="text" />
      
    
         <label for="name">Name</label>
         <input id="name" name="name" required type="text" />
      
    
          <label for="price">Price ($)</label>
          <input id="price" name="price" required type="number" />
      
      
          <label for="mb">Mb</label>
          <input id="mb" name="mb" required type="number" />
      
      
          <label for="size">Size</label>
          <input id="size" name="size" required type="size" />

          
          
          <select form="theForm" name="Typeswitcher" id="Typeswitcher" 

            onchange="if (this.value) window.location.href=this.value">
            <option  value="">TypeSwitcher</option>
            <option  value="hey.php">DVD</option>
            <option value="man.php">Book</option>
            <option value="man.php">Furniture</option>
          </select>
        </div>
      

        
      </>
    </form>
      
    <hr>
    <p class="t" >Scandiweb Test Assignment</p>
  </body>
</html>