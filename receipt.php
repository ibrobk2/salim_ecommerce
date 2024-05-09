<!DOCTYPE html>
<html>
  
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Receipt</title>
    <link rel="stylesheet" href="bootstrap5/css/bootstrap.min.css">
    <script src="static/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="lineawesome/css/line-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js"></script> 
    <script src="html2pdf.bundle.js"></script>
    <style>
        /* Custom Styles */
        body {
            background-color: #f8f9fa;
            color: #333;
            font-family: 'Recursive', sans-serif;
        }

        .container {
            max-width: 500px;
            margin: 40px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .receipt-info {
            margin-bottom: 30px;
        }

        .receipt-info p {
            margin-bottom: 5px;
        }

        .receipt-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .receipt-table th,
        .receipt-table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .receipt-table th {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        .receipt-total {
            font-weight: bold;
            text-align: right;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-style: italic;
            color: #888;
        }
        .hide-on-print {
            display: none;
        }
    </style>
</head>

<body >
        <!-- -->

    <div class="container" id="contentToPrint">
        <div class="header">
            <h2>Payment Receipt</h2>
            <h3>Xephyr</h3>
            <hr>
        </div>

        <div class="receipt-info">
            <?php
            include "server.php";

            if (isset($_GET['reference'])) {
                $ref = $_GET['reference'];

                $sql = "SELECT * FROM transactions WHERE reference='$ref'";
                $result = mysqli_query($conn, $sql);

                $row = mysqli_fetch_assoc($result);
            }

            ?>
            <p><strong>Transaction Reference:</strong><?= $ref; ?></p>
            <p><strong>Username:</strong><?= $row['username']; ?></p>
            <p><strong>Amount:</strong> <?= $row['amount']; ?></p>
            <p><strong>Date:</strong> <?= $row['date']; ?></p>

        </div>
         <hr>
        <table class="table table-bordered  receipt-table">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Payment for Goods </td>
                    <td><?= $row['amount'] ?></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td class="receipt-total" colspan="2">Total: ₦<?= $row['amount'] ?></td>
                </tr>
            </tfoot>
        </table>

        <p class="footer">Thank you for buying from us!</p>
        <button onclick="printToPDF()" class="btn btn-dark">Print to PDF</button>
    </div>
  <script>
    function printToPDF() {
      // Get the content to print
      const contentToPrint = document.getElementById('contentToPrint');

      // Use html2pdf library to convert HTML to PDF
      html2pdf(contentToPrint);

      // If you want to hide certain content after printing, you can do it here
      // For example, you can toggle the "hide-on-print" class on the elements you want to hide
      const elementsToHide = document.querySelectorAll('.hide-on-print');
      elementsToHide.forEach(element => {
        element.style.display = 'none';
      });
    }
  </script>
    <!-- Bootstrap JS and Popper.js are required for some functionality -->
    <script src="bootstrap5/js/bootstrap.bundle.min.js"></script>
</body>

</html> 