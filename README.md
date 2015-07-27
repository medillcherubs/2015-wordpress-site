# Medill Cherubs 2015 Wordpress Theme
Welcome!

## Installation

You don't need to use MAMP, but it's probably the easiest way:

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
* Create a new mySQL table named "wordpress". You can use [SequelPro](http://www.sequelpro.com/) to do this..
* Start MAMP.
* Open http://localhost:8888 and set up Wordpress.
    - Usually using "root" for your username and password will work.
    - View http://localhost:8888/MAMP/ for your MySQL configuration.
* Login to the Wordpress dashboard, go to Appearance, Themes, and activate the Cherubs theme.

## Key Files

All files are in `wp-content/themes/cherubs-2015`:

* `style.css` — Main stylesheet
* `header.php` — Add CSS `link` and JS `script` tags here

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
* Featured Content
  * Homepage Section Teaser
  * Homepage Video
  * Featured Story
* Post Format
  * Graphic

### Pages

* About
* Contact
* Apply
* Staff
* Class of 2015 (template: Class of 2015)
* Homepage (template: Homepage)

### Theme Customization

In Wordpress, go to Appearance > Customize > Static Front Page > A Static Page > Homepage > Save & Publish.

### Menus

Top Navigation (theme location: Header Menu)
* About
* Academics
* City
* Experiences
* Contact
* Apply

Footer Nav (theme location: Footer Menu)
* Twitter (https://twitter.com/medillcherubs)
* Class of 2015
* 2014 Site (https://cherubs.medill.northwestern.edu/2014)
* Medill (https://www.medill.northwestern.edu)
* Staff

Homepage Teaser (theme location: Homepage Teaser)
* About the program
* Apply

### Plugins

Activate plugins:

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

### Import Users

Use "Import users from CSV with meta" to add users.

## DreamHost VPS Deployment

When you push to master, the theme will automatically be deployed to master using [Simple PHP Git Deploy](https://github.com/markomarkovic/simple-php-git-deploy).