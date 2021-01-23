<?php

namespace App\Observers;

use App\Models\Position;

class PositionObserver
{

    /**
     * Handle the Position "creating" event.
     *
     * @param  \App\Models\Position  $position
     * @return void
     */
    public function creating(Position $position)
    {
        $position->admin_created_id = auth()->user()->id;
        $position->admin_updated_id = auth()->user()->id;
    }

    /**
     * Handle the Position "updated" event.
     *
     * @param  \App\Models\Position  $position
     * @return void
     */
    public function updating(Position $position)
    {
        $position->admin_updated_id = auth()->user()->id;
    }

}
