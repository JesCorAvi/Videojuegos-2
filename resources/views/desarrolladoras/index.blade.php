<x-app-layout>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nombre de la desarrolladora
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acción
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($desarrolladoras as $desarrolladora)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <a href="{{route("desarrolladoras.show", $desarrolladora)}}">{{$desarrolladora->nombre}}</a>
                    </td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <form action="{{route("desarrolladoras.edit", $desarrolladora)}}">
                            @csrf
                            <button>Editar</button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        <a href="{{route("desarrolladoras.create")}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Crear</a>

    </div>

</x-app-layout>
