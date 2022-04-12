# Digital QA Portal 

<!-- TABLE OF CONTENTS -->
<details open="open">
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#installation">Installation</a>
    </li>
  </ol>
</details>

## About The Project

QA Portal is a web application which supports various QA activities like unattended test automation execution, system health & Tax imports(YTD).

### Built With

QA Portal is built with below components

* [WAMP Server](https://www.wampserver.com/en/)
* [PHP](https://www.php.net/manual/en/)
* [Code Igniter](https://codeigniter.com/)

## Installation

To get a local copy up and running follow below steps.

* [WAMP Server Download & Installation](https://sourceforge.net/projects/wampserver/files/)
* Once you install WAMP server, start the server & once it is started green "W" icon will appear in Hidden Icons section. Also Wamp64 folder will be created in instllation location. Clone QA portal code into www folder under wamp64(C:\wamp64\www).
* Now try to open web browser(preferably Chrome) & type "http://localhost", click on [Add a virtual host](http://localhost/add_vhost.php?lang=english) link.
* Enter portal Name as qaportal & path of QA portal source(C:\wamp64\www\qaportal), then click on create virtuqal host button
* Now click on click on [phpmyadmin](http://localhost/phpmyadmin/) link & login into admin without any password.
* Create a db with name "qaportal" & execute sql files in sql folder
* Now you are all done to login into QAportal with URL [QA Portal Login Page] http://localhost/qaportallatest/login


