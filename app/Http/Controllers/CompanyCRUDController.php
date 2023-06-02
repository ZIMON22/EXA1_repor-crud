<?php
namespace App\Http\Controllers;
use App\Models\Company;
use Illuminate\Http\Request;
class CompanyCRUDController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
$data['companies'] = Company::orderBy('id','desc')->paginate(5);
return view('companies.index', $data);
}
/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
return view('companies.create');
}
/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
$request->validate([
    'nombre' => 'required',
    'direccion' => 'required',
    'caracteristicas' => 'required',
    'estado' => 'required',
    'precioalquiler' => 'required'
]);
$company = new Company;
$company->nombre = $request->nombre;
$company->direccion = $request->direccion;
$company->caracteristicas = $request->caracteristicas;
$company->estado = $request->estado;
$company->precioalquiler = $request->precioalquiler;
$company->created_at = now();
$company->save();
return redirect()->route('companies.index')
->with('success','Se creo correctamente.');
}
/**
* Display the specified resource.
*
* @param  \App\company  $company
* @return \Illuminate\Http\Response
*/
public function show(Company $company)
{
return view('companies.show',compact('company'));
} 
/**
* Show the form for editing the specified resource.
*
* @param  \App\Company  $company
* @return \Illuminate\Http\Response
*/
public function edit(Company $company)
{
return view('companies.edit',compact('company'));
}
/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  \App\company  $company
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
$request->validate([
'nombre' => 'required',
'direccion' => 'required',
'caracteristicas' => 'required',
'estado' => 'required',
'precioalquiler' => 'required',
]);
$company = Company::find($id);
$company->nombre = $request->nombre;
$company->direccion = $request->direccion;
$company->caracteristicas = $request->caracteristicas;
$company->estado = $request->estado;
$company->precioalquiler = $request->precioalquiler;
$company->updated_at = now();
$company->save();
return redirect()->route('companies.index')
->with('success','Ah sido actualizado');
}
/**
* Remove the specified resource from storage.
*
* @param  \App\Company  $company
* @return \Illuminate\Http\Response
*/
public function destroy(Company $company)
{
$company->delete();
return redirect()->route('companies.index')
->with('success','Se eliminó correctamente');
}
}