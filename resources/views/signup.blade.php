@component('components.html-wrapper', ['title' => 'Razorshop: Signup', 'hideNav' => true])
    @component('components.modal', [
        'id' => 'signup',
        'title' => 'Signup',
        'buttonText' => 'Signup',
        'action' => '/signup',
    ])
        @component('components.signup-modal-contents')
        @endcomponent
    @endcomponent
@endcomponent
