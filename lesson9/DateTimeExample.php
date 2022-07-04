<?php

// sukuriamas naujas objektas
$date = new DateTime('2007-04-19 12:50');

//objektas pamodifikuojamas
$date->modify('-2days');

//uzstatomas timezone
$timeZone = 'America/Matamoros';
$modifiedDate = $date->setTimezone(new DateTimeZone($timeZone));

$modifiedDateWithFormat = $modifiedDate->format('Y.m.d H:i');