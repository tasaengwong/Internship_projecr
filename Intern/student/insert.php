<?php
include "header.php";

$sql = " INSERT INTO students (Id_students, titlename, name, lastname, major, year, address, province, amphures, district, zipcode, phone, mail,Reg)
        VALUES ('{$d->Id_students}','{$d->titlename}','{$d->name}','{$d->lastname}','{$d->major}','{$d->year}','{$d->address}',
        '{$d->provinces}','{$d->amphures}','{$d->district}','{$d->zipcode}','{$d->phone}','{$d->mail}','');
        
        INSERT INTO company (comp_id, comp_name, comp_address, comp_province, comp_zipcode, comp_phone, comp_mail, comp_Fax)
        VALUES ('{$d->comp_id}','{$d->comp_name}','{$d->comp_address}','{$d->comp_province}','{$d->comp_zipcode}','{$d->comp_phone}','{$d->comp_mail}','{$d->comp_Fax}');
        ";

if ($conn->query($sql) === TRUE) {
        $sql = "select * from students ";
        $result = $conn->query($sql);
        $row = array();
        while ($r = mysqli_fetch_assoc($result)) {
                $row[] = $r;
        }
        print json_encode($row);
} else {
        echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
