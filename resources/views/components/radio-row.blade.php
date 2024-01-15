@props([
    'required' => '',
    'label1' => 'label1',
    'label2' => 'label2',
    'label3' => 'label3',
    'slug'
])

<div>
    <div class="w-full grid gap-5 grid-cols-7 text-sm">
        <div class="col-span-6 order-2 md:text-center md:col-span-1 md:order-1 flex self-end">{{ $label1 }}</div>
        <div class="col-span-6 order-8 md:text-center md:col-span-1 md:order-4 flex self-end">{{ $label2 }}</div>
        <div class="col-span-6 order-[14] md:text-center md:col-span-1 md:order-7 flex self-end">{{ $label3 }}</div>
        <div class="text-center order-1 md:order-8">
            <label>
                <input type="radio" name="{{ $slug }}" value="-3" {{ $required }}>
                <div>-3</div>
            </label>
        </div>
        <div class="text-center order-3 md:order-9">
            <label>
                <input type="radio" name="{{ $slug }}" value="-2">
                <div>-2</div>
            </label>
        </div>
        <div class="text-center order-5 md:order-10">
            <label>
                <input type="radio" name="{{ $slug }}" value="-1">
                <div>-1</div>
            </label>
        </div>
        <div class="text-center order-7 md:order-11">
            <label>
                <input type="radio" name="{{ $slug }}" value="0">
                <div>0</div>
            </label>
        </div>
        <div class="text-center order-9 md:order-12">
            <label>
                <input type="radio" name="{{ $slug }}" value="1">
                <div>1</div>
            </label>
        </div>
        <div class="text-center order-11 md:order-[13]">
            <label>
                <input type="radio" name="{{ $slug }}" value="2">
                <div>2</div>
            </label>
        </div>
        <div class="text-center order-[13] md:order-[14]">
            <label>
                <input type="radio" name="{{ $slug }}" value="3">
                <div>3</div>
            </label>
        </div>
        {{-- Placeholders --}}
        <div class="col-span-6 order-4 md:order-2 md:col-span-1">&nbsp;</div>
        <div class="col-span-6 order-6 md:order-3 md:col-span-1">&nbsp;</div>
        <div class="col-span-6 order-10 md:order-5 md:col-span-1">&nbsp;</div>
        <div class="col-span-6 order-12 md:order-6 md:col-span-1">&nbsp;</div>
    </div>
</div>