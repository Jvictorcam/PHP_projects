<?php
$array = [
    'name' => 'Jvictorcam',
    'age' => '17',
    'company' => 'ADS',
    'height' => '1,65', 
    'occupation' => 'Developer'
];
?>

<table border="1">
    <?php foreach($array as $key => $value): ?>
    <tr>
        <th> <?php echo $key;  ?> </th>
        <td> <?php echo $value; ?> </td>
    </tr>
    <?php endforeach; ?>
</table>
