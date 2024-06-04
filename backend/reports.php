<?php
$host = 'localhost';
$dbname = 'crime-reporting-system';
$username = 'root';
$password = ''; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $sql = "SELECT * FROM reports";

        $stmt = $pdo->query($sql);

        $reports = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($reports);
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $data = json_decode(file_get_contents("php://input"), true);

        $reporter_name = $data['reporter_name'];
        $contact_number = $data['contact_number'];
        $email = $data['email'];
        $description = $data['description'];
        $date = $data['date'];
        $password = $data['password'];
    
        $sql = "INSERT INTO reports (reporter_name, contact_number, email, description, date, password) 
                VALUES (:reporter_name, :contact_number, :email, :description, :date, :password)";
    
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':reporter_name' => $reporter_name,
            ':contact_number' => $contact_number,
            ':email' => $email,
            ':description' => $description,
            ':date' => $date,
            ':password' => $password
        ]);

        if ($stmt->rowCount() > 0) {
            http_response_code(201);
            echo json_encode(['message' => 'Report added successfully']);
        } else{
            http_response_code(500);
            echo json_encode(['error' => 'Failed to add report']);
        }
    } else {
        http_response_code(405); 
        echo json_encode(['error' => 'Method not allowed']);
    }
} catch (PDOException $e) {
    http_response_code(500); 
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
