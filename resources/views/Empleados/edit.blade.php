
@extends('layouts.plantilla')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Empleados</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card table-responsive">
                        <div class="card-body">
{{--  -------------------------------------------------------------------------------------------------------------------------------------------   -  --}}
{{-- CONTENIDO --}}

<div class="title-ar">
    <h1>Editar Registro de Empleado</h1>
</div>
 <div class="title-center">
 
 <form method="POST" action="{{ route("Empleados.update",$empleado->idEmpleado)}}">
@method('put') 
 @csrf


        <div class="form-group">
        <label for="">Código</label>
        <input style="margin-left: 55px" type="text" class="formcontrol" id="id" name="id" value="{{ $empleado->idEmpleado }}" disabled>
        </div>

        <div class="form-group" >
            <label for="">Nombre: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" class="formcontrol" name="nombre" id="nombre" value="{{ $empleado->nombre }}"{{-- readonly="readonly" --}}>
            </div>
        </div>





        <div class="form-group" >
            <label for="">DNI: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" class="formcontrol" name="dni" id="dni" value="{{ $empleado->dni }}"{{-- readonly="readonly" --}}>
            </div>
        </div>




        <div class="form-group">
            <label for="">Edad: </label>
            <div class="input-group" >
            <input style="padding-bottom:10px;width:200px" type="text" class="formcontrol" name="edad" id="edad" value="{{ $empleado->edad }}"{{-- readonly="readonly" --}}>
            </div>
        </div>



     
    


           


<!-- {{-- <button style="margin-left: 300px;margin-top:40px;margin-right:10px"type="submit" class="btn btn-primary"><i class="fas fasave"></i> Grabar</button>
<a style="margin-top:40px" href="{{ route('cancelare')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</button></a>
 --}} -->
<button style="margin-left: 60px;margin-top: 20px"  type="submit" class="btn btn-primary"><i class="fas fasave"></i> Grabar</button>
<a style="margin-top: 20px"  href="{{ route('cancelare')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</button></a>
</form>
</div>




{{--  -------------------------------------------------------------------------------------------------------------------------------------------   -  --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection