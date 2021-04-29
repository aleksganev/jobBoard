# Jobs markup demo

Job Board Project

//Requirements:
XAMPP<br />
A database (MySQL)<br />
A web server runinng on localhost (Apache)<br />
Home page file: index.php<br />
Home page link: http://localhost/jobBoard/index.php<br />

//Information about the project:
This is a simple job board project. 
-Main page (index.php): Displays all approved job offers. Clicking on the name of any offer will display details about it
-Add Offer page (addoffer.php): Displays a submission form for submitting a new job offer
-Sign up page (signup.php): Displays a signup form and creates a new user upon submittion 
-Log in page (login.php): Displays a login form and logs the user upon submittion
*Once a user is logged in he has access to Admin features (Edit Offers and Submissions)
-Edit Offers page (edit.php): Displays all approved job offers with "Edit" and "Delete" buttons for each one
-Edit Offers => Edit button: Displays a form for editing the selected offer
-Edit Offers => Delete button: Deletes the selected offer 
-Submissions page (submissions.php): Displays all submitted job offers with "Edit", "Approve" and "Reject" buttons for each one
-Submissions => Edit: Displays a form for editing the selected submission
-Submissions => Approve: Moves the offer from the Submissions page to the Job Offers page
-Submissions => Reject: Deletes the job submission
-Log out button => Logs the user out
