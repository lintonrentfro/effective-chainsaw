<?php

$rawHTML = file_get_contents('http://www.dragoncon.org/?q=guests');

function findGuestMatches($rawHTML) {
	preg_match_all("/guest_details(.+?)b\>/U", $rawHTML, $matches);
	return $matches;
};

echo "start";
echo findGuestMatches(getGuestPage());
echo "end";