<?php

namespace arrays;

class Arrays implements ArraysInterface
{
    /**
     * @param array $input
     * @return array
     */
    public function repeatArrayValues(array $input): array
    {
        $result = [];
        foreach ($input as $element) {
            for ($i = 0; $i < $element; $i++) {
                array_push($result, $element);
            }
        }
        return $result;
    }

    /**
     * @param array $input
     * @return int
     */
    public function getUniqueValue(array $input): int
    {
        $counter = 0;
        $uniqueDigits = [];
        foreach ($input as $digit) {
            $uniqueDigits[$digit] = !isset($uniqueDigits[$digit]);
        }


        foreach ($uniqueDigits as $key => $value) {
            if ($value) {
                if ($counter == 0 || $counter > $key) {
                    $counter = $key;
                }
            }
        }
        return $counter;
    }

    /**
     * @param array $input
     * @return array
     */
    public function groupByTag(array $input): array
    {
        $result= [];
        foreach ($input as $element) {
            $name = $element["name"];
            $tags = $element["tags"];
            foreach ($tags as $tag) {
                if (!isset($result[$tag])) {
                    $result[$tag] = [];
                }
                if (!in_array($name, $result[$tag])) {
                    array_push($result[$tag], $name);
                }
            }
        }

        foreach ($result as  $key => $value) {
            sort($value);
            $result[$key] = $value;
        }

        return $result;
    }
}
