# Medill Cherubs 2015 Wordpress Theme

## Installation

You don't need to use MAMP, but it's probably the easiest way to get PHP, MySQL and Apache running on a Mac.

* [Install MAMP](https://www.mamp.info/en/downloads/)
* Clone this repo: `git clone git@github.com:medillcherubs/2015-wordpress-site.git`
* [Download Wordpress](https://wordpress.org/download/)
* Unzip Wordpress and drag all the files into your `2015-wordpress-site` folder
    - Press SKIP on all of the overwrites.
* Rename the folders in `/Applications/MAMP/bin/php` so that versions above 5.4.39 so they have `_X` after the name. Doesn't matter if you don't have 5.4.39. This will hide those versions in MAMP's preferences:
  * `php5.4.39`
  * `php5.5.23_X`
  * `php5.6.7_X`
* Set the MAMP Document Root to the `2015-wordpress-site` folder.
* Create a new mySQL table named "wordpress". For example, you can use [SequelPro](http://www.sequelpro.com/) to do this easily.
* Start the MAMP servers.
* Open http://localhost:8888 and set up Wordpress.
    - Usually using "root" for your username and password will work.
    - View http://localhost:8888/MAMP/ for your MySQL configuration.
* Login to the Wordpress dashboard, go to Appearance, Themes, and activate the Cherubs theme.

## Key Files

All files are in `wp-content/themes/cherubs-2015`:

* `style.css` — Main stylesheet
* `header.php` — Add CSS `link` and JS `script` tags here

## Theme Customization

### Top Menu

To enable menus, your theme must add support in `functions.php`.

In `Appearance > Menus`, add a menu called `Top Navigation`. Add pages there.

## Deployment

The target PHP version is 5.4.24. There is no FTP access.