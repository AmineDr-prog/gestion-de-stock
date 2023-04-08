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
    <h1>List of Suppliers</h1>
    <button class="btn-create" onclick="show()">Create <span>+</span></button>


    <table>
        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Adresse</th>
            <th>Email</th>
            <th>contact</th>
            <th>Action</th>
        </thead>

    @forelse ($Suppliers as $s)
        <tr>
            <td data-label="id">{{$s->id}}</td>
            <td data-label="name">{{$s->name}}</td>
            <td data-label="adresse">{{$s->adresse}}</td>
            <td data-label="email">{{$s->email}}</td>
            <td data-label="contact" >{{$s->contact}}</td>
            <td data-label="action" id={{$s->id}} class="action">
                <button class="btn-edit">Edit</button>
                <form action="{{route("suppliers.destroy",$s["id"])}}" method="Post">
                    @csrf
                    @method("delete")
                    <button class="btn-delete">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6">No suppliers</td>
        </tr>
    @endforelse
    </table>


    <div class="cont-edit">
        <div class="bg" onclick="blur()"></div>
        <div class="edit">
            <div class="card">
                <h1>Edit The Supplier</h1>
                <form action="{{route("suppliers.update","")}}" name="edi" method="Post">
                @method("put")
                @csrf
                <input type="text" name="name" placeholder="Change name">
                <input type="text" name="adresse" placeholder="Change adresse">
                <input type="text" name="email" placeholder="Change email">
                <input type="text" name="contact" placeholder="Change contact">

                <button>Valider</button>
                </form>
            </div>
        </div>
    </div>




    <div class="cont-create">
        <div class="bg" onclick="blur()"></div>
        <div class="create">
            <div class="card">
                <h1>Enter The supplier</h1>
            <form action="{{route("suppliers.store")}}" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Enter Name">
                <input type="text" name="adresse" placeholder="Enter Adresse">
                <input type="text" name="email" placeholder="Enter Email">
                <input type="text" name="contact" placeholder="Enter Contact">
                <button>Valider</button>
            </form>
        </div>
        </div>
    </div>

@endsection
