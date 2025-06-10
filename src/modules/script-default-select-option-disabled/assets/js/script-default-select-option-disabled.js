document.addEventListener('DOMContentLoaded', function() {
  // Seleciona ambos os campos com o ID 'form-field-valor'
  const allSelects = document.querySelectorAll('.exclusiveForm select');

  // Itera sobre cada campo 'select' encontrado
  allSelects.forEach(selectElement => {
    // Cria a opção desabilitada
    const defaultOption = document.createElement('option');
    defaultOption.value = '';
    defaultOption.textContent = 'Selecione uma opção';
    defaultOption.disabled = true;
    defaultOption.selected = true;  // Define como opção selecionada padrão

    // Adiciona a opção ao início do select
    selectElement.prepend(defaultOption);
  });
});

