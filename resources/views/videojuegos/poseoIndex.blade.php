<x-app-layout>
    <form method="POST" action="{{route("videojuegos.poseoCreate")}}">
        @csrf
        <input name="tipo" type="submit" value="No lo tengo">

        <select name="videojuego_id">
            @foreach ($videojuegos as $videojuego)
                <option value="{{ $videojuego->id }}">{{ $videojuego->titulo }}</option>
            @endforeach
        </select>
        <input name="tipo" type="submit" value="Lo tengo">

    </form>
</x-app-layout>
