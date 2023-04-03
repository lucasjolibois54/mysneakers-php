<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySneakers</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>
<body>

<header>
        <nav class="flex flex-wrap items-center justify-between w-full  py-8 text-lg text-gray-700 px-20">
          <div>
            <a href="index.php">
            <p class="font-semibold text-xl">MySneakers</p>
            </a>
          </div>
            
        <div class="hidden w-full md:flex md:items-center md:w-auto" >
        <ul class="menu">
      <li>
        <a href="#">Products</a>
        <ul class="sub-menu">
          <li><a href="all_products.php">All</a></li>
          <li>
            <a href="#">Brands</a>
            <ul class="sub-sub-menu">
              <li>
                <a href="all_products.php">All</a>
              </li>
              <li>
                <a href="jordans.php">Jordans</a>
              </li>
              <li>
                <a href="nike.php">Nike</a>
              </li>
            </ul>
          </li>
        </ul>
      </li>
    <li><a href="login.php#">Login</a></li>
    <li><a href="logout.php#">Logout</a></li>
  </ul>
            </div>
        </nav>
      </header>

    <div class="bg-gray-100">
      
    <div class="grid grid-cols-5 gap-4 max-w-7xl md:ml-28 pl-8 pr-8 pt-32 md:pt-64">
  <div class="col-span-4"> 
  <h1 class="text-4xl md:text-5xl font-bold mb-5">// All Products</h1>
  </div>
</div></div>

    <div class=" max-w-8xl md:ml-28 md:mr-28 pl-8 pr-8">
    <!-- <div class=" mx-28 px-8"> -->
        <br/>
            <div class='grid grid-cols-1 md:grid-cols-4 gap-10'>
                <?php
                $servername = 'localhost';
                $username = 'root';
                $password = '';
                $database = 'php_webshop_database';
                
                $connection = new mysqli($servername, $username, $password, $database);

                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }

                $sql = "SELECT * FROM products WHERE brand = 'Nike'";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid query: " . $connection->error);
                }

                while($row = $result->fetch_assoc()){
                    echo "

                    
                    <div>
                        <img src=$row[main_image] alt=$row[title] className='h-96 w-full object-cover object-center group-hover:opacity-75'/>
                   
                <h3 className='mt-4 text-sm text-gray-700'>$row[title]</h3>
                <p className='mt-1 text-lg font-medium text-gray-900'>$row[price] DKK.</p>
                </div> 
                    ";
                }
                ?>
</div>
            
    </div>
    <script src="main.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
            <script>
                AOS.init(duration= 3000);
              </script>
</body>
</html>