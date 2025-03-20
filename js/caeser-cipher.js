function doCrypt(isDecrypt) {
  let shiftText = document.getElementById("caser-shift").value;
  if (!/^-?\d+$/.test(shiftText)) {
    alert("Shift is not an integer");
    return;
  }
  let shift = parseInt(shiftText, 10);
  if (shift < 0 || shift >= 26) {
    alert("Shift is out of range");
    return;
  }
  if (isDecrypt) shift = (26 - shift) % 26;
  let textElem = document.getElementById("caser-msg");
  let mainText = document.createElement("input");
  mainText.value = textElem.value;
  mainText.type = "text";
  mainText.style.display = "none";
  mainText.name = "caeser-text";
  let caeserForm = document.getElementById("caser-form");
  caeserForm.appendChild(mainText);
  textElem.value = caesarShift(textElem.value, shift);
}

function caesarShift(text, shift) {
  let result = "";
  for (let i = 0; i < text.length; i++) {
    let c = text.charCodeAt(i);
    if (65 <= c && c <= 90)
      result += String.fromCharCode(((c - 65 + shift) % 26) + 65); // Uppercase
    else if (97 <= c && c <= 122)
      result += String.fromCharCode(((c - 97 + shift) % 26) + 97); // Lowercase
    else result += text.charAt(i); // Copy
  }
  return result;
}
