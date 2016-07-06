# Setting Up

This is just some notes about setting up the development files on your local machine.

## Requirements

1. Composer (http://getcomposer.org)
2. Wamp Server (http://www.wampserver.com/en)
    2.1 Others: Wampee/Xampp/Z-wamp/UwAmp
    2.2 This is required by Composer or if you have PHP installed directly on your machine.
3. Git
    3.1 Follow this guide for installation: https://confluence.atlassian.com/bitbucket/set-up-git-744723531.html
    3.2 Or install SourceTree - https://www.sourcetreeapp.com/
4. Alternatively, you can use Homestead. https://laravel.com/docs/5.2/homestead
5. Node?

## Installation

1. Clone the repository from https://github.com/juliusgtg/skinpotions.git.
2. Open a command promt and go to the location of the cloned repository. Alternatively,
    2.1 open the folder in Windows Explorer,
    2.2 press Shift + Right-click
    2.3 click "Open command window here" to lauch a command promt directly on this folder.
3. Type "composer install" and then press Enter.
4. Check for a .env file on the project's root directory. If you can't find any, create an empty file named .env.
5. Type "artisan key:generate"



