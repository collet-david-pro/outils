function twoDigitWords(n) {
    const units = ["z\u00e9ro", "un", "deux", "trois", "quatre", "cinq", "six", "sept", "huit", "neuf"];
    const teens = ["dix", "onze", "douze", "treize", "quatorze", "quinze", "seize", "dix-sept", "dix-huit", "dix-neuf"];
    const tens = ["", "", "vingt", "trente", "quarante", "cinquante", "soixante", "soixante", "quatre-vingt", "quatre-vingt"];

    if (n < 10) {
        return units[n];
    } else if (n < 20) {
        return teens[n - 10];
    } else if (n < 70) {
        const t = Math.floor(n / 10);
        const u = n % 10;
        let word = tens[t];
        if (u === 1 && t !== 8) {
            word += " et un";
        } else if (u > 0) {
            word += "-" + units[u];
        }
        return word;
    } else if (n < 80) { // 70..79
        if (n === 71) return "soixante et onze";
        return "soixante-" + twoDigitWords(n - 60);
    } else if (n < 100) { // 80..99
        if (n === 80) return "quatre-vingts";
        return "quatre-vingt-" + twoDigitWords(n - 80);
    }
    return "";
}

function convertHundreds(n) {
    const units = ["z\u00e9ro", "un", "deux", "trois", "quatre", "cinq", "six", "sept", "huit", "neuf"];
    let words = "";
    if (n >= 100) {
        const hundreds = Math.floor(n / 100);
        if (hundreds === 1) {
            words += "cent";
        } else {
            words += units[hundreds] + " cent";
        }
        if (n % 100 === 0 && hundreds > 1) {
            words += "s";
        }
        n = n % 100;
        if (n > 0) {
            words += " ";
        }
    }
    if (n > 0 || words === "") {
        words += twoDigitWords(n);
    }
    return words;
}

function numberToWords(n) {
    if (n === 0) return "z\u00e9ro";
    let words = "";
    if (n >= 1000) {
        const thousands = Math.floor(n / 1000);
        if (thousands === 1) {
            words += "mille";
        } else {
            words += convertHundreds(thousands) + " mille";
        }
        n = n % 1000;
        if (n > 0) words += " ";
    }
    if (n > 0) {
        words += convertHundreds(n);
    }
    return words;
}

function amountToText(value) {
    if (typeof value === "string") {
        value = value.replace(/,/g, ".").replace(/[^0-9.]/g, "");
    }
    const num = parseFloat(value);
    if (isNaN(num)) return "Valeur invalide";
    const euros = Math.floor(num);
    const cents = Math.round((num - euros) * 100);
    let result = numberToWords(euros) + (euros > 1 ? " euros" : " euro");
    if (cents > 0) {
        result += " et " + numberToWords(cents) + (cents > 1 ? " centimes" : " centime");
    }
    return result;
}

document.getElementById("convertBtn").addEventListener("click", function() {
    const input = document.getElementById("amount").value;
    const text = amountToText(input);
    document.getElementById("result").textContent = text;
});
