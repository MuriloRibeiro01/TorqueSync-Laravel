<div align="center">

# 🚗 TorqueSync - Sistema Inteligente de Gestão de Frotas

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)

<p align="center">
  <b>Solução completa para gestão de frotas de veículos, unindo controle operacional, financeiro e administrativo em uma única plataforma.</b>
</p>

![Status](https://img.shields.io/badge/Status-Em%20Desenvolvimento-blue?style=for-the-flat)
![Versão](https://img.shields.io/badge/Versão-1.0.0-green?style=for-the-flat)

</div>

## ✨ Sobre o Projeto

O **TorqueSync** nasceu da necessidade real de otimizar a gestão de uma locadora de veículos, substituindo processos manuais e descentralizados por uma solução integrada e inteligente.

O sistema serve como o **"braço direito" do gestor**, centralizando informações cruciais como:
- 📊 Status da frota em tempo real
- 🔑 Controle de aluguéis e devoluções
- 🔧 Histórico de manutenções e custos
- 👥 Gestão de clientes e contratos

**Um projeto que une tecnologia e empreendedorismo, focado em resolver dores reais do negócio.**

## 🚀 Funcionalidades

### ✅ **Implementadas (Fase 1 Concluída)**

#### 📦 **Gestão da Frota (CRUD Completo)**
- ✅ Cadastro completo de veículos com especificações detalhadas
- ✅ Edição e exclusão (Soft Delete) de registros
- ✅ Listagem com filtros e status dinâmicos
- ✅ **Diferencial:** Máscaras de input inteligentes (Placa, Quilometragem, Valores) para melhor UX

#### 👥 **Gestão de Clientes**
- ✅ Cadastro de clientes com validação de CPF/CNPJ
- ✅ Histórico de locações por cliente
- ✅ Edição de dados cadastrais

#### 🔑 **Gestão de Locações (Core do Sistema)**
- ✅ **Fluxo de Aluguel:** Seleção de veículo, cliente e datas
- ✅ **Cálculo Automático:** Valor total baseado na diária e período (Frontend + Backend)
- ✅ **Fluxo de Devolução:** Registro completo e liberação do veículo
- ✅ **Controle de Status:** Atualização automática (Disponível ↔️ Alugado)

#### 📊 **Dashboard Inteligente**
- ✅ **KPIs em Tempo Real:** Veículos disponíveis, alugados, em manutenção e total de clientes
- ✅ **Visão Operacional:** Tabela detalhada de "Veículos em Operação"
- ✅ **Alertas Visuais:** Indicadores de atrasos na devolução

## 🚧 **Roadmap (Próximos Passos)**

| Status | Funcionalidade | Descrição |
|--------|----------------|-----------|
| 🔄 | **Módulo de Manutenção** | Controle de ordens de serviço, custos e histórico de reparos |
| 📅 | **Relatórios Financeiros** | Lucratividade por veículo, fluxo de caixa e previsões |
| 📅 | **Alertas Automáticos** | Notificações de manutenção preventiva baseada na quilometragem |
| 📅 | **Contratos em PDF** | Geração automática de contratos de locação |
| 📅 | **API REST** | Integração com sistemas externos |
| 📅 | **App Mobile** | Versão mobile para gestão em movimento |

## 🛠️ **Stack Tecnológica**

Este projeto foi construído com uma stack robusta e moderna:

| Categoria | Tecnologia | Descrição |
|-----------|------------|-----------|
| **Backend** | PHP 8.1+ | Linguagem base do sistema |
| **Framework** | Laravel 10+ | Arquitetura MVC segura e escalável |
| **Frontend** | Blade + Bootstrap 5 | Templates responsivos e interface moderna |
| **Scripting** | JavaScript (ES6+) | Lógica de interface, máscaras e AJAX |
| **Banco de Dados** | MySQL | Persistência segura dos dados |
| **Ferramentas** | Composer + NPM | Gerenciadores de dependências |
| **Versionamento** | Git + GitHub | Controle de versão e colaboração |

## ⚙️ **Configuração e Instalação**

### **Pré-requisitos**
- PHP 8.1 ou superior
- Composer instalado
- Node.js e NPM
- Servidor MySQL (XAMPP, Laragon, Docker, etc)

### **Passo a Passo**

```bash
# 1. Clone o repositório
git clone https://github.com/MuriloRibeiro01/TorqueSync.git
cd TorqueSync

# 2. Instale as dependências do PHP
composer install

# 3. Instale as dependências do JavaScript
npm install

# 4. Configure o ambiente
cp .env.example .env
php artisan key:generate

# 5. Configure o banco de dados no .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=torquesync
DB_USERNAME=root
DB_PASSWORD=

# 6. Execute as migrações
php artisan migrate

# 7. Compile os assets
npm run build

# 8. Inicie o servidor
php artisan serve
````

Acesse: `http://localhost:8000`

## 🗂️ Estrutura do Projeto

TorqueSync/
├── app/
│   ├── Http/Controllers/    # Controladores
│   ├── Models/              # Modelos Eloquent
│   └── Providers/           # Service Providers
├── database/
│   ├── migrations/          # Migrações do banco
│   └── seeders/             # Seeders para dados iniciais
├── resources/
│   ├── views/               # Templates Blade
│   └── js/                  # Arquivos JavaScript
├── routes/                  # Rotas da aplicação
├── public/                  # Assets públicos
└── tests/                   # Testes automatizados

## 🤝 Como Contribuir

Contribuições são sempre bem-vindas! Siga estes passos:

1. Faça um Fork do projeto

2. Crie uma Branch para sua feature (git checkout -b feature/incrivel)

3. Commit suas mudanças (git commit -m 'Adiciona feature incrível')

4. Push para a Branch (git push origin feature/incrivel)

5. Abra um Pull Request

## Guidelines de Contribuição

- Siga o padrão PSR-12 para código PHP

- Documente novas funcionalidades

- Adicione testes quando possível

- Mantenha commits semânticos

## 📄 Licença

Este projeto está protegido sob uma licença proprietária. Consulte o arquivo LICENSE para detalhes completos.

**Copyright © 2025 Murilo Ribeiro da Silveira. Todos os direitos reservados.**

## 👨‍💻 Autor

**Murilo Ribeiro da Silveira**

GitHub: @MuriloRibeiro01

LinkedIn: Murilo Ribeiro da Silveira

Email: murilo.ribeiro2709@gmail.com

### 🌟 Agradecimentos

Equipe do Laravel pela incrível framework

Comunidade Bootstrap pelos componentes

Todos os contribuidores de pacotes open-source utilizados

<div align="center"> <sub>Desenvolvido com ☕, código e dedicação por <b>Murilo Ribeiro da Silveira</b></sub><br> <sub>Se este projeto te ajudou, considere dar uma ⭐ no repositório!</sub> </div>
