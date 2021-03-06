<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Format') }}
        </h2>
        @push('scripts_css')
            {{--    bootstrap   --}}
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
                  integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We"
                  crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
                    crossorigin="anonymous"></script>
            {{-- jquery --}}
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

            {{--    datatables --}}
            <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap5.min.css">
            <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap5.min.js"></script>

            {{--    buttons--}}
            <link rel="stylesheet" type="text/css"
                  href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.bootstrap5.css"/>
            <script type="text/javascript"
                    src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.js"></script>
            <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.bootstrap5.min.js"></script>
            <script src="/vendor/datatables/buttons.server-side.js"></script>


            {{--    select--}}
            <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.3/css/select.bootstrap.min.css">
            <script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>

            <script src="{{asset('plugins/editor/js/dataTables.editor.js')}}"></script>
            <script src="{{asset('plugins/editor/js/editor.bootstrap5.min.js')}}"></script>
        @endpush

    </x-slot>

    <x-content-body>
        {!! $dataTable->table(['id' => 'format-table'], true) !!}
    </x-content-body>

    <script>

        $(function () {

            var editor = new $.fn.dataTable.Editor({
                ajax: "/service/formats",
                table: "#format-table",

                fields: [
                    {label: "Formats name:", name: "name"},
                ]
            });

            $('#format-table').on('click', 'tbody td:not(:first-child)', function (e) {
                editor.inline(this);
            });

            {{$dataTable->generateScripts()}}
        })

    </script>
</x-app-layout>
