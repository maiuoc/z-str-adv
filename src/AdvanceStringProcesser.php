<?php
/*
         M""""""""`M            dP
         Mmmmmm   .M            88
         MMMMP  .MMM  dP    dP  88  .dP   .d8888b.
         MMP  .MMMMM  88    88  88888"    88'  `88
         M' .MMMMMMM  88.  .88  88  `8b.  88.  .88
         M         M  `88888P'  dP   `YP  `88888P'
         MMMMMMMMMMM    -*-  Created by Zuko  -*-

         * * * * * * * * * * * * * * * * * * * * *
         * -    - -     S.Y.M.L.I.E     - -    - *
         * -  Copyright © 2014 (Z) Programing  - *
         *    -  -  All Rights Reserved  -  -    *
         * * * * * * * * * * * * * * * * * * * * *
*/
/**
 * --*--*--*--*--*--*--*--*--*--*--*--*--*--*--*--*-- *
 * @PROJECT    : Z-Adv PHP Curl Assistants
 * @AUTHOR     : Zuko
 * @COPYRIGHT  : © 2014 - 2016 Z-Programing a.k.a Zuko
 * @LINK       : http://www.zuko.pw/
 * @FILE       : AdvanceStringProcesser.php
 * @CREATED    : 6:25 PM , 20/Jan/2014
 * @DETAIL     :
 * --*--*--*--*--*--*--*--*--*--*--*--*--*--*--*--*-- *
 **/


namespace Zuko\PhpStrAdv;


/**
 * Class AdvanceStringProcesser
 *
 * @package Zuko\PhpStrAdv
 */
class AdvanceStringProcesser
{
    /**
     * @var string - the main current string
     */
    private $_s;

    /**
     * @var string - the used character encoding (ie. null for plain english, 'UTF-8' for UTF-8 encoded strings or corresponding used character encoding)
     */
    private $_encoding;

    // --------------------------------------------------------------------------------- Basics
    /**
     * Constructor.<br/>
     * Creates a AdvanceStringProcesser object.
     * @param string $string $string the main string
     * @param string $encoding the used character encoding (ie. null for plain english, 'UTF-8' for UTF-8 encoded strings or corresponding used character encoding)
     * @return AdvanceStringProcesser
     */
    public function __construct($string = ZStrConfigs::EMPTY_STRING, $encoding = null) {
        $this->set($string);
        $this->setEncoding($encoding);
    }

    /**
     * The __toString() magic method. Returns the main string.
     * @return string
     */
    public function __toString() {
        return $this->_s;
    }

    /**
     * Returns the main string.
     * @return string
     */
    public function get() {
        return $this->_s;
    }

    /**
     * Sets the main string to a new value.
     * @param string|AdvanceStringProcesser $value the new main string value
     * @return void
     */
    public function set($value) {
        if(is_string($value)) {
            $this->_s = $value;
        }elseif($value instanceof AdvanceStringProcesser) {
            $this->_s = $value->get();
        }
    }

    /**
     * Fills the main string with the content read from an url or local file path.
     * @param string $url the url or a local file path
     * @return void
     */
    public function load($url) {
        $this->_s = PortableStringProcesser::getUrlContents($url);
    }

    /**
     * Sets the encoding to a new one.
     * @param string $encoding the new encoding
     * @return void
     */
    public function setEncoding($encoding) {
        $this->_encoding = $encoding;
    }

    /**
     * Returns the encoding.
     * @return string
     */
    public function getEncoding() {
        return $this->_encoding;
    }

    /**
     * Duplicates the current AdvanceStringProcesser object.
     * @return AdvanceStringProcesser the duplicated AdvanceStringProcesser object
     */
    public function copy() {
        return new AdvanceStringProcesser($this->_s, $this->_encoding);
    }

    // --------------------------------------------------------------------------------- Validations

    /**
     * Tests if the current string is empty.
     * @return bool
     */
    public function isEmpty() {
        return PortableStringProcesser::isEmpty($this->_s);
    }

    /**
     * Tests if the current string is lower cased.
     * @return bool
     */
    public function isWhite() {
        return PortableStringProcesser::isWhite($this->_s);
    }

    /**
     * Tests if the current string is lower cased.
     * @return bool
     */
    public function isLowerCase() {
        return PortableStringProcesser::isLowerCase($this->_s, $this->_encoding);
    }

    /**
     * Tests if the current string is UPPER CASED.
     * @return bool
     */
    public function isUpperCase() {
        return PortableStringProcesser::isUpperCase($this->_s, $this->_encoding);
    }

    /**
     * Tests if the current string is Sentence Cased.
     * @return bool
     */
    public function isSentenceCase() {
        return PortableStringProcesser::isSentenceCase($this->_s, $this->_encoding);
    }

    /**
     * Tests if the current string is Capital cased: if its fist letter is upper cased.
     * @return bool
     */
    public function isCapitalCase() {
        return PortableStringProcesser::isCapitalCase($this->_s, $this->_encoding);
    }

    /**
     * Validates an email address: tests if the current string represents a valid email address.
     * @return bool
     */
    public function isEmail() {
        return PortableStringProcesser::isEmail($this->_s);
    }

    /**
     * Validates an IP address: tests if the current string represents a valid IP address.
     * @return bool
     */
    public function isIp() {
        return PortableStringProcesser::isIp($this->_s);
    }

    /**
     * Validates an URL address: tests if the current string represents a valid URL address.
     * @return bool
     */
    public function isUrl() {
        return PortableStringProcesser::isUrl($this->_s);
    }

    /**
     * Validates a calendaristic date: tests if the current string represents a valid date.
     * @return bool
     */
    public function isDate() {
        return PortableStringProcesser::isDate($this->_s);
    }

    /**
     * Validates a number: tests if the current string represents a valid number (integer or float).
     * @return bool
     */
    public function isNumeric() {
        return PortableStringProcesser::isNumeric($this->_s);
    }

    /**
     * Validates a float number: tests if the current string represents a valid float number.
     * @return bool
     */
    public function isFloat() {
        return PortableStringProcesser::isFloat($this->_s, $this->_encoding);
    }

    /**
     * Validates an integer number: tests if the current string represents a valid integer number.
     * @return bool
     */
    public function isInteger() {
        return PortableStringProcesser::isInteger($this->_s, $this->_encoding);
    }

    /**
     * Validates an alpha string: tests if the current string consists only of alpha letters.
     * @return bool
     * @see AdvanceStringProcesserConfig::ALPHABET
     */
    public function isAlpha() {
        return PortableStringProcesser::isAlpha($this->_s, $this->_encoding);
    }

    /**
     * Validates an alphanumeric string: tests if the current string consists only of numbers and alpha letters.
     * @return bool
     * @see ZStrConfigs::ALPHABET, AdvanceStringProcesserConfig::DIGITS
     */
    public function isAlphaNumeric() {
        return PortableStringProcesser::isAlphaNumeric($this->_s, $this->_encoding);
    }

    /**
     * Validates a hexadecimal color code: tests if the current string is a valid hexadecimal HTML color representation.
     * @return bool
     */
    public function isHexColor() {
        return PortableStringProcesser::isHexColor($this->_s);
    }

    /**
     * Tests if the current string is inside the range limited by $str1 and $str2.<br/>
     * If current string, $str1 and $str2 are numerical, a numerical check will be performed.
     * @param string|AdvanceStringProcesser $str1 the lower interval limit
     * @param string|AdvanceStringProcesser $str2 the upper interval limit
     * @param bool $closedInterval specifies a closed interval
     * @param bool $caseSensitive specifies if the comparison should be case sensitive or not
     * @return bool
     */
    public function inRange($str1, $str2, $closedInterval = true, $caseSensitive = false) {
        if($str1 instanceof AdvanceStringProcesser) {
            $str1 = $str1->get();
        }
        if($str2 instanceof AdvanceStringProcesser) {
            $str2 = $str2->get();
        }
        return PortableStringProcesser::inRange($this->_s, $str1, $str2, $closedInterval, $caseSensitive);
    }

    // --------------------------------------------------------------------------------- Comparisons
    /**
     * Compares the current string with another string.
     * @param string|AdvanceStringProcesser $string the second string that will be compared with the current string
     * @param bool $caseSensitive specifies if the comparison should be case sensitive or not
     * @param int $len characters number to use in comparison
     * @return int < 0 if str1 is less than str2, > 0 if str1 is greater than str2, and 0 if they are equal
     */
    public function compare($string, $caseSensitive = false, $len = 0) {
        if($string instanceof AdvanceStringProcesser) {
            $string = $string->get();
        }
        return PortableStringProcesser::compare($this->_s, $string, $caseSensitive, $len);
    }

    /**
     * Tests if the current string contains another string.
     * @param string|AdvanceStringProcesser $needle the searched string
     * @param bool $caseSensitive specifies if the search should be case sensitive or not
     * @return bool
     */
    public function contains($needle, $caseSensitive = false) {
        if($needle instanceof AdvanceStringProcesser) {
            $needle = $needle->get();
        }
        return PortableStringProcesser::contains($this->_s, $needle, $caseSensitive, $this->_encoding);
    }

    /**
     * Tests if the current string ends with a string.
     * @param string|AdvanceStringProcesser $string the searched string
     * @param bool $caseSensitive specifies if the search should be case sensitive or not
     * @return bool
     */
    public function endsWith($string, $caseSensitive = false) {
        if($string instanceof AdvanceStringProcesser) {
            $string = $string->get();
        }
        return PortableStringProcesser::endsWith($this->_s, $string, $caseSensitive, $this->_encoding);
    }

    /**
     * Tests if the current string starts with a string.
     * @param string|AdvanceStringProcesser $string the searched string
     * @param bool $caseSensitive specifies if the search should be case sensitive or not
     * @return bool
     */
    public function startsWith($string, $caseSensitive = false) {
        if($string instanceof AdvanceStringProcesser) {
            $string = $string->get();
        }
        return PortableStringProcesser::startsWith($this->_s, $string, $caseSensitive, $this->_encoding);
    }

    /**
     * Tests if the current string equals another string.
     * @param string|AdvanceStringProcesser $string the second string that will be compared with the current string
     * @param bool $caseSensitive specifies if the search should be case sensitive or not
     * @return bool
     */
    public function equals($string, $caseSensitive = false) {
        if($string instanceof AdvanceStringProcesser) {
            $string = $string->get();
        }
        return PortableStringProcesser::equals($this->_s, $string, $caseSensitive);
    }

    // --------------------------------------------------------------------------------- Altering - Basics
    /**
     * Appends a string at the end of the current string.
     * @param string|AdvanceStringProcesser $string the string to be appended
     * @return AdvanceStringProcesser the new string with the append operation made
     */
    public function append($string) {
        if($string instanceof AdvanceStringProcesser) {
            $string = $string->get();
        }
        return new AdvanceStringProcesser($this->_s . $string);
    }

    /**
     * Inserts into the current string, another string at a specified index position.
     * @param string|AdvanceStringProcesser $string the string to be inserted
     * @param int $index index position from the current string at wich the insertion should be made
     * @return AdvanceStringProcesser the new string with the insertion made
     */
    public function insert($string, $index) {
        if($string instanceof AdvanceStringProcesser) {
            $string = $string->get();
        }
        return new AdvanceStringProcesser(PortableStringProcesser::insert($this->_s, $string, $index, $this->_encoding), $this->_encoding);
    }

    /**
     * Removes a portion of the current string starting at a specified index position having a specified length.
     * @param int $index starting index to begin removal
     * @param int $length length of the portion to be removed
     * @return AdvanceStringProcesser the new string with the removal made
     */
    public function remove($index, $length = 0) {
        return new AdvanceStringProcesser(PortableStringProcesser::remove($this->_s, $index, $length, $this->_encoding), $this->_encoding);
    }

    /**
     * Replaces a specified number of occurrences of the $search string with the $replace string inside the current string.
     * @param string|AdvanceStringProcesser $search the search string
     * @param string|AdvanceStringProcesser $replace the replacement string
     * @param int $occurrences the number of replacement to be made (if not specified all occurrences will be replaced)
     * @param bool $caseSensitive specifies if the search should be case sensitive or not
     * @return AdvanceStringProcesser the new string with the needed replacements made
     */
    public function substitute($search, $replace, $occurrences = null, $caseSensitive = false) {
        if($search instanceof AdvanceStringProcesser) {
            $search = $search->get();
        }
        if($replace instanceof AdvanceStringProcesser) {
            $replace = $replace->get();
        }
        return new AdvanceStringProcesser(PortableStringProcesser::substitute($this->_s, $search, $replace, $occurrences, $caseSensitive, $this->_encoding), $this->_encoding);
    }

    /**
     * Replace all occurrences of the search string with the replacement string into the current string.
     * @param string|AdvanceStringProcesser $search the search string
     * @param string|AdvanceStringProcesser $replace the replacement string
     * @param bool $caseSensitive specifies if the search should be case sensitive or not
     * @return AdvanceStringProcesser the new string with the needed replacements made
     */
    public function replace($search, $replace, $caseSensitive = false) {
        if($search instanceof AdvanceStringProcesser) {
            $search = $search->get();
        }
        if($replace instanceof AdvanceStringProcesser) {
            $replace = $replace->get();
        }
        return new AdvanceStringProcesser(PortableStringProcesser::replace($this->_s, $search, $replace, $caseSensitive, $this->_encoding), $this->_encoding);
    }

    // --------------------------------------------------------------------------------- Altering - Padding
    /**
     * Pads left the current string.
     * @param int $finalWidth the total length of the padded string
     * @param string|AdvanceStringProcesser $with the string used to pad (if not specified, whitespace will be used)
     * @return AdvanceStringProcesser the padded string
     */
    public function padLeft($finalWidth, $with = ' ') {
        if($with instanceof AdvanceStringProcesser) {
            $with = $with->get();
        }
        return new AdvanceStringProcesser(PortableStringProcesser::padLeft($this->_s, $finalWidth, $with), $this->_encoding);
    }

    /**
     * Pads right the current string.
     * @param int $finalWidth the total length of the padded string
     * @param string|AdvanceStringProcesser $with the string used to pad (if not specified, whitespace will be used)
     * @return AdvanceStringProcesser the padded string
     */
    public function padRight($finalWidth, $with = ' ') {
        if($with instanceof AdvanceStringProcesser) {
            $with = $with->get();
        }
        return new AdvanceStringProcesser(PortableStringProcesser::padRight($this->_s, $finalWidth, $with), $this->_encoding);
    }

    /**
     * Pads left and right the current string.
     * @param int $finalWidth the total length of the padded string
     * @param string|AdvanceStringProcesser $with the string used to pad (if not specified, whitespace will be used)
     * @return AdvanceStringProcesser the padded string
     */
    public function padBoth($finalWidth, $with = ' ') {
        if($with instanceof AdvanceStringProcesser) {
            $with = $with->get();
        }
        return new AdvanceStringProcesser(PortableStringProcesser::padBoth($this->_s, $finalWidth, $with), $this->_encoding);
    }

    /**
     * Encloses the current string into other strings specified by $str1 (for left side) and $str2 (for right side).
     * @param string|AdvanceStringProcesser $str1 the left string
     * @param string|AdvanceStringProcesser $str2 the input string (if not specified, $str2 will equals the reverse of $str1 or the corresponding closing parenthesis if $str1 is an open parenthesis)
     * @return AdvanceStringProcesser the enclosed string
     */
    public function enclose($str1, $str2 = null) {
        if($str1 instanceof AdvanceStringProcesser) {
            $str1 = $str1->get();
        }
        if($str2 instanceof AdvanceStringProcesser) {
            $str2 = $str2->get();
        }
        return new AdvanceStringProcesser(PortableStringProcesser::enclose($this->_s, $str1, $str2, $this->_encoding), $this->_encoding);
    }

    // --------------------------------------------------------------------------------- Altering - Splitting
    /**
     * Wordwraps the current string by specified number of columns and returns an array consisting of the text lines after wrap.
     * @param int $columns
     * @return array the text lines after wrapping
     */
    public function wordWrap($columns = 64) {
        return PortableStringProcesser::wordWrap($this->_s, $columns, $this->_encoding);
    }

    /**
     * Splits the current string into smaller chunks of a specified length divided by a specified separator.
     * @param int $chunklen the chunk length
     * @param string $separator the chunk separator
     * @return string the chunks-splitted string
     */
    public function chunkSplit($chunklen = null, $separator = null) {
        return new AdvanceStringProcesser(PortableStringProcesser::chunkSplit($this->_s, $chunklen, $separator, $this->_encoding), $this->_encoding);
    }

    /**
     * Splits the current string by a string separator.
     * @param string $separator the separator
     * @param int $limit specifies the maximum number of elements that the returning array will contain
     * @return array
     */
    public function explode($separator, $limit = null) {
        if(isset($limit)) {
            return explode($separator, $this->_s, $limit);
        }else {
            return explode($separator, $this->_s);
        }
    }

    /**
     * Splits the current string into smaller chunks of a specified length and returns the chunks into an array.
     * @param int $length the chunk length
     * @return array the chunks array
     */
    public function split($length = null) {
        return PortableStringProcesser::split($this->_s, $length, $this->_encoding);
    }

    // --------------------------------------------------------------------------------- Altering - Trimming
    /**
     * Strip characters from the beginning of the current string.
     * @param string $charList the list of characters to be trimmed (if not specified, a default list will be used consisting of: whitespace, tab, new line, carriage return, null byte, vertical tab)
     * @param bool $caseSensitive specifies if the char comparison with of char list to be stripped should be case sensitive or not
     * @return AdvanceStringProcesser the trimmed string
     */
    public function trimStart($charList = null, $caseSensitive = false) {
        return new AdvanceStringProcesser(PortableStringProcesser::trimStart($this->_s, $charList, $caseSensitive, $this->_encoding), $this->_encoding);
    }

    /**
     * Strip characters from the end of the current string.
     * @param string $charList the list of characters to be trimmed (if not specified, a default list will be used consisting of: whitespace, tab, new line, carriage return, null byte, vertical tab)
     * @param bool $caseSensitive specifies if the char comparison with of char list to be stripped should be case sensitive or not
     * @return AdvanceStringProcesser the trimmed string
     */
    public function trimEnd($charList = null, $caseSensitive = false) {
        return new AdvanceStringProcesser(PortableStringProcesser::trimEnd($this->_s, $charList, $caseSensitive, $this->_encoding), $this->_encoding);
    }

    /**
     * Strip characters from the beginning and end of the current string.
     * @param string $charList the list of characters to be trimmed (if not specified, a default list will be used consisting of: whitespace, tab, new line, carriage return, null byte, vertical tab)
     * @param bool $caseSensitive specifies if the char comparison with of char list to be stripped should be case sensitive or not
     * @return AdvanceStringProcesser the trimmed string
     */
    public function trimBoth($charList = null, $caseSensitive = false) {
        return new AdvanceStringProcesser(PortableStringProcesser::trimBoth($this->_s, $charList, $caseSensitive, $this->_encoding), $this->_encoding);
    }

    /**
     * Strip all non alpha numeric characters from the current string, leaving only letters and numbers.
     * @return AdvanceStringProcesser the stripped string
     * @see ZStrConfigs::ALPHABET, ZStrConfigs::DIGITS
     */
    public function removeNonAlphaNumeric() {
        return new AdvanceStringProcesser(PortableStringProcesser::removeNonAlphaNumeric($this->_s), $this->_encoding);
    }

    /**
     * Strip all non alpha characters from the current string, leaving only letters.
     * @return AdvanceStringProcesser the stripped string
     * @see ZStrConfigs::ALPHABET
     */
    public function removeNonAlpha() {
        return new AdvanceStringProcesser(PortableStringProcesser::removeNonAlpha($this->_s), $this->_encoding);
    }

    /**
     * Strip all non numeric characters from the current string, leaving only digits.
     * @return AdvanceStringProcesser the stripped string
     * @see ZStrConfigs::DIGITS
     */
    public function removeNonNumeric() {
        return new AdvanceStringProcesser(PortableStringProcesser::removeNonNumeric($this->_s), $this->_encoding);
    }

    // --------------------------------------------------------------------------------- Altering - Casing
    /**
     * Converts the current string to lowercase.
     * @return AdvanceStringProcesser
     */
    public function toLowerCase() {
        return new AdvanceStringProcesser(PortableStringProcesser::strtolower($this->_s, $this->_encoding), $this->_encoding);
    }

    /**
     * Converts a string to UPPERCASE.
     * @return AdvanceStringProcesser
     */
    public function toUpperCase() {
        return new AdvanceStringProcesser(PortableStringProcesser::strtoupper($this->_s, $this->_encoding), $this->_encoding);
    }

    /**
     * Converts a string to Title Case.
     * @return AdvanceStringProcesser
     */
    public function toSentenceCase() {
        return new AdvanceStringProcesser(PortableStringProcesser::ucwords($this->_s, $this->_encoding), $this->_encoding);
    }

    /**
     * Converts a string to Capital case: its fist letter will be upper cased.
     * @return AdvanceStringProcesser
     */
    public function toCapitalCase() {
        return new AdvanceStringProcesser(PortableStringProcesser::capitalize($this->_s, $this->_encoding), $this->_encoding);
    }

    /**
     * Randomizes the letter cases of a string: its all letters will have random case.
     * @return AdvanceStringProcesser
     */
    public function toRandomCase() {
        return new AdvanceStringProcesser(PortableStringProcesser::randomCase($this->_s, $this->_encoding), $this->_encoding);
    }

    /**
     * Returns a string with its first letter converted to lowercase.
     * @return AdvanceStringProcesser
     */
    public function firstCharToLower() {
        return new AdvanceStringProcesser(PortableStringProcesser::lcfirst($this->_s, $this->_encoding), $this->_encoding);
    }

    /**
     * Returns a string with its first letter converted to UPPERCASE.
     * @return AdvanceStringProcesser
     */
    public function firstCharToUpper() {
        return new AdvanceStringProcesser(PortableStringProcesser::ucfirst($this->_s, $this->_encoding), $this->_encoding);
    }

    // --------------------------------------------------------------------------------- Altering - Generators
    /**
     * Repeats the current string.
     * @param int $count
     * @return AdvanceStringProcesser
     */
    public function repeat($count) {
        return new AdvanceStringProcesser(str_repeat($this->_s, $count), $this->_encoding);
    }

    /**
     * Shuffles the current string by randomizing its the character orders.
     * @param bool $keepMargins specifies if the first and the last letter orders should remain unchanged
     * @return AdvanceStringProcesser the shuffled string
     */
    public function shuffle($keepMargins = false) {
        return new AdvanceStringProcesser(PortableStringProcesser::shuffle($this->_s, $keepMargins, $this->_encoding), $this->_encoding);
    }

    /**
     * Scrambles the current string (sentence) by shuffling its words.
     * @return AdvanceStringProcesser the scrambled sentence
     */
    public function scramble() {
        return new AdvanceStringProcesser(PortableStringProcesser::scramble($this->_s, $this->_encoding), $this->_encoding);
    }

    /**
     * Reverses the current string.
     * @return AdvanceStringProcesser the reversed string
     */
    public function reverse() {
        return new AdvanceStringProcesser(PortableStringProcesser::strrev($this->_s, $this->_encoding), $this->_encoding);
    }

    /**
     * Generates a random password of a specified length.
     * @param int $length the password length
     * @return AdvanceStringProcesser the generated password
     */
    public function generatePassword($length = 8) {
        return new AdvanceStringProcesser(PortableStringProcesser::generatePassword($length, $this->_encoding), $this->_encoding);
    }

    /**
     * Generates a general unique identifier.
     * @return AdvanceStringProcesser the generated general unique identifier
     */
    public function generateGUID() {
        return new AdvanceStringProcesser(PortableStringProcesser::generateGUID(), $this->_encoding);
    }

    /**
     * Extracts and converts numbers founded inside the current string to theirs literal english representations: spells (english only) the founded numbers.
     * @param int $index specifies the index of number to be extracted and spelled; if not specified, all numbers will be spelled and the result will be an array containing the spelled numbers
     * @return AdvanceStringProcesser|array
     */
    public function spellExtractedNumber($index = null) {
        $numbers = $this->extractNumbers();
        if(isset($index)) {
            $num = '';
            if($index < count($numbers)) {
                $num = $numbers[$index];
            }
            return new AdvanceStringProcesser(PortableStringProcesser::spellNumber($num), $this->_encoding);
        }else {
            $ret = array();
            foreach($numbers as $num) {
                $ret[] = new AdvanceStringProcesser(PortableStringProcesser::spellNumber($num), $this->_encoding);
            }
            return $ret;
        }
    }

    /**
     * Extracts and converts numbers founded inside the current string to theirs corresponding nicer byte size formats.
     * @param int $index specifies the index of number to be extracted and converted; if not specified, all numbers will be converted and the result will be an array containing the nicer byte size formats
     * @return AdvanceStringProcesser|array
     */
    public function byteSizeExtractedNumber($index = null) {
        $numbers = $this->extractNumbers();
        if(isset($index)) {
            $num = '';
            if($index < count($numbers)) {
                $num = $numbers[$index];
            }
            return new AdvanceStringProcesser(PortableStringProcesser::byteSizeNumber($num), $this->_encoding);
        }else {
            $ret = array();
            foreach($numbers as $num) {
                $ret[] = new AdvanceStringProcesser(PortableStringProcesser::byteSizeNumber($num), $this->_encoding);
            }
            return $ret;
        }
    }

    /**
     * Spells all the numbers founded into the current strings starting from a specified index.
     * @param int $startIndex specifies from which number index the spelling should start; meaning that all precedent numbers will be skipped
     * @return AdvanceStringProcesser
     */
    public function spellNumbers($startIndex = 0) {
        return new AdvanceStringProcesser(PortableStringProcesser::spellNumbers($this->_s, $startIndex, $this->_encoding), $this->_encoding);
    }

    /**
     * Converts to their nicer byte size representation all the numbers founded into the current string starting from a specified index.
     * @param int $startIndex specifies from which number index the conversion should start; meaning that all precedent numbers will be skipped
     * @return AdvanceStringProcesser
     */
    public function byteSizeNumbers($startIndex = 0) {
        return new AdvanceStringProcesser(PortableStringProcesser::byteSizeNumbers($this->_s, $startIndex, $this->_encoding), $this->_encoding);
    }

    // --------------------------------------------------------------------------------- Altering - Special
    /**
     * Shortens the current string.
     * @param int $length the final length of the string
     * @param float $position the position (in percents) where the glue string should be placed (ex. 0 = maximum left, 0.25 = quite left, 0.5 = middle, 1 = maximum right etc.)
     * @param string $glue the glue string
     * @return AdvanceStringProcesser the short string
     */
    public function shorten($length = 64, $position = 0.5, $glue = null) {
        return new AdvanceStringProcesser(PortableStringProcesser::shorten($this->_s, $length, $position, $glue, $this->_encoding), $this->_encoding);
    }

    /**
     * Applies censor to the full current string, by replacing characters with other character.
     * @param bool $keepMargins specifies if the first and the last string letter will remain unchanged (will not be replaced with $replaceChar)
     * @param string $replaceChar the replacement character (if not specifed, 'x' will be used)
     * @return AdvanceStringProcesser the censored string
     */
    public function censor($keepMargins = true, $replaceChar = null) {
        return new AdvanceStringProcesser(PortableStringProcesser::censor($this->_s, $keepMargins, $replaceChar, $this->_encoding), $this->_encoding);
    }

    /**
     * Applies censor to the current string (sentence) by checking its words against a list of bad words submitted. If no bad-words list is specified it will be loaded from a local file.
     * @param array $badWords the bad words list
     * @param bool $keepMargins specifies if the first and the last letter of a censored word will remain unchanged (will not be replaced with $replaceChar)
     * @param string $replaceChar the replacement character (if not specified, 'x' will be used)
     * @return AdvanceStringProcesser the censored sentence
     * @see ZStrConfigs::BAD_WORDS_FILE_NAME
     */
    public function censorWords($badWords = null, $keepMargins = true, $replaceChar = null) {
        return new AdvanceStringProcesser(PortableStringProcesser::censorWords($this->_s, $badWords, $keepMargins, $replaceChar, $this->_encoding), $this->_encoding);
    }

    /**
     * Makes the current string seo friendly by replacing invalid url characters with '-'.
     * @return AdvanceStringProcesser the seo friendly string
     */
    public function seoFriendly() {
        return new AdvanceStringProcesser(PortableStringProcesser::seoFriendly($this->_s, $this->_encoding), $this->_encoding);
    }

    /**
     * Emphasizes the current string by enclosing search phrases into specified tags. The corresponding closing tags will be automatically calculated.
     * @param array|string $phrases search phrases to be emphasized
     * @param bool $caseSensitive specifies if the search for phrases should be case sensitive or not
     * @param string $tag the emphasising tag for word matches
     * @param string $tagFull the emphasising tag for phrase matches
     * @return AdvanceStringProcesser the emphasized string
     */
    public function emphasize($phrases, $caseSensitive = true, $tag = null, $tagFull = null) {
        return new AdvanceStringProcesser(PortableStringProcesser::emphasize($this->_s, $phrases, $caseSensitive, $tag, $tagFull, $this->_encoding), $this->_encoding);
    }

    // --------------------------------------------------------------------------------- Extracting - String operations
    /**
     * Returns a segment of the current string starting from index $start parameter having the length specified by $length parameter.
     * @param int $start the starting index
     * @param int $length the returned length
     * @return AdvanceStringProcesser
     */
    public function substring($start, $length = null) {
        return new AdvanceStringProcesser(PortableStringProcesser::substr($this->_s, $start, $length, $this->_encoding), $this->_encoding);
    }

    /**
     * Returns a substring from the current string between two sub-strings.
     * @param string $strStart the starting substring
     * @param string $strEnd the end substring
     * @param string $afterStr if specified, the searching will start from this substring
     * @param bool $caseSensitive specifies if the char comparison with of char list to be stripped should be case sensitive or not
     * @return AdvanceStringProcesser the substring between $strStart and $strEnd
     */
    public function between($strStart, $strEnd = null, $afterStr = null, $caseSensitive = false) {
        return new AdvanceStringProcesser(PortableStringProcesser::between($this->_s, $strStart, $strEnd, $afterStr, $caseSensitive), $this->_encoding);
    }

    /**
     * Intersects the current string with another string. The method will return the common portion of the two strings.
     * @param string|AdvanceStringProcesser $string the second string
     * @return AdvanceStringProcesser the common portion of the two strings
     */
    public function intersect($string) {
        if($string instanceof AdvanceStringProcesser) {
            $string = $string->get();
        }
        return new AdvanceStringProcesser(PortableStringProcesser::intersect($this->_s, $string, $this->_encoding), $this->_encoding);
    }

    /**
     * Intersects the characters of the current string with the characters of another string. The method will return the common characters founded inside the two strings.
     * @param string|AdvanceStringProcesser $string the second input string
     * @return AdvanceStringProcesser a string consisting of the common characters from the two strings
     */
    public function intersectChars($string) {
        if($string instanceof AdvanceStringProcesser) {
            $string = $string->get();
        }
        return new AdvanceStringProcesser(PortableStringProcesser::intersectChars($this->_s, $string, $this->_encoding), $this->_encoding);
    }

    /**
     * Intersects the words of the current string with the words of another string. The method will return the common words founded inside the two strings.
     * @param string|AdvanceStringProcesser $string the second input string
     * @return AdvanceStringProcesser a string consisting of the common words from the two strings
     */
    public function intersectWords($string) {
        if($string instanceof AdvanceStringProcesser) {
            $string = $string->get();
        }
        return new AdvanceStringProcesser(PortableStringProcesser::intersectWords($this->_s, $string, $this->_encoding), $this->_encoding);
    }

    // --------------------------------------------------------------------------------- Extracting - Numbers
    /**
     * Extracts all the numbers founded inside the current string.
     * @return array the extracted numbers
     */
    public function extractNumbers() {
        return PortableStringProcesser::extractNumbers($this->_s);
    }

    // --------------------------------------------------------------------------------- Extracting - Character operations
    /**
     * Extracts a character at a specified index from the current string.
     * @param int $index character index to extract
     * @return AdvanceStringProcesser the extracted character
     */
    public function char($index) {
        return new AdvanceStringProcesser(PortableStringProcesser::char($this->_s, $index, $this->_encoding), $this->_encoding);
    }

    /**
     * Splits the current string into its characters.
     * @return array the characters array
     */
    public function chars() {
        return PortableStringProcesser::chars($this->_s, $this->_encoding);
    }

    /**
     * Extracts and counts each unique character occurrence of the current string.
     * @param bool $caseSensitive specifies if character extracting and counting should be case sensitive or not
     * @return array the unique characters array having as keys the characters and as values the number of occurrences
     */
    public function uniqueChars($caseSensitive = false) {
        return PortableStringProcesser::uniqueChars($this->_s, $caseSensitive, $this->_encoding);
    }

    /**
     * Returns the ord of each character inside the current string.
     * @return array
     */
    public function ord() {
        return PortableStringProcesser::ord($this->_s, $this->_encoding);
    }

    // --------------------------------------------------------------------------------- Extracting - Word operations
    /**
     * Extracts a word at a specified index from the current string.
     * @param int $index word index to extract
     * @return AdvanceStringProcesser the extracted word
     */
    public function word($index) {
        return PortableStringProcesser::word($this->_s, $index, $this->_encoding);
    }

    /**
     * Extracts all the words founded inside the current string.
     * @return array the extracted words array
     */
    public function words() {
        return PortableStringProcesser::words($this->_s, $this->_encoding);
    }

    /**
     * Extracts and counts each unique word occurrence from the current string (sentence).
     * @param bool $caseSensitive specifies if word extracting and counting should be case sensitive or not
     * @return array the unique words array having as keys the words and as values the number of occurrences
     */
    public function uniqueWords($caseSensitive = false) {
        return PortableStringProcesser::uniqueWords($this->_s, $caseSensitive, $this->_encoding);
    }

    // --------------------------------------------------------------------------------- Extracting - Searching
    /**
     * Returns the numeric position of the first occurrence of $needle inside the current string.
     * @param string|AdvanceStringProcesser $needle the string to search for
     * @param int $offset specifies from which character offset index from the current string to start searching
     * @param bool $caseSensitive specifies if the search will be case sensitive or not
     * @return int
     */
    public function firstIndex($needle, $offset = 0, $caseSensitive = false) {
        if($needle instanceof AdvanceStringProcesser) {
            $needle = $needle->get();
        }
        return PortableStringProcesser::firstIndex($this->_s, $needle, $offset, $caseSensitive, $this->_encoding);
    }

    /**
     * Returns the numeric position of the last occurrence of $needle inside the current string.
     * @param string|AdvanceStringProcesser $needle the string to search for
     * @param int $offset specifies from which character offset index from the current string to start searching
     * @param bool $caseSensitive specifies if the search will be case sensitive or not
     * @return int
     */
    public function lastIndex($needle, $offset = 0, $caseSensitive = false) {
        if($needle instanceof AdvanceStringProcesser) {
            $needle = $needle->get();
        }
        return PortableStringProcesser::lastIndex($this->_s, $needle, $offset, $caseSensitive, $this->_encoding);
    }

    // --------------------------------------------------------------------------------- Encoding - Encrypting
    /**
     * Computes the crc32 polynomial of the current string.
     * @return int
     */
    public function crc32() {
        return crc32($this->_s);
    }

    /**
     * Computes the md5 hash of the current string.
     * @return AdvanceStringProcesser
     */
    public function encodeMd5() {
        return new AdvanceStringProcesser(md5($this->_s), $this->_encoding);
    }

    /**
     * Computes the sha1 hash of the current string.
     * return AdvanceStringProcesser
     */
    public function encodeSha1() {
        return new AdvanceStringProcesser(sha1($this->_s), $this->_encoding);
    }

    // --------------------------------------------------------------------------------- Encoding - Encoding, Decoding
    /**
     * Uu-encodes the current string.
     * @return AdvanceStringProcesser
     */
    public function encodeUu() {
        return new AdvanceStringProcesser(convert_uuencode($this->_s), $this->_encoding);
    }

    /**
     * Decodes the uu-encoded current string.
     * @return AdvanceStringProcesser
     */
    public function decodeUu() {
        return new AdvanceStringProcesser(convert_uudecode($this->_s), $this->_encoding);
    }

    /**
     * Performs the rot13 transform on the current string. The string is encoded to base64 first.
     * @return AdvanceStringProcesser
     */
    public function encodeRot13() {
        return new AdvanceStringProcesser(str_rot13(base64_encode($this->_s)), $this->_encoding);
    }

    /**
     * Performs the rot13 transform on the current string. Afterwards, the string is decoded from base64.
     * @return AdvanceStringProcesser
     */
    public function decodeRot13() {
        return new AdvanceStringProcesser(base64_decode(str_rot13($this->_s)), $this->_encoding);
    }

    /**
     * Encodes the current string with MIME base64.
     * @return AdvanceStringProcesser
     */
    public function encodeBase64() {
        return new AdvanceStringProcesser(base64_encode($this->_s), $this->_encoding);
    }

    /**
     * Decodes the current string encoded with MIME base64.
     * @return AdvanceStringProcesser
     */
    public function decodeBase64() {
        return new AdvanceStringProcesser(base64_decode($this->_s), $this->_encoding);
    }

    /**
     * Converts all HTML special characters and entities into displayable elements (like PHP htmlentities).
     * @return AdvanceStringProcesser
     */
    public function encodeHtml() {
        return new AdvanceStringProcesser(PortableStringProcesser::htmlCompatible($this->_s, true, $this->_encoding), $this->_encoding);
    }

    /**
     * Convert all HTML entities to their applicable characters.
     * @return AdvanceStringProcesser
     */
    public function decodeHtml() {
        return new AdvanceStringProcesser(html_entity_decode($this->_s, ENT_QUOTES), $this->_encoding);

    }

    // --------------------------------------------------------------------------------- HTML
    /**
     * Appends an HTML break line (&lt;br/&gt;) at the end of the current string.
     * @return AdvanceStringProcesser
     */
    public function htmlAppendBreak() {
        return new AdvanceStringProcesser(PortableStringProcesser::htmlAppendBreak($this->_s), $this->_encoding);
    }

    /**
     * Inserts an HTML break line (&lt;br/&gt;) at the beginning of the current string.
     * @return AdvanceStringProcesser
     */
    public function htmlInsertBreak() {
        return new AdvanceStringProcesser(PortableStringProcesser::htmlInsertBreak($this->_s), $this->_encoding);
    }

    /**
     * Encloses the current string into an HTML tag. The corresponding closing tag will be automatically computed.
     * @param string $tag the tag; if not specified &lt;div&gt; will be assumed
     * @return AdvanceStringProcesser the tag enclosed string
     */
    public function htmlTagEnclose($tag = null) {
        return new AdvanceStringProcesser(PortableStringProcesser::htmlTagEnclose($this->_s, $tag), $this->_encoding);
    }

    /**
     * Converts all HTML special characters and entities into displayable elements (like PHP htmlentities).
     * @param bool $all specifies if all the entities will be converted or the special chars only
     * @return AdvanceStringProcesser
     */
    public function htmlCompatible($all = true) {
        return new AdvanceStringProcesser(PortableStringProcesser::htmlCompatible($this->_s, $all, $this->_encoding), $this->_encoding);
    }

    /**
     * Inserts HTML line breaks before all newlines in the current string.
     * @return AdvanceStringProcesser
     */
    public function htmlNl2Br() {
        return new AdvanceStringProcesser(nl2br($this->_s), $this->_encoding);
    }


    // --------------------------------------------------------------------------------- Statistics

    /**
     * Returns the length of the current string.
     * @return int
     */
    public function length() {
        return PortableStringProcesser::strlen($this->_s);
    }

    /**
     * Returns the total number of characters form the current string.
     * @return int
     */
    public function charsCount() {
        return count($this->chars());
    }

    /**
     * Returns the number of unique characters from the current string.
     * @param bool $caseSensitive specifies if the counting should be case sensitive or not
     * @return int
     */
    public function uniqueCharsCount($caseSensitive = false) {
        return count($this->uniqueChars($caseSensitive));
    }

    /**
     * Returns the total number of words from the current string (sentence).
     * @return int
     */
    public function wordsCount() {
        return count($this->words());
    }

    /**
     * Returns the number of unique words from the current string.
     * @param bool $caseSensitive specifies if the counting should be case sensitive or not
     * @return int
     */
    public function uniqueWordsCount($caseSensitive = false) {
        return count($this->uniqueWords($caseSensitive));
    }



    // --------------------------------------------------------------------------------- Thesaurus
    /**
     * Computes the Levenshtein distance between the current string and another string.
     * @param string|AdvanceStringProcesser $string the second string
     * @return int the computed Levenshtein distance
     */
    public function levenshtein($string) {
        if($string instanceof AdvanceStringProcesser) {
            $string = $string->get();
        }
        return PortableStringProcesser::levenshtein($this->_s, $string);
    }

    /**
     * Computes the Levenshtein distance between the current string and another string as a percent between the length of the current string and the actual Levenshtein distance between them.
     * Useful when computing closest dictionary matches in a check spelling algorithm.
     * @param string|AdvanceStringProcesser $string the second string
     * @return float|int the percent: the greater it is, the most similar the two strings are
     */
    public function levenshteinPercent($string) {
        if($string instanceof AdvanceStringProcesser) {
            $string = $string->get();
        }
        return PortableStringProcesser::levenshteinPercent($this->_s, $string);
    }

    /**
     * Computes the soundex key of the current string.
     * @return AdvanceStringProcesser
     */
    public function soundex() {
        return new AdvanceStringProcesser(PortableStringProcesser::soundex($this->_s), $this->_encoding);
    }

    /**
     * Computes the Levenshtein distance percent between the soundex keys of the current string and another string.
     * Useful when computing closest dictionary matches in a check spelling algorithm.
     * @param string|AdvanceStringProcesser $string the second string
     * @return float|int the percent: the greater it is, the most similar the two strings are
     */
    public function soundexPercent($string) {
        if($string instanceof AdvanceStringProcesser) {
            $string = $string->get();
        }
        return PortableStringProcesser::soundexPercent($this->_s, $string);
    }

    /**
     * Computes the metaphone key of the current string.
     * @return AdvanceStringProcesser
     */
    public function metaphone() {
        return new AdvanceStringProcesser(PortableStringProcesser::metaphone($this->_s), $this->_encoding);
    }

    /**
     * Computes the Levenshtein distance percent between the metaphone keys of the current string and another string.
     * Useful when computing closest dictionary matches in a check spelling algorithm.
     * @param string|AdvanceStringProcesser $string the second string
     * @return float|int the percent: the greater it is, the most similar the two strings are
     */
    public function metaphonePercent($string) {
        if($string instanceof AdvanceStringProcesser) {
            $string = $string->get();
        }
        return PortableStringProcesser::metaphonePercent($this->_s, $string);
    }

    /**
     * Computes the similarity percent between the current string and another string.
     * Useful when computing closest dictionary matches in a check spelling algorithm.
     * @param string|AdvanceStringProcesser $string the second string
     * @return float|int the percent: the greater it is, the most similar the two strings are
     */
    public function intersectionPercent($string) {
        if($string instanceof AdvanceStringProcesser) {
            $string = $string->get();
        }
        return PortableStringProcesser::intersectionPercent($this->_s, $string);
    }

    /**
     * Tests if the current string sounds similar to another string according to a desired precision offset percent.
     * The test is made using the metaphone key representations of the strings.
     * @param string|AdvanceStringProcesser $string the second string
     * @param int $precisionPercent the precision offset percent
     * @return bool
     */
    public function soundsLike($string, $precisionPercent = null) {
        if($string instanceof AdvanceStringProcesser) {
            $string = $string->get();
        }
        return PortableStringProcesser::soundsLike($this->_s, $string, $precisionPercent);
    }


    /**
     * Computes the similarity match percent between the current string and another as an average value of the used single similarity computation functions.
     * Useful when comparing similarity of two strings or when computing closest dictionary matches in a check spelling algorithm.
     * @param string|AdvanceStringProcesser $string the second string
     * @param bool $useMetaphone specifies if the metaphonePercent() function will be used
     * @param bool $useSoundex specifies if the soundexPercent() function will be used
     * @param bool $useIntersection specifies if the intersectionPercent() function will be used
     * @param bool $useLevenshtein specifies if the levenshteinPercent() function will be used
     * @return float|int the percent: the greater it is, the most similar the two strings are
     * @see metaphonePercent(), soundexPercent(), intersectionPercent(), levenshteinPercent()
     */
    public function matchPercent($string, $useMetaphone = true, $useSoundex = true, $useIntersection = true, $useLevenshtein = true) {
        if($string instanceof AdvanceStringProcesser) {
            $string = $string->get();
        }
        return PortableStringProcesser::matchPercent($this->_s, $string, $useMetaphone, $useSoundex, $useIntersection, $useLevenshtein);
    }

    // --------------------------------------------------------------------------------- Spelling

    /**
     * Creates a spell checker object by instantiating a class using a given spell checker name.
     * The class name must start with <em>wlSpellChecker</em> prefix (ex. wlSpellCheckerDictionaryCom) and the class itself must reside inside a PHP file having the same name as class and ending of course with <em>.php</em> extension (ex. wlSpellCheckerDictionaryCom.php).
     * Also, to avoid confusions, the PHP file must contain only one class definition.<br/>
     * The class name will be computed by adding <em>wlSpellChecker</em> prefix to the given $spellCheckerName parameter and then that class will be instantiated to a spell checker object having as string to check the current AdvanceStringProcesser string object.
     * @param string $spellCheckerName the spell checker name used to determine the spell checker class name (ex. DictionaryCom)
     * @return wlSpellChecker the spell checker object
     * @see wlSpellChecker
     */
    private function getSpellCheckerObject($spellCheckerName = null) {
        if(!isset($spellCheckerName)) {
            $spellCheckerName = 'Local';
        }
        $splClassName = $spellCheckerName;
        if(!PortableStringProcesser::startsWith($splClassName, 'wlSpellChecker', false)) {
            $splClassName = 'wlSpellChecker' . $splClassName;
        }
        $splClassName = str_replace('.php', '', $splClassName);
        require_once dirname(__FILE__) . '/' . $splClassName . '.php';
        $splObj = new $splClassName($this);
        return $splObj;
    }

    /**
     * Returns the closest dictionary word match of the current string by checking its spelling against a given spell checker.
     * The speller class name will be computed by adding <em>wlSpellChecker</em> prefix to the given $spellCheckerName parameter and then that class will be instantiated to a spell checker object having as string to check the current AdvanceStringProcesser string object.
     * @param string $spellCheckerName the spell checker name used to determine the spell checker class name (ex. DictionaryCom)
     * @return AdvanceStringProcesser the closest dictionary match
     * @see getSpellCheckerObject, wlSpellChecker
     */
    public function getClosestMatch($spellCheckerName = null) {
        $splChk = $this->getSpellCheckerObject($spellCheckerName);
        return new AdvanceStringProcesser($splChk->getClosestMatch(), $this->_encoding);
    }

    /**
     * Returns the closest word matches of the current string by checking its spelling against a given spell checker.<br/>
     * The matches will be returned as an array sorted by the matching percent in descending order, containing the words and the corresponding matching percents.<br/>
     * The matches number can be filtered by setting a limit count and a minimal matching percent.<br/>
     * The speller class name will be computed by adding <em>wlSpellChecker</em> prefix to the given $spellCheckerName parameter and then that class will be instantiated to a spell checker object having as string to check the current AdvanceStringProcesser string object.
     * @param int|float $minMatchPercent the minimum matching percent; above this value the corresponding dictionary entry will be included in the resulting array
     * @param int $count the count that limits the length of the resulting array
     * @param string $spellCheckerName the spell checker name used to determine the spell checker class name (ex. DictionaryCom)
     * @return array the matches array
     * @see getSpellCheckerObject, wlSpellChecker
     */
    public function getMatches($minMatchPercent = null, $count = null, $spellCheckerName = null) {
        $splChk = $this->getSpellCheckerObject($spellCheckerName);
        return $splChk->getMatches($minMatchPercent, $count);
    }

    /**
     * Spell checks the current string (sentence) against a given spell checker.<br/>
     * The method returns an associative array having as keys the misspelled words and as values the corresponding dictionary closest match.<br/>
     * The speller class name will be computed by adding <em>wlSpellChecker</em> prefix to the given $spellCheckerName parameter and then that class will be instantiated to a spell checker object having as string to check the current AdvanceStringProcesser string object.
     * @param string $spellCheckerName
     * @return array the spell checking array
     * @see getSpellCheckerObject, wlSpellChecker
     */
    public function spellCheck($spellCheckerName = null) {
        $splChk = $this->getSpellCheckerObject($spellCheckerName);
        return $splChk->check();
    }

    /**
     * Spell checks the current string (sentence) against a given spell checker, and then emphasize the misspelled words by enclosing them into a specified tag.<br/>
     * The corresponding closing tag will be automatically computed.<br/>
     * The speller class name will be computed by adding <em>wlSpellChecker</em> prefix to the given $spellCheckerName parameter and then that class will be instantiated to a spell checker object having as string to check the current AdvanceStringProcesser string object.
     * @param string $spellCheckerName the spell checker name used to determine the spell checker class name (ex. DictionaryCom)
     * @param string $tag the tag used to enclose the emphasized misspelled word; if not specified, the underline tag (&lt;u&gt;) will be used
     * @return AdvanceStringProcesser the emphasized string
     * @see getSpellCheckerObject, wlSpellChecker
     */
    public function spellEmphasize($spellCheckerName = null, $tag = null) {
        if(!isset($tag)) {
            $tag = '<u>';
        }
        $spellChecked = $this->spellCheck($spellCheckerName);
        $spellChecked = array_keys($spellChecked);
        return new AdvanceStringProcesser($this->emphasize($spellChecked, false, $tag, null), $this->_encoding);
    }

    /**
     * Auto-corrects the current string (sentence) against a given spell checker, by replacing the misspelled words with the corresponding closest dictionary matches.<br/>
     * The speller class name will be computed by adding <em>wlSpellChecker</em> prefix to the given $spellCheckerName parameter and then that class will be instantiated to a spell checker object having as string to check the current AdvanceStringProcesser string object.
     * @param string $spellCheckerName the spell checker name used to determine the spell checker class name (ex. DictionaryCom)
     * @return AdvanceStringProcesser the corrected string
     * @see getSpellCheckerObject, wlSpellChecker
     */
    public function spellAutoCorrect($spellCheckerName = null) {
        $spellChecked = $this->spellCheck($spellCheckerName);
        $ret = $this->_s;
        foreach($spellChecked as $invalid => $valid) {
            $ret = PortableStringProcesser::substitute($ret, $invalid, $valid, null, false, $this->_encoding);
        }
        return new AdvanceStringProcesser($ret, $this->_encoding);
    }

}