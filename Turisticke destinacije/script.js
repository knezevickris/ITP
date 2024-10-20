function showImage(idSlike) {
    const slikaEl = document.getElementById(idSlike)
    slikaEl.style.display = "block"
}

function hideImage(idSlike) {
    const slikaEl = document.getElementById(idSlike)
    slikaEl.style.display = "none"
}

function redirectToPage() {
    window.open("destinacije.html")
}

function provjeraSelectPolja() {
    const izabrano = document.getElementById("slDestinacije")
    if(izabrano.value === "Hurgada" || izabrano.value === "Dubai" || izabrano.value === "Bali")
    {
        const divBrZvjezdica = document.getElementById("divBrZvjezdica")
        divBrZvjezdica.style.display = "block"
        return true
    }
    else {
        divBrZvjezdica.style.display = "none"
        return false
    }
}

function provjeraRezervacije() {
    let validnaRezervacija = 1
    let poruka = ""

    const lozinka = document.getElementById("inPassword")
    const ime = document.getElementById("inUsername")
    const trajanjeAranzmana = document.getElementsByName("rdTrajanje")
    const brojZvjezdica = document.getElementsByName("rdBroj")

    if (ime.value.length < 1) {
        poruka += "Neophodno je unijeti korisnicko ime.\n"
        validnaRezervacija = 0
    }

    if (lozinka.value.length < 8 ) {
        poruka+="Minimalna duzina lozinke je 8 karaktera\n"
        validnaRezervacija = 0
    }
    
    let selektovanoTrajanje = false;
    for (let i=0; i<trajanjeAranzmana.length; i++)
    {
        if(trajanjeAranzmana[i].checked) {
            selektovanoTrajanje = true
            break
        }
    }
    if (!selektovanoTrajanje) {
        poruka+="Neophodno je izabrati duzinu trajanja aranzmana\n"
        validnaRezervacija = 0
    }

    const divBrZvjezdica = provjeraSelectPolja()
    if (divBrZvjezdica) {
        let selektovanBrZvjezdica = false;

        for (let i=0; i<brojZvjezdica.length; i++) {
            if(brojZvjezdica[i].checked) {
                selektovanBrZvjezdica = true
                break
            }
        }

        if(!selektovanBrZvjezdica){
            poruka+="Neophodno je izabrani broj zvjezdica hotela\n"
            validnaRezervacija = 0
        }
        
    }
    

    if(validnaRezervacija === 0)
    {
        window.alert(poruka)
        return
    }
    else 
        window.alert("Rezervacija uspjesna")

    
}