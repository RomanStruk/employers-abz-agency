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
        $position->created_id = auth()->user()->id;
        $position->updated_id = auth()->user()->id;
    }

    /**
     * Handle the Position "updated" event.
     *
     * @param  \App\Models\Position  $position
     * @return void
     */
    public function updating(Position $position)
    {
        $position->updated_id = auth()->user()->id;
    }

}
