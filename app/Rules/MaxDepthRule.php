<?php

namespace App\Rules;

use App\Models\Employee;
use Illuminate\Contracts\Validation\Rule;

class MaxDepthRule implements Rule
{

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param $id
     * @return bool
     */
    public function passes($attribute, $parent_id): bool
    {
        $result = Employee::withDepth()->find($parent_id);
        $depth = $result->depth;
        return $depth < 4; // max 4 + root = 5
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Maximum can be 5 levels of subordination.';
    }
}
