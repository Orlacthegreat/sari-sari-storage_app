<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Junk Foods') }}
        </h2>
    </x-slot>

    <div class="py-12">
                    <div class="mb-3">
                        <a href="{{ route('junkfoods.create') }}" class="p-2 text-center flex justify-end">
                            <x-secondary-button>
                                    Add Product
                            </x-secondary-button>
                        </a>
                    </div>
                    <x-table>
                        @if (count($junkfoods)==0)
                        <th>
                                    <div class="p-6 text-center text-bold text-xl">
                                        {{ __('No JunkFoods Available') }}
                                    </div>
                                </th>
                                @else
                                @foreach ($junkfoods as $junkfood)
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">{{ $junkfood->id }}</td>
                                    <td>{{ $junkfood->name }}</td>
                                    <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">{{ $junkfood->size }}</td>
                                    <td class="px-6 py-4">{{ $junkfood->price }}</td>
                                    <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">{{ $junkfood->quantity }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex justify-center">
                                            <div class="me-2">
                                                <form action="{{ route('junkfoods.destroy', $junkfood->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-danger-button type="submit">DELETE</x-danger-button>
                                                </form>
                                            </div>
                                            <a href="{{ route('junkfoods.show', $junkfood->id) }}">
                                                <x-secondary-button>SHOW</x-secondary-button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </x-table>

    </div>
</x-app-layout>
