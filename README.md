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

## Pages and Page Templates

Some pages have custom layouts, like the grid of all cherubs. When you create a page in Wordpress, set the Page Template (on the [right side of Edit Page](https://cloud.githubusercontent.com/assets/333527/8890884/22107e04-32d7-11e5-912f-f190873d1354.png)) to the correct file:

* Class of 2015 — Class of 2015 (`page-class-of-2015.php`)

## Theme Customization

### Top Menu

In `Appearance > Menus`, add a menu called `Top Navigation`. Add pages and categories there. Under `Theme Locations`, check `Header Menu`.

Theme must add menu support in `functions.php`.

## Development

View MAMP logs:

```
tail -f /Applications/MAMP/logs/php_error.log
```

## Deployment

The target PHP version is 5.4.24. There is no FTP access.

## Create in Production

### Categories

* Full-Width
* Academics
  * Program Overview
  * Learning
  * Guest Speakers
  * Reporting and Editing
* Campus
  * Residential Life
  * Exploring Campus
* City
  * Living in Evanston
  * Going to Chicago
* Experiences
  * Journalism Reflections
  * Personal Insight
* Homepage Section Teaser
* Homepage Video
* Featured Story

### Pages

* About
* Contact
* Apply
* Staff
* Class of 2015

### Menus

Top Navigation (theme location: Header Menu)
* About
* Academics
* City
* Experiences
* Contact
* Apply

Footer Navigation (theme location: Footer Menu)
* Twitter
* Class of 2015
* 2014 Site
* Medill
* Staff

Homepage Teaser (theme location: Homepage Teaser)
* About the program
* Apply

### Plugins

* "Co-Authors Plus" by Mohammad Jangda, Daniel Bachhuber, Automattic
* "Import users from CSV with meta" by codection
* "Prime Strategy Page Navi" by Hitoshi Omagari
* "Raw HTML" by Janis Elsts
* "Related" by Marcel Pol
    - Under `Settings` then `Related Posts`, make sure to check the box for `post` in the first two tabs. On the third tab `Content`, check `Add to content` and change the title shown to `Related Stories`
* "Slideshow" by StefanBoonstra
    - Default Settings you need to change:
        + Style: Dark
        + Max width: 675
        + Proportional relationship: 675:450
        + Slideshow's height: 450
        + Hide description box: NO
        + Automatically slide to the next slide: NO
        + Hide navigation buttons, show when mouse hovers over: NO
        + Hide pagination, show when mouse hovers over: NO
* "User Meta Pro" by Khaled Hossain
* "WP Subtitle" by Husani Oakley, Ben Huson


# DreamHost VPS Deployment

When you push to master, the theme will automatically be deployed to master using [Simple PHP Git Deploy](https://github.com/markomarkovic/simple-php-git-deploy).


SSH (password in the Google Doc):

```
ssh cherubadmin@ps447908.dreamhostps.com
```

Add your public key to:

```
~/.ssh/authorized_keys
```
