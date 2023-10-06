// No1
let angka = parseInt(prompt('Angka : '))
let pangkat = parseInt(prompt('Pangkat : '))
let hasil = 1

for (let i = 0; i < pangkat; i++){  
    hasil *= angka // perulangan mengalikan hasil dengan angka selama i kurang dari pangkat
}

alert(`${angka} ^ ${pangkat} = ${hasil}`)

// No2
let karakter = prompt("masukkan kata: ").split(""); // memisahkan kata menjadi array
let geser = parseInt(prompt("geser: "))
let huruf = "abcdefghijklmnopqrstuvwxyz" // list huruf-huruf
let new_karakter = ""

console.log(huruf.length);

for (let i of karakter) {
    if (i === " ") {
        new_karakter += " "
    } else {
        Jika karakter bukan spasi, enkripsi karakter dengan menggesernya, menambahkan karakter yang telah digeser ke 'new_karakter'
        new_karakter += huruf[((huruf.indexOf(i) + geser) % huruf.length)] 
    }
}

alert(new_karakter);


// No3
let text = prompt("Kata : ").toLocaleLowerCase();
let reverse = ""; 

for (let i of text) {
    reverse = i + reverse;
}

if (reverse === text) {
    alert("Palindrom");
} else {
    alert("Bukan");
}

// No4
let list = prompt("Masukkan angka dengan pemisah spasi").split(" ").map((str) => parseInt(str))

for (let i in list){
    for (let j = 0; j < list.length - i - 1; j++) {
        if (list[j] > list[j + 1]) {
            let temporary = list[j]
            list[j] = list[j + 1]
            list[j + 1] = temporary
        }
    }
}

alert(list)

// No5
let angka = parseInt(prompt("Masukkan Angka : ")) 
let binary = ""

while (true){
    binary = String(angka % 2) + binary
    angka = Math.floor(angka / 2) 
    if (angka === 0) {
        break
    } 
}

alert(binary)