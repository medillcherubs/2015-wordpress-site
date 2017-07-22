# Medill Cherubs Wordpress Theme
Welcome!

## Need to Add Documentation About
* Duplicating Theme
* How to find 2017 page from within the Cherub Network

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
* "User Role Editor" by Vladimir Garagulya
    - User -> User Role Editor -> Author settings -> Check "unfiltered_html" -> Save
    - Add a new role named "Cherub" with the slug "cherub" that has the same perimssions as "Editor". All Cherubs should be assigned to this role.
* "WP Subtitle" by Husani Oakley, Ben Huson

### Create New Wordpress Users

Use "Import users from CSV with meta" to add users. Create columns in the following order: `Username`, `Email`, `First_Name`, `Last_Name`, `Password`. [Example Spreadsheet from 2016](https://docs.google.com/spreadsheets/d/13nhsyHGXH_IdsEBNxHP4xJBUpzHK64L1bk7rOt7251M/edit#gid=1657410136)

### User Profile Information

To include additional user profile fields, such as favorite cherub memory, you need to use the User Meta plugin. 
- Under "Shared Fields", create a new field for each item you need.
- Under "Settings", then "Backend Profile", scroll down to "Extra fields in backend profile" and drag all your newly created fields from "Available Fields" to "Fields in backend profile (Drag from available fields)." 
- Prep your original Wordpress user spreadsheet with all their additional profile information.
- Under "Export and Import", import a new CSV with all of their original wordpress information (created during "Create New Wordpress Users") as well as all the additional profile fields data you wish to use.
- Click and match the headers from the CSV and the fields you created and finalize import.
- All the user information should now show up in each user's profile.
 
## DreamHost VPS Deployment

When you push to master, the theme will automatically be deployed to master using [Simple PHP Git Deploy](https://github.com/markomarkovic/simple-php-git-deploy).

## Troubleshooting

* Make sure the max file upload size is at least 10 MB for videos and other files
* Make sure any type of file can be uploaded
* Make sure that the temp directory for uploads has no max size limit, or can be cleared out (reboot the VPS in Dreamhost)

## To do
* Better default image sizes, so that medium images are larger
* Show the URL for each image size in the media library
* Hide the URL for the original image
* Let people create, remote and re-order subcategories from the admin
* Let people order posts in the admin
