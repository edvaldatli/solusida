<?php
$expected = ['first_name', 'last_name', 'email', 'card_number', 'ccv', 'card_number', 'zip'];
$required = ['first_name', 'last_name', 'email', 'card_number', 'ccv', 'card_number', 'zip'];

foreach ($_POST as $key => $value) {
    if (empty($temp) && in_array($key, $required)) {
        $missing[] = $key;
        ${$key} = '';
    }
    elseif (in_array($key, $expected)) {
        ${$key} = $temp;
    }
}