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

    <form action ="{{ url('empregado/edit/'.$id)}}" method="post">
        @csrf

    <div class="row mb-3">
            <label for="FormControlInputTitle" class="form-label">Nome</label>
            <input type="text" class="formInsert-control" name="nome" id="nome" value="<?=$nome?>" placeholder="<?=$nome?>">
        </div>

        <div class="row mb-3">
            <label for="FormControlInputQuantity" class="form-label">Cargo</label>
            <input type="number" min="1" max="3" class="form-control" name="cargo" id="cargo" value="<?=$cargo?>" placeholder="<?=$cargo?>">
        </div>

        <div class="row mb-3">
            <label for="FormControlInputQuantity" class="form-label">Endereço</label>
            <textarea  type ="text" class="form-control" name="endereco" id="endereco" value="<?=$endereco?>" placeholder="<?=$endereco?>"></textarea>
        </div>

        <div class="row mb-3">
            <label for="FormControlInputPrice" class="form-label">Salario (U$)</label>
            <input type="text" class="form-control" name="salario" id="salario" value="<?=$salario?>" placeholder="<?=$salario?>">
        </div>


        <button type="submit" class="btn btn-primary">Update person</button>




    </form>



</div>

@endsection