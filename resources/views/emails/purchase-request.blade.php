<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Purchase Request</title>
</head>
<body>
    <h1>New Purchase Request</h1>
    <p>Hello,</p>
    <p>You have received a new purchase request with the following details:</p>

    <ul>
        <li><strong>Product Name:</strong> {{ $purchaseData['product_name'] ?? 'N/A' }}</li>
        <li><strong>User Name:</strong> {{ $purchaseData['user_name'] ?? 'N/A' }}</li>
        <li><strong>User Email:</strong> {{ $purchaseData['user_email'] ?? 'N/A' }}</li>
        <li><strong>User Address:</strong> {{ $purchaseData['user_address'] ?? 'N/A' }}</li>
        <li><strong>User Message:</strong> {{ $purchaseData['user_message'] ?? 'N/A' }}</li>
        <li><strong>Phone Number:</strong> {{ $purchaseData['user_phone'] ?? 'N/A' }}</li>
    
    </ul>

    <p>Please process this purchase request accordingly.</p>

</body>
</html>
