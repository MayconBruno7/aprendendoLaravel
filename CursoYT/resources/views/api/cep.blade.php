@extends('layout.layout_principal')
<!-- @section('title', 'Lista de Produtos') -->
@section('conteudo')

<div class="container mt-3">
    <!-- <h1>Consulta a APIS</h1> -->

    <div class="container">
        <h3>API de consulta de cep via GET</h3>

        <div>
            <label for="cep">Informe o cep: </label>
            <input type="text" name="cep" id="cep" class="mb-1 input-group">

            <button class="btn btn-outline-success" onclick="consultarCEP()">Consultar CEP</button>
        </div>

        <div id="resultado">
            <!-- <p id="cepExibido"></p>
            <p id="localidade"></p>
            <p id="uf"></p>
            <p id="estado"></p>
            <p id="regiao"></p>
            <p id="ibge"></p> -->
        </div>
    </div>
</div>

<script>
    
    function consultarCEP() {
        cep = document.getElementById("cep").value;

        fetch("https://viacep.com.br/ws/" + cep +  "/json/")
            .then(response => response.json())
            .then(data => {
                console.log(data);
                exibeInformacoesCEP(data);

            })
            .catch(error => {
                console.error("Error: " + error);
            });
        

        // console.log(cep);
    }

    function exibeInformacoesCEP(dados) {

        if(!dados.erro == true) {
            // cep = document.getElementById('cepExibido');
            // estado = document.getElementById('estado');
            // ibge = document.getElementById('ibge');
            // localidade = document.getElementById('localidade');
            // regiao = document.getElementById('regiao');
            // uf = document.getElementById('uf');
            
            card = document.getElementById('resultado');
            // innerText respeita o css
            // innerHTML eu consigo setar tags HTML dentro
            // textContent mostra o texto mesmo se oculto pelo css
            card.innerHTML = `
                <div class="card text-center mt-3">
                    <div class="card-header">
                        Informações do CEP : ${dados.cep}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"> Nome da cidade: ${dados.localidade} </h5>
                        <p class="card-text">Estado: ${dados.estado}</p>
                        <p class="card-text">IBGE: ${dados.ibge}</p>
                        <p class="card-text">Região: ${dados.regiao}</p>
                        <p class="card-text">UF: ${dados.uf}</p>
                    </div>
                </div>
            `;
        } else {
            alert('Erro ao buscar informações');
        }

    }

</script>

@endsection