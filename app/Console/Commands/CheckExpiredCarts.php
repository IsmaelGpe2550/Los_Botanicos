<?php

namespace App\Console\Commands;

use App\Models\Carrito;
use Illuminate\Console\Command;

class CheckExpiredCarts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-expired-carts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Eliminación de carritos con mas de 24 horas de vida';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $carritos = Carrito::where('created_at', '<', now()->subHours(24))->get();
        if ($carritos->isEmpty()) {
            $this->info('No hay carritos expirados.');
        } else {
            foreach ($carritos as $carrito) {
                // Elimina los carritos expirados
                $carrito->delete();
                $this->info("Carrito con ID {$carrito->id} eliminado.");
            }
        }
    }
}
