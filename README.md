# Medill Cherubs 2015 Wordpress Theme

## Installation

* [Install MAMP](https://www.mamp.info/en/downloads/)
* Clone this repo: `git clone git@github.com:medillcherubs/2015-wordpress-site.git`
* [Download Wordpress](https://wordpress.org/download/)
* Unzip Wordpress in the `2015-wordpress-site folder
* Go to `/Applications/MAMP/bin/php`, and rename the folders so that all versions above 5.4.39 have `_X` after the name. This will hide those versions in MAMP's preferences:
  * `php5.4.39`
  * `php5.5.23_X`
  * `php5.6.7_X`
* Set the MAMP Document Root to the `2015-wordpress-site` folder.
* Start the MAMP servers.
* Open [http://localhost:8888] and set up Wordpress.
* View [http://localhost:8888/MAMP/] for your MySQL configuration.

## Deployment

The target PHP version is 5.4.24. There is no FTP access.