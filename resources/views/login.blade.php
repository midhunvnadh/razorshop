@component('components.html-wrapper', ['title' => 'Razorshop: Login', 'hideNav' => true])
    @component('components.modal', [
        'id' => 'login',
        'title' => 'Login',
        'buttonText' => 'Login',
        'action' => '/login',
    ])
        @component('components.login-modal-contents')
        @endcomponent
    @endcomponent
@endcomponent
