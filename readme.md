# B2B

## System Requirement
 * PHP 5.6 or later
 * MySQL 5.7 or later
 * Apache 2.4 or later

## Installation
 * Download the code using git `git clone https://github.com/bandaranaike/B2B.git`
 * Go to the folder `cd B2B`
 * Create a .env file (from .env.example) and change values as your system required `cp .env.example .env`
 * Run the composer `composer install`
 * Generate a key for the .env file if not there `php artisan key:generate`
 * Run the migration `php artisan migrate`
 * You may have to create a virtual host to work this application properly

## Overview

 This application helps to keep an article site very simple. User can create, update and delete articles.

## Backup Database
 * Copy `database.sh` file to a system accessible path `cp database.sh /to/the/path/`
 * Add a crone job to run this
    `crontab -e`
    `00 20 * * * /to/the/path/database.sh`

