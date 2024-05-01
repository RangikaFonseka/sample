<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Filter</title>

    <link rel="stylesheet" href="filter.css">
</head>

<body>
    <div>
        <div>
            <div>
                <div>
                    <div>
                        <div>
                            <h6>Smart Cafe Orders</h6>
                        </div>
                    </div>
                    <div>
                        <form method="POST" action="">
                            <div>
                                <label for="start_date" class="form-label">From :</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" required>
                            </div>
                            <div>
                                <label for="end_date" class="form-label">To :</label>
                                <input type="date" class="form-control" id="end_date" name="end_date" required>
                            </div>
                            <div>
                                <label for="product_name" class="form-label">Product Name:</label>
                                <select id="product_name" name="product_name">
                                    <option value="">All</option>
                                    <?php
                                    error_reporting(0);
                                    $conn = mysqli_connect("localhost", "root", "", "smart_cafe");

                                    if ($conn) {
                                        $query = "SELECT * FROM product";
                                        $result = mysqli_query($conn, $query);

                                        if ($result && mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<option value='" . $row['description'] . "'>" . $row['description'] . "</option>";
                                            }
                                        }
                                    }
                                    mysqli_close($conn);
                                    ?>
                                </select>
                            </div>
                            <button type="submit" name="filter">Process</button>
                            <button><a href="../../adminPanal.php">Back</a></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="output">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['filter'])) {
        require_once 'vendor/autoload.php'; // Include TCPDF library path

        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        ?>
        <div class="dates">
            <?php
            echo "<h2>Orders From : " . $start_date . " To ". $end_date ."</h2>";
           
            ?>
        </div>

        <?php
        $conn = mysqli_connect("localhost", "root", "", "smart_cafe");

        if ($conn) {
            $product_name = $_POST['product_name'];

            $query = "SELECT o.OrderId, o.PersonId, o.amount, o.order_Date, p.description as product_name
                    FROM ordersave o
                    INNER JOIN itemsave i ON o.OrderId = i.order_ID
                    INNER JOIN product p ON i.item_ID = p.id
                    WHERE o.order_Date BETWEEN '$start_date' AND '$end_date'";

            if (!empty($product_name)) {
                $query .= ($product_name !== 'All') ? " AND p.description = '$product_name'" : "";
            }

            $result = mysqli_query($conn, $query);

            echo "<table border='.2'>
                <tr>
                    <th>Order ID</th>
                    <th>Person ID</th>
                    <th>Amount</th>
                    <th>Order Date</th>
                    <th>Product Name</th>
                </tr>";

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['OrderId'] . "</td>";
                    echo "<td>" . $row['PersonId'] . "</td>";
                    echo "<td>" . $row['amount'] . "</td>";
                    echo "<td>" . $row['order_Date'] . "</td>";
                    echo "<td>" . $row['product_name'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No records found.</td></tr>";
            }
            echo "</table>";

            mysqli_close($conn);

            // Generate PDF
            require_once 'vendor/autoload.php'; // Include TCPDF library path

            $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Smart Cafe');
            $pdf->SetTitle('Details Sheet');
            $pdf->SetHeaderData('', 0, 'Smart Cafe', 'Details Sheet');
            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
            $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

            $pdf->SetMargins(10, 10, 10);
            $pdf->SetAutoPageBreak(TRUE, 10);
            $pdf->AddPage();

            ob_start();
            echo "<h2>Smart Cafe</h2>";
            echo "<h3>Details Sheet</h3>";
            echo "<p>Selected Start Date: " . $start_date . "</p>";
            echo "<p>Selected End Date: " . $end_date . "</p>";
            ob_end_clean();

            $html = ob_get_clean();

            $pdf->writeHTML($html);
            $pdf->Output('details_sheet.pdf', 'D');
        } else {
            echo "Failed to connect to the database.";
        }
    }
    ?>
</div>
</body>

</html>