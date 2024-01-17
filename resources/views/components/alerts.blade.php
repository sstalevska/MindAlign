<div>
    {{-- System errors, typically during validation. List them all. --}}
    @if ($errors->any())
        @php
            $alert_message = '<p class="mb-1">Please correct the following error(s):</p><ul class="list-disc ml-4">';
            foreach ($errors->all() as $error) {
                $alert_message .= '<li>' . $error . '</li>';
            }
            $alert_message .= '</ul>';
        @endphp
        @include('partials.alert', [
            'alert_type' => 'error',
            'alert_message' => $alert_message,
        ])
    @endif


    {{-- Controller passed alerts of types error, or warning, or info. For example: --}}
    @if ($notification = Session::get('alert_error'))
        @include('partials.alert', [
            'alert_type' => 'error',
            'alert_message' => $notification,
        ])
    @endif

    @if ($notification = Session::get('alert_warning'))
        @include('partials.alert', [
            'alert_type' => 'warning',
            'alert_message' => $notification,
        ])
    @endif

    @if ($notification = Session::get('alert_info'))
        @include('partials.alert', [
            'alert_type' => 'info',
            'alert_message' => $notification,
        ])
    @endif

    @if ($notification = Session::get('alert_success'))
        @include('partials.alert', [
            'alert_type' => 'success',
            'alert_message' => $notification,
        ])
    @endif
</div>
