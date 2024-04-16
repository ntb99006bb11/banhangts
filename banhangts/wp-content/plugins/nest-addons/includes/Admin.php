<?php

namespace Nestaddons;

/**
 * The admin class
 */
class Admin
{

    /**
     * Initialize the class
     */
    function __construct()
    {
        new Plugins\Header;
        new Plugins\Sticky_Header;
        new Plugins\Footer;
        new Plugins\Megamenu;
        new Core\Functions;
        new Woocom\Woocomfunctions();  
    }

   
  
}
