<?php

namespace App\Http\Controllers;
    

//use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Suppliers;
use Spatie\Permission\Models\Role;
//use App\Http\Requests\StoreSuppliersRequest;
//use App\Http\Requests\UpdateSuppliersRequest;
use App\DataTables\SuppliersDataTable;
//use App\DataTables\SuppliersDataTablesEditor;

class SuppliersController extends Controller
{
    function __construct()
    {
        //$this->middleware('permission:Users');
    }
    /**
     * Display a listing of the resource.
     */
    //public function index(SuppliersDataTable $dataTable)
    public function index(SuppliersDataTable $dataTable)
    {
        return $dataTable->render('suppliers.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('suppliers.add');
        //return $editor->process(request());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSuppliersRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Suppliers $suppliers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Suppliers $suppliers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSuppliersRequest $request, Suppliers $suppliers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Suppliers $suppliers)
    {
        //
    }
}
