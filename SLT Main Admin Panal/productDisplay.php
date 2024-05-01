<?php
include "../dBConn.php";
$sql = "SELECT item_qty FROM itemsave LIMIT 3";
$result = $connection->query($sql);

$quantities = [];
$totalQuantity = 0;
while ($row = $result->fetch_assoc()) {
    $quantities[] = $row['item_qty'];
    $totalQuantity += $row['item_qty'];
}

$percentages = array_map(function($quantity) use ($totalQuantity) {
    return round(($quantity / $totalQuantity) * 100, 2);
}, $quantities);

echo '<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>';
echo '<canvas id="quantityChart" width="70" height="10"></canvas>';
echo '<script>
        var ctx = document.getElementById("quantityChart").getContext("2d");
        var myChart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: '. json_encode($percentages) . ',
                datasets: [{
                    data: ' . json_encode($quantities) . ',
                    backgroundColor: [
                        "rgba(255, 99, 132, 0.2)",
                        "rgba(54, 162, 235, 0.2)",
                        "rgba(255, 206, 86, 0.2)",
                        // Add more colors if needed
                    ],  
                }]
            },
            options: {
                scales: {
                    x: {
                        display: true
                    },
                    y: {
                        display: false 
                    }
                }
            }
        });
      </script>';
$connection->close();
?>
