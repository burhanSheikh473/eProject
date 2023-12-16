<?php
include_once("navbar2.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTables Example</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <style>
        th{
             background:#05254d !important;
             color: #fff;
             border-right: 1px solid #ccc;
        }
    </style>
</head>
<body>

    <table id="statusTable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th> Patient Name</th>
                <th>Patient Contact</th>
                <th>Vaccine Status</th>
                <th>Test Result</th>
                <th>Test Date</th>
                <!-- Add more columns as needed -->
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize DataTable
            var dataTable = $('#statusTable').DataTable({
                "ajax": "searchresult.php", // PHP script to fetch data
                "columns": [
                    { "data": "Id" },
                    { "data": "PatientName" },
                    { "data": "PatientContact" },
                    { "data": "VaccineStatus" },
                    { "data": "TestResult" },
                    { "data": "TestDate" },
                    // Add more columns as needed
                ]
            });
        });
    </script>

</body>
</html>
