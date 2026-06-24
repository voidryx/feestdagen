<!DOCTYPE html>
<html lang="nl">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Urenregistratie Dashboard</title>

    <link rel="stylesheet" href="feestdagen.css">
</head>

<body>

<h1>Urenregistratie Dashboard</h1>

<div class="card">
    <div class="label">Eerstvolgende feestdag in Nederland (2026)</div>
    <div id="nextHoliday">Laden</div>
</div>

<script>
async function loadNextHoliday() {
    try {
        // JOUW VERPLICHTE API
        const response = await fetch(
            "https://date.nager.at/api/v3/PublicHolidays/2026/NL"
        );

        const holidays = await response.json();

        const today = new Date();

        // filter alleen toekomstige feestdagen
        const futureHolidays = holidays
            .map(h => ({
                name: h.localName,
                date: new Date(h.date)
            }))
            .filter(h => h.date >= today)
            .sort((a, b) => a.date - b.date);

        if (futureHolidays.length === 0) {
            document.getElementById("nextHoliday").innerHTML =
                "Geen komende feestdagen gevonden.";
            return;
        }

        const next = futureHolidays[0];

        document.getElementById("nextHoliday").innerHTML =
            `<strong>${next.name}</strong><br>${next.date.toLocaleDateString('nl-NL')}`;

    } catch (error) {
        console.error(error);
        document.getElementById("nextHoliday").innerHTML =
            "Kon feestdagen niet laden.";
    }
}

loadNextHoliday();
</script>

</body>
</html>