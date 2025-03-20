    <?php include "template/head.php"; ?>

      <div class="header mb-4">
        <?php include "template/navbar.php" ?>
      </div>
<body>
    <div class="text fs-2 mb-2 d-flex justify-content-center align-items-center text-center">
        <p class="text-type">Vigenère Encryption & Decryption</p>
    </div>
    <div class="form p-5 d-flex justify-content-center align-items-center">
    <form class="p-4 border border-3" id="caser-form" style="width: 70%;" action="SaveItToFile/vigenere.php" method="POST">
            <label for="texto" class="form-label">Text</label>
            <textarea name="planText" class="form-control" id="text" placeholder="Enter text" onkeyup="encrip()"></textarea>

            <label for="chave" class="form-label mt-3">Key</label>
            <textarea name="keyWord" class="form-control" id="key" placeholder="Enter key"></textarea>

            <label for="cifra" class="form-label mt-3">Cipher</label>
            <textarea name="cipher" class="form-control" id="cipher" placeholder="Cipher text" onkeyup="decrip()"></textarea>

            <div class="d-flex justify-content-between mt-3">
                <input class="btn btn-primary" type="button" value="Encrypt" onclick="encrip()">
                <input class="btn btn-success" type="button" value="Decrypt" onclick="decrip()">
            </div>

            <div class="mt-3">
                <label for="minASCII" class="form-label">Min ASCII value:</label>
                <input class="form-control" type="text" id="minASCII" name="minASCII" value="65">
            </div>
            <div class="mt-3">
                <label for="maxASCII" class="form-label">Max ASCII value:</label>
                <input class="form-control" type="text" id="maxASCII" name="maxASCII" value="91">
            </div>
            
            <input class="btn btn-info my-3" type="button" value="Print Table" onclick="printTable()">
            <input class="btn btn-danger my-3" type="button" value="Crack Vigenère Cipher" onclick="window.location.href='Vigenère Cipher Cracker.php';">
            <input class="btn btn-info mt-2" type="submit" name="submit" value="Save as file">

        </form>
    </div>
    <div class="container text-center mt-4">
        <h3>Vigenère Table</h3>
        <table class="table table-bordered" id="ascii"></table>
    </div>
    <footer class="text-center mt-4">By 0xmekky: <a href="https://github.com/0xmekky" target="_blank">GitHub</a></footer>
</body>

      <?php include "template/footer.php"; ?>