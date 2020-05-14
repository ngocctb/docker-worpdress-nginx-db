<?php

$mysqli = new mysqli('db', 'root', 'root', 'wordpress');

// Check connection
if (!$mysqli) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

// Attempt select query execution
$sql = "SELECT * FROM test;";
$result = mysqli_query($mysqli, $sql);
if($result){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>name</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
}

$mysqli->close();


echo  "<hr/>";

//Connecting to Redis server on localhost 
$redis = new Redis(); 

$redis->connect('redis', 6379); 

echo "Connection to server sucessfully"; 

echo "<br/>";

//check whether server is running or not 
echo "Server is running: ".$redis->ping();

//set the data in redis string 
$redis->set("tutorial-name", "Redis tutorial"); 

echo "<br/>";

// Get the stored data and print it 
echo "Stored string in redis:: " .$redis->get("tutorial-name");

//store data in redis list 
$redis->lpush("tutorial-list", "Redis"); 
$redis->lpush("tutorial-list", "Mongodb"); 
$redis->lpush("tutorial-list", "Mysql");  

// Get the stored data and print it 
$arList = $redis->lrange("tutorial-list", 0 ,5); 
echo "<br/>";
echo "Stored string in redis:: "; 
print_r($arList); 

?>