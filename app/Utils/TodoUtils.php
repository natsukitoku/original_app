<?php

namespace App\Utils;

use App\Models\Todo;

class TodoUtils {
    public static function hasSoonDuedate($todos) {
        foreach($todos as $todo) {
            if($todo->isSoonDuedate()) {
                return true;
            }
        }

        return false;
    }
}
