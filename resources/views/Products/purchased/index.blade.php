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


    <h2>List of Purchased Products</h2>
    <button class="btn-create" onclick="show()">Create <span>+</span></button>


    <table>
        <thead>
            <th>Id</th>
            <th>Product name</th>
            <th>Supplier name</th>
            <th>Qty</th>
            <th>Date</th>
            <th>Action</th>
        </thead>

    @forelse ($ProductIn as $p)
        <tr>
            <td data-label="Id">{{$p->id}}</td>
            <td data-label="Product name">{{$p->product->name}}</td>
            <td data-label="Supplier name">{{$p->supplier->name}}</td>
            <td data-label="Qty">{{$p->qty}}</td>
            <td data-label="Date" >{{$p->date}}</td>
            <td data-label="Action" id={{$p->id}} class="action">
                <button class="btn-edit">Edit</button>
                <form action="{{route("productsIn.destroy",$p["id"])}}" method="Post">
                    @csrf
                    @method("delete")
                    <button class="btn-delete">Delete</button>
                </form>
            </td>

        </tr>
        @empty
            <tr>
                <td colspan="6">No Purchased Products</td>
            </tr>
    @endforelse
    </table>



<div class="cont-create">
    <div class="bg" onclick="blur()"></div>
        <div class="create">
            <div class="card">
                <h1>Add The Purchased Products</h1>
            <form action="{{route("productsIn.store")}}" method="POST">
                @csrf
                <select name="product">
                    <option selected="true" disabled="disabled">Choose Product</option>
                    @foreach ($Product as $pr)
                    <option value="{{$pr["id"]}}">{{$pr["name"]}}</option>
                @endforeach
                </select>
                <select name="supplier">
                    <option selected="true" disabled="disabled">Choose Supplier</option>
                    @foreach ($supplier as $s)
                    <option value="{{$s["id"]}}">{{$s["name"]}}</option>
                    @endforeach
                </select>
                <input type="text" name="qty" placeholder="Enter Quantity">
                <input type="date" name="date" >
                <button>valider</button>
            </form>
        </div>
    </div>
</div>


<div class="cont-edit">
    <div class="bg" onclick="blur()"></div>
    <div class="edit">
        <div class="card">
            <h1>Edit The Purchased Products</h1>
            <form action="{{route("productsIn.update","")}}" name="edi" method="Post">
                @method("put")
                @csrf
                    <select name="product">
                        <option selected="true" disabled="disabled">Choose Product</option>
                        @foreach ($Product as $pr)
                        <option value="{{$pr["id"]}}">{{$pr["name"]}}</option>
                    @endforeach
                    </select>
                    <select name="supplier">
                        <option selected="true" disabled="disabled">Choose Supplier</option>
                        @foreach ($supplier as $s)
                        <option value="{{$s["id"]}}">{{$s["name"]}}</option>
                        @endforeach
                    </select>
                    <input type="text" name="qty" placeholder="Change Quantity">
                    <input type="date" name="date">
                    <button>valider</button>

                </form>
            </div>
    </div>
</div>



@endsection
