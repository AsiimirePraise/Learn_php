<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $age = $_POST["age"];

    echo "Name: " . htmlspecialchars($name) . "<br>";
    echo "Email: " . htmlspecialchars($email) . "<br>";
    echo "Age: " . htmlspecialchars($age) . "<br>";
    
}
?>
<style>
    form {
        background: #f9f9f9;
        padding: 20px;
        border-radius: 8px;
        width: 300px;
        margin: 20px auto;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    input[type="text"], input[type="email"], input[type="number"] {
        width: 95%;
        padding: 8px;
        margin: 8px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    input[type="submit"] {
        background: #007bff;
        background: #007bff;
        color: #fff;
        border: none;
        padding: 10px 16px;
        border-radius: 4px;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background: #0056b3;
    }
    </style>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Name: <input type="text" name="name"><br>
    Email: <input type="email" name="email"><br>
    Age: <input type="number" name="age"><br>
    <input type="submit" value="Submit">
</form>