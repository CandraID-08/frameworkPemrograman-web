<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Product Master') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <a href="{{ route('product-create')}}">
                        <button
                            class="px-6 py-2 mb-4 text-white bg-green-500 rounded-lg shadow hover:bg-green-600">
                            Add product data
                        </button>
                    </a>

                    <div class="overflow-x-auto">
                        <table class="min-w-full border border-collapse border-gray-200">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-2 text-left text-gray-600 border border-gray-200">ID</th>
                                    <th class="px-4 py-2 text-left text-gray-600 border border-gray-200">Product Name</th>
                                    <th class="px-4 py-2 text-left text-gray-600 border border-gray-200">Unit</th>
                                    <th class="px-4 py-2 text-left text-gray-600 border border-gray-200">Type</th>
                                    <th class="px-4 py-2 text-left text-gray-600 border border-gray-200">Information</th>
                                    <th class="px-4 py-2 text-left text-gray-600 border border-gray-200">Qty</th>
                                    <th class="px-4 py-2 text-left text-gray-600 border border-gray-200">Producer</th>
                                    <th class="px-4 py-2 text-left text-gray-600 border border-gray-200">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr class="bg-white">
                                        <td class="px-4 py-2 border border-gray-200">{{ $item->id }}</td>
                                        <td class="px-4 py-2 border border-gray-200">{{ $item->product_name }}</td>
                                        <td class="px-4 py-2 border border-gray-200">{{ $item->unit }}</td>
                                        <td class="px-4 py-2 border border-gray-200">{{ $item->type }}</td>
                                        <td class="px-4 py-2 border border-gray-200">{{ $item->information }}</td>
                                        <td class="px-4 py-2 border border-gray-200">{{ $item->qty }}</td>
                                        <td class="px-4 py-2 border border-gray-200">{{ $item->producer }}</td>
                                        <td class="px-4 py-2 border border-gray-200">
                                            <a href="{{ route('product-edit', $item->id) }}"
                                                class="px-2 text-blue-600 hover:text-blue-800">Edit</a>
                                            <button class="px-2 text-red-600 hover:text-red-800"
                                                onclick="confirmDelete({{ $item->id }})">Hapus</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(id) {
            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                // bikin form delete
                let form = document.createElement('form');
                form.method = 'POST';
                form.action = `/product/${id}`;

                // CSRF token
                let csrf = document.createElement('input');
                csrf.type = 'hidden';
                csrf.name = '_token';
                csrf.value = '{{ csrf_token() }}';
                form.appendChild(csrf);

                // Spoof DELETE
                let method = document.createElement('input');
                method.type = 'hidden';
                method.name = '_method';
                method.value = 'DELETE';
                form.appendChild(method);

                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>

</x-app-layout>
