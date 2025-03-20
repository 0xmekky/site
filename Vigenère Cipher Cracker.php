<?php include "template/head.php"; ?>

<body>
    <div class="header mb-4">
        <?php include "template/navbar.php"; ?>
    </div>

    <div class="container" id="container">
    </div>

    <div class="text fs-2 d-flex justify-content-center align-items-center text-center mb-2">
        <p class="text-type">Vigenère Cipher Cracker</p>
    </div>

    <div class="form p-5 d-flex justify-content-center align-items-center">
        <form class="p-4 border border-3" style="width: 70%;" id="vigenere-crack-form" action="SaveItToFile/VigenèreCipherCracker.php" method="post">
            <label class="form-label" for="ciphertext">Enter Encrypted Text:</label>
            <textarea class="form-control" id="ciphertext" placeholder="Type the encrypted message here..."></textarea>

            <div class="mt-3">
                <label class="form-label" for="manualKey">Try a Key (Optional):</label>
                <input class="form-control" type="text" id="manualKey" placeholder="Enter a key (optional)">
                <label class="form-label" for="wordlist">Upload Wordlist:</label>
                <input class="form-control" type="file" id="wordlist" accept=".txt">
                <input class="btn btn-info mt-2" type="button" value="Load Wordlist" onclick="loadWordlist();">
                <input class="btn btn-info mt-2" type="button" value="Decrypt with Key" onclick="manualDecrypt();">
                <button type="submit" class="btn btn-primary mt-2">Save File</button>
            </div>

            <input class="btn btn-danger mt-2" type="button" value="Crack Cipher" onclick="crackVigenere();">

            <div class="mt-3 border p-3">
                <label class="form-label">Decryption Results:</label>
                <div class="results" id="results"></div>
            </div>

            <div class="container text-center mt-4">
    <h3>Cracking Methodology - منهجية كسر الشفرة</h3>
    <div class="border p-3 bg-light" style="max-width: 600px; margin: auto;">
        <p><b>1. استخدام مؤشر التكرار (Index of Coincidence - IoC) لتقدير طول المفتاح:</b></p>
        <p>🔹 الفكرة إن الحروف في أي لغة ليها توزيع معين، فلما الشفرة يكون فيها مفتاح متكرر، التوزيع ده بيتغير. بنستخدم IoC عشان نقيس مدى التشابه بين توزيع الحروف في النص المشفر والتوزيع الطبيعي للغة، وبكده نقدر نحزر طول المفتاح.</p>

        <p><b>2. تجربة قائمة كلمات شائعة كمفاتيح:</b></p>
        <p>🔹 ساعات الناس بتستخدم كلمات متوقعة كمفاتيح، زي "PASSWORD" أو "SECRET"، فبدل ما نبحث عشوائي، بنجرب كلمات شائعة في مجال التشفير والأمان، زي أسماء مشهورة أو مصطلحات تقنية، وبكده بنوفر وقت في عملية الكسر.</p>
    </div>

            <div class="mt-3 border p-3">
                <h5>Keys Tried</h5>
                <ul id="keys-list"></ul>
            </div>
            <input class="btn btn-info mt-2" type="submit" name="submit" value="Save as file">
            <input class="btn btn-primary mt-2" type="button" value="Back" onclick="window.location.href='index.php';">
        </form>
    </div>

    <?php include "template/footer.php"; ?>

    <script src="js/VigenèreCipherCracker.js"></script>
</body>
</html>