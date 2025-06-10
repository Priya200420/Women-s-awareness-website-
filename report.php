<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<?php  
// Check if the form is submitted  
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    // Collect and sanitize the input data  
    $place = htmlspecialchars($_POST['place']);  
    $incident = htmlspecialchars($_POST['incident']);  
    $safetyPercentage = htmlspecialchars($_POST['safetyPercentage']);  
}  
?>  

<!DOCTYPE html>  
<html lang="en">  

<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>City Safety Dashboard</title>  
    <link rel="stylesheet" href="report.css">  
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>  
</head>  

<body>  
    <div class="container">  
        <h1>City Safety Dashboard</h1>  
        <div class="chart-container">  
            <canvas id="safetyChart"></canvas>  
            <div class="chart-center">  
                <h2>Safety</h2>  
                <p>Metropolitan City</p>  
            </div>  
        </div>  
        <form id="issueForm" action="report.php" method="post">  
            <h2>Report an Issue</h2>  
            <label for="place">Place:</label>  
            <input type="text" id="place" name="place" placeholder="Enter the place" required>  
            <label for="incident">Incident:</label>  
            <textarea id="incident" name="incident" rows="4" placeholder="Describe the incident" required></textarea>  
            <label for="safetyPercentage">Safety Percentage:</label>  
            <input type="number" id="safetyPercentage" name="safetyPercentage" placeholder="Enter safety percentage" required>  
            <button type="submit">Add Issue</button>  
        </form>  
        <div class="issue-list">  
            <h2>Reported Issues</h2>  
            <ul id="issues">  
                <?php  
                // Display the collected data after form submission  
                if ($_SERVER["REQUEST_METHOD"] == "POST") {  
                    echo "<li><strong>Place:</strong> $place | <strong>Incident:</strong> $incident | <strong>Safety:</strong> $safetyPercentage%</li>";  
                }  
                ?>  
            </ul>  
        </div>  
    </div>  

    <script>  
        // Initialize the doughnut chart  
        const ctx = document.getElementById('safetyChart').getContext('2d');  
        const safetyChart = new Chart(ctx, {  
            type: 'doughnut',  
            data: {  
                labels: ['Safe', 'Unsafe'],  
                datasets: [{  
                    data: [<?php echo isset($safetyPercentage) ? $safetyPercentage : 75; ?>, <?php echo isset($safetyPercentage) ? 100 - $safetyPercentage : 25; ?>], // Use submitted data or default values  
                    backgroundColor: ['#28a745', '#dc3545'],  
                    hoverOffset: 4  
                }]  
            },  
            options: {  
                plugins: {  
                    tooltip: { enabled: false },  
                    legend: { display: false },  
                },  
                cutout: '70%',  
            },  
        });  
    </script>  
</body>  

</html>, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>