<!DOCTYPE html>
<html>
<head>
  <title>Formulário</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
    $('#numero_prontuario').blur(function() {
        var prontuario = $(this).val();

        // Realiza a requisição AJAX ao servidor Oracle
        $.ajax({
            url: 'buscar_paciente.php', // Arquivo PHP que irá buscar os dados do paciente
            method: 'POST',
            data: { prontuario: prontuario },
            success: function(data) {
                var nomePaciente = data;

                // Preenche o campo 'nome_paciente' com o valor obtido
                $('#nome_paciente').val(nomePaciente);
            }
        });
    });
});
</script>
</head>
<body>

<input type="number" pattern="[0-9]*" inputmode="numeric" id="numero_prontuario" name="numero_prontuario" placeholder="Nº de prontuário">
<input type="text" id="nome_paciente" name="nome_paciente" placeholder="Nome do Paciente">

</body>
</html>

<script>
  const numeroProntuarioInput = document.getElementById('numero_prontuario');
  const nomePacienteInput = document.getElementById('nome_paciente');

  // Adicione um ouvinte de eventos ao campo Nº de Prontuario
  numeroProntuarioInput.addEventListener('input', function() {
    if (numeroProntuarioInput.value === '') {
      // Se o campo Nº de Prontuario estiver em branco, habilite o campo Nome do Paciente
      nomePacienteInput.disabled = false;
    } else {
      // Se o campo Nº de Prontuario tiver algum valor, desabilite o campo Nome do Paciente
      nomePacienteInput.disabled = true;
    }
  });
</script>
