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