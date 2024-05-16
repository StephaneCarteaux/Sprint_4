<!-- Delete Game Confirmation Modal -->

@props(['name', 'action', 'message'])

<div class="fixed flex justify-content-center align-items-center">
    <x-modal name="{{ $name }}" maxWidth="sm">
        <form action="{{ $action }}" method="post" class="p-6">
            @csrf
            @method('delete')
            <p class="mt-1 text-sm text-gray-600">
                {{ $message }}
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Accept') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</div>