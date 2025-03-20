<?php include "template/head.php"; ?>

<body>
    <div class="header mb-4">
        <?php include "template/navbar.php"; ?>
    </div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crack Rail Fence Cipher</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center text-danger">Crack Rail Fence Cipher</h2>
        
        <div class="card p-4 shadow-sm mt-3">
            <h4 class="text-center">Enter Encrypted Text</h4>
            <div class="mb-3">
                <label for="encryptedText" class="form-label">Encrypted Text:</label>
                <textarea class="form-control" id="encryptedText" rows="2" placeholder="Type encrypted message..."></textarea>
            </div>
            <form action="SaveItToFile/Railscrack.php" method="post">
            <div class="text-center">
                <input  type="button" class="btn btn-danger mt-2" onclick="crackCipher()" value="Crack Cipher">
                <input class="btn btn-primary mt-2" type="button" value="Back" onclick="window.location.href='index.php';">
                <button class="btn btn-info mt-2" type="submit" name="submit">Save as file</button>
            </div>
            
            <h5 class="mt-3">Possible Decryptions:</h5>
            <ul id="crackResults" class="list-group"></ul>
            </form>
        </div>
    </div>
    
    <script src="js/Railscrack.js"></script>
    
</body>
</html>
