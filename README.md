# Medill Cherubs 2015 Wordpress Theme

## Installation

You don't need to use MAMP, but it's probably the easiest way to get PHP, MySQL and Apache running on a Mac.

* [Install MAMP](https://www.mamp.info/en/downloads/)
* Clone this repo: `git clone git@github.com:medillcherubs/2015-wordpress-site.git`
* [Download Wordpress](https://wordpress.org/download/)
* Unzip Wordpress in the `2015-wordpress-site` folder
* Rename the folders in `/Applications/MAMP/bin/php` so that versions above 5.4.39 so they have `_X` after the name. This will hide those versions in MAMP's preferences:
  * `php5.4.39`
  * `php5.5.23_X`
  * `php5.6.7_X`
* Set the MAMP Document Root to the `2015-wordpress-site` folder.
* Start the MAMP servers.
* Open [http://localhost:8888] and set up Wordpress.
* View [http://localhost:8888/MAMP/] for your MySQL configuration.

## Key Files

All files are in `wp-content/themes/cherubs-2015`:

* `style.css` — Main stylesheet
* `header.php` — Where CSS and JS is loaded
* `functions.php` — Main stylesheet

## Deployment

The target PHP version is 5.4.24. There is no FTP access.