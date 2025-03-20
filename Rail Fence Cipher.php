<?php include "template/head.php"; ?>

<div class="header mb-4">
  <?php include "template/navbar.php" ?>
</div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rail Fence Cipher</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center text-primary">Rail Fence Cipher</h2>
        <!-- Encrypt & Decrypt Section -->
        <div class="card p-4 shadow-sm mt-3">
            <h4 class="text-center">Encrypt & Decrypt</h4>
            <form action="SaveItToFile/RailFenceCipher.php" method="post">
                <div class="mb-3">
                    <label for="text" class="form-label">Enter Text:</label>
                    <textarea name="msg" class="form-control" id="text" rows="2" placeholder="Type your message..."></textarea>
                </div>
                <div class="mb-3">
                    <label for="rails" class="form-label">Number of Rails:</label>
                    <input name="num" type="number" class="form-control" id="rails" value="3" min="2">
                </div>
                <div class="text-center">
                    <input name="submit" class="btn btn-info me-2" type="submit" value="Save File">
                    <input class="btn btn-success me-2" value="Encrypt" onclick="encryptText()">
                    <input class="btn btn-warning" value="Decrypt" onclick="decryptText()">
                    <input class="btn btn-danger my-3" type="button" value="Crack Rail Fence Cipher" onclick="window.location.href='Rails crack.php';">
                </div>
                <h5 class="mt-3">Result:</h5>
                <input name="result" id="result" type="text" class="text-muted" style="border: none; outline: none;cursor:context-menu;" readonly>
            </form>
        </div>
        
        <!-- Crack Cipher Section -->
        
    </div>
    
    <script>
        function encryptText() {
    let text = document.getElementById("text").value;
    let rails = parseInt(document.getElementById("rails").value);
    if (rails < 2) {
        document.getElementById("result").value = "Rails must be 2 or more.";
        return;
    }
    document.getElementById("result").value = "Encrypted: " + railFenceEncrypt(text, rails);
}

function decryptText() {
    let text = document.getElementById("text").value;
    let rails = parseInt(document.getElementById("rails").value);
    if (rails < 2) {
        document.getElementById("result").value = "Rails must be 2 or more.";
        return;
    }
    document.getElementById("result").value = "Decrypted: " + railFenceDecrypt(text, rails);
}

function railFenceEncrypt(text, rails) {
    let fence = Array.from({ length: rails }, () => []);
    let rail = 0, direction = 1;
    
    for (let char of text) {
        fence[rail].push(char);
        rail += direction;
        if (rail === rails - 1 || rail === 0) direction *= -1;
    }
    
    return fence.flat().join('');
}

function railFenceDecrypt(text, rails) {
    let fence = Array.from({ length: rails }, () => Array(text.length).fill(null));
    let rail = 0, direction = 1;

    for (let i = 0; i < text.length; i++) {
        fence[rail][i] = '*';
        rail += direction;
        if (rail === rails - 1 || rail === 0) direction *= -1;
    }

    let index = 0;
    for (let row of fence) {
        for (let i = 0; i < row.length; i++) {
            if (row[i] === '*') row[i] = text[index++];
        }
    }

    let result = '';
    rail = 0, direction = 1;
    for (let i = 0; i < text.length; i++) {
        result += fence[rail][i];
        rail += direction;
        if (rail === rails - 1 || rail === 0) direction *= -1;
    }

    return result;
}
    </script>
    
</body>
</html>
<?php include "template/footer.php"; ?>