<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>EXA1_repor-crud</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>EXA1_repor-crud</h2>
</div>
<div class="pull-right mb-2">
<a class="btn btn-success" href="{{ route('companies.create') }}"> Crear inmobiliaria</a>
</div>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
<tr>
<th>N°</th>
<th>Nombre</th>
<th>Direccion</th>
<th>Caracteristicas</th>
<th>Estado</th>
<th>Precioalquiler</th>
<th>Fecha creacion</th>
<th>Fecha Actualizacion</th>
<th width="280px">Opciones</th>
</tr>
@foreach ($companies as $company)
<tr>
<td>{{ $company->id }}</td>
<td>{{ $company->nombre }}</td>
<td>{{ $company->direccion }}</td>
<td>{{ $company->caracteristicas }}</td>
<td>{{ $company->estado }}</td>
<td>{{ $company->precioalquiler }}</td>
<td>{{ $company->created_at }}</td>
<td>{{ $company->updated_at }}</td>
<td>
<form action="{{ route('companies.destroy',$company->id) }}" method="Post">
<a class="btn btn-primary" href="{{ route('companies.edit',$company->id) }}" style="width:100%">Editar</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger" style="width:100%">Eliminar</button>
</form>
</td>
</tr>
@endforeach
</table>
{!! $companies->links() !!}
</body>
</html>