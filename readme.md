#miniphpmvc - O que é? 

O miniphpmvc tem o intuito de ajudar você, que está começando no universo dos frameworks e quer entender como funciona a estrutura MVC aplicada diretamente no PHP.
Com sua estrutura simples e bem comentada é fácil entender como tudo funciona. 

#Configurações iniciais 

Para que você consiga começar a usar o miniphpmvc é bem simples, além de clonar este repositório é necessário que após instalado você siga alguns passos: 

1. Ir até o arquivo ``environment.php`` que fica na raiz do projeto.
Nesse arquivo encontra-se a constante que configura o ambiente de desenvolvimento sendo ele:
Produção ou Desenvolvimento. 
Não é necessário modificar as constantes, mas é necessário porém alterar a url base para a url do seu projeto.

2. Setar as configurações de banco de dados, vá até o arquivo ``application\config\database.php`` e altere
os valores para suas configurações de banco de dados. 

*Pronto a essa altura você deve estar vendo a tela inicial de boas vindas.*

#Controllers

Aqui iremos ver como é a estrutura de um controller, lembrando que se você não possui nenhuma familiaridade com o padrão MVC seria de total valia que você desse uma boa olhada antes, entender o conceito, para que possa entender a distribuição de responsabilidades de cada camada. 

Para criar um controller basta ir na pasta ``application\controllers\`` e dar um nome ao seu controller, preferencialmente algo como ``application\controller\meuController_controller.php`` para uma estrutura organizada. 

##Como funciona um controller?

Bom sem entrar em muitos detalhes, o controller é o responsável por fazer a "ligação" entre a camada Model e a camada View e vice-versa, aqui vai a estrutura básica:

```php 
    class meuController_controller extends MP_Controller
    {
        /**
        * Caso queira um método construtor em seu controller 
        * é necessario chamar o construtor da classe pai
        * com o comando parent::__construct()
        */
        public function __construct()
        {
            parent::__construct();
        }

        /**
        * Método obrigatório em todo controller que for criado
        * é o método principal de cada construtor
        */
        public function index()
        {
            
        }
    }
```

