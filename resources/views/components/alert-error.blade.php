@if ($errors->any())
    <div class="alert alert-errors">
        <h3>Radās kļūdas!</h3>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
