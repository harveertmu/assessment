<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Events
        </h2>
        <a href="{{ route('events.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600">
            Add Event
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">


                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Event name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Locaion
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
                                    {{ $event->name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $event->date }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $event->location }}
                                </td>
                                <td class="px-6 py-4">
                                <a class="btn btn-primary" href="{{ route('event.edit',$event->id) }}">Manage Event</a>
                                </td>
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