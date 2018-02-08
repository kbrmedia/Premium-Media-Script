Premium Media Script
========================
Official PHP API wrapper for Premium Media Script API.

## Help Contribute
Send us pull requests and help improve the code.

Premium Media Script PHP API Wrapper
==================

The official API wrapper for [Premium Media Script](https://gempixel.com/demo/media)

## Your first integration
The example below shows you how to shorten a URL without any other parameters. You need to get your API key from the settings page of the user control panel

```php
/**
 * Include the main class
 */
include("API/Media.php");

$media = new kbrmedia\Media();

$media->setURL("http://media.site/api");
$media->setKey("APIKEY");
```
## Single Media
Get data for a single media by sending the unique ID of the media

```php
/**
 * View Endpoint
 * Get data for one media
 * @param string Unique Media ID
 */

$media->media("UNIQUEMEDIAID")->asObject();
```
## Search Media
Search media by sending filters & a keyword

```php
/**
 * Search Endpoint
 * Get data for searched media
 * @param integer Limits
 * @param string Order: date, votes, views
 * @param integer currentpage
 * @param string keyword
 */

$media->setLimit("10")->setOrder("date")->setPage("1")->search("Keyword")->asObject();
```

## User's uploads
Get user's uploads by sending filters & the user 

```php
/**
 * User's upload
 * @param integer Limits
 * @param string Order: date, votes, views
 * @param integer currentpage
 * @param string username
 */
$media->setLimit("10")->setOrder("date")->setPage("1")->user("admin")->asObject();
```

## asArray()
If you wish to work with an array of data instead of object, use asArray.

```php
/**
 * View Endpoint as Array
 * Get data for one media
 * @param string Unique Media ID
 */

$media->media("UNIQUEMEDIAID")->asArray();
```


## asJSON()
If you wish to work with a JSON instead of object, use asJSON.

```php
/**
 * View Endpoint as JSON
 * Get data for one media
 * @param string Unique Media ID
 */

$media->media("UNIQUEMEDIAID")->asJSON();
```
