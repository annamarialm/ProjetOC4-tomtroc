<?php

function getMembershipDuration($createdAt)
{
    $created = new DateTime($createdAt);
    $today = new DateTime();
    $interval = $created->diff($today);

    if ($interval->y > 0) {

        $result = $interval->y . ' an' . ($interval->y > 1 ? 's' : '');

        if ($interval->m > 0) {
            $result .= ' et ' . $interval->m . ' mois';
        }

    } elseif ($interval->m > 0) {

        $result = $interval->m . ' mois';

    } else {

        $result = $interval->d . ' jour' . ($interval->d > 1 ? 's' : '');
    }

    return $result;
}