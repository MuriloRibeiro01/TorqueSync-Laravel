<div align="center">

🚗 TorqueSync - Sistema de Gestão de Frotas

<img src="https://www.google.com/search?q=https://img.shields.io/badge/PHP-777BB4%3Fstyle%3Dfor-the-badge%26logo%3Dphp%26logoColor%3Dwhite" alt="PHP">
<img src="https://www.google.com/search?q=https://img.shields.io/badge/Laravel-FF2D20%3Fstyle%3Dfor-the-badge%26logo%3Dlaravel%26logoColor%3Dwhite" alt="Laravel">
<img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
<img src="https://www.google.com/search?q=https://img.shields.io/badge/Bootstrap-7952B3%3Fstyle%3Dfor-the-badge%26logo%3Dbootstrap%26logoColor%3Dwhite" alt="Bootstrap">
<img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black" alt="JavaScript">





<p align="center">
<b>O TorqueSync é uma aplicação web completa para a gestão inteligente de frotas de veículos, unindo controle operacional, financeiro e administrativo em uma única plataforma.</b>
</p>

</div>

✨ Sobre o Projeto

A ideia do TorqueSync nasceu de uma necessidade real: ajudar na gestão de uma locadora de veículos, otimizando processos que antes eram manuais e descentralizados.

O sistema visa ser o "braço direito" do gestor, centralizando informações cruciais como:

Status da frota em tempo real.

Controle de aluguéis e devoluções.

Histórico de manutenções e custos.

Gestão de clientes e contratos.

É um projeto que une tecnologia e empreendedorismo, focado em resolver dores reais do negócio.

🚀 Funcionalidades

✅ Implementadas (Fase 1 Concluída)

<details>
<summary><b>📦 Gestão da Frota (CRUD Completo)</b></summary>





<ul>
<li>Cadastro completo de veículos com especificações detalhadas.</li>
<li>Edição e exclusão (Soft Delete) de registros.</li>
<li>Listagem com filtros e status dinâmicos.</li>
<li><b>Diferencial:</b> Máscaras de input inteligentes (Placa, Quilometragem, Valores) para melhor UX.</li>
</ul>
</details>

<details>
<summary><b>👥 Gestão de Clientes</b></summary>





<ul>
<li>Cadastro de clientes com validação de CPF/CNPJ.</li>
<li>Histórico de locações por cliente.</li>
<li>Edição de dados cadastrais.</li>
</ul>
</details>

<details>
<summary><b>🔑 Gestão de Locações (Core)</b></summary>





<ul>
<li><b>Fluxo de Aluguel:</b> Seleção de veículo, cliente e datas.</li>
<li><b>Cálculo Automático:</b> O sistema calcula o valor total do aluguel com base na diária e no período selecionado (Frontend em tempo real + Backend para segurança).</li>
<li><b>Fluxo de Devolução:</b> Registro de devolução, liberação do veículo e fechamento do contrato.</li>
<li><b>Controle de Status:</b> Atualização automática do status do veículo (Disponível ↔️ Alugado).</li>
</ul>
</details>

<details>
<summary><b>📊 Dashboard Inteligente</b></summary>





<ul>
<li><b>KPIs em Tempo Real:</b> Veículos disponíveis, alugados, em manutenção e total de clientes.</li>
<li><b>Visão Geral:</b> Tabela de "Veículos em Operação" com detalhes de quem alugou, prazos e status.</li>
<li><b>Alertas:</b> Indicadores visuais de atrasos na devolução.</li>
</ul>
</details>

🚧 Roadmap (Próximos Passos)

[ ] Módulo de Manutenção: Controle de ordens de serviço, custos e histórico de reparos.

[ ] Relatórios Financeiros: Lucratividade por veículo, fluxo de caixa e previsões.

[ ] Alertas Automáticos: Notificações de manutenção preventiva baseada na quilometragem.

[ ] Contratos em PDF: Geração automática de contratos de locação.

🛠️ Tecnologias Utilizadas

Este projeto foi construído com uma stack robusta e moderna:

Categoria

Tecnologia

Descrição

Backend

PHP 8.1+

Linguagem base do sistema.

Framework

Laravel 10+

Framework PHP robusto para arquitetura MVC segura e escalável.

Frontend

Blade & Bootstrap 5

Motor de templates do Laravel combinado com framework CSS para interfaces responsivas.

Scripting

JavaScript (ES6+)

Lógica de interface, máscaras (IMask.js) e requisições AJAX (Fetch API).

Banco de Dados

MySQL

Banco de dados relacional para persistência segura dos dados.

Ferramentas

Composer & NPM

Gerenciadores de dependências para PHP e JS.

⚙️ Como Rodar o Projeto Localmente

Siga estes passos para ter o TorqueSync rodando na sua máquina:

Pré-requisitos

PHP 8.1 ou superior.

Composer instalado.

Node.js e NPM instalados.

Servidor MySQL (XAMPP, Laragon, Docker, etc).

Passo a Passo

Clone o repositório:

git clone [https://github.com/MuriloRibeiro01/TorqueSync.git](https://github.com/MuriloRibeiro01/TorqueSync.git)
cd TorqueSync


Instale as dependências do Backend (PHP):

composer install


Instale as dependências do Frontend (JS/CSS):

npm install


Configure o ambiente:

Duplique o arquivo .env.example e renomeie para .env.

Gere a chave da aplicação:

php artisan key:generate


Configure as credenciais do seu banco de dados no arquivo .env:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=torquesync
DB_USERNAME=root
DB_PASSWORD=


Prepare o Banco de Dados:

Crie um banco de dados vazio chamado torquesync no seu MySQL.

(Se estiver usando Migrations) Rode as migrações: php artisan migrate

(Se estiver usando SQL manual) Importe o arquivo database/schema.sql (ou equivalente).

Compile os Assets e Inicie o Servidor:

npm run build
php artisan serve


Acesse: Abra seu navegador em http://localhost:8000.

🤝 Como Contribuir

Contribuições são sempre bem-vindas! Se você tiver alguma ideia para melhorar o projeto:

Faça um Fork do projeto.

Crie uma nova Branch (git checkout -b feature/MinhaFeature).

Faça o Commit (git commit -m 'Adicionando uma nova feature incrível').

Faça o Push (git push origin feature/MinhaFeature).

Abra um Pull Request.

📄 Licença

Este projeto está protegido sob uma licença proprietária. Veja o arquivo LICENSE para mais detalhes.

Copyright © 2025 Murilo Ribeiro da Silveira. Todos os direitos reservados.

<div align="center">
<sub>Feito com ☕, código e dedicação por <b>Murilo Ribeiro da Silveira</b>.</sub>
</div>