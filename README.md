By Jeremiah Freeman

## Description/Specs
  This program will list all the local shoe store and all the brands these stores carry.

| Behavior | Input 1 | Output |
|----------|---------|--------|
| Brand getName test | ------- | match/pass |
| Brand getId test | ----- | match/pass |
| Brand save() test | save Object 1 | Object 1 passes |
| Brand getAll() test | get Object 1 and Object 2 | Object 1 and 2 gotten ( passes )|
| Brand find() test | find Object 1 and Object 2 | Object 1 found |
| Brand setName() test | ------- | -------- |
| Brand store_id property addition | add store_id and test all construct tests | all test passing |
| Brand deleteAll function test | delete Store and Brand | all deleted |
| Store getName test | ----- | match/pass |
| Store getId test | ------- | match/pass |
| Store save() test | save Object 1 | Object 1 passes |
| Store getAll() test | get Object 1 and Object 2 | Object 1 and 2 gotten ( passes )|
| Store find() test | find Object 1 and Object 2 | Object 1 found |
| Store setName() test | -------- | Sophia = $new_name |
| Store deleteAll function test | delete Brands and Store | all deleted |


## Setup / Installation Requirements

Open web browser. +* Clone this, "" repository.
Open Terminal.
If using Mac computer run this code in terminal if 'Composer' has not been previously installed.

cd ~ -sudo mkdir -p /usr/local/bin -sudo chown -R $USER /usr/local/ -curl -sS https://getcomposer.org/installer | php -mv composer.phar /usr/local/bin/composer
If running a windows computer and 'Composer' has not been previously installed: -please go to this address, a download will automatically install: "https://getcomposer.org/Composer-Setup.exe". -follow all setup and installation instructions.
Change directory to ShoeStore and type 'composer install'.
Change directory to the 'web' folder and type 'php -S localhost:8000'.
Finally enter 'localhost:8000' into your local browser and press enter.
Known Bugs

There are no known bugs.

Support and contact details

If you notice bugs or would like to contribute in any way please contact me at jaythinkshappiness@gmail.com

Technologies Used

HTML PHP Twig Silex Bootstrap

License

GNU GENERAL PUBLIC LICENSE Version 3, 29 June 2007 Copyright (C) 2007 Free Software Foundation, Inc.
