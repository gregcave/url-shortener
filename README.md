# url-shortener
A simple Laravel app that generates a shortened url from a user's input

## Project Overview
This project consists of a simple Laravel web application that generates a shortened url for a link provided by a user.

The application consists of a set of controllers and views, that handle various logic for the application such as user registration, login, url generation and visits overview.

If a user is logged in, then the shortened url is assigned to their account using a 'user_id' field, if they are not logged in this is left blank.

When a link has been visited, a counter called 'visits' is incremented to track the number of visits each url receives.

### File Overview
* **/app/Http/Controllers**: Contains all of the controller logic for the application.
* **/database/migrations**: Contains all of the database migration files used to create the database.
* **/database/seeds**: Contains the files used to seed the database with test data.
* **/public/assets**: Contains the public files used by the application when creating views.
* **/routes/web.php**: Contains all of the routes used by the application (e.g. authentication, urls etc.)
* **/resources/views/html**: Contains all of the view layouts used by the application (master and auth).
* **/resources/views/twig/templates**: Contains all of the template files used to build the application.
* **/resources/views/twig**: Contains all of the views used by the application (such as the home page, visits etc.)
