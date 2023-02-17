<div class="flex items-center">
    <input id="{{ $name }}" name="{{ $name }}" type="checkbox" value="{{ $name }}" @checked(old($name)) class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
    <label for="{{ $name }}" class="ml-2 block text-sm text-gray-900">{{ $label }}</label>
</div>