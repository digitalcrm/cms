@extends('layouts.master')

@section('title','CMS:CUSTOMIZATION')

@section('content')

<livewire:customization.customizeview />

{{-- @section('scripts')
@parent
    <script>
        function clearFileInput(){
            const clearFileInput1 = document.getElementById("uploadadminlogo").value = "";
            setInterval(clearFileInput, 2000);
        }

        clearFileInput();

    </script>
@endsection --}}

@section('scripts')
    @parent
        <script src="{{ asset('jscolor.min.js') }}"></script>
    @endsection

@endsection
