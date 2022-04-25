# code_demo

This is an API-based application that performs CRUD operation on data related
to deliveries.

To run this project in your local environment, please follow the steps below.

<li>Pull this project from Github</li>
<li>Open your console and cd this project's root directory</li>
<li>Run `composer install`.</li>
<li>Run `php artisan migration` to run the migrations.</li>
<li>Run `php artisan serve` to run the app.</li>
<li>The api routes are located in this file: routes/api.php</li>

To run the APIs, you will need an API testing tool, such as Postman.

API Endpoints:
<li>{your_localhost}/api/auth/register Http method: POST -->User registration> </li>
<li>{your_localhost}/api/auth/login Http method: POST -->User login</li>
<li>{your_localhost}/api/user -->Http method: GET the info of currently requesting user (Make sure you are passing the authentication token returned by login api before calling this endpoint. )</li>
<li>{your_localhost}/api/deliveries -->Http method: POST. Store the delivery to database. Authentication token is required</li>
<li>{your_localhost}/api/deliveries/{delivery_id} --> Http method: PATCH . Update the delivery information. Authentication token is required </li>
<li>{your_localhost}/api/deliveries/{delivery_id} -->Http method: GET request. Retrieve the details of a delivery by ID </li>
<li>{your_localhost}/api/deliveries --> Http method: GET. List all the deliveries owned by the requesting user. Authentication token is required  </li>
