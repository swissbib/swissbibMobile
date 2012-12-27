[swissbibMobile](http://sisbsrv15.epfl.ch/library/swissbib) - Mobile Client for Swissbib
========================================================================================

Description
-----------

Based on the [SRU/SRW service from Swissbib](http://www.swissbib.org/wiki/index.php?title=SRU) and the framework [jQuery Mobile](http://jquerymobile.com/), swissbibMobile lets you display [swissbib](http://swissbib.ch) search results on all popular mobile device platforms. It happens on the web (HTML5-based), there is no need to install any kind of application. It is written in PHP.

This project was developed as a collaboration between the Swissbib team and [EPFL Library](http://library.epfl.ch). Have a look at [EPFL Library Mobile](http://library.epfl.ch/mobile) to see it live.

If you have an SRU/SRW service available and want to make this accessible for mobile devices, you can use this project as well.


Use it for your library online
------------------------------

All libraries in swissbib (more than 700) can use this service to display a mobile version of their catalogue. Here are the predefined solutions of swissbibMobile :

* [http://sisbsrv15.epfl.ch/library/swissbib/index.php](http://sisbsrv15.epfl.ch/library/swissbib/index.php) : search the whole swissbib
* [http://sisbsrv15.epfl.ch/library/swissbib/index.php?library=A100](http://sisbsrv15.epfl.ch/library/swissbib/index.php?library=A100) : search the whole swissbib with a predefined filter for a specific library (UB Basel with library code A100 in the example)
* [http://sisbsrv15.epfl.ch/library/swissbib/index.php?network=IDSBB&library=A100](http://sisbsrv15.epfl.ch/library/swissbib/index.php?network=IDSBB&library=A100) : search in a specific library network (network code IDS Basel-Bern in the example) with a predefined filter for a specific library (UB Basel in the example). 
* [http://sisbsrv15.epfl.ch/library/swissbib/index.php?network=IDSBB](http://sisbsrv15.epfl.ch/library/swissbib/index.php?network=IDSBB) : search only in a specific network (IDS Basel-Bern in the example)

To use this, you need to add the wanted parameters after the url `http://sisbsrv15.epfl.ch/library/swissbib?`. For example for IDS Basel-Bern network, add `network=IDSBB`. For UB Basel, add `library=A100`. Have a look at the list of [all library codes and network codes](https://github.com/downloads/swissbib/swissbibMobile/library_codes.pdf).


Use it on your own servers
--------------------------

You can download the code to your own servers and personalize the service. If you improve the service in a way that can be useful to everybody, we would be more than happy if your contribute back your changes to the gitHub repository.

This has been done by EPFL for [EPFL Library Mobile](http://library.epfl.ch/mobile). The search is restricted to the NEBIS network and the predefined library is EPFL Library. The source code can be seen in the branch `epfl` of this github repository.


Requirements
------------

To use the code on your own servers, you need to have a PHP version >= 5.2.


Report problems
---------------

If you encounter bugs, or have feature requests, please use the [issue tracker in GitHub](https://github.com/liowalter/swissbibMobile/issues). Alternatively, you can send an email to [Lionel Walter](https://github.com/liowalter).


Disclaimer
----------

The service is provided as is. It is not guaranteed that there will be any further development or support of swissbibMobile. But it is used at EPFL Library and for the mobile version of Swissbib. Therefore, basic support will be provided in the future. To have more control over the future, we recommend deploying it on your own servers, rather than using it directly online.

License
-------

The source code of swissbibMobile is publicly available under the version 3 of the GNU General Public License.
