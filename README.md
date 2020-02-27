# Hakuna Matata Hotels

A basic booking system for a fictional hotel. It allows users to create, view and edit reservations. 
The systems uses a MariaDB database for data storage and PHP and Ajax to communicate with the database.

* Create: Allows the user to enter information to create a new reservation for a guest, if the guest does not exist they will be created, or if the room is booked during the time period they selected they will be told and be allowed to select a new time period of cancel
* Edit: The edit feature allows the user to select a reservation from a table of reservations and then given a form with the users information to edit, if they are happy with the edit they can update it, if not they can cancel the edit
* View: The view form gives the user a list of fields to search on, the fields are optional, if none are filled in then it will show all reservations, once the user clicks search they will be taken to a table which will either show users with the given information or if no information was given they will be shown all reservations.

------

## Documentation
* [Intro Document](https://github.com/JustinG123/HakunaMatataHotels/blob/master/Documents/Hakuna%20Matata%20Hotels.pdf)
* [Installation](https://github.com/JustinG123/HakunaMatataHotels/blob/master/Documents/Installation.pdf)
* [Database diagram](https://github.com/JustinG123/HakunaMatataHotels/blob/master/Documents/DB%20Diagram.JPG)
* [Process flow diagram](https://github.com/JustinG123/HakunaMatataHotels/blob/master/Documents/Process%20Flow%20Diagram.jpg)
* [SQL Create script](https://github.com/JustinG123/HakunaMatataHotels/blob/master/Documents/Hakuna%20Matata.sql)