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

    <h1>List of Customers</h1>
    <button class="btn-create" onclick="show()">Create <span>+</span></button>
    <table>
        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Adresse</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Action</th>
        </thead>

        @forelse ($Customers as $c)

        <tr>
            <td data-label="Id">{{$c->id}}</td>
            <td data-label="Name">{{$c->name}}</td>
            <td data-label="Adresse">{{$c->adresse}}</td>
            <td data-label="Email">{{$c->email}}</td>
            <td data-label="Phone">{{$c->phone}}</td>
            <td data-label="Action" id={{$c->id}} class="action">
                <button class="btn-edit">Edit</button>
                <form action="{{route("customers.destroy",$c["id"])}}" method="Post">
                    @csrf
                    @method("delete")
                    <button class="btn-delete">Delete</button>
                </form>
            </td>
        </tr>
        @empty
            <tr>
                <td colspan="2">No customers</td>
            </tr>
        @endforelse
    </table>


    <div class="cont-edit">
        <div class="bg" onclick="blur()"></div>
        <div class="edit">
            <div class="card">
                <h1>Edit The Custumor</h1>
                <form action="{{route("customers.update","")}}" name="edi" method="Post">
                @method("put")
                @csrf
                <input type="text" name="name" placeholder="Change name">
                <input type="text" name="adresse" placeholder="Change adresse">
               <input type="text" name="email" placeholder="Change email">
                <input type="text" name="phone" placeholder="Change phone">

                <button>Valider</button>
            </form>
            </div>
        </div>
    </div>




    <div class="cont-create">
        <div class="bg" onclick="blur()"></div>
        <div class="create">
            <div class="card">
                <h1>Create Customers</h1>
            <form action="{{route("customers.store")}}" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Enter name">
                <input type="text" name="adresse" placeholder="Enter adresse">
                <input type="text" name="email" placeholder="Enter email">
                <input type="text" name="phone" placeholder="Enter phone">
                <button>Valider</button>
            </form>
            </div>
        </div>
    </div>

</section>


@endsection
