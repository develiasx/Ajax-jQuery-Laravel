<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>
    <script src="assets/js/jquery.serializejson.js"></script>
    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"
        integrity="sha512-3dZ9wIrMMij8rOH7X3kLfXAzwtcHpuYpEgQg1OA4QAob1e81H8ntUQmQm3pBudqIoySO5j0tHN4ENzA6+n2r4w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <title>Ajax Teste</title>

</head>


<body>

    <div class="container">
        <h1>Formulário</h1>

        <form id="cadastro">
          <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" name="nome" placeholder="Digite seu nome">
          </div>
          <div class="form-group">
            <label for="sobrenome">Sobrenome:</label>
            <input type="text" class="form-control" name="sobrenome" placeholder="Digite seu sobrenome">
          </div>
          <div class="form-group">
            <label for="cpf">CPF:</label>
            <input type="text" class="form-control" name="cpf" placeholder="Digite seu CPF">
          </div>
          <button id="botao" type="submit" class="btn btn-primary">Salvar</button>
        </form>
      </div>


    
    <script>
        $("#botao").on('click', function(e) {
            console.log('botao apertado')
            e.preventDefault();
            
            $.ajax({
                url: "{{ route('people.store') }}",
                type: "POST",
                data: {
                    "form": $("#cadastro").serializeJSON(),

                    "_token": "{{ csrf_token() }}",
                    dataType: "json"
                },
                success: function(result, status) {
                    console.log(status);
                    console.log(result);
                }
            });

        });
    </script>



</body>

</html>
