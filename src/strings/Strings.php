<?php

namespace strings;

class Strings implements StringsInterface
{
    /**
    * @param string $input
    * @return string
    */
    public function snakeCaseToCamelCase(string $input): string {

        $camelCaseString = "";
        for ($i = 0; $i < strlen($input); $i++) {
            if ($input[$i] == "_") {
                $i++;
                $camelCaseString .= strtoupper($input[$i]);
            } else {
                $camelCaseString .= $input[$i];
            }

        }
        return $camelCaseString;

    }

    /**
    * @param string $input
    * @return string
    */
    public function mirrorMultibyteString(string $input): string {
        $multiString = explode(" ", $input);
        $result = [];
        foreach ($multiString as $word) {
            preg_match_all('/./us', $word, $ar);
            $word = join('', array_reverse($ar[0]));
            array_push($result, $word);
        }
        return implode(" ", $result);
    }

    /**
    * @param string $noun
    * @return string
    */
    public function getBrandName(string $noun): string {
        if ($noun[0] == $noun[strlen($noun)-1]) {
            return ucfirst($noun) . substr($noun, 1);
        }
        return "The " . ucfirst($noun);
    }

}