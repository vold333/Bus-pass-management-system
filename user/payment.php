<?php
// Assuming you have already established a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "buspassdb";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming you've received the payment amount from the payment portal
$cost = $_COOKIE['js_amount'];

echo "<script>console.log('cost variable in php is '+'$cost')</script>";

// Assuming you have some identifier for the transaction, like a transaction ID
$Id = $_COOKIE['js_id'];

echo"<script>console.log('Id variable in php is '+'$Id')</script>";

// Update the amount column in the database
$sql = "UPDATE tblpass SET Cost = '$cost' WHERE ID = '$Id'";

if ($conn->query($sql) === TRUE) {
    echo "Amount updated successfully.";
} else {
    echo "Error updating amount: " . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment Form</title>
    <style>
        body {
            background: url(images/wp7094575.jpg) no-repeat center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
        }
        
        table {
            margin: 12% auto;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 10px;
            padding: 20px;
        }

        h1, h3 {
            color: lightblack;
        }

        h1 {
            text-align: center;
        }

        td {
            padding: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button[type="submit"] {
            background-color: blue;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
        }

        button[type="submit"]:hover {
            background-color: blue;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td colspan="2">
                <h1>Payment Details</h1>
            </td>
        </tr>
        <tr>
            <td>
                <h3 for="amount">Amount:</h3>
            </td>
            <td>
              <center> <h2> ₹<span id="display"></span> </h2> </center>
            </td>
        </tr>
        <tr>
            <td>
                <h3 for="card_number">Card Number:</h3>
            </td>
            <td>
                <input type="text" name="card_number" id="card_number" placeholder="Enter your card number" maxlength="16">
            </td>
        </tr>
        <tr>
            <td>
                <h3 for="expiration_date">Expiration Date:</h3>
            </td>
            <td>
                <input type="text" name="expiration_date" id="expiration_date" placeholder="MM/YY">
            </td>
        </tr>
        <tr>
            <td>
                <h3 for="cvv">CVV:</h3>
            </td>
            <td>
                <input type="text" name="cvv" id="cvv" placeholder="Enter CVV" maxlength="3">
            </td>
        </tr>
        <tr>
            
            <td colspan="2">         
                <br>
                <center> <button type="submit" id="submit" name="submit" onclick="run()">Submit</button></center>
            </td>
        </tr>
    </table>
    <script src="js/payment.js"></script>
    <script>
        document.getElementById("expiration_date").addEventListener("input", function() {
            var value = this.value;
            if (value.length === 2 && !value.includes("/")) {
                this.value = value + "/";
            } else if (value.length > 5) {
                this.value = value.slice(0, 5);
            }
        });
    </script>
</body>
</html>
