<?php
include './connection.php';
include './login.php';

$category = isset($_GET['category']) ? $_GET['category'] : '';

// Base query to fetch products
$query = "SELECT `id`, `productName`, `productImage`, `productDescription`, `productPrice`, `CatagoryId` FROM `product`";

// Modify query if a category is selected
if (!empty($category)) {
    $query .= " WHERE `CatagoryId` = ?";
}

$stmt = $con->prepare($query);

if (!empty($category)) {
    $stmt->bind_param("i", $category);
}

$stmt->execute();
$result = $stmt->get_result();

// Generate product HTML
$output = '';
while ($row = $result->fetch_assoc()) {
    if (isset($_SESSION['email'])) {
        $userId = $_SESSION['email'];
    }
    else{
        $userId = "";
    }

    $output .= "
    <div class='individualProductBox productSwiperSlide'>
    <a href='productDetail.php?id={$row['id']}' style='color:#000;'>
        <div class='individualProductImageContainer'>
            <img src='../backend/productImageUpload/{$row['productImage']}' alt='Product Image'>
        </div>
        <p class='productName'>{$row['productName']}</p>
        <div class='productRating'>
            <span class='rate'>&#9733;</span>
            <span class='rate'>&#9733;</span>
            <span class='rate'>&#9733;</span>
            <span class='rate'>&#9733;</span>
            <span class='rate'>&#9733;</span>
        </div>
        <p class='productPrice'>&#8377; {$row['productPrice']}</p>
        <br>
        <button type='button' id='cartButton' value='{$row['id']}' data-userId='{$userId}' class='buttons'> 
            Add To Cart 
        </button>
        </a>
    </div>
    ";
}


echo $output;

$stmt->close();
$con->close();
?>
