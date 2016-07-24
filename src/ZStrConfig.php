<?php
/*
         M""""""""`M            dP                     
         Mmmmmm   .M            88                     
         MMMMP  .MMM  dP    dP  88  .dP   .d8888b.     
         MMP  .MMMMM  88    88  88888"    88'  `88     
         M' .MMMMMMM  88.  .88  88  `8b.  88.  .88     
         M         M  `88888P'  dP   `YP  `88888P'     
         MMMMMMMMMMM  [    -*- Magebay.com -*-   ]      
                                                       
         * * * * * * * * * * * * * * * * * * * * *     
         * -    - -    M.A.G.E.B.A.Y    - -    - *     
         * -  Copyright © 2010 - 2016 Magebay  - *     
         *    -  -  All Rights Reserved  -  -    *     
         * * * * * * * * * * * * * * * * * * * * *     
                                                     
*/
/**
 * --*--*--*--*--*--*--*--*--*--*--*--*--*--*--*--*-- *
 * @PROJECT    : Z-Adv PHP String Processer
 * @AUTHOR     : Zuko - Magebay Developer
 * @COPYRIGHT  : © 2016 Magebay - Magento Ext Provider
 * @LINK       : https://www.magebay.com/
 * @FILE       : ZStrConfig.php
 * @CREATED    : 3:39 PM , 24/Jul/2016
 * @DETAIL     : Rebuilt Config File
 * --*--*--*--*--*--*--*--*--*--*--*--*--*--*--*--*-- *
 **/

namespace Zuko\PhpStrAdv;


/**
 * Class ZStrConfigs
 *
 * @package Zuko\PhpStrAdv
 */
class ZStrConfigs
{
    /**
     * The default bad words file name.
     */
    const BAD_WORDS_FILE_NAME = 'badwords-default.txt';

    /**
     * The alphabet.<br/>
     * Edit this constant in order to define your language alphabet.
     */
    const ALPHABET = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    /**
     * The digits.<br/>
     * Edit this constant in order to define your language digits.
     */
    const DIGITS = '0123456789';

    /**
     * The empty string.
     */
    const EMPTY_STRING = '';

    /*
     * The whitespace character;
     */
    const WHITE_SPACE = ' ';

    /**
     * Carriage return and line feed.
     */
    const CRLF = "\r\n";

    /**
     * Carriage return.
     */
    const CR = "\r";

    /**
     * Line feed.
     */
    const LF = "\n";

    /**
     * Tab.
     */
    const TAB = "\t";

    /**
     * Null byte.
     */
    const NUL = "\0";
}