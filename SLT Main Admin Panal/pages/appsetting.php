<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <style type="text/css">
       
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    width: 60%;
    height: 100vh;
    margin: auto;
    background-color: #f4f4f4;
}

.settings-container {
    background-color: #680a2a14;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    align-items: center;
    margin-top: 70px;
}

label {
    display: block;
    margin-bottom: 8px;
}

select {
    width: 100%;
    padding: 8px;
    margin-bottom: 16px;
}

button {
    background-color: #680a2a;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    transition: 0.5s ease;
}

button:hover {
    background-color: #3d061a;
}

</style>
    <title>Printer Settings</title>
</head>
<body>
    <center>
        <div class="settings-container">
            <h1>Print</h1>
            <form id="printerSettingsForm">
                <label for="paperSize">Paper Size:</label>
                <select id="paperSize" name="paperSize">
                    <option value="A4">A4</option>
                    <option value="Letter">Letter</option>
                    <option value="Legal">Legal</option>
                </select>

                <label for="printQuality">Print Quality:</label>
                <select id="printQuality" name="printQuality">
                    <option value="High">High</option>
                    <option value="Medium">Medium</option>
                    <option value="Low">Low</option>
                </select>

                <label for="colorMode">Color Mode:</label>
                <select id="colorMode" name="colorMode">
                    <option value="Color">Color</option>
                    <option value="BlackAndWhite">Black and White</option>
                </select>

                <button type="button" onclick="saveSettings()">Save Settings</button>
            </form>
        </div>
    </center>
    <script src="script.js"></script>
</body>
</html>
