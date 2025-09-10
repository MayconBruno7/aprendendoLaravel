@extends('layout/layout_principal')
@section('conteudo')

<div class="container mt-5">
  <h1 class="text-center mb-4">Criador de Usuários</h1>

  <div class="row justify-content-center">
    <div class="col-md-6">

      <div class="mb-3">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" class="form-control" id="nome" name="nome">
      </div>

      <div class="mb-3">
        <label for="trabalho" class="form-label">Trabalho:</label>
        <input type="text" class="form-control" id="trabalho" name="trabalho">
      </div>

      <button id="btn-criar-usuario" class="btn btn-success w-100">Criar</button>

    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>

    document.getElementById('btn-criar-usuario').addEventListener('click', function() {
        nome = document.getElementById('nome').value;
        trabalho = document.getElementById('trabalho').value;
        // console.log(palavra);
        requireAPITranslate(nome, trabalho);
    })

    function requireAPITranslate(nome, trabalho) {
        console.log('tamo ai');
        fetch('https://reqres.in/api/users', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                name: nome,
                job: trabalho,
            })
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
        })
        .catch(error => {
            console.error(error);
        })

    }

    // $('#btn-traduzir-palavra').click( function() {
    //     console.log("Estamos ai");
    // })
    // function traduzirPalavra() {
    //     console.log("Estamos ai");
    // }

</script>
@endSection