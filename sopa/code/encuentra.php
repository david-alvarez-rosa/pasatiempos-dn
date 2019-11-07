<?php
ini_set('memory_limit', '500M');

$dict = explode(' ', file_get_contents('diccionario.txt'));

$words = array();
$words_pos = array();


function bin_search($left, $right, $word) {
    global $dict;

    if ($right === 'end')
	$right = sizeof($dict);

    if ($left > $right)
	return false;

    $middle = floor(($left + $right)/2);

    if ($dict[$middle] < $word)
	return bin_search($middle + 1, $right, $word);
    if ($dict[$middle] > $word)
	return bin_search($left, $middle - 1, $word);

    return true;
}


function incremental($i, $j) {
    global $grid, $words, $n, $m, $words_pos, $min_len;

    $word_ver;
    for ($ip = $i; $ip < $n; ++$ip) {
	$word_ver .= $grid[$ip][$j];
	if (strlen($word_ver) > $min_len) {
	    if (bin_search(0, 'end', strtolower($word_ver))) {
		$words[] = $word_ver;
		$words_pos[] = array();
		for ($k = $i; $k < $ip + 1; ++$k)
		    $words_pos[sizeof($words_pos) - 1][] = 'i'.$k.'j'.$j;
	    }
	    if (bin_search(0, 'end', strrev(strtolower($word_ver)))) {
		$words[] = strrev($word_ver);
		$words_pos[] = array();
		for ($k = $i; $k < $ip + 1; ++$k)
		    $words_pos[sizeof($words_pos) - 1][] = 'i'.$k.'j'.$j;
	    }
	}
    }
    
    $word_hor;
    for ($jp = $j; $jp < $m; ++$jp) {
	$word_hor .= $grid[$i][$jp];
	if (strlen($word_hor) > $min_len) {
	    if (bin_search(0, 'end', strtolower($word_hor))) {
		$words[] = $word_hor;
		$words_pos[] = array();
		for ($k = $j; $k < $jp + 1; ++$k)
		    $words_pos[sizeof($words_pos) - 1][] = 'i'.$i.'j'.$k;
	    }
	    if (bin_search(0, 'end', strrev(strtolower($word_hor)))) {
		$words[] = strrev($word_hor);
		$words_pos[] = array();
		for ($k = $j; $k < $jp + 1; ++$k)
		    $words_pos[sizeof($words_pos) - 1][] = 'i'.$i.'j'.$k;
	    }
	}
    }
    
    $word_dia1;
    $max_vl = min($n - $i, $m - $j);
    for ($k = 0; $k < $max_vl; ++$k) {
	$word_dia1 .= $grid[$i + $k][$j + $k];
	if (strlen($word_dia1) > $min_len) {
	    if (bin_search(0, 'end', strtolower($word_dia1))) {
		$words[] = $word_dia1;
		$words_pos[] = array();
		for ($kp = 0; $kp < $k + 1; ++$kp)
		    $words_pos[sizeof($words_pos) - 1][] = 'i'.($i + $kp).'j'.($j + $kp);
	    }
	    if (bin_search(0, 'end', strrev(strtolower($word_dia1)))) {
		$words[] = strrev($word_dia1);
		$words_pos[] = array();
		for ($kp = 0; $kp < $k + 1; ++$kp)
		    $words_pos[sizeof($words_pos) - 1][] = 'i'.($i + $kp).'j'.($j + $kp);
	    }
	}
    }
    
    $word_dia2;
    $max_vl = min($i + 1, $m - $j);
    for ($k = 0; $k < $max_vl; ++$k) {
	$word_dia2 .= $grid[$i - $k][$j + $k];
	if (strlen($word_dia2) > $min_len) {
	    if (bin_search(0, 'end', strtolower($word_dia2))) {
		$words[] = $word_dia2;
		$words_pos[] = array();
		for ($kp = 0; $kp < $k + 1; ++$kp)
		    $words_pos[sizeof($words_pos) - 1][] = 'i'.($i - $kp).'j'.($j + $kp);
	    }
	    if (bin_search(0, 'end', strrev(strtolower($word_dia2)))) {
		$words[] = strrev($word_dia2);
		$words_pos[] = array();
		for ($kp = 0; $kp < $k + 1; ++$kp)
		    $words_pos[sizeof($words_pos) - 1][] = 'i'.($i - $kp).'j'.($j + $kp);
	    }
	}
    }
}


for ($i = 0; $i < $n; ++$i)
    for ($j = 0; $j < $m; ++$j)
	incremental($i, $j);
?>
