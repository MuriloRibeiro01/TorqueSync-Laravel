🚗 TorqueSync - Sistema de Gestão para Locadoras de Veículos

O TorqueSync é uma aplicação web completa, construída com o framework Laravel, para a gestão inteligente de frotas de veículos. O sistema foi desenhado para ser uma solução monolítica robusta, unindo o poder do PHP no backend com a reatividade das views em Blade no frontend.

✨ A História por Trás do Projeto

A ideia do TorqueSync nasceu de uma necessidade real: ajudar meu pai a gerenciar sua locadora de veículos de forma mais eficiente. O controle manual em planilhas e anotações dificultava a visão geral do negócio, o rastreamento de manutenções e a análise de custos e receitas.

Este projeto é a solução para esse desafio. Uma ferramenta criada para ser o braço direito do gestor da frota, centralizando todas as informações cruciais do negócio: desde o status de cada carro até a lucratividade que cada um gera. É um projeto de pai e filho que une tecnologia e empreendedorismo.

🚀 Status e Funcionalidades do Projeto

O que já foi feito (Fases Concluídas):

[X] Modelagem e criação do banco de dados relacional (MySQL).

[X] Configuração completa do ambiente de desenvolvimento com Laravel.

[X] Dashboard Principal: Interface central com KPIs (Indicadores Chave) dinâmicos, exibindo o status geral da frota em tempo real.

[X] Módulo de Gestão da Frota (CRUD Completo):

[X] Cadastro de novos veículos com status padrão (Disponível).

[X] Edição dos detalhes de cada veículo.

[X] Exclusão de veículos do sistema.

[X] Listagem e visualização completa da frota.

[X] Interface com Abas: Organização da UI para separar a visão geral do gerenciamento de cada módulo (Veículos, Clientes, Locações).

[X] Componentização da View: Refatoração do código Blade utilizando partials para melhor organização e manutenibilidade.

Funcionalidades Planejadas (Roadmap):

O objetivo é criar um sistema robusto e intuitivo. As próximas funcionalidades a serem desenvolvidas são:

Módulo 2: Gestão de Clientes

[ ] CRUD completo para o cadastro de clientes (locatários).

Módulo 3: Gestão de Operações

[ ] Criação e gerenciamento de registros de locação (aluguéis).

[ ] Registro de devolução com atualização de quilometragem e status do veículo.

[ ] Registro de manutenções detalhadas com custos associados.

Módulo 4: Inteligência e Relatórios

[ ] Cálculo e notificação de próximas manutenções preventivas.

[ ] Relatório de lucratividade por veículo (Receita vs. Custo).

[ ] (Upgrade Futuro) Geração de contratos de locação em PDF.

🛠️ Tecnologias Utilizadas

Backend: PHP 8+ com o framework Laravel 10+.

Frontend: Laravel Blade, Bootstrap 5, JavaScript.

Banco de Dados: MySQL.

Gerenciamento de Dependências: Composer (PHP) e NPM (JS).

Servidor de Desenvolvimento: Laravel Sail (Docker) ou Valet.

⚙️ Como Rodar o Projeto Localmente

Pré-requisitos:

PHP 8.1+

Composer

Node.js e NPM

Servidor MySQL

# 1. Clone o repositório
$ git clone [https://github.com/MuriloRibeiro01/TorqueSync-Laravel.git](https://github.com/MuriloRibeiro01/TorqueSync-Laravel.git)

# 2. Navegue até o diretório do projeto
$ cd TorqueSync-Laravel

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
# DB_PASSWORD=

# 8. Rode as migrações para criar as tabelas
$ php artisan migrate

# 9. Compile os assets do frontend
$ npm run dev

# 10. Inicie o servidor de desenvolvimento
$ php artisan serve


🤝 Como Contribuir

Este é um projeto de portfólio em desenvolvimento. Sinta-se à vontade para abrir uma Issue para relatar bugs ou sugerir novas funcionalidades. Pull Requests são muito bem-vindos!

📄 Licença

Este projeto está sob a licença MIT. Veja o arquivo LICENSE para mais detalhes.

Feito com ☕, código e a ambição da "Operação TorqueSync GT" por Murilo Ribeiro da Silveira.
