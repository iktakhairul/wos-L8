<?php

use App\Models\Categorization\Group;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

function appInfo()
{
	$jsonString = file_get_contents(config_path('appInfo.json'));
	return json_decode($jsonString, true);
}

function groups()
{
	return Group::with(['categories.subcategories'])->get();
}
