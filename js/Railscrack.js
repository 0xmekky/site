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

function crackCipher() {
    let encryptedText = document.getElementById("encryptedText").value;
    let resultsList = document.getElementById("crackResults");
    resultsList.innerHTML = "";
    
    for (let rails = 2; rails <= encryptedText.length; rails++) {
        let decrypted = railFenceDecrypt(encryptedText, rails);
        let listItem = document.createElement("input");
        listItem.classList.add("list-group-item");
        listItem.readOnly = true;
        listItem.name = `Rails${rails}`;
        listItem.style.outline = "none";
        listItem.value = `Rails ${rails}: ${decrypted}`;
        resultsList.appendChild(listItem);
    }
}