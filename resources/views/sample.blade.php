<div>
    <h1>Sample Page</h1>

    <h3>Using Blade Templating</h3>
    <h4>for loop</h4>
    @for ($i = 0; $i < 5; $i++)
        <p>Item {{ $i }}</p>
    @endfor

    <h4>if statement</h4>
    <!-- http://127.0.0.1:8000/sample?i=0 -->
    @if (request('i', null) == 0)
        <p>item is 0</p>
    @else
        <p>item is not 0.</p>
    @endif

    <h4>Include subview</h4>
    <!-- using subview to include input field -->
    <!-- default value for myName is T4ch -->
    <strong>Input Field:</strong>
    <p>Enter your name:</p>
    @include('subViews.sampleInput', ['myName' => 'T4ch'])
    <p>ID:</p>
    @include('subViews.sampleInput2', ['id' => request('id')])
</div>
