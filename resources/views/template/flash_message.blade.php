<div style="position: relative;">
    @if (session()->has('success'))
        <div style="position: fixed; top: 1.25rem; left: 0; right:0; margin:auto; 
        background-color: green; color:white; padding: 0.5rem 1rem 0.5rem 1rem; 
        border-radius: 0.50rem; text-align:center; width: 20em"
            >
            <p>{{ session('success') }}</p>
        </div>

    @elseif (session()->has('failed'))
        <div style="position: fixed; top: 1.25rem; left: 0; right:0; margin:auto; 
        background-color: red; color:white; padding: 0.5rem 1rem 0.5rem 1rem; 
        border-radius: 0.50rem; text-align:center; width: 20em"
            >
            <p>{{ session('failed') }}</p>
        </div>
    @endif
    
</div>
