<head>
</head>
<body>
  <?php
  echo "Hello World!<br>";

//Connect To Database
$hostname="localhost";
$username="yahia_dba";
$password="password";
$dbname="yahiabase";
$usertable="test_table";
$yourfield = "rr";


mysql_connect($hostname,$username, $password) or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please try again later.'),history.go(-1)</script></html>");
mysql_select_db($dbname);
$query = "SELECT * FROM $usertable";
$result = mysql_query($query);
if($result){
  while($row = mysql_fetch_array($result))  {
    $name = $row["$yourfield"];
    echo "Name: ".$name."<br>";
  }};
$result = mysql_query($query);

if($result){
  while($row = mysql_fetch_array($result)){
    print_r($row);
    echo "<br>";
  }
};


echo "Bye World....";
echo '<br>From FTP HELLOOOOO'
?>
</body>
