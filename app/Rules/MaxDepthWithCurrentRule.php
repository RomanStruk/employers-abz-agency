<?php

namespace App\Rules;

use App\Models\Employee;
use Illuminate\Contracts\Validation\Rule;

class MaxDepthWithCurrentRule implements Rule
{
    private $employee;

    /**
     * Create a new rule instance.
     *
     * @param $employee
     */
    public function __construct($employee)
    {
        $this->employee = $employee;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $parent_id)
    {
        $parent_employee = Employee::withDepth()->find($parent_id);
        $parent_depth = $parent_employee->depth;
        if ($parent_depth > 4){
            return false;// max 4 + root = 5
        }

        // current employee`s depth
        $current_employee = Employee::withDepth()->findOrFail($this->employee->id);
        $current_employee_depth = $current_employee->depth;

        // current employee children tree
        $employees = Employee::withDepth()->descendantsAndSelf($this->employee->id)->toTree();

        $valid = true;
        $traverse = function ($employees) use ($parent_depth, &$traverse, &$valid, $current_employee_depth) {
            foreach ($employees as $employee) {
                //valid max depth for employer and employees
                if ($parent_depth+( $employee->depth - $current_employee_depth ) >= 4){
                    $valid = false;
                }
                $traverse($employee->children);
            }
        };
        $traverse($employees);
        return $valid;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Maximum can be 5 levels of subordination with children.';
    }
}
