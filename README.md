🚗 TorqueSync - Sistema de Gestão para Locadoras de Veículos

O TorqueSync é uma aplicação web completa, construída com o framework Laravel 10+, para a gestão inteligente de frotas de veículos. O sistema foi desenhado como uma solução monolítica robusta, unindo o poder do PHP no backend com a reatividade das views em Blade no frontend.

✨ A História por Trás do Projeto

A ideia do TorqueSync nasceu de uma necessidade real: ajudar meu pai a gerenciar sua locadora de veículos de forma mais eficiente. O controle manual em planilhas e anotações dificultava a visão geral do negócio, o rastreamento de manutenções e a análise de custos e receitas.

Este projeto é a solução para esse desafio. Uma ferramenta criada para ser o braço direito do gestor da frota, centralizando todas as informações cruciais do negócio: desde o status de cada carro até a lucratividade que cada um gera. É um projeto de pai e filho que une tecnologia e empreendedorismo.

💡 Diferenciais Técnicos

Este não é apenas um projeto de CRUD. O TorqueSync foi construído com foco em lógica de negócio real, segurança e experiência de usuário (UX).

Fonte da Verdade no Backend: O cálculo do valor do aluguel é feito em dois lugares:

    1. No Frontend (JS): Para uma UX fantástica, o preço é calculado em tempo real para o usuário.

    2. No Backend (Controller): O cálculo é refeito no servidor, usando o valor da diária armazenado no banco. Isso garante a integridade dos dados e previne qualquer tipo de manipulação de preço pelo cliente.

- Sanitização de Inputs (Backend): O VeiculoController limpa ativamente os dados formatados (máscaras) antes de validá-los. A lógica transforma "R$ 1.500,00" em "1500.00" e "120.000" em "120000", garantindo que dados limpos entrem no banco.

- Performance (Eager Loading): O dashboard principal usa with('aluguelAtivo.cliente') para carregar os dados do locador. Isso resolve o clássico "problema N+1" e garante que o painel carregue de forma otimizada, com um número mínimo de queries.

- Validação Avançada: As regras de update para Clientes e Veículos usam Rule::unique()->ignore($id), uma prática essencial do mundo real para permitir a edição de um registro sem que ele conflite consigo mesmo.

- Clean Code (Blade): A interface principal é 100% componentizada com partials (@include). O arquivo home.blade.php atua como um "esqueleto" limpo, enquanto a lógica de cada aba e modal vive em seu próprio arquivo, facilitando a manutenção.

🚀 Status e Funcionalidades

✅ Funcionalidades Implementadas (Concluídas)

Arquitetura e UI Principal

    - Dashboard Central: KPIs dinâmicos (Disponíveis, Alugados, Manutenção).
    
    - Interface em Abas (SPA-like): Navegação fluida sem recarregar a página.
    
    - Componentização de Views: Código Blade 100% refatorado.

Módulo 1: Gestão da Frota (CRUD Completo)

    - CRUD completo de Veículos (Cadastrar, Editar, Excluir).
    
    - Validação de backend e sanitização de inputs.
    
    - Máscaras de UX no frontend (Placa, Quilometragem, Valor de Diária).

Módulo 2: Gestão de Clientes (CRUD Completo)

    - CRUD completo de Clientes (Cadastrar, Editar, Excluir).
    
    - Validação avançada (unique com ignore).
    
    - Máscaras de UX no frontend (CPF, Telefone, CNH).

Módulo 3: Gestão de Operações (Core)

    Fluxo de Aluguel (Criar):
    
        Cálculo de preço em tempo real no JS.
        
        Recálculo de preço seguro no Controller (Fonte da Verdade).
        
        Lógica de negócio que atualiza o status do Veículo para "Alugado" e salva a quilometragem_retirada automaticamente.
    
    Painel de Controle (Visão Geral):
    
        Tabela de "Veículos em Operação" que exibe quais carros estão Alugados/Em Manutenção e quem é o locador atual (usando Eager Loading).

⏳ Roadmap (Próximos Passos)

Módulo 3: Gestão de Operações (Finalização)

$$$$

 Fluxo de Devolução: Criar a lógica para registrar a devolução de um veículo.

$$$$

 Registrar quilometragem_rodada (final) e calcular o total rodado.

$$$$

 Alterar o status do Veículo de "Alugado" para "Disponível".

$$$$

 Módulo de Manutenção:

$$$$

 Criar fluxo de "Abrir O.S." (Ordem de Serviço) para veículos, mudando o status para "Manutenção".

$$$$

 Registrar custos da manutenção.

$$$$

 Criar fluxo de "Fechar O.S.", mudando o status para "Disponível".

Módulo 4: Relatórios e BI

$$$$

 Relatório de lucratividade por veículo (Receita de Aluguéis vs. Custo de Manutenções).

$$$$

 Alertas de manutenção preventiva (baseado na quilometragem_atual).

🛠️ Tecnologias Utilizadas

Backend: PHP 8.1+ com o framework Laravel 10+.

Frontend: Laravel Blade, Bootstrap 5, JavaScript (ES6+), IMask.js.

Banco de Dados: MySQL.

Gerenciamento de Dependências: Composer (PHP) e NPM (JS).

⚙️ Como Rodar o Projeto Localmente

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

Feito com ☕, código e a ambição da "Operação TorqueSync GT" por Murilo Ribeiro da Silveira.
