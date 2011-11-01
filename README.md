[swissbibMobile](http://sisbsrv15.epfl.ch/library/swissbib) - Mobile Client for Swissbib
========================================================================================

Description
-----------

Based on the [SRU/SRW service from Swissbib](http://www.swissbib.org/wiki/index.php?title=SRU) and the framework [jQuery Mobile](http://jquerymobile.com/), swissbibMobile lets you display [swissbib](http://swissbib.ch) search results on all popular mobile device platforms. It happens on the web (HTML5-based), there is no need to install any kind of application. It is written in PHP.

This project was developed as a collaboration between the Swissbib team and [EPFL Library](http://library.epfl.ch). Have a look at [EPFL Library Mobile](http://library.epfl.ch/mobile) to see it live.

If you have an SRU/SRW service available and want to make this accessible for mobile devices, you can use this project as well.


Use it for your library online
------------------------------

All libraries in swissbib (more than 700) can use this service to display a mobile version of their catalogue. 

You can also used the predefined solutions of swissbibMobile

* [search the whole swissbib](http://sisbsrv15.epfl.ch/library/swissbib/index.php)
* [search the whole swissbib with a predefined filter for the library UB Basel (library code A100)](http://sisbsrv15.epfl.ch/library/swissbib/index.php?library=A100)
* [search the IDS Basel-Bern network only (network code IDSBB) with a predefined filter for the library UB Basel (library code A100)](http://sisbsrv15.epfl.ch/library/swissbib/index.php?network=IDSBB&library=A100)
* [search only the IDS Basel-Bern (network code IDSBB)](http://sisbsrv15.epfl.ch/library/swissbib/index.php?network=IDSBB)

To use this, you need to add the wanted parameters after the url `http://sisbsrv15.epfl.ch/library/swissbib?`. For example for IDS Basel-Bern network, add `network=IDSBB`. For UB Basel, add `library=A100`. Have a look at the list of (all library codes and network codes)[http://www.swissbib.ch/TouchPoint/nose/common/docs/Codelist_for_swissbib_20100131.pdf].


Use it for your library online
------------------------------

You can download the code to your own server and personalize the service. If you improve the service in a way that can be useful to everybody, we would be more than happy if your contribute back your changes to the gitHub repository.


Requirements
------------

To use the code on your own server, you need to have a PHP version >= 5.2 on your server. There are no other requirements.


Report problems
---------------

If you encounter bugs, or have feature requests, please use the [issue tracker in GitHub](https://github.com/liowalter/swissbibMobile/issues). Alternatively, you can drop an email to lionel dot walter at epfl dot ch


Disclaimer
----------

The service is provided as is. It is not guaranteed that there will be any further development or support of swissbibMobile. But it is used at EPFL Library and for the mobile version of Swissbib. Therefore, basic support will be provided in the future. To have more control over the future, we recommend deploying it on your own server, rather than using it directly online.

Licence
-------

GNU GPL
