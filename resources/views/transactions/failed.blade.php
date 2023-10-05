@extends('app')

@section('title', 'Payment failed')

@section('content')
    <div class="h-screen overflow-hidden flex items-center justify-center bg-green-100">
        <div class="h-screen">
            <div class="flex flex-col items-center bg-white border border-gray-200 rounded-b-lg shadow md:flex-row md:max-w-xl">
                <img class="object-cover p-3 w-full md:h-96 md:h-auto md:w-48" src="{{ asset('favicons/source.svg') }}" alt="tree">
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h1 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Payment failed!</h1>
                    <p class="mb-3 font-normal text-gray-700">We could not complete your payment</p>
                    <p class="mb-3 font-normal text-gray-700">Please contact us in order to complete your payment</p>
                </div>
            </div>
        </div>
    </div>
@endsection
