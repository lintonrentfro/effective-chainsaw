<?php

function getGuestPage() {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://www.dragoncon.org/?q=guests");
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    $curlRes = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($curlRes, true);
    return $data;
};

function findGuestMatches($rawHTML) {
	preg_match_all("/guest_details(.+?)b\>/U", $rawHTML, $matches);
	return $matches;
};

print findGuestMatches(getGuestPage());