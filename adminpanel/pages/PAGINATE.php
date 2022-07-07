<?php
function paginate($reload, $page, $tpages) {
	$adjacents = 2;
	$prevlabel = "&lsaquo; Prev";
	
	$out = "";
	// previous
	
	$pmin=1;
	$pmax=$tpages;
	for ($i = $pmin; $i <= $pmax; $i++) {
		if ($i == $page) {
			$out.= "<li class=\"active\"><a href=''>".$i."</a></li>\n";
		} else {
			$out.= "<li><a href=\"".$reload. "&amp;page=".$i."\">".$i. "</a>\n</li>";
		}
	}

	 
	// next
	
	$out.= "";
	return $out;
}
?>