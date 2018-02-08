<?php
/**
 * Include the main class
 */
include("API/Media.php");
/**
 * Instantiate it
 * @var kbrmedia
 */
$media = new kbrmedia\Media();

// Set URL & API Key
$media->setURL("http://media.site/api");
$media->setKey("APIKey");

/**
 * View Endpoint
 * Get data for one media
 * @param string Unique Media ID
 */

$media->media("g0v2h")->asObject();

/**
 * Search Endpoint
 * Get data for searched media
 * @param integer Limits
 * @param string Order: date, votes, views
 * @param integer currentpage
 * @param string keyword
 */

$media->setLimit("10")->setOrder("date")->setPage("1")->search("prank")->asObject();

/**
 * Search User's media
 * @param integer Limits
 * @param string Order: date, votes, views
 * @param integer currentpage
 * @param string username
 */
 
$media->setLimit("10")->setOrder("date")->setPage("1")->user("admin")->asObject();

