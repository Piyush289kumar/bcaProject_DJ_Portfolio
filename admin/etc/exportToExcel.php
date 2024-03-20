<?php
include("config.php");
?>
<script>alert('Exported successfully !!')</script>
<?php

$sql = "SELECT * FROM form_data ORDER BY id DESC";
$res = mysqli_query($conn, $sql);
$html = '<table><tr>
        <td>क्रं.</td>
        <td>दिनांक</td>
        <td>नाम</td>
        <td>जन्म तिथि</td>
        <td>जन्म समय</td>
        <td>जन्म स्थान</td>
        <td>कद/उंचाई</td>
        <td>रंग</td>
        <td>मांगलिक</td>
        <td>शैक्षणिक योग्यता</td>
        <td>व्यवसाय</td>
        <td>अविवाहित/तलाकशुदा</td>
        <td>मोबा. नं.</td>
        <td>ई-मेल</td>
        <td>लिंग</td>
        <td>पूर्ण पता</td>
        <td>प्रदेश</td>
        <td>जिला</td>
        <td>पिनकोड</td>
        <td>पिता का नाम</td>
        <td>पिता का मोबा.</td>
        <td>पिता का व्यवसाय</td>
        <td>पिता का गोत्र</td>
        <td>माता का नाम</td>
        <td>माता का गोत्र</td>
        <td>किस लोकेशन में रिश्ता चाहिए</td>
        <td>परिवार मे सदस्यों की संख्या</td>
        </tr>';
$serial_num = 1;
while ($row = mysqli_fetch_assoc($res)) {
    $html .= '<tr>
    <td>' . $serial_num . '</td>
    <td>' . $row['date'] . '</td>    
    <td>' . $row['name'] . '</td>    
    <td>' . $row['dob'] . '</td>
    <td>' . $row['dot'] . '</td>
    <td>' . $row['dol'] . '</td>
    <td>' . $row['height'] . '</td>
    <td>' . $row['rang'] . '</td>
    <td>' . $row['manglik'] . '</td>
    <td>' . $row['edu'] . '</td>
    <td>' . $row['business'] . '</td>
    <td>' . $row['state'] . '</td>
    <td>' . $row['phone'] . '</td>
    <td>' . $row['email'] . '</td>
    <td>' . $row['gender'] . '</td>
    <td>' . $row['address'] . '</td>
    <td>' . $row['pradesh'] . '</td>
    <td>' . $row['jila'] . '</td>
    <td>' . $row['pincode'] . '</td>
    <td>' . $row['fname'] . '</td>
    <td>' . $row['fphone'] . '</td>
    <td>' . $row['fbusiness'] . '</td>
    <td>' . $row['fgotra'] . '</td>
    <td>' . $row['mname'] . '</td>
    <td>' . $row['mgotra'] . '</td>
    <td>' . $row['location'] . '</td>
    <td>' . $row['family'] . '</td>
    </tr>';
    $serial_num++;
}
$html .= '</table>';
echo $html;
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=report.xls');
mysqli_close($conn);
?>