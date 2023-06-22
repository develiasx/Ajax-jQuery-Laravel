<script>
    $("#botao").on('click', function(e) {
        console.log('botao apertado')
        e.preventDefault();

        $.ajax({
            url: "{{route('people.store')}}",
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