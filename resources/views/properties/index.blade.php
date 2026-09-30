<h1>Daftar Perumahan</h1>

@foreach ($properties as $property)

    <div>

        <h2>
            {{ $property['name'] }}
        </h2>

        <p>
            {{ $property['location'] }}
        </p>

        <p>
            Developer:
            {{ $property['developer'] }}
        </p>

    </div>

    <hr>

@endforeach 