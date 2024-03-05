<x-app-layout>

    @vite('resources/css/app.css')


    <form method="POST" action="{{ route('desarrolladoras.update', $desarrolladora) }}" class="max-w-sm mx-auto">
        @csrf
        @method("PUT")
        <div class="mb-5">
            <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre de la
                desarrolladora</label>
            <input value="{{$desarrolladora->nombre}}" type="nombre" name="nombre" id="nombre"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required />
        </div>
        <div class="mb-5">
            <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Distribuidora</label>
            <select name="distribuidora_id" id="">
                @foreach ($distribuidoras as $distribuidora)
                    <option value="{{$distribuidora->id}}" {{$desarrolladora->distribuidora->id == $distribuidora->id  ? "selected" : ""}} >{{$distribuidora->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-5">
            <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Etiquetas</label>
                @foreach ($etiquetas as $etiqueta)
                    <input type="checkbox" name="etiquetas[]" value="{{$etiqueta->id}}" {{$videojuego->etiquetas->contains($etiqueta) ? "checked" : ""}}>{{$etiqueta->nombre}}<br>
                @endforeach
        </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>

</x-app-layout>
