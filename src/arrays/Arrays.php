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
        foreach (array_count_values($input) as $value => $count) {
            if ($count == 1 && ($counter > $value || $counter == 0)) {
                $counter = $value;
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
