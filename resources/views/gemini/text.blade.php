<html>
    <body>
        

        <h1>Hoy es {{$fecha}} </h1>
        @if(isset($result->candidates[0]->content->parts[0]->text))
        <div>
            {!! nl2br(e($result->candidates[0]->content->parts[0]->text)) !!}
        </div>
    @else
        <p>No hay contenido disponible.</p>
    @endif
        
    </body>
</html>
