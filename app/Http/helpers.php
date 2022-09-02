<?php


function appInfo()
{
	$jsonString = file_get_contents(config_path('appInfo.json'));
	return json_decode($jsonString, true);
}

function groups()
{
	return Group::with(['categories.subcategories'])->get();
}
