Premium Media Script
========================

## Help Contribute
Send us pull requests and help improve the code.

# Premium Media Script PHP API Wrapper

The official API wrapper for [Premium Media Script](https://gempixel.com/demo/media)

## Your first integration
The example below shows how to set it up. You need to get your API key from the settings page of the admin control panel

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
 * @param integer Limits (optional)
 * @param string Order: date, votes, views (optional)
 * @param integer currentpage (optional)
 * @param string keyword
 */

$media->setLimit("10")->setOrder("date")->setPage("1")->search("Keyword")->asObject();
```

## User's uploads
Get user's uploads by sending filters & the user 

```php
/**
 * User's upload
 * @param integer Limits (optional)
 * @param string Order: date, votes, views (optional)
 * @param integer currentpage (optional)
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
