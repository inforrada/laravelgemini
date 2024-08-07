<html>
    <body>
        

        <h1>Esto es lo que representa la imagen</h1>
        @if(isset($result))
        <div>
            {{$result}}
        </div>
    @else
        <p>No hay contenido disponible.</p>
    @endif
        
    </body>
</html>
