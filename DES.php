  <?php include "template/head.php" ?>

  <body>
    <div class="header mb-4">
      <?php include "template/navbar.php" ?>
    </div>
    <div class="text fs-2 mb-2 d-flex justify-content-center align-item-center text-center">
      <p class="text-type">DES Encryption & Decryption</p>
    </div>
    <div class="form p-5 d-flex justify-content-center align-item-center">
      <form class="p-4 border border-3" style="width: 70%;" name="stuff" action="SaveItToFile/DES.php" id="desForm" method="POST">

        <label for="indata" valign="top">Message</label>
        <input class="form-control" name="InData" id="indata" type="text">

        <div>
          <input class="btn btn-primary my-3" id="asciiBtn" type="button" value="ASCII Encrypt">
          <input class="btn btn-success my-3" id="hexBtn" type="button" value="Hexadecimal Encrypt">
        </div>
        <label for="indata" valign="top">Encryption</label>
        <input class="form-control" name="encMsg" id="EncValue" type="text">

        <div class="form-check mt-2">
          <input class="form-check-input" type="radio" id="intype-ascii" name="intype" value="ASCII">
          <label class="form-check-label" for="intype-ascii" style="cursor: pointer;">ASCII</label>
        </div>

        <div class="form-check mb-2">
          <input class="form-check-input" type="radio" id="intype-Hexadecimal" name="intype" checked="checked" value="Hexadecimal">
          <label class="form-check-label" for="intype-Hexadecimal" style="cursor: pointer;">Hexadecimal</label>
        </div>

        <label class="form-label" for="key">DES Key/Triple DES Key Part A :</label>
        <input class="form-control" id="key" name="key" value="3b3898371520f75e" type="text">

        <label class="form-label" for="keyb">Triple DES Key Part B :</label>
        <input class="form-control" id="keyb" name="keyb" value="922fb510c71f436e" type="text">

        <input class="btn btn-primary my-3" type="button" value="DES Encrypt" onclick="do_des(true);">
        <input class="btn btn-success my-3" type="button" value="DES Decrypt" onclick="do_des(false);">
        <input class="btn btn-info my-2" type="submit" name="submit" value="Save as file">

        <div class="form-floating">
          <textarea class="form-control" name="outdata" size="20" id="outdata"></textarea>
          <label for="outdata">Output message</label>
        </div>

        <div class="form-check mt-2">
          <input class="form-check-input" type="radio" id="outtype-ascii" name="outtype" onclick="format_DES_output();">
          <label class="form-check-label" for="outtype-ascii" style="cursor: pointer;">ASCII</label>
        </div>

        <div class="form-check mb-2">
          <input class="form-check-input" type="radio" id="outtype-Hexadecimal" name="outtype" checked="checked" onclick="format_DES_output();">
          <label class="form-check-label" for="outtype-Hexadecimal" style="cursor: pointer;">Hexadecimal</label>
        </div>

        <div class="form-floating">
          <textarea class="form-control" name="details" id="details" style="height: 200px;"></textarea>
          <label for="details">Details:</label>
        </div>

      </form>
    </div>
    <!-- old form -->

    <?php include "template/footer.php"; ?>