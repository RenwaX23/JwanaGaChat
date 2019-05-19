<!DOCTYPE html>
<html>
<head>
<style>
body{
	font-family: Calibri;
}
.uu{
color:blue}

</style>
</head>
<body>
<?php 

$conn = new mysqli('localhost', 'root', 'toor','test');
$sql = "select * from chat";
$result = $conn->query($sql);
if (!$result) {
    trigger_error('Invalid query: ' . $conn->error);
}
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo $row["txt"];
    }
} else {
    echo "Start Chatting";
}
$conn->close();

?>
</body>
</html>
