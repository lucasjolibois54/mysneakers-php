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
</head>
<body>

        <header>
        <nav class="flex flex-wrap items-center justify-between w-full absolute py-8 text-lg text-gray-700 px-20">
          <div>
            <a href="/index.html#top">
            <p class="font-semibold text-xl">MySneakers</p>
            </a>
          </div>
            
        <div class="hidden w-full md:flex md:items-center md:w-auto" >
          <ul class="pt-4 text-base text-gray-100 md:flex md:justify-between md:pt-0 font-semibold text-xl">
            <li>
              <a class="md:p-4 py-2 block" href="/index.html#projects">Sneakers</a>
            </li>
            <li>
              <a class="md:p-4 py-2 block" href="/index.html#projects">Support</a>
            </li>
            <li>
              <a class="md:p-4 py-2 block" href="/index.html#about">Login</a>
            </li>
              </ul>
            </div>
        </nav>
      </header>

    <section>
    <div class="grid grid-cols-2 h-screen">
  <!-- Left column -->
  <div class="flex flex-col">
  <div class="bg-gwhite h-1/2 p-8 w-full mt-96 ml-28"  style="margin-top:30vh">
  <h1 class="text-7xl font-bold mb-5">Discover limited <br/>sneakers without <br/>limitation</h1>
    <a href="" class="border-2 rounded-full px-3 py-2 border border-black text-lg">EXPLORE NOW</a>
  </div>
  <div class="bg-gray-100 h-2/6 p-8">
    <img  class="ml-28 mb-3 pt-10" src="arrow.png"/>
  <p class="ml-28 font-medium text-xl">Breathable, lightweight, supportive. All in one <br/>shoes designed to help you support your day. <br/>What else could you want?</p>
  <p class="ml-28 font-medium text-md mt-6 flex space-x-6"><span>SHOP NOW</span><span>◯</span><span>SHOP NOW</span><span>◯</span><span>SHOP NOW</span></p>
  </div></div>
  <!-- Right column -->
  <div class="h-screen">
    <img src="hero.webp" alt=" image" class="h-full w-full object-cover object-center">
  </div>
</div>

    </section>

    <div class="bg-gray-100">
      
    <div class="grid grid-cols-5 gap-4 max-w-7xl ml-28 pl-8" style="padding-top:170px">
  <div class="col-span-4"> 
  <h1 class="text-5xl font-bold mb-5">// Featured Products</h1>
  </div>
  <div class="col-span-1"> 
    <div class="h-5"></div>
  <a href="" class="border-2 rounded-full px-3 py-2 border border-black text-lg">EXPLORE NOW</a>
  </div>
</div></div>

    <div class=" max-w-7xl ml-28 pl-8">
    <!-- <div class=" mx-28 px-8"> -->
        <br/>
            <div class='grid grid-cols-3 gap-10'>
                <?php
                $servername = 'localhost';
                $username = 'root';
                $password = '';
                $database = 'php_webshop_database';
                
                $connection = new mysqli($servername, $username, $password, $database);

                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }

                $sql = "SELECT * FROM products";
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
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
            <script>
                AOS.init(duration= 3000);
              </script>
</body>
</html>