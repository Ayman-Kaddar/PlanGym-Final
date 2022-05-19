

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

      
    {{--
        MOSTRAR CLIENTES
    --}}

    <div class="w-75 h-100 p-5" id="clientes">
        <div class="mt-5">
            <div class="col-12">
                <div class="d-flex justify-content-end mb-3">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                            @if(isset($clients))
                                @foreach($clients as $key => $client)
                                    <tr>
                                        <th scope="row">{{ $key+1 }}</th>
                                        <td>{{ $client->name }}</td>
                                        <td>{{ $client->lname }}</td>
                                        <td>
                                            <a href="{{ route('session.training', $client->id)}}" class="btn btn-primary">
                                                <i class="fa-solid fa-list"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>

@yield('trainer')