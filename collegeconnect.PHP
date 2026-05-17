<?php
// =======================================
// 1. CONNECT TO DATABASE  (PC 3.1)
// =======================================

$server   = "localhost";     
$username = "root";          
$password = "";              
$database = "collegeconnect";    // 
$port     = 3306;            

$conn = new mysqli($server, $username, $password, $database, $port);

if ($conn->connect_error) {
	  // Check if the database connection failed and stop the script while showing the error message
    die("<b> Connection failed:</b> " . $conn->connect_error);
}
echo "<h3>✅ Connection successful on port $port!</h3>";
// The connection was successful and you can now run queries using $conn

// =======================================
// 2. RETRIEVE ALL STUDENTS (PC 3.2)
// =======================================
echo "<h3>All Students</h3>";
$sql = "SELECT * FROM students";    // table name: students
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    echo "<table border='1' cellpadding='5'>
            <tr>
              <th>Student_ID</th>
              <th>Student_Name</th>
              <th>Contact_Number</th>
              <th>Email</th>
              <th>Class_ID</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['Student_ID']}</td>
                <td>{$row['Student_Name']}</td>
                <td>{$row['Contact_Number']}</td>
                <td>{$row['Email']}</td>
                <td>{$row['Class_ID']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No student records found.<br>";
}

// =======================================
// 3. EXECUTE COMMANDS AND RETURN RESULTE 
// =======================================
echo "<h3> teachers Who tech Software Development 2 </h3>";
$sql = "SELECT * FROM teachers WHERE subject= 'Software Development'";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "- " . $row["Teacher_Name"] . " - " . $row["Email"] . "<br>";
    }
} else {
    echo "No teachers found in Class 2.<br>";
}

// =======================================
// 4. INSERT NEW STUDENT RECORD (PC 3.4)
// =======================================
echo "<h3>Inserting New student</h3>";
// student_ID (AUTO_INCREMENT)
$insert = "INSERT INTO students (Student_ID, Student_Name, Contact_Number, Email, Class_ID)
VALUES (5,'Aisha Khalid','0551234567', 'aisha@example.com', 2)";

if ($conn->query($insert) === TRUE) {
    echo " New student inserted successfully.<br>";
} else {
    echo "Error inserting student: " . $conn->error . "<br>";
}

// =======================================
// 5. UPDATE teacher EMAIL (PC 3.4)
// =======================================
echo "<h3>Updating teacher Email</h3>";
$update = "UPDATE teachers SET Email='sara.khalid787@college.com' WHERE Teacher_ID = 2";

if ($conn->query($update) === TRUE) {
    echo "teacher email updated successfully.<br>";
} else {
    echo "Error updating record: " . $conn->error . "<br>";
}

// =======================================
// 6. DELETE classes RECORD (PC 3.4)
// =======================================
echo "<h3>Deleting class Record</h3>";
$delete = "DELETE FROM classes WHERE Class_ID = 3";

if ($conn->query($delete) === TRUE) {
    echo " class deleted successfully.<br>";
} else {
    echo " Error deleting student : " . $conn->error . "<br>";
}

// =======================================
// 7. CLOSE CONNECTION
// =======================================
$conn->close();
echo "<h3>Connection closed on port $port.</h3>";
?>
