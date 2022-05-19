@extends('theme.base')
@push('scripts')
    <script type="text/javascript" src="{{ asset('js/training.js') }}"></script>
@endpush

@section('content')

<div class="d-flex h-100 m-0 p-0">
    {{-- 
        SIDEBAR
     --}}
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
          <span class="fs-4">HIIT</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item">
            <a href="{{ route("welcome") }}" class="nav-link active" aria-current="page">
            <i class="fa-solid fa-house-chimney"></i>
              Home
            </a>
          </li>
          <li class="nav-item pt-2">
              <a href="{{ route('session.index') }}" class="nav-link active w-100 bg-warning" >
                <i class="fa-solid fa-person"></i>
                Clientes
              </a>
          </li>
        </ul>
        <hr>
      </div>


    <div class="d-flex justify-content-center  w-75 h-100 p-5" id="clientes">
        <div class="mt-5">
            <div class="col-12">
                <div class="d-flex mb-3">
                    <div class="input-group mb-3 justify-content-end">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createSession">
                            Nueva sesión
                        </button>
                    </div>
                </div>           
                <div class="d-flex justify-content-center mb-3">
                    @if ($sessionsArray != null)
                        @foreach ($sessionsArray as $key => $sessionsDay)
                            <div class="mb-5 text-center">
                                 <h2 class="d-flex justify-content-start ps-5">
                                    Dia {{ $sessionsDay['0']}}
                                </h2>  
                                    
                                <table class="table table-striped table-hover table align-middle">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Peso</th>
                                            <th>Repeticiones</th>
                                            <th>Tiempo repetición</th>
                                            <th>Hora de Inicio</th>
                                            <th>Hora Final</th>
                                            <th>Observaciones</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sessionsDay as $key => $session)
                                            <tr>
                                                @if($key != 0)
                                                    <td>{{ $key }}</td>
                                                    <td>{{ $session->name }}</td>
                                                    <td>{{ $session->weight }}</td>
                                                    <td>{{ $session->repetition }}</td>
                                                    <td>{{ $session->time }}</td>
                                                    <td>{{ $session->start_time }}</td>
                                                    <td>{{ $session->finish_time }}</td>
                                                    <td>{{ $session->remark }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editSession" onclick="updateSession({{ $session }})">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </button>
                                                        <form action="{{ route('session.destroy', $session) }}" method="POST" class="d-inline">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger">
                                                                <i class="fa-solid fa-ban"></i>
                                                            </button>
                                                        </form>                                           
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endforeach
                        @else
                            <div class="mb-5 text-center">                    
                                <table class="table table-striped table-hover table align-middle">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Peso</th>
                                            <th>Repeticiones</th>
                                            <th>Tiempo repetición</th>
                                            <th>Hora de Inicio</th>
                                            <th>Hora Final</th>
                                            <th>Observaciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="8" class="text-center">No hay registros</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal CREATE -->
    <div class="modal fade" id="createSession" tabindex="-1" aria-labelledby="createSession" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo entrenamiento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('session.store') }}" method="POST">
                        @csrf
                    <div class="modal-body">
                        <div class="input-group mb-3" id="formSession">
                            <input type="hidden" name="idUser" id="idUser" value="{{ $user }}">
                            <input type="text" class="form-control" placeholder="Nombre de la sesión" name="name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="To Save">
                    </div>
                </form>
            </div>
        </div>
    </div>

<!-- Modal EDIT -->
<div class="modal fade" id="editSession" tabindex="-1" data-bs-backdrop="static" aria-labelledby="editSession" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edita el entrenamiento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('session.update')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="idSession" name="id">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" id="nombreSession" name="nombre" class="form-control">
                        <p class="form-text text-center">Escribe el nombre del entrenamiento</p>
                    </div>
                    <div class="mb-3">
                        <label for="peso" class="form-label">Peso</label>
                        <input type="number" id="pesoSession" name="peso" class="form-control">
                        <p class="form-text text-center">Escribe el peso</p>
                    </div>
                    <div class="mb-3">
                        <label for="repeticion" class="form-label">Repetición</label>
                        <input type="number" id="repeticionSession" name="repeticion" class="form-control">
                        <p class="form-text text-center">Escribe las repeticiones</p>
                    </div>
                    <div class="mb-3">
                        <label for="tiempoRepeticion" class="form-label">Tiempo repetición</label>
                        <input type="number" id="tiempoRepeticion" name="tiempoRepeticion" class="form-control">
                        <p class="form-text text-center">Escribe el tiemo de repetición</p>
                    </div>
                    <div class="mb-3">
                        <label for="observaciones" class="form-label">Observaciones</label>
                        <textarea id="observacionesSession" name="observaciones" class="form-control"></textarea>
                        <p class="form-text text-center">Escribe tus observaciones</p>
                    </div>
                    <div class="form-check" id="haAcabado">
                        <label class="form-check-label" for="finalTiempo">
                            Has acabado el entrenamiento?
                        </label>
                        <input type="checkbox" id="finalTiempoSession" class="form-check-input" name="finalTiempo">
                    </div>
                </div>
                    
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="To Save">
                </div>
            </form> 
        </div>
    </div>
</div>



@endsection



