This is the MVC micro-framework that I developed over the last few years.
The idea here is that it can be dropped in place without much else
and requires the developer only to know PHP, HTML & CSS.

USAGE
=====
This MVC micro-framework is intended to be used as a library.  

1. Copy / rename `_controller.php.template` to the target of your webserver URL.
    - If directly accessed, copy to the folder (e.g. `/var/www/foo`) and rename as needed for the URI.
    - If accessed via `Alias` directive, copy to target of directive and rename as needed for the URI.
      Note that `Alias` targets _do not_ need to be in a pubicly accessible path.
2. Copy / rename `_view.php.template` to the `views` folder used by the controller copied previously.
3. Code away.

If you need to adapt different page shells (e.g. to provide a SVG shell), simply create and 
change the `echo $view->render()` path to the new shell.


FILES
=====
Generally speaking, this directory structure is meant to be used
within an application.  Therefore, some files are listed here
that are blank -- but would be populated with data upon use.

I implemented my microframeworks as follows:

    DIRECTORY                   <--- Package name
    +--- package.php            <--- `include` this file, and you have everything you need.
    +--- constants.php          <--- Global constants for the package.
    +--- helper_functions.php   <--- global scope functions needed for the package
    +--- other-files_and-directories


`constants.php`
---------------
This is where all constants for the MVC package would be kept.  Typically,
this would be things like Company name and other data that would be used
in `<meta>` tags.


`_controller.php.template`
--------------------------
This is an example file intended to provide a framework for a controller.  Copy
this file to a directory and start PHP-ing away.  This file would be listed in the URL,
for exammple:

    `/var/www/foo.com/login.php`    <-- controller file adapted from `_controller.php.template`
    `https://www.foo.com/login`     <-- URL called by browser that accesses controller


`detect-mobile-browsers.php`
-----------------------------
A helper function intended to be used via `include` or `require`.  I always intended this
to be implemented as a function, but never got around to it.


`helper_functions.php`
----------------------
Functions needed to work the MVC system.  


`package.php`
-------------
The one-stop-shop file to get the micro MVC framework.  Include this in your controller,
and you've got everthing you need.


`page-shell.php`
----------------
This is the HTML shell used for the templating system.  It's statically coded for speed
and portability.  Every system will run this file.


`template.php`
--------------
Class used that stores up data sent to it by the controller.  It also renders it when
called by the controller.


`_view.php.template`
--------------------
This is an example file intended to provide a framework for a specific view.  Copy
this file into the implemented views folder for a controller and start HTML-ing away.

