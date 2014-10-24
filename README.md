OnlineInsuranceBroker
=====================

The online insurance broker application is constructed using PHP + HTML5 +
JAVASCRIPT/AJAX. The jQuery libraries, Ajax and basic Javascript have been used very
efficiently and are well implemented in the web page as well as the HTML5 language. I used
JSON for storing and exchanging information.

In CIS-BROKER folder there are two files that have to be modified:
main.php and connect.php have underwriter global variable which is the "https://IP:PORT"
of the UNDERWRITER server address and port (in my case is "https://127.0.0.1:3001")
After that we need change directory in command line to the underwriter folder and then
to type "thin start -p 3001 --ssl" so server on port 3001 will be started.
Then Underwriter webpage can be accessed in "https://127.0.0.1:3001/". Of course
this page will be used for admin access(email "admin@abv.bg" with password "taliesin") rather than users(they use broker website)

The CIS-BROKER folder has to be copied where the other server will be.
In my case I am using Xampp and this is in htdocs folder.
I can open the webpage when I type "https://127.0.0.1/cis-broker/index.php" in the URL location bar.
So both of my servers are using secure HTTPS or SSL encryption.
