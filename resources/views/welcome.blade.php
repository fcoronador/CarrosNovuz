<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <div class="flex-center position-ref ">
        <div class="d-inline-flex">
            <div class="title m-b-md">
                Laravel
            </div>
            <span>Lista de conductores</span>
            <ul class="list-group">
                @foreach ($conductores as $item)
                <li class="list-group-item d-inline">{{$item->nombre}} {{$item->placa_veh}}
                    <br>
                    <a name="" id="" class="btn btn-primary" href="{{route('editC',$item->id)}}"
                        role="button">Editar</a>
                    <br>
                    <a name="" id="" class="btn btn-primary"
                        onclick="document.getElementById('d{{$item->id}}').submit()" role="button">Eliminar</a>
                    <form class="d-none" id="d{{$item->id}}" action="{{route('Dconductor',$item)}}" method="post">
                        @csrf
                        @method('delete')
                    </form>
                </li>
                @endforeach
            </ul>
            <span>Lista de vehiculos</span>
            <ul class="list-group">
                @foreach ($vehi as $item)
                <li class="list-group-item">{{$item->placa}} {{$item->marca}} {{$item->modelo}}
                    <br>
                    <a name="" id="" class="btn btn-primary" href="{{route('editV',$item->id)}}"
                        role="button">Editar</a>
                        <br>
                    <a name="" id="" class="btn btn-primary"
                        onclick="document.getElementById('d{{$item->placa}}').submit()" role="button">Eliminar</a>
                    <form class="d-none" id="d{{$item->placa}}" action="{{route('Dvehiculo',$item)}}" method="post">
                        @csrf
                        @method('delete')
                    </form>
                </li>
                @endforeach
            </ul>


            <span>Crear Vehiculo</span>
            <div class="form-group">
                <form action="{{route('Gvehiculo')}}" method="post">
                    @csrf
                    <label for="Placa">Placa</label>
                    <input type="text" name="placa" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    <label for="marca">Marca</label>
                    <input type="text" name="marca" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    <label for="modelo">Modelo</label>
                    <input type="text" name="modelo" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">
                    <input type="submit" value="Enviar">
                </form>
            </div>
            <hr>
            <span>Crear conductor</span>
            <div class="form-group">
                <form action="{{route('Gconductor')}}" method="post">
                    @csrf
                    <label for="ID">ID</label>
                    <input type="text" name="numID" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">
                    <label for="placa">Placa</label>
                    <input type="text" name="placa_veh" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">
                    <input type="submit" value="Enviar">
                </form>
            </div>

            @if (isset($vehiculo))
            @foreach ($vehiculo as $item)

            <span>Editar Vehiculo</span>
            <div class="form-group">
                <form action="{{route('Evehiculo',$id)}}" method="post">
                    @csrf
                    @method('put')
                    <label for="Placa">Placa</label>
                    <input value="{{$item->placa}}" type="text" name="placa" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">
                    <label for="marca">Marca</label>
                    <input value="{{$item->marca}}" type="text" name="marca" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">
                    <label for="modelo">Modelo</label>
                    <input value="{{$item->modelo}}" type="text" name="modelo" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">
                    <input type="submit" value="Enviar">
                </form>
            </div>
            @endforeach
            @endif
            <hr>
            @if (isset($conductor))
            @foreach ($conductor as $item)

            <span>Editar conductor</span>
            <div class="form-group">
                <form action="{{route('Econductor',$id)}}" method="post">
                    @csrf
                    @method('put')
                    <label for="ID">ID</label>
                    <input value="{{$item->numID}}" type="text" name="numID" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">
                    <label for="nombre">Nombre</label>
                    <input value="{{$item->nombre}}" type="text" name="nombre" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">
                    <label for="placa">Placa</label>
                    <input value="{{$item->placa_veh}}" type="text" name="placa_veh" id="" class="form-control"
                        placeholder="" aria-describedby="helpId">
                    <input type="submit" value="Enviar">
                </form>
            </div>
            @endforeach
            @endif



        </div>
    </div>
</body>

</html>