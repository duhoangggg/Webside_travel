<?php
    // Establishing the connection
    $connection = mysqli_connect('localhost', 'root', '', 'book_db');

    // Check if the connection was successful
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if the form is submitted
    if (isset($_POST['send'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $location = $_POST['location'];
        $guests = $_POST['guests'];
        $arrivals = $_POST['arrivals'];
        $leaving = $_POST['leaving'];
         
        // SQL query to insert data into the database
        $request = "INSERT INTO book_form(name, email, phone, address, location, guests, arrivals, leaving) 
                    VALUES ('$name', '$email', '$phone', '$address', '$location', '$guests', '$arrivals', '$leaving')";

        // Execute the query
        if (mysqli_query($connection, $request)) {
            // Redirect to book.php if the query is successful
            header('Location: book.php');
        } else {
            // Display an error message if something goes wrong
            echo 'Something went wrong, try again: ' . mysqli_error($connection);
        }
    } else {
        echo 'Form was not submitted correctly';
    }
    
    // Close the connection
    mysqli_close($connection);
?>
