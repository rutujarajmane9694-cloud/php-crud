<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php';
require_once __DIR__ . '/vendor/autoload.php';

// data fetch
$result = mysqli_query($conn, "SELECT * FROM basic_info");

$mpdf = new \Mpdf\Mpdf([
    'margin_top' => 15,
    'margin_bottom' => 15
]);

$html = '
<style>
body {
    font-family: sans-serif;
    font-size: 12px;
}
h2 {
    text-align: center;
    margin-bottom: 15px;
}
table {
    width: 100%;
    border-collapse: collapse;
}
th {
    background-color: #f2f2f2;
    border: 1px solid #000;
    padding: 8px;
    text-align: left;
}
td {
    border: 1px solid #000;
    padding: 8px;
}
.footer {
    margin-top: 20px;
    text-align: right;
    font-size: 10px;
}
</style>

<h2>User Information Report</h2>

<table>
    <thead>
        <tr>
            <th>Sr No</th>
            <th>Name</th>
            <th>Address</th>
            <th>Mobile</th>
            <th>Document</th>
        </tr>
    </thead>
    <tbody>
';

$sr = 1;
while ($row = mysqli_fetch_assoc($result)) {
    $html .= '
        <tr>
            <td>'.$sr++.'</td>
            <td>'.$row['name'].'</td>
            <td>'.$row['address'].'</td>
            <td>'.$row['mobile'].'</td>
            <td>'.$row['doc'].'</td>
        </tr>
    ';
}

$html .= '
    </tbody>
</table>

<div class="footer">
    Generated on: '.date("d-m-Y").'
</div>
';

$mpdf->WriteHTML($html);
$mpdf->Output('user_table_report.pdf', 'I'); // I = open in browser
