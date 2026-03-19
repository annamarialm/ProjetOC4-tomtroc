<?php

function formatMessageTime($datetime)
{
    if (empty($datetime)) {
        return '';
    }

    try {
        $messageTime = new DateTime($datetime);
        $now = new DateTime();

        $diff = $now->getTimestamp() - $messageTime->getTimestamp();

        // Less than 24 hours → show only time
        if ($diff < 86400) {
            return $messageTime->format('H:i');
        }

        // Otherwise → show date + time
        return $messageTime->format('d/m/Y H:i');

    } catch (Exception $e) {
        // Fallback in case of invalid date
        return '';
    }
}