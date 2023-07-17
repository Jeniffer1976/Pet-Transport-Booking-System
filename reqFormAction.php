<?php 

$conn = new PDO('mysql:host=localhost;dbname=waggingwheel_v1', 'root', '');
foreach  ($_POST['petFname'] as $key => $value) {
    $petSql = "INSERT INTO pet (quote_id, first_name, last_name, type, breed, age, weight, height, width, additional_info) 
                        VALUES ('1', :fname, :lname, :type, :breed, :age, :weight, :height, :width, :additional_info)";
    
    $petStmt = $conn->prepare($petSql);
    $petStmt->execute([
        'fname' => $value,
        'lname' => $_POST['petLname'][$key],
        'type' => $_POST['petType'][$key], 
        'breed' => $_POST['breed'][$key], 
        'age' => $_POST['age'][$key], 
        'weight' => $_POST['weight'][$key], 
        'height' => $_POST['height'][$key],  
        'width' => $_POST['width'][$key],  
        'additional_info' => $_POST['addInfo'][$key]
    ]);
}
echo "Items inserted successfully";

?>