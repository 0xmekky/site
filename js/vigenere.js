function stringToIntList(string)
{
	var s = new Array();
	for (var i = 0; i < string.length; i++) {
		s[i] = string.charCodeAt(i);
	}
	return s;
}
function intsToCharList(integers)
{
	var ints = new Array();
	for (var i = 0; i < integers.length; i++) {
		ints[i] = String.fromCharCode(integers[i]);
	}
	return ints;
}
function encrip()
{
  textEl = document.getElementById('text');
  keyEl = document.getElementById('key');
  cipher = document.getElementById('cipher');
	text = stringToIntList((textEl.value).toUpperCase());
	key = stringToIntList((keyEl.value).toUpperCase());
	let table = makeTable();
	let keyChar = 0;
	let message = new Array();

	while(message.length < text.length) {
		for(let i = 0; i < text.length; i++) {
			let row = table[0].indexOf(key[keyChar]);
			let col = table[0].indexOf(text[i]);
			message[message.length] = table[row][col];
			if (keyChar<key.length-1) {
				keyChar++;
			} else {
				keyChar = 0;
			}
		}
	}
	message = intsToCharList(message).join("");
	cipher.value = message;
}

function decrip()
{
	textEl = document.getElementById('text');
	keyEl = document.getElementById('key');
	cipherEl = document.getElementById('cipher');

	cipher = stringToIntList((cipherEl.value).toUpperCase());
	key = stringToIntList((keyEl.value).toUpperCase());
	var table = makeTable();
	var keyChar = 0;
	var message = new Array();
	while (message.length<cipher.length) {
		for (var i = 0; i < cipher.length; i++) {
			var row = table[0].indexOf(key[keyChar]);
			var col = table[row].indexOf(cipher[i]);
			message[message.length] = table[0][col];
			if (keyChar<key.length-1) {
				keyChar++;
			} else {
				keyChar = 0;
			}
		}
	}
	message = intsToCharList(message).join("");
	text.value = message;
}
function makeTable()
{
	let table = new Array();
	let minASCII = parseInt(document.getElementById('minASCII').value);
	let maxASCII = parseInt(document.getElementById('maxASCII').value);
	let i = 0;
	while (i+minASCII < maxASCII) {
		let line = new Array();
		for (let j = 0; j < maxASCII - minASCII; j++) {
			if (j+i+minASCII >= maxASCII) {
				line[line.length] = (j+i)-(maxASCII-minASCII)+minASCII;
			} else {
				line[line.length] = j+i+minASCII;
			}
		}
		table[table.length] = line;
		i++;
	}
	return table;
}
function printTable()
{
	let t = makeTable();
	document.getElementById("ascii").innerHTML = "";
	for (let i = 0; i < t.length; i++) {
		document.getElementById("ascii").innerHTML = document.getElementById("ascii").innerHTML+
			"<tr><td>"+intsToCharList(t[i]).join("</td><td>")+"</td></tr>";
	}
}