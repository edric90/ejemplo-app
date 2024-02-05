<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>
            Laravel 10
        </title>
    </head>
    <body>
        <h1>Clientes y Mascotas</h1>
        @foreach($clients as $client)
            <h3>Cliente: {{$client->first_name}} 
                {{$client->last_name}} ({{$client->id}})</h3>
            <h3>Celular: {{$client->cell_phone}} - 
                Dirección: {{$client->address}}, 
                {{$client->zone}}</h3>
            <h3><hr /></h3>
        @endforeach
    </body>
</html>
