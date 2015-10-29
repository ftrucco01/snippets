<?php
function getPermutations($items, $rowSize, $results = array()) {
    if ($rowSize <= 0) {
        return false;
    }
    $i = 0;
    $newResult = array();
    foreach ($items as $item) {
        if (count($results) > 0) {
            foreach ($results as $result) {
                $auxItem = array_merge($result, array($item));
                $newResult[] = $auxItem;
            }
        } else {
            $newResult[] = array($item);
        }
    }

    if ($rowSize == 1) {
        return $newResult;
    }
    return getPermutations($items, $rowSize - 1, $newResult);
}

echo "<pre>";
print_r(getPermutations(array(12, 43, 17, 22), 3));