@extends('layouts.app')
@section('content')

<div class="menu">
    <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g id="Menu / Menu_Alt_03">
        <path id="Vector" d="M5 17H13M5 12H19M5 7H13" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </g>
    </svg>
</div>

<section class="tables">
    <h1>List Of Products</h1>
    <button class="btn-create" onclick="show()">Create <span>+</span></button>

    <table>
        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Price</th>
            <th>Qty.</th>
            <th>Category name</th>
            <th>Action</th>
        </thead>
    @forelse ($Product as $p)
    <tr>
        <td data-label="Id">{{$p->id}}</td>
        <td data-label="Name">{{$p->name}}</td>
        <td data-label="Price">{{$p->price}}</td>
        <td data-label="Qty.">{{$p->qty}}</td>
        <td data-label="Category name">{{$p->category->name}}</td>
        <td data-label="Action" id={{$p->id}} class="action">
            <button class="btn-edit">Edit</button>
            <form action="{{route("products.destroy",$p["id"])}}" method="Post">
                @csrf
                @method("delete")
                <button class="btn-delete">Delete</button>
            </form>
        </td>

    </tr>
    @empty
        <tr>
            <td colspan="6">No Products</td>
        </tr>
    @endforelse


    <div class="cont-edit">
        <div class="bg" onclick="blur()"></div>
        <div class="edit">
            <div class="card">
                <h1>Edit Your Product</h1>
            <form action="{{route("products.update","")}}" name="edi" method="Post">
                @method("put")
                @csrf
                    <input type="text" name="name" placeholder="change Product name">
                    <input type="text" name="Price" placeholder="Change Price">
                    <input type="text" name="Qty" placeholder=" Change Qty.">
                    <select name="categorie">
                        <option selected="true" disabled="disabled">Choose categorie</option>
                        @foreach ($categorie as $c)
                        <option value="{{$c["id"]}}">{{$c["name"]}}</option>
                    @endforeach
                    </select>

                    <button>valider</button>

                </form>
            </div>
        </div>
    </div>

    <div class="cont-create">
        <div class="bg" onclick="blur()"></div>
        <div class="create">
            <div class="card">
                <h1>Enter Product</h1>
        <form action="{{route("products.store")}}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Enter name">
            <input type="text" name="Price" placeholder="Enter Price">
            <input type="text" name="Qty" placeholder="Enter Qty">
            <select name="categorie">
                <option selected="true" disabled="disabled">Choose categorie</option>
                @foreach ($categorie as $c)
                <option value="{{$c["id"]}}">{{$c["name"]}}</option>
            @endforeach
            </select>
            <button>valider</button>
        </form>
            </div>
        </div>
    </div>
</section>
@endsection
