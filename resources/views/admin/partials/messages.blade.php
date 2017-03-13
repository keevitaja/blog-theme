@if($errors->any())
    <div class="container messages">
        @foreach($errors->all() as $error)
            <div class="notification is-warning">
                <button class="delete"></button>
                {{ $error }}
            </div>
        @endforeach
    </div>
@endif

@if(session()->has('success'))
    <div class="container messages">
        <div class="notification is-success">
            <button class="delete"></button>
            {{ session()->get('success') }}
        </div>
    </div>
@endif