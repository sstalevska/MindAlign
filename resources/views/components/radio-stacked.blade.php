@props([
    'set' => [],
    'name' => '',
    'value',
])

<div>
    @foreach ($set as $item)
        <div>
            <label>
                <input type="radio" name="{{ $name }}" value="{{ $item }}" {{ old($name, $value) == $item ? 'checked' : '' }}>
                <span class="ml-2">{{ $item }}</span>
            </label>
        </div>
    @endforeach
</div>