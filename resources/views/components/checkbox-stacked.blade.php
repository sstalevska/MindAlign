@props([
    'set' => [],
    'name' => '',
    'value',
])
<div>
    @foreach ($set as $item)
        <div>
            <label>
                <input type="checkbox" name="{{ $name }}[]" value="{{ $item }}"
                @if (in_array($item, old($name, $value)))
                    checked
                @endif
                >
                <span class="ml-2">{{ $item }}</span>
            </label>
        </div>
    @endforeach
</div>