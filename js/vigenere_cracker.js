function vigenereDecrypt(ciphertext, key) {
    let decryptedText = "";
    let keyIndex = 0;
    let keyLength = key.length;
    
    for (let i = 0; i < ciphertext.length; i++) {
        let char = ciphertext[i];
        if (char.match(/[A-Z]/i)) {
            let isUpperCase = char === char.toUpperCase();
            let base = isUpperCase ? 65 : 97;
            let shift = key[keyIndex % keyLength].toLowerCase().charCodeAt(0) - 97;
            let decryptedChar = String.fromCharCode(((char.charCodeAt(0) - base - shift + 26) % 26) + base);
            decryptedText += decryptedChar;
            keyIndex++;
        } else {
            decryptedText += char;
        }
    }
    return decryptedText;
}

function crackVigenere() {
    let ciphertext = document.getElementById("ciphertext").value;
    let possibleKeys = ["key", "test", "crypto", "attack", "password"];
    
    for (let key of possibleKeys) {
        let decrypted = vigenereDecrypt(ciphertext, key);
        if (decrypted.match(/\b(the|and|is|of|to|in|this|that|with)\b/i)) {
            document.getElementById("keyGuess").value = key;
            document.getElementById("decryptedText").value = decrypted;
            return;
        }
    }
    document.getElementById("keyGuess").value = "Not Found";
    document.getElementById("decryptedText").value = "Could not decrypt with known keys.";
}
