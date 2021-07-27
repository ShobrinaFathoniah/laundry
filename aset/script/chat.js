var know = {
    "hallo" : "Selamat Datang di Website Kami! Apa yang Anda Butuh kan? Cari Kode, Cara Registrasi, Cara Login, Lupa Password ? Ketik Kembali diantara hal tersebut di Chat ini",
    "Cari Kode" : "Pilih pada Menu Tab, Cari Kode atau Anda dapat scroll web ke bawah:) atau anda bisa klik Cari Kode di Navigator",
    "Cara Registrasi" : "Klik Registrasi dan Isi data diri anda dengan benar!",
    "Cara Login" : "Klik Tombol Login yang berada di Navigator dan tuliskan Username dan Password dengan benar!",
    "Lupa Password" : "Bila Anda Lupa dengan Password Anda, Silahkan Hubungi Kami di admin.laundrykuy@outlook.com"
};

    

function talk(){
    var user = document.getElementById("textBox").value;
    var u = document.createElement("H5");
    u.innerHTML += user + "<br>";
    var cuu = document.getElementById("c");
    cuu.appendChild(u).setAttribute("class", "chatb");
    u.style.backgroundColor="#48e7c5";
    u.style.textAlign="right";
    u.style.order="-1";
    
    if (user in know){
        var b = document.createElement("H5");
        b.innerHTML += know[user] + "<br>";
        var cbb = document.getElementById("c");
        cbb.appendChild(b).setAttribute("class", "chatb");
        b.style.backgroundColor="#5fdd7b";

    }else{
        var b = document.createElement("H5");
        b.innerHTML += "Maaf Tolong tulis sesuai ketentuan agar kami dapat membantumu <br>" ;
        var cbb = document.getElementById("c");
        cbb.appendChild(b).setAttribute("class", "chatb");
        b.style.backgroundColor="#5fdd7b";
    }

}