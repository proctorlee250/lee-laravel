@props(['disabled' => true])
@props(['value'])

<input value="{{ $value ?? $slot }}" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'disabled:opacity-50 border-gray-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm']) !!}>
