<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Payment Provider
        </h2>
        <a href="{{ route('request-payment-provider') }}" class="inline-flex items-center px-4 py-2 bg-blue-500  font-semibold rounded-md hover:bg-blue-600">
            New Payment Provider
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Payment method name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Website
                                </th>
                             
                                <th scope="col" class="px-6 py-3">
                                    Event
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                               
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($events as $event)

                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $event->payment_method_name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $event->website }}
                                </td>
                                <td class="px-6 py-4">
                                {{ $event->event['name'] }}
                                </td>
                                <td class="px-6 py-4">
                                {{ $event->status }}
                                </td>

                                <td><a href="{{ route('finance.edit_payment_provider', $event->id) }}" class="text-danger"> Manage status </a></td>
                            </tr>
                            @empty
                            <p>No events found.</p>
                            @endforelse

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>