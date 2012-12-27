<?php
/**
 * Created by JetBrains PhpStorm.
 * User: project swissbib - Guenter Hipler
 * Date: 3/27/12
 * Time: 4:46 PM
 * extension for mobile solution written by Lionel Walter, EPFL
 */



class MobileConfigs
{



    //backlinktypes : [SWISSBIB | SOURCESYSTEM]
    private static $backlinkType = "SOURCESYSTEM";

    // Description of the link structure in general (as templates):
    //http://www.swissbib.org/wiki/index.php?title=Members:Back-linking (done by Tobias)
    private static $networklinks = array(
        "NEBIS" => 'http://opac.nebis.ch/F?func=item-global&doc_library=EBI01&doc_number=%1$s&sub_library=%2$s',
        "IDSBB" => 'http://aleph.unibas.ch/F?func=item-global&doc_library=DSV01&doc_number=%1$s&sub_library=%2$s',
        "IDSUZH" => 'https://biblio.unizh.ch/F?func=item-global&doc_library=UZH01&doc_number=%1$s&sub_library=%2$s',
        "IDSSG" => 'http://aleph.unisg.ch/F?func=item-global&doc_library=HSB01&doc_number=%1$s&sub_library=%2$s',
        //wie erhalte ich die unterschiedlichen HSGs
        "IDSSG2" => 'http://aleph.unisg.ch/F?func=item-global&doc_library=HSB02&doc_number=%1$s&sub_library=%2$s',
        "IDSLU" => 'http://ilu.zhbluzern.ch/F?func=item-global&doc_library=ILU01&doc_number=%1$s&sub_library=%2$s',
        "SGBN" => 'http://aleph.sg.ch/F?func=item-global&doc_library=SGB01&doc_number=%1$s&sub_library=%2$s',
        "SBT" => 'http://aleph.sbt.ti.ch/F?func=item-global&doc_library=SBT01&doc_number=%1$s&sub_library=%2$s',
        "ABN" => 'http://aleph.ag.ch/F?func=item-global&doc_library=ABN01&doc_number=%1$s&sub_library=%2$s',
        "CCSA" => 'http://ccsa.admin.ch/cgi-bin/gw/chameleon?inst=consortium&search=KEYWORD&function=INITREQ&t1=%1$s&u1=12101',
        "SNL" => 'http://libraries.admin.ch/cgi-bin/gw/chameleon?inst=consortium&search=KEYWORD&function=INITREQ&t1=%1$s&u1=12101',
        "RERO" => 'http://opac.rero.ch/gateway?beginsrch=1&inst=%1$s&search=KEYWORD&function=INITREQ&t1=%2$s&u1=12101&floc=%3$s&fltset=submsn',
        "BGR" => 'http://aleph.gr.ch/F?func=item-global&doc_library=BGR01&doc_number=%1$s&sub_library=%2$s'

    );

    public static function getBacklinkSourceSystem($networkCode)  {

        return MobileConfigs::$networklinks[$networkCode];

    }


    public static function getBacklinkType () {

        return MobileConfigs::$backlinkType;

    }

}



