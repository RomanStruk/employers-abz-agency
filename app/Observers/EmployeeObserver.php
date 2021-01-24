<?php

namespace App\Observers;

use App\Models\Employee;

class EmployeeObserver
{
    /**
     * Handle the Employee "creating" event.
     *
     * @param  \App\Models\Employee  $employee
     * @return void
     */
    public function creating(Employee $employee)
    {
        $employee->admin_created_id = auth()->user()->id;
        $employee->admin_updated_id = auth()->user()->id;
    }

    /**
     * Handle the Employee "updating" event.
     *
     * @param  \App\Models\Employee  $employee
     * @return void
     */
    public function updating(Employee $employee)
    {
        $employee->admin_updated_id = auth()->user()->id;
    }

    /**
     * Handle the Employee "updated" event.
     *
     * @param  \App\Models\Employee  $employee
     * @return void
     */
    public function updated(Employee $employee)
    {

    }


    /**
     * Handle the Employee "deleting" event.
     *
     * @param  \App\Models\Employee  $employee
     * @return void
     */
    public function deleting(Employee $employee)
    {
        // if employee has children
        // and he`s root
        // make his children as root
        // or children make as employees for parent
        if ($employee->children->count() > 0){
            if ($employee->isRoot()){
                foreach ($employee->children as $child){
                    $child->makeRoot()->save();
                }
            }else{
                foreach ($employee->children as $child){
                    $child->appendToNode($employee->parent)->save();
                }
            }
        }
    }
}
