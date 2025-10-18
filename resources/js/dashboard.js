document.addEventListener('DOMContentLoaded', function () { // Esse DOM significa que o JS só carrega DEPOIS do HTML
        const tabs = Array.from(document.querySelectorAll('#dashboardTabs .nav-link'));
        if (!tabs.length) return;

        // store original text, optionally you can set data-hover / data-active in HTML
        tabs.forEach(tab => {
            tab.dataset.original = tab.textContent.trim();
            // optional defaults if you don't want to add attributes in HTML
            tab.dataset.hover = tab.dataset.hover || (tab.dataset.original + ' •'); // Quando passa mouse, bolinha
            tab.dataset.active = tab.dataset.active || (tab.dataset.original + ' ✓'); // Quando seleciona, check

            tab.addEventListener('mouseenter', () => {
                // only change text visually on hover
                tab.textContent = tab.dataset.hover;
            });
            tab.addEventListener('mouseleave', () => {
                // restore original, keep active text if it's active
                tab.textContent = tab.classList.contains('active') ? tab.dataset.active : tab.dataset.original;
            });
        });

        // When a tab is shown, restore all and set the active text for the activated tab
        document.querySelectorAll('#dashboardTabs button[data-bs-toggle="tab"]').forEach(btn => {
            btn.addEventListener('shown.bs.tab', (e) => {
                tabs.forEach(t => t.textContent = t.dataset.original); // restore others
                e.target.textContent = e.target.dataset.active; // set active label
            });
            // Optional: when a tab is hidden, restore its original label
            btn.addEventListener('hidden.bs.tab', (e) => {
                e.target.textContent = e.target.dataset.original;
            });
        });

        // If page loads with an already-active tab, ensure it shows the active text
        const active = document.querySelector('#dashboardTabs .nav-link.active');
        if (active) active.textContent = active.dataset.active;
    });

    // JavaScript para carregar dados no modal de edição
    document.addEventListener('DOMContentLoaded', function () {
        var editarVeiculoModal = document.getElementById('editarVeiculoModal');
        var formEditVeiculo = document.getElementById('formEditVeiculo');

        if (editarVeiculoModal) {
            editarVeiculoModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget;
                var fetchUrl = button.getAttribute('data-fetch-url');
                var updateUrl = button.getAttribute('data-update-url');

                // Set form action
                formEditVeiculo.action = updateUrl;

                // Fetch vehicle data and fill fields
                fetch(fetchUrl)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('marcaEdit').value = data.marca || '';
                        document.getElementById('modeloEdit').value = data.modelo || '';
                        document.getElementById('anoEdit').value = data.ano || '';
                        document.getElementById('placaEdit').value = data.placa || '';
                        document.getElementById('corEdit').value = data.cor || '';
                        document.getElementById('statusEdit').value = data.status || '';
                    });
            });
        }
    });