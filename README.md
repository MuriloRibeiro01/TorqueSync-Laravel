<p align="center">
<img src="https://www.google.com/search?q=https://img.shields.io/badge/PHP-777BB4%3Fstyle%3Dfor-the-badge%26logo%3Dphp%26logoColor%3Dwhite" alt="PHP">
<img src="https://www.google.com/search?q=https://img.shields.io/badge/Laravel-FF2D20%3Fstyle%3Dfor-the-badge%26logo%3Dlaravel%26logoColor%3Dwhite" alt="Laravel">
<img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
<img src="https://www.google.com/search?q=https://img.shields.io/badge/Bootstrap-7952B3%3Fstyle%3Dfor-the-badge%26logo%3Dbootstrap%26logoColor%3Dwhite" alt="Bootstrap">
<img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black" alt="JavaScript">
</p>

<h1 align="center">🚗 TorqueSync - Sistema de Gestão para Locadoras</h1>

O TorqueSync é uma aplicação web completa, construída com o framework Laravel 10+, para a gestão inteligente de frotas de veículos. O sistema foi desenhado como uma solução monolítica robusta, unindo o poder do PHP no backend com a reatividade das views em Blade no frontend.

<h2 align="center">🖥️ Demonstração da Aplicação</h2>

O coração do TorqueSync é o seu dashboard central, projetado para fornecer uma visão clara e objetiva da operação.

<!--
MURILO! Aqui é o lugar daquele GIF matador do fluxo de aluguel!

Grave o fluxo: Mostrar o carro "Disponível"

Clicar em "Alugar"

Modal abrir com o NOME e CÁLCULO de preço

Confirmar o aluguel

Mostrar a página recarregada com o carro "Alugado"
-->

<p align="center">
<img src="httpsia.org/wikipedia/commons/2/2c/Rotating_earth_%28large%29.gif" alt="GIF do Dashboard TorqueSync (COLOQUE SEU LINK AQUI)" style="width: 90%; max-width: 700px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.2);">
</p>

<h2 align="center">💡 Diferenciais Técnicos (O "Pulo do Gato")</h2>

<p align="center">
Este não é apenas um projeto de CRUD. O TorqueSync foi construído com foco em <strong>lógica de negócio real</strong>, <strong>segurança</strong> e <strong>experiência de usuário (UX)</strong>.
</p>




<!-- Usei <details> para criar "sanfonas" (accordions) e deixar o README limpo! -->

<details>
<summary><strong>🧠 1. Fonte da Verdade no Backend (Cálculo de Preço Seguro)</strong></summary>





<p>O cálculo do valor do aluguel é feito em dois lugares para garantir a melhor UX e segurança:</p>
<ul>
<li><strong>No Frontend (JavaScript):</strong> Para uma UX fantástica, o preço é calculado e exibido em tempo real (R$ 0,00) no modal, conforme o usuário seleciona as datas de retirada e devolução.</li>
<li><strong>No Backend (Controller PHP):</strong> O cálculo é <strong>refeito</strong> no servidor (usando Carbon para os dias e o valor_dias do veículo vindo do banco). Isso garante a integridade dos dados e previne qualquer tipo de manipulação de preço via frontend.</li>
</ul>
</details>

<details>
<summary><strong>🛡️ 2. Sanitização de Inputs (Backend)</strong></summary>





<p>O <code>VeiculoController</code> limpa ativamente os dados formatados (máscaras) antes de validá-los. A lógica transforma "R$ 1.500,00" em "1500.00" e "120.000" em "120000", garantindo que dados limpos e corretos entrem no banco de dados.</p>
</details>

<details>
<summary><strong>⚡ 3. Performance (Eager Loading N+1)</strong></summary>





<p>O dashboard principal, na tabela "Veículos em Operação", precisava exibir o nome do cliente que alugou o carro. Em vez de fazer uma nova query para cada carro alugado (o "problema N+1"), o <code>DashboardController</code> usa <code>with('aluguelAtivo.cliente')</code> para carregar todos os dados necessários em um número mínimo de queries, garantindo que o painel carregue de forma otimizada.</p>
</details>

<details>
<summary><strong>✅ 4. Validação Avançada (Regras do Mundo Real)</strong></summary>





<p>As regras de <code>update</code> para Clientes e Veículos usam <code>Rule::unique()->ignore($id)</code>. Esta é uma prática essencial do mundo real que permite a edição de um registro (ex: trocar o email) sem que as regras de "email único" ou "placa única" conflitem com o próprio registro que está sendo editado.</p>
</details>

<details>
<summary><strong>🧹 5. Clean Code (Blade Partials)</strong></summary>





<p>A interface principal é 100% componentizada com <code>partials</code> (<code>@include</code>). O arquivo <code>home.blade.php</code> atua como um "esqueleto" limpo, enquanto a lógica de cada aba (Veículos, Clientes) e cada modal (Adicionar, Editar) vive em seu próprio arquivo. Isso torna a manutenção e a adição de novas features drasticamente mais fáceis.</p>
</details>

✅ Funcionalidades Implementadas (Concluídas)

Arquitetura e UI Principal

Dashboard Central: KPIs dinâmicos (Disponíveis, Alugados, Manutenção).

Interface em Abas (SPA-like): Navegação fluida sem recarregar a página.

Componentização de Views: Código Blade 100% refatorado.

Módulo 1: Gestão da Frota (CRUD Completo)

CRUD completo de Veículos (Cadastrar, Editar, Excluir).

Validação de backend e sanitização de inputs.

Máscaras de UX no frontend (Placa, Quilometragem, Valor de Diária).

Módulo 2: Gestão de Clientes (CRUD Completo)

CRUD completo de Clientes (Cadastrar, Editar, Excluir).

Validação avançada (unique com ignore).

Máscaras de UX no frontend (CPF, Telefone, CNH).

Módulo 3: Gestão de Operações (Core)

Fluxo de Aluguel (Criar):

Cálculo de preço em tempo real no JS.

Recálculo de preço seguro no Controller (Fonte da Verdade).

Lógica de negócio que atualiza o status do Veículo para "Alugado" e salva a quilometragem_retirada automaticamente.

Painel de Controle (Visão Geral):

Tabela de "Veículos em Operação" que exibe quais carros estão Alugados/Em Manutenção e quem é o locador atual (usando Eager Loading).

⏳ Roadmap (Próximos Passos)

Módulo 3: Gestão de Operações (Finalização)

◻️ Fluxo de Devolução: Criar a lógica para registrar a devolução de um veículo.

◻️ Registrar quilometragem_rodada (final) e calcular o total rodado.

◻️ Alterar o status do Veículo de "Alugado" para "Disponível".

◻️ Módulo de Manutenção:

◻️ Criar fluxo de "Abrir O.S." (Ordem de Serviço) para veículos, mudando o status para "Manutenção".

◻️ Registrar custos da manutenção.

◻️ Criar fluxo de "Fechar O.S.", mudando o status para "Disponível".

Módulo 4: Relatórios e BI

◻️ Relatório de lucratividade por veículo (Receita de Aluguéis vs. Custo de Manutenções).

◻️ Alertas de manutenção preventiva (baseado na quilometragem_atual).

<table align="center" style="width: 90%; max-width: 800px; margin: 0 auto; border-collapse: separate; border-spacing: 15px; background-color: #f6f8fa; border-radius: 10px; border: 1px solid #dfe2e5;">
<tr>
<td valign="top" style="width: 50%;">
<strong>🖥️ Backend</strong>
<ul>
<li>PHP 8.1+</li>
<li>Laravel 10+ (Framework)</li>
<li>Eloquent ORM (Abstração de DB)</li>
<li>Carbon (Manipulação de Datas)</li>
</ul>
</td>
<td valign="top" style="width: 50%;">
<strong>🎨 Frontend</strong>
<ul>
<li>Laravel Blade (Template Engine)</li>
<li>Bootstrap 5 (CSS Framework)</li>
<li>JavaScript (ES6+)</li>
<li>IMask.js (Máscaras de Input)</li>
</ul>
</td>
</tr>
<tr>
<td valign="top">
<strong>💾 Banco de Dados</strong>
<ul>
<li>MySQL</li>
</ul>
</td>
<td valign="top">
<strong>⚙️ DevOps & Ferramentas</strong>
<ul>
<li>Composer (Gerenciador de Pacotes PHP)</li>
<li>NPM (Gerenciador de Pacotes JS)</li>
<li>Git & GitHub (Versionamento)</li>
</ul>
</td>
</tr>
</table>

Pré-requisitos:

PHP 8.1+

Composer

Node.js e NPM

Servidor MySQL (Ex: XAMPP, Laragon)

# 1. Clone o repositório
$ git clone [https://github.com/MuriloRibeiro01/TorqueSync.git](https://github.com/MuriloRibeiro01/TorqueSync.git)

# 2. Navegue até o diretório do projeto
$ cd TorqueSync

# 3. Instale as dependências do PHP
$ composer install

# 4. Instale as dependências do JavaScript
$ npm install

# 5. Crie seu arquivo de ambiente
$ cp .env.example .env

# 6. Gere a chave da aplicação
$ php artisan key:generate

# 7. Configure o Banco de Dados no arquivo .env
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=torquesync
# DB_USERNAME=root
# DB_PASSWORD= (sua senha)

# 8. Rode as migrações para criar as tabelas
$ php artisan migrate

# 9. (Opcional) Rode os seeders para popular o banco com dados de teste
$ php artisan db:seed

# 10. Compile os assets do frontend
$ npm run dev

# 11. Inicie o servidor de desenvolvimento
$ php artisan serve


🤝 Como Contribuir

Este é um projeto de portfólio em desenvolvimento. Sinta-se à vontade para abrir uma Issue para relatar bugs ou sugerir novas funcionalidades. Pull Requests são muito bem-vindos!

📄 Licença

Este projeto está sob a licença MIT.

<p align="center">
Feito com ☕, código e a ambição da "Operação TorqueSync GT" por <strong>Murilo Ribeiro da Silveira</strong>.
</p>
