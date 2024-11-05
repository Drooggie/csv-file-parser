<title>Document</title>
<?php
include('../app/scripts/header_scripts.php');
include('../app/scripts/functions.php');

$data = getInfo('../transaction files/sample_1.csv');
$rows = array_slice($data, 0, count($data) - 1);
?>


<div class="container">
    <table class="table mt-5">
        <thead>
            <tr>
                <th scope="col">date</th>
                <th scope="col">Check#</th>
                <th scope="col">Transaction number</th>
                <th scope="col">sum</th>
            </tr>
        </thead>
        <tbody>
            <?php

            foreach ($rows as $row) :

                $sum = str_replace('"', "", $row['sum']);
                $date = date('F jS Y', strtotime($row['date']));
            ?>
                <tr>
                    <td><?= $date; ?></td>
                    <td><?= $row['check']; ?></td>
                    <td><?= $row['transaction']; ?></td>
                    <td>
                        <?php if (isMoneyNegative($sum)): ?>
                            <span style="color: red">
                                <?= $sum; ?>
                            </span>
                        <?php else: ?>
                            <span style="color: green">
                                <?= $sum; ?>
                            </span>
                        <?php endif ?>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>


<?php include('../app/scripts/footer_scripts.php'); ?>