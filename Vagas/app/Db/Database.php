<?php
namespace App\Db;

use PDO;
use PDOException;

class Database{

    /**
     * Host de conexão com o banco de dados
     * @var string
     */
    const HOST='localhost';

        /**
     * Nome do banco de dados
     * @var string
     */
    const NAME= 'wdev_vagas';

    /**
     * usuário do banco
     * @var string
     */
    const USER='root';

    /**
     * senha de acesso ao banco de dados
     * @var string
     */
    const PASS='';

    /**
     * Nome da tabela a ser manipulada
     * @var string
     */
    private $table;

    /**
     * Instancia de conexão com o banco de dados
     * @var PDO
     */
    private $connection;

    /**
     * Define a tabela e instancia a conexão
     * @param string $table
     */
    public function __construct($table=null){
        $this->table = $table; 
        $this->setConnection();
    }

    /**
     * Método responsável por criar uma conexão com o banco de dados
     */
    private function setConnection(){
        try{
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die('ERROR:'.$e->getMessage());
        }
    }

    /**
     * Método responsável por executar queries dentro do banco de dados
     * @param string $query
     * @param array $params
     * @return PDOStatament**
     **/
    public function execute($query,$params=[]){
        try{
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        }catch(PDOException $e){
            die('ERROR:'.$e->getMessage());
        }
    }

    /**
     * Método responsavel por inserir dados no banco
     * @param array $values[field=>value]
     * @return integer
     */
    public function insert($values){
        //dados da query
        $fields = array_keys($values);
        $binds = array_pad([],count($fields),'?');

        //monta a query
        $query = 'INSERT INTO '.$this->table.'('.implode(',',$fields).') VALUES('.implode(',',$binds).')';
       //executa o insert
        $this->execute($query,array_values($values));
        //retorna o id inserido
        return $this->connection->lastInsertId();
    }

    /**
     * Método responsáveç por executar uma consulta no banco
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return PDOStatement
     */

    public function select($where=null,$order=null,$limit=null,$fields='*'){
       //Dados da query
       $where= strlen($where) ? 'WHERE '.$where:'';
       $order= strlen($order) ? ' ORDER BY '.$order:'';
       $limit= strlen($limit) ? ' LIMIT '.$limit:'';
       //Monta a Query
        $query = 'SELECT '.$fields.' FROM '.$this->table.''.$where.''.$order.''.$limit;
        //Executa a query
        return $this->execute($query);
    }

}