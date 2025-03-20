let uploadedKeys = [];

function vigenereDecrypt(ciphertext, key) {
    ciphertext = ciphertext.toUpperCase();
    key = key.toUpperCase();
    let plaintext = "";
    let keyIndex = 0;
    let keyLength = key.length;

    for (let i = 0; i < ciphertext.length; i++) {
        let charCode = ciphertext.charCodeAt(i);
        if (charCode >= 65 && charCode <= 90) {
            let shift = key.charCodeAt(keyIndex % keyLength) - 65;
            plaintext += String.fromCharCode(((charCode - 65 - shift + 26) % 26) + 65);
            keyIndex++;
        } else {
            plaintext += ciphertext[i];
        }
    }
    return plaintext;
}

function loadWordlist() {
    const fileInput = document.getElementById("wordlist");
    if (fileInput.files.length === 0) {
        alert("Please select a wordlist file.");
        return;
    }

    const file = fileInput.files[0];
    const reader = new FileReader();

    reader.onload = function(event) {
uploadedKeys.length = 0; // Clear existing keys
uploadedKeys.push(...event.target.result
.split(/\r?\n/)
.map(line => line.trim())
.filter(line => line.length > 0)
);
alert("Wordlist loaded successfully! " + uploadedKeys.length + " keys found.");
};
    reader.readAsText(file);
}

function manualDecrypt() {
    const ciphertext = document.getElementById("ciphertext").value;
    const key = document.getElementById("manualKey").value.toUpperCase();

    if (key.length === 0) {
        alert("Please enter a key to decrypt.");
        return;
    }

    const decrypted = vigenereDecrypt(ciphertext, key);
    const resultArea = document.getElementById("results");
    resultArea.innerHTML = `<p><b>Key "${key}":</b> ${decrypted}</p>`;
}

function crackVigenere() {
const ciphertext = document.getElementById("ciphertext").value.toUpperCase().replace(/[^A-Z]/g, "");
const resultArea = document.getElementById("results");
const keysList = document.getElementById("keys-list");
resultArea.innerHTML = "";
keysList.innerHTML = "";

if (uploadedKeys.length === 0) {
alert("Please upload a wordlist first!");
return;
}

for (const key of uploadedKeys) {
const decrypted = vigenereDecrypt(ciphertext, key);
const ioc = calculateIoC(decrypted).toFixed(5); // Get IoC value

const resultLine = document.createElement("input");
const brake = document.createElement("br");
resultLine.style.outline = "none";
resultLine.style.border = "none";
resultLine.style.width = "100%";
resultLine.name = `${key}`;
resultLine.readOnly = true;
resultLine.value = `Key "${key}": ${decrypted} (IoC: ${ioc})`;
resultArea.appendChild(resultLine);
resultArea.appendChild(brake);

const keyItem = document.createElement("li");
keyItem.textContent = key;
keysList.appendChild(keyItem);
}
}


function calculateIoC(text) {
    text = text.toUpperCase().replace(/[^A-Z]/g, ""); // Remove non-letters
    let N = text.length;
    if (N < 2) return 0; // Avoid division by zero

    let frequency = Array(26).fill(0);
    for (let char of text) {
        frequency[char.charCodeAt(0) - 65]++;
    }

    let sum = frequency.reduce((acc, f) => acc + f * (f - 1), 0);
    return sum / (N * (N - 1));
}
