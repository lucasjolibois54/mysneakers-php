<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySneakers</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="max-w-6xl mx-auto">
        <h1 class="mb-20 text-3xl mt-20">List of products</h1>
        <a class="bg-blue-500 py-2 px-3" href="/php-webshop/create.php">New Product</a>
        <br/>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>title</th>
                    <th>brand</th>
                    <th>descr</th>
                    <th>price</th>
                    <th>main_image</th>
                    <th>created at</th>
                    <th>action</th>
                </tr>
            </thead>

            <tbody>
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
                    <tr>
                    <td>$row[id]</td>
                    <td>$row[title]</td>
                    <td>$row[brand]</td>
                    <td>$row[descr]</td>
                    <td>$row[price]</td>
                    <td>$row[main_image]</td>
                    <td>$row[created_at]</td>
                    <td>
                        <a class='bg-blue-500 py-2 px-3' href='/php-webshop/edit.php?id=$row[id]'>Edit</a>
                        <a class='bg-red-500 py-2 px-3' href='/php-webshop/delete.php?id=$row[id]'>delete</a>
                    </td>
                    </tr>
                    ";
                }
                ?>

            </tbody>
        </table>
    </div>
</body>
</html>
