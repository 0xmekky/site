<?php include "template/head.php"; ?>

<body>
    <div class="header mb-4">
        <?php include "template/navbar.php"; ?>
    </div>

    <div class="container" id="container">
    </div>

    <div class="text fs-2 d-flex justify-content-center align-items-center text-center mb-2">
        <p class="text-type">Caesar Cipher Cracker</p>
    </div>

    <div class="form p-5 d-flex justify-content-center align-items-center">
        <form class="p-4 border border-3" style="width: 70%;" id="caesar-crack-form" method="POST" action="SaveItToFile/CaesarCipherCracker.php">
            <label class="form-label" for="ciphertext">Enter Encrypted Text:</label>
            <textarea class="form-control" id="ciphertext" placeholder="Type the encrypted message here..."></textarea>

            <input class="btn btn-danger mt-2" type="button" value="Crack Cipher" onclick="crackCaesar();">
            <button class="btn btn-info mt-2" type="submit">Save File</button>
            <div class="mt-3 border p-3">
                <label class="form-label">Decryption Results:</label>
                <div class="results" id="results"></div>
            </div>

        
            <input class="btn btn-primary mt-2" type="button" value="Back" onclick="window.location.href='index.php';">
        </form>
    </div>

    <?php include "template/footer.php"; ?>

    <script>
        function caesarDecrypt(ciphertext, shift) {
            let plaintext = "";
            for (let i = 0; i < ciphertext.length; i++) {
                let charCode = ciphertext.charCodeAt(i);
                if (charCode >= 65 && charCode <= 90) { // Uppercase letters
                    plaintext += String.fromCharCode(((charCode - 65 - shift + 26) % 26) + 65);
                } else if (charCode >= 97 && charCode <= 122) { // Lowercase letters
                    plaintext += String.fromCharCode(((charCode - 97 - shift + 26) % 26) + 97);
                } else {
                    plaintext += ciphertext[i];
                }
            }
            return plaintext;
        }

        function crackCaesar() {
            let ciphertext = document.getElementById("ciphertext").value;
            let resultArea = document.getElementById("results");
            resultArea.innerHTML = ""; 

            for (let shift = 0; shift < 26; shift++) {
                let decrypted = caesarDecrypt(ciphertext, shift);
                let resultLine = document.createElement("input");
                resultLine.readOnly = true;
                resultLine.style.outline = "none";
                resultLine.style.width = "100%";
                resultLine.style.border = "none";
                resultLine.name = `Shift${shift}`;
                resultLine.value = `Shift ${shift}: ${decrypted}`;
                resultArea.appendChild(resultLine);
            }
        }
    </script>
</body>
</html>
