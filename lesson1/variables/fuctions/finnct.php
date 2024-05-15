<?php

function compute_balance() {
    $deposit = 2000;
    $withdraw = 500;
    $balance = $deposit - $withdraw;
    echo $balance;
}

compute_balance();

?>