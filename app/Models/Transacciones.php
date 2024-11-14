<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
class TransactionController extends Controller
{

    /**
     * Display a listing of the transactions.
     */
    public function index()
    {
        // Obtener todas las transacciones
        $transactions = Transaction::all();
        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new transaction.
     */
    public function create()
    {
        // Mostrar la vista de creación de transacciones
        return view('transactions.create');
    }

    /**
     * Store a newly created transaction in the database.
     */
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'tipo_cuenta' => 'required|string',
            'persona' => 'required|string',
            'cedula' => 'required|string',
            'confirmacion' => 'required|boolean',
            'estado' => 'required|string',
            'monto' => 'required|numeric',
            'tiempo_estimado' => 'required|integer',
        ]);

        // Crear una nueva transacción con los datos validados
        Transaction::create($request->all());

        // Redirigir al índice de transacciones con un mensaje de éxito
        return redirect()->route('transactions.index')->with('success', 'Transacción creada correctamente');
    }
}
