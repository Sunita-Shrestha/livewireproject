<div>
    @if (session()->has('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <button wire:click="addToCart" class="btn btn-primary">Add to Cart</button>


</div>
