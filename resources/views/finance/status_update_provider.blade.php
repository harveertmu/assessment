<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Manage Payment Methods
        </h2>

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
                <form action="{{ route('payment-provider-request.updateStatus', $event->id) }}" method="POST" class="bg-white p-6 rounded shadow-md">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                    <label for="status" class="block text-sm font-medium text-gray-700">Company</label>

                        <select name="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500">
                            <option value="approved" {{ $event->status == 'approved' ? 'selected' : '' }}>Approve</option>
                            <option value="pending" {{ $event->status == 'pending' ? 'selected' : '' }}>Pending</option>

                            <option value="rejected" {{ $event->status == 'rejected' ? 'selected' : '' }}>Reject</option>
                        </select>
                    </div>


                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600">
                        Update 
                    </button>
                </form>






            </div>
        </div>
    </div>
</x-app-layout>