<div class="container">
    <div class="mt-5">
        <div class="col-12">
            @if (isset($sessionsArray))
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
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    @endforeach
                @endif
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

@yield('client')

