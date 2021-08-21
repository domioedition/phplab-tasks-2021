g<?php 

namespace basics;

class Basics implements BasicsInterface {


     public $validator;


    function __construct($validator ) {
        $this->validator = $validator;
     }

    /**
    * @param int $minute
    * @return string
â    * @throws \InvalidArgumentException
    */

    public function getMinuteQuarter(int $minute): string {

        $this->validator->isMinutesException($minute);
        if ($minute >= 1 && $minute <= 15) {
            return "first";
        } elseif ($minute >= 16 && $minute <= 30) {
            return "second";
        } elseif ($minute >= 31 && $minute <= 45) {
            return "third";
        } elseif ($minute >= 46 && $minute <= 60  || $minute == 0) {
            return "fourth";
        }
    }

    /**
    * @param int $year
    * @return boolean
    * @throws \InvalidArgumentException
    */


    public function isLeapYear(int $year): bool {        
        $this->validator->isYearException($year);
        if ($year % 400 == 0) {
            return true;
        } elseif ($year % 100 == 0) {
            return false;
        } elseif ($year %4 == 0) {
            return true;
        } else {return false;}
    }






    /**
    * @param string $input
    * @return boolean
    * @throws \InvalidArgumentException
    */

    public function isSumEqual(string $input):bool {
        $this->validator->isValidStringException($input);
        $firstSum = (int) $input[0] + (int) $input[1] + (int) $input[2];
        $secondSum = (int) $input[3] + (int) $input[4] + (int) $input[5];
        return $firstSum == $secondSum;
    }

}

?>