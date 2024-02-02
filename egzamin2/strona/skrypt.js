let id_skretka_linka = 0;
let id_skretka_drut = 0;
let id_wtyk = 0;
let id_kaystone = 0;

function sprawdzWartosc() {
    for (let i = 1; i <= 4; i++) {


        let wartosc = document.getElementById(`ilosc${i}`).innerText;
        wartosc = parseInt(wartosc);

        if (wartosc == 0) {
            document.getElementById(`ilosc${i}`).style.backgroundColor = "red";
        }
        else if ((wartosc >= 1) && (wartosc <= 5)) {
            document.getElementById(`ilosc${i}`).style.backgroundColor = "yellow";
        }
        else{
            document.getElementById(`ilosc${i}`).style.backgroundColor = "Honeydew";
        }


    }

}

sprawdzWartosc();


function aktualizuj(id) {

    let zmiana = prompt('Podaj nową wartość');
    if ((zmiana == '') || isNaN(zmiana) || (zmiana < 0)) {
        alert('Błędna wartość')
    }
    else {
        document.getElementById(`ilosc${id}`).innerHTML = zmiana;
        sprawdzWartosc();

    }

}

function idZwieksz(id) {
    let nazwa = '';
    switch (id) {
        case 1:
            id_skretka_drut++;
            nazwa = document.getElementById(`nazwa${id}`).innerText;
            alert(`Zamówienie nr: ${id_skretka_drut} Produkt: ${nazwa}`);
        break;
        case 2:
            id_skretka_linka++;
            nazwa = document.getElementById(`nazwa${id}`).innerText;
            alert(`Zamówienie nr: ${id_skretka_linka} Produkt: ${nazwa}`);
        break;
        case 3:
            id_wtyk++;
            nazwa = document.getElementById(`nazwa${id}`).innerText;
            alert(`Zamówienie nr: ${id_wtyk} Produkt: ${nazwa}`);
        break;
        case 4:
            id_kaystone++;
            nazwa = document.getElementById(`nazwa${id}`).innerText;
            alert(`Zamówienie nr: ${id_kaystone} Produkt: ${nazwa}`);
            break;

    }
}


