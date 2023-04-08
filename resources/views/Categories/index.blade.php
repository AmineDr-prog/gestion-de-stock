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
    <h1>List of Categories</h1>
    <button class="btn-create" onclick="show()">Create <span>+</span></button>
    <table>
        <thead>
            <th>Name</th>
            <th>Action</th>
        </thead>

            @forelse ($categorie as $c)
            <tr>
            <td data-label="Name">{{$c["name"]}}</td>
            <td data-label="Action" id={{$c["id"]}} class="action"><button class="btn-edit">Edit</button>
            <form action="{{route("categories.destroy",$c["id"])}}" method="Post">
                @csrf
                @method("delete")
                <button class="btn-delete">Delete</button>
            </form></td>

            </tr>
            @empty
                <tr>
                   <td colspan="2">No categorie</td>
                </tr>
        @endforelse




    </table>




    <div class="cont-edit">
        <div class="bg" onclick="blur()"></div>
        <div class="edit">
            <div class="card">
                <h1>Edit The product</h1>
                <form action="{{route("categories.update","")}}" name="edi" method="Post">
                @method("put")
                @csrf
                <input type="text" name="categorie" class="edit-input" placeholder="Change categorie ">
                <button>Valider</button>
                </form>
            </div>

        </div>
    </div>

    <div class="cont-create">
        <div class="bg" onclick="blur()"></div>
        <div class="create">
            <div class="card">
                <h1>ADD a product</h1>
            <form action="{{route("categories.store")}}" method="POST">
                @csrf
               <input type="text" name="categorie" placeholder="ADD PRODUCT" >
               <button>Valider</button>
            </form>
        </div>
        </div>
    </div>
</section>
    @endsection
