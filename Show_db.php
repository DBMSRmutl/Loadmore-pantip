<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Show DB</title>
        <style style='text/css'>
*{
	font-family:Calibri;
	font-size:15px;
    text-align: center;
}
</style>
    </head>
        <body>
            
            <?php
echo "<table style='border=0: solid 1px black;'>";
echo "<tr><th>กระทู้ที่</th><th>ชื่อกระทู้</th><th>ลิงค์</th><th>ชื่อผู้โพส</th><th>เวลาที่โพส</th><th>จำนวนความคิดเห็น</th><th>Tag ข้อมูล</th></tr>";
class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style = 'width:150px;border:1px solid blue'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pantip";
$dom = new DOMDocument('1.0', 'UTF-8');

try {
    
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn -> exec('SET NAMES utf8');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT id, title, link, post_by, time_stamp, number_of_comments, tags FROM db_pantip"); 
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?> 
        </body>

    </html>
