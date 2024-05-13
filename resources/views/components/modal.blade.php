<dialog id="modal-{{ $id }}" class="modal" open>
    <article>
        <h2>
            {{ $title }}
        </h2>
        <div>
            <form method="POST" action="{{ $action }}">
                @if ($errors->any())
                    <div class="alert alert-danger px-5 py-2 bg-red-400 rounded-md mb-3 text-white">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                @csrf
                <div>
                    {{ $slot }}
                </div>
                <footer>
                    <button id="modal-{{ $id }}-done-btn" type="submit">
                        {{ $buttonText }}
                    </button>
                </footer>
            </form>
        </div>
    </article>
</dialog>
