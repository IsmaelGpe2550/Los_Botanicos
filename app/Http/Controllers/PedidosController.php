<?php

namespace App\Http\Controllers;

use App\Mail\NotificacionPedido;
use App\Models\Carrito;
use App\Models\Detalles_carrito;
use App\Models\Detalles_pedido;
use App\Models\Pedidos;
use App\Models\Planta;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

use function App\View\Components\render;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pedidos = Pedidos::where('comprador_id', Auth::id())->get();
        foreach ($pedidos as $pedido) {
            $detalles = Detalles_pedido::where('pedido_id', $pedido->id)->get();
            
            $todosEntregados = $detalles->every(function ($detalle) {
                return $detalle->status === 'entregado';
            });
    
            if ($todosEntregados) {
                $pedido->status = 'completado';
                $pedido->save();
            }
        }
        return view('pedidos.mis-compras', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_completo' => 'required|string|max:255',
            'direccion' => 'required|string|max:500',
            'colonia' => 'required|string|max:255',
            'ciudad' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
            'codigo_postal' => 'required|digits:5',
            'telefono' => 'required|digits_between:10,15',
        ]);

        $clientId = env('PAYPAL_CLIENT_ID');
        $clientSecret = env('PAYPAL_CLIENT_SECRET');

        $auth = base64_encode($clientId . ':' . $clientSecret);

        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . $auth,
            'Content-Type' => 'application/x-www-form-urlencoded',
        ])->asForm()->post('https://api.sandbox.paypal.com/v1/oauth2/token', [
            'grant_type' => 'client_credentials',
        ]);

        $accessToken = $response->json()['access_token'];

        $carrito = Carrito::findOrFail($request->carrito_id);
        $detalles_carrito = Detalles_carrito::where('carrito_id', $carrito->id)->get();
        
        $pedido = Pedidos::create([
            'comprador_id' => Auth::id(),
            'status' => 'pendiente',
            'payment_method' => 'paypal',
            'payment_status' => 'pagado',
            'total_cost' => $carrito->total_cost,
            'name' => $request->nombre_completo,
            'direccion' => $request->direccion,
            'neighborhood' => $request->colonia,
            'city' => $request->ciudad,
            'state' => $request->estado,
            'postal_code' => $request->codigo_postal,
            'phone' => $request->telefono,
        ]);

        $i = 0;
        foreach ($detalles_carrito as $detalle) {
            $planta = Planta::findOrFail($detalle->planta_id);
            Detalles_pedido::create([
                'pedido_id' => $pedido->id,
                'planta_id' => $planta->id, 
                'vendedor_id' => $planta->user_id,
                'amount' => $detalle->amount,
            ]);
            if($i < 1){
                $pedido->imagen = $planta->photo;
                $pedido->save();
                $i = 2;
            }
            $vendedor = User::findOrFail($planta->user_id);
            $comision = $detalle->amount * $planta->price / 10;
            $pago = ($detalle->amount * $planta->price) - $comision;

            $pagos[] = [
                'email' => $vendedor->paypal_email,
                'amount' => $pago,
            ];

        }
        
        foreach ($pagos as $pago) {
            $response = Http::withOptions(['verify' => false])->withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
                'Content-Type' => 'application/json',
            ])->post('https://api.sandbox.paypal.com/v1/payments/payouts', [
                'sender_batch_header' => [
                    'email_subject' => 'Pago por tu venta',
                    'email_message' => 'Gracias por vender con nosotros. ¡Tu pago ha sido procesado!',
                ],
                'items' => [
                    [
                        'recipient_type' => 'EMAIL',
                        'receiver' => $pago['email'],
                        'amount' => [
                            'value' => $pago['amount'],
                            'currency' => 'MXN',
                        ],
                        'note' => 'Pago por venta',
                        'sender_item_id' => uniqid(),
                    ]
                ],
            ]);
        }      
        
        $usuario = User::find(Auth::id());
        Mail::to($usuario->email)->send(new NotificacionPedido());

        Detalles_carrito::where('carrito_id', $carrito->id)->delete();
        $carrito->delete();
        return redirect()->route('pedidos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pedidos = Pedidos::findOrFail($id);
        $detalles = Detalles_pedido::where('pedido_id', $pedidos->id)->get();      
        return view('pedidos.detalles-compra', compact('pedidos', 'detalles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pedidos $pedidos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pedidos $pedidos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedidos $pedidos)
    {
        //
    }
}
