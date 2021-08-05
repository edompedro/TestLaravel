@extends('layout.mainview')
@section('mainview')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class='col-4 mx-4'>

    <form action ="/register" method="post">
        @csrf

    <div class="row mb-3">
            <label for="FormControlInputTitle" class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" placeholder="Input name here.">
        </div>

        <div class="row mb-3">
            <label for="FormControlInputQuantity" class="form-label">Cargo</label>
            <input type="number" min="1" max="3" class="form-control" name="cargo" id="cargo" placeholder="Input cargo.">
        </div>

        <div class="row mb-3">
            <label for="FormControlInputQuantity" class="form-label">Endereço</label>
            <textarea  type ="text" class="form-control" name="endereco" id="endereco" placeholder="Input endereço."></textarea>
        </div>

        <div class="row mb-3">
            <label for="FormControlInputPrice" class="form-label">Salario (U$)</label>
            <input type="text" class="form-control" name="salario" id="salario" placeholder="Input salary.">
        </div>


        <button type="submit" class="btn btn-primary">Insert person</button>




    </form>



</div>

@endsection