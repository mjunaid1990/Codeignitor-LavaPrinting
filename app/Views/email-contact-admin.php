<html>

<head>
    <title>Contact</title>
</head>

<body>
    <h3>Hi Admin</h3>,
    <p><?= $data['name']; ?> has contacted with us.</p>
    
    <p>Email: <?= $data['subject']; ?></p>
    
    <p>Email: <?= $data['email']; ?></p>
    <p>Phone: <?= $data['phone']; ?></p>
    <p>Message: <?= $data['message']; ?></p>
    
    
</body>

</html>