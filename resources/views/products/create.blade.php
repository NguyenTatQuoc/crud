@extends('layouts.app')
@section('content')
<main class="container">
    <section>
        <form method="post" action="{{route('products.store')}}" enctype="multipart/form-data"></form>
        @csrf
        <div class="titlebar">
            <h1>Add Product</h1>
            <button>Save</button>
        </div>

        <div class="card">
           <div>
                <label>Name</label>
                <input type="text" name="name" >
                <label>Description (optional)</label>
                <textarea cols="10" rows="5" name="description" ></textarea>
                <label>Add Image</label>
                <img src="" alt="" class="img-product" id="file-preview" />
                <input type="file" name="image" accept="image/*" onchange="showFile(event)">
            </div>
           <div>
                <label>Category</label>
                <select  name="" id="category" >
                    @foreach (json_decode('{"Điện thoại":"Điện thoại", "Tivi":"Tivi","Máy tính":"Máy tính"}',true) as $optionKey => $optionValue)
                    <option value="{{$optionKey}}" >{{$optionValue}}</option>
                    @endforeach
                    
                </select>
                <hr>
                <label>Quantity</label>
                <input type="text" name="quantity" >
                <hr>
                <label>Price</label>
                <input type="text" class="price" >
           </div>
        </div>
        <div class="titlebar">
            <h1></h1>
            <button>Save</button>
        </div>
    </section>
</main>
<script>
    function showFile(event){
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function(){
            var dataURL = reader.result;
            var output = document.getElementById('file-preview');
            output.src = dataURL;
    
        };
        reader.readAsDataURL(input.files[0]);
    }
</script>
@endsection