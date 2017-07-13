# miniphpmvc - O que é? 

O miniphpmvc tem o intuito de ajudar você, que está começando no universo dos frameworks e quer entender como funciona a estrutura MVC aplicada diretamente no PHP.
Com sua estrutura simples e bem comentada é fácil entender como tudo funciona. 

# Configurações iniciais 

Para que você consiga começar a usar o miniphpmvc é bem simples, além de clonar este repositório é necessário que após instalado você siga alguns passos: 

1. Ir até o arquivo ``environment.php`` que fica na raiz do projeto.
Nesse arquivo encontra-se a constante que configura o ambiente de desenvolvimento sendo ele:
Produção ou Desenvolvimento. 
Não é necessário modificar as constantes, mas é necessário porém alterar a url base para a url do seu projeto.

2. Setar as configurações de banco de dados, vá até o arquivo ``application\config\database.php`` e altere
os valores para suas configurações de banco de dados. 

*Pronto a essa altura você deve estar vendo a tela inicial de boas vindas.*

# Controllers

Aqui iremos ver como é a estrutura de um controller, lembrando que se você não possui nenhuma familiaridade com o padrão MVC seria de total valia que você desse uma boa olhada antes, entender o conceito, para que possa entender a distribuição de responsabilidades de cada camada. 

Para criar um controller basta ir na pasta ``application\controllers\`` e dar um nome ao seu controller, preferencialmente algo como ``application\controller\meuController.php`` para uma estrutura organizada. 

## Como funciona um controller?

Bom sem entrar em muitos detalhes, o controller é o responsável por fazer a "ligação" entre a camada Model e a camada View e vice-versa, aqui vai a estrutura básica:

```php 
    class meuController extends MP_Controller
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
        * é o método principal de todo controller
        */
        public function index()
        {

        }
    }
```
# Models

também sem entrar em muitos detalhes vá até a pasta ``application\models\`` e crie um arquivo. 
Para seguir o padrão é ideal que se crie algo como ``application\models\meuModel_model.php``.

## Como funciona o model? 

Model é a camada responsável pela comunicaçao com a base dados e na maioria dos casos é onde ficam as regras de negócio.

```php 
    class meuModel_model extends MP_Model
    {
        /**
        * Caso queira um método construtor em seu model 
        * é necessario chamar o construtor da classe pai
        * com o comando parent::__construct()
        */
        public function __construct()
        {
            parent::__construct();
        }


        /**
        * Atualiza um registro no banco de dados
        */
        public function updateUser($id)
        {
            $this->db->query("UPDATE user SET name = 'name' WHERE id_user = $id");
        }
    }
```

## Como utilizar o model? 

Há duas formas de carregar um model no seu projeto:
1. Onde quiser carregar o seu model dê o comando ``` $this->load->model('meuModel_model')``` e pronto.
2. Caso queira que seu model seja carregado em todo o projeto, vá até o arquivo ``application\config\autoload.php`` e procure por ```$autoload['models'] => array('meuModel_model')``` e pronto, seu model pode ser chamado em qualquer parte do projeto. 

# Model + Controller 

Aqui vamos fazer a utilização do Model e do Controller em conjunto

#### Controller 


```php
class meuController extends MP_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Podemos colocar um alias para o nome do model, no caso eu escolhi 'model', para 'meuModel_model'
        $this->load->model('meuModel_model','model');
    }
    public function index()
    {}

    public function update($id)
    {
        //utiliza o método updateUser do model
        $this->model->updateUser($id);
    }
}
```
#### Model 

```php
class meuModel_model extends MP_Model
{
    public function updateUser($id)
    {
        $this->db->query("UPDATE user SET name = 'name' WHERE id_user = $id");
    }
}
```

Viu? É bem fácil de integrar os dois, caso precisar usar o mesmo model em diversos controllers, use o carregamento automático no arquivo ``autoload.php``.

# Mas e a view?

Bom, muito clichê, mas a view é a camada de visualização é a camada responsável por exibir o conteúdo visual do projeto e ele pode ser dar forma como você quiser, aqui iremos criar um view bem simples. 

```html
    <!DOCTYPE html>
    <html>
        <head>
            <title>Minha primeira view</title>
        </head>
        </body>
            <!-- Seu conteúdo aqui -->
        </body>
    </html>
```
# Entendendo a estrutura. 
Sim, isso mesmo, é um conteúdo visual apenas, porém ele pode ou não receber dados vindos do controller e vamos entender essa dinamica:

- Quando acessamos a url do projeto, precisamos entender que cada parte da url é referente a algum processo específico: 

1. *www.projeto.com* - Refere-se ao diretório raiz do nosso projeto.
2. *www.projeto.com/home* - Estamos acessando o controller homeController 
3. *www.projeto.com/home/index* - Estamos acessando o método index do controller homeController 
4. *www.projeto.com/home/index/parametro* - Estamos enviando um parâmetro para o método index do controller homeController

Entendendo bem essa estrutura o resto fica bem mais simples, pois você pode imaginar coisas do tipo:
*www.projeto.com/user/update/1* - seria o mesmo que:

```php
class userController extends MP_Controller
{
    public function index(){}

    public function update($id)// O $id é == 1, pois é o que estamos passando na URL.
    {
        // Com isso podemos atualizar um registro no banco de dados.
        $this->model->updateUser($id);
    }
}
```

# Como aplicar todos os conceitos? 

Bom, já que foi explicado bem por cima como cada camada funciona e como cada uma pode ser utitlizada, vamos ver as 3 trabalhando em conjunto. 


## Model

```php
class Users_model extends MP_Model
{
    public function getAll()
    {
        $users = array();
        $users = $this->db->query("SELECT * FROM users");
        return $users;
    }
}
```


## Controller

```php 
class userController extends MP_Controller
{
    public function index()
    {
        //Criamos um array que ira receber dados para enviar à view.
        $data = array();

        //Carregamos o model users_model e criamos um alias chamado users.
        $this->load->model('users_model', 'users');

        //Utilizamos o método getAll();
        $data['users'] = $this->users->getAll();

        //Carregamos uma view e passamos o array $data para ela. 
        $this->load->view('users', $data);
    }
}
```

## View

```phtml 
    <ul>
        <?php foreach($users as $user): ?>
            <li><?php echo $users['name'];?></li>
        <?php endforeach;?>
    </ul>
```
#Helpers

#Libraries

#Autoload