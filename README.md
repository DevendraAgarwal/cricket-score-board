# Cricket Score App

Simple Cricket Score App Where User Create Teams and It's Players. And Auto Fix Matches and Getting Auto Generated Score Board.

### Technologies Used

This App uses a number of open source projects to work properly:

* [PHP][7.2.5] - PHP Language For Backend
* [Laravel][7.22.2] - Rich Functional PHP Based Web Framework
* [jQuery][3.5.1] - A Javascript Framework
* [Twitter Bootstrap][4.5.0] - Great UI Boilerplate For Modern Web Apps
* [Ajax][3.5.1] - JQuery Based Tool For Creating Asynchronous Web Applications
* [Datatables][1.10.21] -  A plug-in for the jQuery Javascript library. It is a highly flexible tool For Advance Tables.

### Installation

Please Follow These Steps to Setup & Run The Application:

1. Clone The Code.
2. Go to Project Root Directory.
3. Create New ```.env``` File By Copy ```.env.example``` File. Chnage The Database Name and Credentials.
4. Create A Database With The Same Name Which Is Define In ```.env``` File.
5. Then Run The Following Commands.

```sh
$ composer install
$ php artisan migrate
$ php artisan storage:link
$ php artisan serve
```