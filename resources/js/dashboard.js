document.addEventListener('DOMContentLoaded', function () {
    // Controle de rótulos das abas ao passar o mouse / aba ativa
    const tabs = Array.from(document.querySelectorAll('#dashboardTabs .nav-link'));
    if (!tabs.length) return; // sai se não houver abas na página

    tabs.forEach(tab => {
        const original = tab.textContent.trim();
        tab.dataset.original = original;
        tab.dataset.hover = tab.dataset.hover || (original + ' •');
        tab.dataset.active = tab.dataset.active || ('<strong>' + original + ' ✓</strong>');

        tab.addEventListener('mouseenter', () => {
            // ao passar o mouse — mostra o texto de hover
            tab.textContent = tab.dataset.hover;
        });
        tab.addEventListener('mouseleave', () => {
            if (tab.classList.contains('active')) {
                tab.innerHTML = tab.dataset.active;
            } else {
                tab.textContent = tab.dataset.original;
            }
        });
    });

    // Conecta os eventos de abas do Bootstrap (botões que alternam as abas)
    document.querySelectorAll('#dashboardTabs button[data-bs-toggle="tab"]').forEach(btn => {
        btn.addEventListener('shown.bs.tab', (e) => {
            // restaura o texto original de todas as abas
            tabs.forEach(t => t.textContent = t.dataset.original);
            // define o rótulo da aba ativa (permite HTML)
            e.target.innerHTML = e.target.dataset.active;
        });
        btn.addEventListener('hidden.bs.tab', (e) => {
            // ao ser ocultada, restaura o rótulo original
            e.target.textContent = e.target.dataset.original;
        });
    });

    // Garante que a aba inicialmente ativa mostre o rótulo de “ativo”
    const active = document.querySelector('#dashboardTabs .nav-link.active');
    if (active) active.innerHTML = active.dataset.active;


    // ============== Início do Botão de Editar Veículo ==============
    const editarVeiculoModal = document.getElementById('editarVeiculoModal');
    const formEditVeiculo = document.getElementById('formEditVeiculo');

    if (editarVeiculoModal && formEditVeiculo) {
        editarVeiculoModal.addEventListener('show.bs.modal', async function (event) {
            const button = event.relatedTarget;

            if (!button) return;

            const fetchUrl = button.getAttribute('data-fetch-url');
            const updateUrl = button.getAttribute('data-update-url');
            const veiculoNome = button.getAttribute('data-veiculo-nome');

            const modalTitle = document.getElementById('tituloModalEditVeiculo');

            // Atualiza o TÍTULO do modal
            if (modalTitle) {
                modalTitle.textContent = veiculoNome
                    ? `Editar Veículo: ${veiculoNome}`
                    : 'Editar Veículo';
            }

            if (updateUrl) formEditVeiculo.action = updateUrl;

            if (fetchUrl) {
                try {
                    const resp = await fetch(fetchUrl, { headers: { 'Accept': 'application/json' } });
                    if (!resp.ok) throw new Error('Falha ao buscar dados');
                    const data = await resp.json();

                    document.getElementById('marcaEdit').value = data.marca || '';
                    document.getElementById('modeloEdit').value = data.modelo || '';
                    document.getElementById('anoEdit').value = data.ano || '';
                    document.getElementById('placaEdit').value = data.placa || '';
                    document.getElementById('corEdit').value = data.cor || '';
                    
                    // Formata a quilometragem para exibição
                    const quilometragem = data.quilometragem_atual || '';
                    document.getElementById('quilometragemEdit').value = quilometragem.toString().replace('.', ',');
                    
                    // Formata o valor para exibição
                    const valorDias = data.valor_dias || '';
                    document.getElementById('valor_diasEdit').value = valorDias.toString().replace('.', ',');
                    
                } catch (err) {
                    console.error('Erro ao carregar dados do veículo:', err);
                }
            }
        });

        // CORREÇÃO: Adicionar evento de submit para formatar os dados ANTES de enviar
        formEditVeiculo.addEventListener('submit', function(e) {
            // Formata a quilometragem (remove pontos e converte vírgula para ponto)
            const kmInput = document.getElementById('quilometragemEdit');
            if (kmInput && kmInput.value) {
                let kmValue = kmInput.value;
                kmValue = kmValue.toString().replace(/\./g, ''); // Remove pontos de milhar
                kmValue = kmValue.replace(',', '.'); // Converte vírgula decimal para ponto
                kmInput.value = kmValue;
            }

            // Formata o valor_dias (remove pontos e converte vírgula para ponto)
            const valorInput = document.getElementById('valor_diasEdit');
            if (valorInput && valorInput.value) {
                let valorValue = valorInput.value;
                valorValue = valorValue.toString().replace(/\./g, ''); // Remove pontos de milhar
                valorValue = valorValue.replace(',', '.'); // Converte vírgula decimal para ponto
                valorInput.value = valorValue;
            }
        });
    }
    // ============== Fim do Botão de Editar Veículo ==============


    // ============== Início do Modal de Alugar Veículo ==============
    const alugarVeiculoModal = document.getElementById('alugarVeiculoModal');

    // Lógica de cálculo do valor do aluguel
    const dataRetiradaInput = document.querySelector('#data_retirada');
    const dataDevolucaoInput = document.querySelector('#data_devolucao');
    const displayValorTotal = document.querySelector('#displayValorTotalAluguel');
    let valorDiariaVeiculo = 0; // Valor global

    // Função para calcular e exibir o total
    const calcularTotalAluguel = () => {
        const dataRetirada = new Date(dataRetiradaInput.value);
        const dataDevolucao = new Date(dataDevolucaoInput.value);

        // validação das datas
        if(dataDevolucaoInput.value && dataDevolucao < dataRetirada){
            displayValorTotal.textContent = 'Data inválida';
            displayValorTotal.classList.remove('text-success');
            displayValorTotal.classList.add('text-danger');
            return;
        }

        if(dataRetiradaInput.value && dataDevolucaoInput.value && valorDiariaVeiculo > 0){
            const diffTime = Math.abs(dataDevolucao - dataRetirada);

            // Diferença de dias + 1
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;

            const total = diffDays * valorDiariaVeiculo;

            // Formatar para BRL (R$)
            displayValorTotal.textContent = total.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
            displayValorTotal.classList.remove('text-danger');
            displayValorTotal.classList.add('text-success');
        } else {
            // Se não tiver dados suficientes, zera o valor
            displayValorTotal.textContent = 'R$ 0,00';
            displayValorTotal.classList.remove('text-danger');
            displayValorTotal.classList.add('text-success');
        }
    };

    // Eventos para recalcular ao mudar as datas
    dataRetiradaInput.addEventListener('change', calcularTotalAluguel);
    dataDevolucaoInput.addEventListener('change', calcularTotalAluguel);
    // Fim da lógica de cálculo do valor do aluguel

    if (alugarVeiculoModal) {
        alugarVeiculoModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            if (!button) return;

            // Pega os dados do botão
            const veiculoNome = button.getAttribute('data-veiculo-nome') || '';
            const veiculoId = button.getAttribute('data-veiculo-id') || '';
            const veiculoDiaria = button.getAttribute('data-veiculo-diaria') || 0;
            valorDiariaVeiculo = parseFloat(veiculoDiaria);

            // Atualiza o título
            const modalTitle = alugarVeiculoModal.querySelector('.modal-title');
            if (modalTitle) modalTitle.textContent = `Alugar Veículo: ${veiculoNome}`;

            // Atualiza o campo hidden
            const hiddenInput = alugarVeiculoModal.querySelector('#aluguel_veiculo_id');
            if (hiddenInput) hiddenInput.value = veiculoId;

            // Limpa as datas e recalcula
            dataRetiradaInput.value = '';
            dataDevolucaoInput.value = '';
            calcularTotalAluguel();
        });
    }

    // ============= Fim do Modal de Alugar Veículo ==============


    // ============== Início da Lógica de Devolução do Veículo ==============

    const modalDevolverVeiculo = document.getElementById('devolverVeiculoModal');
    const botaoDevolverVeiculo = document.getElementById('confirmarDevolucaoBtn');
    const modalTitle = document.getElementById('tituloModalDevolverVeiculo');
    const formDevolverVeiculo = document.getElementById('devolverVeiculoForm');
    

    if (modalDevolverVeiculo && formDevolverVeiculo) {
        modalDevolverVeiculo.addEventListener('show.bs.modal', async function (event) {

            const button = event.relatedTarget;

            const veiculoNome = button.getAttribute('data-veiculo-nome') || '';
            const devolverUrl = button.getAttribute('data-devolver-url') || '';
            const kmDevolucao = button.getAttribute('data-km-atual') || '';

            if (!button) return;

            // Atualiza o título do modal
            if (modalTitle) {
                modalTitle.textContent = veiculoNome
                    ? `Devolver Veículo: ${veiculoNome}`
                    : 'Devolver Veículo';
            }

            // Usa a km atual do veículo
            document.getElementById('campoQuilometragem').value = kmDevolucao;

            // Se a URL de devolução estiver presente, atualiza o action do form
            if (devolverUrl) devolverVeiculoForm.action = devolverUrl;
        });
    }

    // Formata o campo de quilometragem antes de enviar os dados do formulário.
    formDevolverVeiculo.addEventListener('submit', function(e) {
        const kmAtualizada = document.getElementById('campoQuilometragem');
        if (kmAtualizada && kmAtualizada.value) {
            let kmValue = kmAtualizada.value;
            kmValue = kmValue.toString().replace(/\./g, '');
            kmValue = kmValue.replace(',', '.');
            kmAtualizada.value = kmValue;
        }
    });
    
    // ============== Fim da Lógica de DEVOLUÇÃO ==============





    // ============== Início do Botão de Editar Cliente ==============
    const editarClienteModal = document.getElementById('editarClienteModal');
    const formEditCliente = document.getElementById('formEditCliente');

    if (editarClienteModal && formEditCliente) {
        editarClienteModal.addEventListener('show.bs.modal', async function (event) {

            const button = event.relatedTarget;

            if (!button) return;

            const fetchUrl = button.getAttribute('data-fetch-url');
            const updateUrl = button.getAttribute('data-update-url');
            const clienteNome = button.getAttribute('data-cliente-nome'); 

            const modalTitle = document.getElementById('tituloModalEditCliente');

            // Atualiza o TÍTULO do modal
            if(modalTitle){
                modalTitle.textContent = clienteNome
                    ? `Editar Cliente: ${clienteNome}`
                    : 'Editar Cliente';
            }

            if (updateUrl) formEditCliente.action = updateUrl;

            if (fetchUrl) {
                try {
                    const resp = await fetch(fetchUrl, { headers: { 'Accept': 'application/json' } });
                    if (!resp.ok) throw new Error('Falha ao buscar dados');
                    const data = await resp.json();

                    document.getElementById('cpfEdit').value = data.cpf_documento || '';
                    document.getElementById('nomeEdit').value = data.nome || '';
                    document.getElementById('cnhEdit').value = data.cnh || '';
                    document.getElementById('emailEdit').value = data.email || '';
                    document.getElementById('telefoneEdit').value = data.telefone || '';
                    document.getElementById('enderecoEdit').value = data.endereco || '';

                    

                } catch (err) {
                    console.error('Erro ao carregar dados do cliente:', err);
                }
            }
        });

    }
    // ============== Fim do Botão de Editar Cliente ==============

    // Formatador de máscara para campos específicos
    // Máscara para CPF

    const cpfInputs = document.getElementById('cpf_documento');
    if (cpfInputs) {
        IMask(cpfInputs, {
            mask: '000.000.000-00'
        });
    }

    // Máscara para Telefone
    const telefoneInputs = document.getElementById('telefone');
    if (telefoneInputs) {
        IMask(telefoneInputs, {
            mask: [
            {mask: '(00) 0000-0000'},
            {mask: '(00) 00000-0000'}
        ]});
    }

    // Máscara para CNH
    const cnhInputs = document.getElementById('cnh');
    if (cnhInputs) {
        IMask(cnhInputs, {
            mask: '00000000000'
        });
    }

    // Máscara para Placa de Veículo
    const placaInputs = document.getElementById('placa');
    if (placaInputs) {
        IMask(placaInputs, {
            mask: 'aaa-0a00',
            prepare: function (str) {
                return str.toUpperCase();
            }
        });
    }

    // Máscara para Quilometragem
    const quilometragemInput = document.getElementById('quilometragem'); 
    if (quilometragemInput) {
        IMask(quilometragemInput, {
            mask: Number,
            scale: 0, // BUG #2 CORRIGIDO: KM é inteiro
            thousandsSeparator: '.',
            padFractionalZeros: false,
            normalizeZeros: false
        });
    }

    // MÁSCARAS PARA MODAIS DE "EDITAR"

    // Máscara para o CPF (Modal Editar Cliente)
    const cpfInputEdit = document.getElementById('cpfEdit');
    if (cpfInputEdit) {
        IMask(cpfInputEdit, { mask: '000.000.000-00' });
    }

    // Máscara para o Telefone (Modal Editar Cliente)
    const telefoneInputEdit = document.getElementById('telefoneEdit');
    if (telefoneInputEdit) {
        IMask(telefoneInputEdit, {
            mask: [
                { mask: '(00) 0000-0000' },
                { mask: '(00) 00000-0000' }
            ]
        });
    }

    // Máscara para a CNH (Modal Editar Cliente)
    const cnhInputEdit = document.getElementById('cnhEdit');
    if (cnhInputEdit) {
        IMask(cnhInputEdit, { mask: '00000000000' });
    }

    // Máscara para a Placa (Modal Editar Veículo)
    const placaInputEdit = document.getElementById('placaEdit');
    if (placaInputEdit) {
        IMask(placaInputEdit, {
            mask: 'aaa-0a00',
            prepare: str => str.toUpperCase()
        });
    }

    // Máscara para Quilometragem (Modal Editar Veículo)
    const quilometragemInputEdit = document.getElementById('quilometragemEdit');
    if (quilometragemInputEdit) {
        IMask(quilometragemInputEdit, {
            mask: Number,
            scale: 0,
            thousandsSeparator: '.',
            padFractionalZeros: false,
            normalizeZeros: false
        });
    }

    const valorDiasInputEdit = document.getElementById('valor_diasEdit');
    if (valorDiasInputEdit) {
        // Se já existe máscara, destrói
        if (valorDiasInputEdit._imask) {
            valorDiasInputEdit._imask.destroy();
        }
        
        // Remove o type="number" se existir (causa conflito com vírgula)
        valorDiasInputEdit.type = 'text';
        
        // Formatação no blur (quando sai do campo)
        valorDiasInputEdit.addEventListener('blur', function() {
            if (!this.value || this.value.trim() === '') {
                this.value = '0,00';
                return;
            }
            
            let valor = this.value;
            
            // Remove tudo que não for número, vírgula ou ponto
            valor = valor.replace(/[^\d,.]/g, '');
            
            // Se tem ponto como separador de milhar, remove
            valor = valor.replace(/\.(?=\d{3})/g, '');
            
            // Converte vírgula para ponto temporariamente
            valor = valor.replace(',', '.');
            
            // Converte para número
            let numero = parseFloat(valor);
            
            if (isNaN(numero)) {
                this.value = '0,00';
                return;
            }
            
            // Arredonda para 2 casas decimais
            numero = Math.round(numero * 100) / 100;
            
            // Formata como string brasileira
            this.value = numero.toLocaleString('pt-BR', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
        });
        
        // No focus, remove formatação para facilitar edição
        valorDiasInputEdit.addEventListener('focus', function() {
            let valor = this.value;
            
            if (valor === '0,00' || !valor) {
                this.value = '';
                return;
            }
            
            // Remove formatação
            valor = valor.replace(/[^\d,.]/g, '');
            valor = valor.replace(/\./g, ''); // Remove pontos de milhar
            this.value = valor;
        });
    }

    

    

});

