<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Muestra una lista de las transacciones.
     */
    public function index()
    {
        $transactions = Transaction::all();
        return view('transactions.index', compact('transactions'));
    }

    /**
     * Muestra el formulario para crear una nueva transacción.
     */
    public function create()
    {
        return view('transactions.create');
    }

    /**
     * Almacena una nueva transacción en la base de datos.
     */
    public function store(Request $request)
    {
        // Validación de datos
        $validatedData = $request->validate([
            'tipo_cuenta' => 'required|string',
            'persona' => 'required|string',
            'cedula' => 'required|string',
            'confirmacion' => 'required|boolean',
            'estado' => 'required|string',
            'monto' => 'required|numeric',
            'monto_pesos' => 'required|numeric',
            'tiempo_estimado' => 'required|string',
        ]);

        // Crear la transacción
        Transaction::create($validatedData);

        // Redirigir a la lista de transacciones con un mensaje de éxito
        return redirect()->route('transactions.index')->with('success', 'Transacción creada exitosamente.');
    }
}
