# library-management-system-using-php


--Technology requirement for this project :

Hardware Requirements:
1. Processor: 1.5 GHz or faster
2. RAM: 2 GB or more
3. Storage: At least 500 MB of free disk space

Software Requirements:
1. Operating System: XAMPP is available for Windows, macOS, and Linux. Ensure that your operating system is supported by the latest version of XAMPP.
2. Web Browser: Any modern web browser for accessing the XAMPP control panel and testing your web applications.
3. PHP and MySQL: The latest version of XAMPP comes with PHP and MySQL pre-installed, so you don't need to separately install them.
you will get the folder named xampp after installing the xampp keep it where is is easir for you to see.
4. vs code latest version

--steps to set up the project after installing xampp softaware as mentioned in the software requirement :
  
  1.Download the zip file from the code option that you get after clicking the github link.
  2.extract the zip file and save it inside the xampp -> htdocs->
  3. open vs code and open the folder that u have saved in xampp -> htdocs-> and save it.
  4.  come out of vs code search the app manager-osx from your pc which will be installed during installing the xampp (it will ask you to enter your pc password)
  5.choose to manage server and start 
     -mysql database
     -proftpd
     -apacheweb server
 everything should be in running state 
 6.after that go to your web browser and type 
 localhost/name_of_your_downloadedfolder your project will be visible
 before that you need to set up the database for that following steps will be used:
     - open the new tab in the browser
     -type  http://localhost/phpmyadmin/
     -after that mysqldatabase interface will be opened then
     -click on create database and name it 'library'
     -after that click on import button on 
     -and import the provided .sql dump file and click ok 
     all the necessary tables will be automatically created in the databse 
     -after that your project will be running like a bolt. :)

     admin creditials 
     username : admin
     password : admin