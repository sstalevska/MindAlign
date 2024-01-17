<div class="alert alert-{{ $alert_type }}" role="alert">
    <div class="flex">
        <div>
            @switch($alert_type)
                @case('error')
                    <x-icon-error class="text-red-500" />
                @break

                @case('warning')
                    <x-icon-warning class="text-yellow-600" />
                    @break

                @case('info')
                    <x-icon-info class="text-blue-500" />
                    @break

                @case('success')
                    <x-icon-success class="text-green-500" />
                    @break
            @endswitch
        </div>
        <div>{!! $alert_message !!}</div>
    </div>
</div>