<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <ul>
                @foreach ($post as $book)
                    <li>{{$book->name}}</li>
                @endforeach
            </ul>
        </div>
    </body>
</html>
