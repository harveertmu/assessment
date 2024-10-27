<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Manage Payment Methods
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <form action="{{ route('event.update', $event->id) }}" method="POST" class="bg-white p-6 rounded shadow-md">
                    @csrf <!-- CSRF protection -->
                    @method('PUT') <!-- Specify the HTTP method -->

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Event Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $event->name) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" placeholder="Enter event name">
                    </div>

                    <div class="mb-4">
                        <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                        <select name="location" id="location" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500">
                            <option value="">Select a location</option>
                            <option value="Malta" {{ $event->location == 'Malta' ? 'selected' : '' }}>Malta</option>
                            <option value="Brazil" {{ $event->location == 'Brazil' ? 'selected' : '' }}>Brazil</option>
                            <option value="Africa" {{ $event->location == 'Africa' ? 'selected' : '' }}>Africa</option>
                            <option value="Asia" {{ $event->location == 'Asia' ? 'selected' : '' }}>Asia</option>
                            <option value="East Europe" {{ $event->location == 'East Europe' ? 'selected' : '' }}>East Europe</option>
                            <option value="Eurasia" {{ $event->location == 'Eurasia' ? 'selected' : '' }}>Eurasia</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="date" class="block text-sm font-medium text-gray-700">Event Date</label>
                        <input type="date" name="date" id="date" value="{{ old('date', $event->date) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500">
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="description" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" placeholder="Enter event description">{{ old('description', $event->description) }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label for="vat_rate" class="block text-sm font-medium text-gray-700">VAT Rate (%)</label>
                        <input type="number" name="vat_rate" id="vat_rate" step="0.01" min="0" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" placeholder="Enter VAT rate" required>
                    </div>

                    <div class="mb-4">
                        <label for="payment_method" class="block text-sm font-medium text-gray-700">Payment Method</label>
                        <select name="payment_method_id" id="payment_method" required>
                            @foreach ($paymentMethods as $method)
                            <option value="{{ $method->id }}">{{ $method->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="company" class="block text-sm font-medium text-gray-700">Company</label>
                        <select name="company_id" id="payment_method" required>
                            @foreach ($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600">
                        Update Event
                    </button>
                </form>






            </div>
        </div>
    </div>
</x-app-layout>