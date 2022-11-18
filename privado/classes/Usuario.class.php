<?php

/**
 * 
 *
 * @version 1.107
 * @package entity
 */
class Usuario extends Db2PhpEntityBase implements Db2PhpEntityModificationTracking {
	private static $CLASS_NAME='Usuario';
	const SQL_IDENTIFIER_QUOTE='`';
	const SQL_TABLE_NAME='usuario';
	const SQL_INSERT='INSERT INTO `usuario` (`id`,`nome`,`usuario`,`sexo`,`email`,`telefone`,`senha`,`foto`,`data_cadastro`,`id_modulo`,`estado`) VALUES (?,?,?,?,?,?,?,?,?,?,?)';
	const SQL_INSERT_AUTOINCREMENT='INSERT INTO `usuario` (`nome`,`usuario`,`sexo`,`email`,`telefone`,`senha`,`foto`,`id_modulo`) VALUES (?,?,?,?,?,?,?,?)';
	const SQL_UPDATE='UPDATE `usuario` SET `id`=?,`nome`=?,`usuario`=?,`sexo`=?,`email`=?,`telefone`=?,`senha`=?,`foto`=?,`data_cadastro`=?,`id_modulo`=?,`estado`=? WHERE `id`=?';
	const SQL_SELECT_PK='SELECT * FROM `usuario` WHERE `id`=?';
	const SQL_DELETE_PK='DELETE FROM `usuario` WHERE `id`=?';
	const FIELD_ID=-1913139237;
	const FIELD_NOME=-280641063;
	const FIELD_USUARIO=-532092818;
	const FIELD_SEXO=-280501367;
	const FIELD_EMAIL=-118320932;
	const FIELD_TELEFONE=-852288086;
	const FIELD_SENHA=-105617515;
	const FIELD_FOTO=-280879164;
	const FIELD_DATA_CADASTRO=1343332974;
	const FIELD_ID_MODULO=1892570970;
	const FIELD_ESTADO=633117734;
	private static $PRIMARY_KEYS=array(self::FIELD_ID);
	private static $AUTOINCREMENT_FIELDS=array(self::FIELD_ID);
	private static $FIELD_NAMES=array(
		self::FIELD_ID=>'id',
		self::FIELD_NOME=>'nome',
		self::FIELD_USUARIO=>'usuario',
		self::FIELD_SEXO=>'sexo',
		self::FIELD_EMAIL=>'email',
		self::FIELD_TELEFONE=>'telefone',
		self::FIELD_SENHA=>'senha',
		self::FIELD_FOTO=>'foto',
		self::FIELD_DATA_CADASTRO=>'data_cadastro',
		self::FIELD_ID_MODULO=>'id_modulo',
		self::FIELD_ESTADO=>'estado');
	private static $PROPERTY_NAMES=array(
		self::FIELD_ID=>'id',
		self::FIELD_NOME=>'nome',
		self::FIELD_USUARIO=>'usuario',
		self::FIELD_SEXO=>'sexo',
		self::FIELD_EMAIL=>'email',
		self::FIELD_TELEFONE=>'telefone',
		self::FIELD_SENHA=>'senha',
		self::FIELD_FOTO=>'foto',
		self::FIELD_DATA_CADASTRO=>'dataCadastro',
		self::FIELD_ID_MODULO=>'idModulo',
		self::FIELD_ESTADO=>'estado');
	private static $PROPERTY_TYPES=array(
		self::FIELD_ID=>Db2PhpEntity::PHP_TYPE_INT,
		self::FIELD_NOME=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_USUARIO=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_SEXO=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_EMAIL=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_TELEFONE=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_SENHA=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_FOTO=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_DATA_CADASTRO=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_ID_MODULO=>Db2PhpEntity::PHP_TYPE_INT,
		self::FIELD_ESTADO=>Db2PhpEntity::PHP_TYPE_INT);
	private static $FIELD_TYPES=array(
		self::FIELD_ID=>array(Db2PhpEntity::JDBC_TYPE_INTEGER,10,0,false),
		self::FIELD_NOME=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,255,0,false),
		self::FIELD_USUARIO=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,255,0,false),
		self::FIELD_SEXO=>array(Db2PhpEntity::JDBC_TYPE_CHAR,2,0,true),
		self::FIELD_EMAIL=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,255,0,false),
		self::FIELD_TELEFONE=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,18,0,true),
		self::FIELD_SENHA=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,255,0,false),
		self::FIELD_FOTO=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,255,0,true),
		self::FIELD_DATA_CADASTRO=>array(Db2PhpEntity::JDBC_TYPE_TIMESTAMP,19,0,false),
		self::FIELD_ID_MODULO=>array(Db2PhpEntity::JDBC_TYPE_INTEGER,10,0,false),
		self::FIELD_ESTADO=>array(Db2PhpEntity::JDBC_TYPE_INTEGER,10,0,true));
	private static $DEFAULT_VALUES=array(
		self::FIELD_ID=>null,
		self::FIELD_NOME=>'',
		self::FIELD_USUARIO=>'',
		self::FIELD_SEXO=>null,
		self::FIELD_EMAIL=>'',
		self::FIELD_TELEFONE=>null,
		self::FIELD_SENHA=>'',
		self::FIELD_FOTO=>null,
		self::FIELD_DATA_CADASTRO=>'CURRENT_TIMESTAMP',
		self::FIELD_ID_MODULO=>0,
		self::FIELD_ESTADO=>0);
	private $id;
	private $nome;
	private $usuario;
	private $sexo;
	private $email;
	private $telefone;
	private $senha;
	private $foto;
	private $dataCadastro;
	private $idModulo;
	private $estado;

	/**
	 * set value for id 
	 *
	 * type:INT,size:10,default:null,primary,unique,autoincrement
	 *
	 * @param mixed $id
	 * @return Usuario
	 */
	public function &setId($id) {
		$this->notifyChanged(self::FIELD_ID,$this->id,$id);
		$this->id=$id;
		return $this;
	}

	/**
	 * get value for id 
	 *
	 * type:INT,size:10,default:null,primary,unique,autoincrement
	 *
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * set value for nome 
	 *
	 * type:VARCHAR,size:255,default:null
	 *
	 * @param mixed $nome
	 * @return Usuario
	 */
	public function &setNome($nome) {
		$this->notifyChanged(self::FIELD_NOME,$this->nome,$nome);
		$this->nome=$nome;
		return $this;
	}

	/**
	 * get value for nome 
	 *
	 * type:VARCHAR,size:255,default:null
	 *
	 * @return mixed
	 */
	public function getNome() {
		return $this->nome;
	}

	/**
	 * set value for usuario 
	 *
	 * type:VARCHAR,size:255,default:null,unique
	 *
	 * @param mixed $usuario
	 * @return Usuario
	 */
	public function &setUsuario($usuario) {
		$this->notifyChanged(self::FIELD_USUARIO,$this->usuario,$usuario);
		$this->usuario=$usuario;
		return $this;
	}

	/**
	 * get value for usuario 
	 *
	 * type:VARCHAR,size:255,default:null,unique
	 *
	 * @return mixed
	 */
	public function getUsuario() {
		return $this->usuario;
	}

	/**
	 * set value for sexo 
	 *
	 * type:ENUM,size:2,default:null,nullable
	 *
	 * @param mixed $sexo
	 * @return Usuario
	 */
	public function &setSexo($sexo) {
		$this->notifyChanged(self::FIELD_SEXO,$this->sexo,$sexo);
		$this->sexo=$sexo;
		return $this;
	}

	/**
	 * get value for sexo 
	 *
	 * type:ENUM,size:2,default:null,nullable
	 *
	 * @return mixed
	 */
	public function getSexo() {
		return $this->sexo;
	}

	/**
	 * set value for email 
	 *
	 * type:VARCHAR,size:255,default:null
	 *
	 * @param mixed $email
	 * @return Usuario
	 */
	public function &setEmail($email) {
		$this->notifyChanged(self::FIELD_EMAIL,$this->email,$email);
		$this->email=$email;
		return $this;
	}

	/**
	 * get value for email 
	 *
	 * type:VARCHAR,size:255,default:null
	 *
	 * @return mixed
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * set value for telefone 
	 *
	 * type:VARCHAR,size:18,default:null,nullable
	 *
	 * @param mixed $telefone
	 * @return Usuario
	 */
	public function &setTelefone($telefone) {
		$this->notifyChanged(self::FIELD_TELEFONE,$this->telefone,$telefone);
		$this->telefone=$telefone;
		return $this;
	}

	/**
	 * get value for telefone 
	 *
	 * type:VARCHAR,size:18,default:null,nullable
	 *
	 * @return mixed
	 */
	public function getTelefone() {
		return $this->telefone;
	}

	/**
	 * set value for senha 
	 *
	 * type:VARCHAR,size:255,default:null
	 *
	 * @param mixed $senha
	 * @return Usuario
	 */
	public function &setSenha($senha) {
		$this->notifyChanged(self::FIELD_SENHA,$this->senha,$senha);
		$this->senha=$senha;
		return $this;
	}

	/**
	 * get value for senha 
	 *
	 * type:VARCHAR,size:255,default:null
	 *
	 * @return mixed
	 */
	public function getSenha() {
		return $this->senha;
	}

	/**
	 * set value for foto 
	 *
	 * type:VARCHAR,size:255,default:null,nullable
	 *
	 * @param mixed $foto
	 * @return Usuario
	 */
	public function &setFoto($foto) {
		$this->notifyChanged(self::FIELD_FOTO,$this->foto,$foto);
		$this->foto=$foto;
		return $this;
	}

	/**
	 * get value for foto 
	 *
	 * type:VARCHAR,size:255,default:null,nullable
	 *
	 * @return mixed
	 */
	public function getFoto() {
		return $this->foto;
	}

	/**
	 * set value for data_cadastro 
	 *
	 * type:TIMESTAMP,size:19,default:CURRENT_TIMESTAMP
	 *
	 * @param mixed $dataCadastro
	 * @return Usuario
	 */
	public function &setDataCadastro($dataCadastro) {
		$this->notifyChanged(self::FIELD_DATA_CADASTRO,$this->dataCadastro,$dataCadastro);
		$this->dataCadastro=$dataCadastro;
		return $this;
	}

	/**
	 * get value for data_cadastro 
	 *
	 * type:TIMESTAMP,size:19,default:CURRENT_TIMESTAMP
	 *
	 * @return mixed
	 */
	public function getDataCadastro() {
		return $this->dataCadastro;
	}

	/**
	 * set value for id_modulo 
	 *
	 * type:INT,size:10,default:null,index
	 *
	 * @param mixed $idModulo
	 * @return Usuario
	 */
	public function &setIdModulo($idModulo) {
		$this->notifyChanged(self::FIELD_ID_MODULO,$this->idModulo,$idModulo);
		$this->idModulo=$idModulo;
		return $this;
	}

	/**
	 * get value for id_modulo 
	 *
	 * type:INT,size:10,default:null,index
	 *
	 * @return mixed
	 */
	public function getIdModulo() {
		return $this->idModulo;
	}

	/**
	 * set value for estado 
	 *
	 * type:INT,size:10,default:0,nullable
	 *
	 * @param mixed $estado
	 * @return Usuario
	 */
	public function &setEstado($estado) {
		$this->notifyChanged(self::FIELD_ESTADO,$this->estado,$estado);
		$this->estado=$estado;
		return $this;
	}

	/**
	 * get value for estado 
	 *
	 * type:INT,size:10,default:0,nullable
	 *
	 * @return mixed
	 */
	public function getEstado() {
		return $this->estado;
	}

	/**
	 * Get table name
	 *
	 * @return string
	 */
	public static function getTableName() {
		return self::SQL_TABLE_NAME;
	}

	/**
	 * Get array with field id as index and field name as value
	 *
	 * @return array
	 */
	public static function getFieldNames() {
		return self::$FIELD_NAMES;
	}

	/**
	 * Get array with field id as index and property name as value
	 *
	 * @return array
	 */
	public static function getPropertyNames() {
		return self::$PROPERTY_NAMES;
	}

	/**
	 * get the field name for the passed field id.
	 *
	 * @param int $fieldId
	 * @param bool $fullyQualifiedName true if field name should be qualified by table name
	 * @return string field name for the passed field id, null if the field doesn't exist
	 */
	public static function getFieldNameByFieldId($fieldId, $fullyQualifiedName=true) {
		if (!array_key_exists($fieldId, self::$FIELD_NAMES)) {
			return null;
		}
		$fieldName=self::SQL_IDENTIFIER_QUOTE . self::$FIELD_NAMES[$fieldId] . self::SQL_IDENTIFIER_QUOTE;
		if ($fullyQualifiedName) {
			return self::SQL_IDENTIFIER_QUOTE . self::SQL_TABLE_NAME . self::SQL_IDENTIFIER_QUOTE . '.' . $fieldName;
		}
		return $fieldName;
	}

	/**
	 * Get array with field ids of identifiers
	 *
	 * @return array
	 */
	public static function getIdentifierFields() {
		return self::$PRIMARY_KEYS;
	}

	/**
	 * Get array with field ids of autoincrement fields
	 *
	 * @return array
	 */
	public static function getAutoincrementFields() {
		return self::$AUTOINCREMENT_FIELDS;
	}

	/**
	 * Get array with field id as index and property type as value
	 *
	 * @return array
	 */
	public static function getPropertyTypes() {
		return self::$PROPERTY_TYPES;
	}

	/**
	 * Get array with field id as index and field type as value
	 *
	 * @return array
	 */
	public static function getFieldTypes() {
		return self::$FIELD_TYPES;
	}

	/**
	 * Assign default values according to table
	 * 
	 */
	public function assignDefaultValues() {
		$this->assignByArray(self::$DEFAULT_VALUES);
	}


	/**
	 * return hash with the field name as index and the field value as value.
	 *
	 * @return array
	 */
	public function toHash() {
		$array=$this->toArray();
		$hash=array();
		foreach ($array as $fieldId=>$value) {
			$hash[self::$FIELD_NAMES[$fieldId]]=$value;
		}
		return $hash;
	}

	/**
	 * return array with the field id as index and the field value as value.
	 *
	 * @return array
	 */
	public function toArray() {
		return array(
			self::FIELD_ID=>$this->getId(),
			self::FIELD_NOME=>$this->getNome(),
			self::FIELD_USUARIO=>$this->getUsuario(),
			self::FIELD_SEXO=>$this->getSexo(),
			self::FIELD_EMAIL=>$this->getEmail(),
			self::FIELD_TELEFONE=>$this->getTelefone(),
			self::FIELD_SENHA=>$this->getSenha(),
			self::FIELD_FOTO=>$this->getFoto(),
			self::FIELD_DATA_CADASTRO=>$this->getDataCadastro(),
			self::FIELD_ID_MODULO=>$this->getIdModulo(),
			self::FIELD_ESTADO=>$this->getEstado());
	}


	/**
	 * return array with the field id as index and the field value as value for the identifier fields.
	 *
	 * @return array
	 */
	public function getPrimaryKeyValues() {
		return array(
			self::FIELD_ID=>$this->getId());
	}

	/**
	 * cached statements
	 *
	 * @var array<string,array<string,PDOStatement>>
	 */
	private static $stmts=array();
	private static $cacheStatements=true;
	
	/**
	 * prepare passed string as statement or return cached if enabled and available
	 *
	 * @param PDO $db
	 * @param string $statement
	 * @return PDOStatement
	 */
	protected static function prepareStatement(PDO $db, $statement) {
		if(self::isCacheStatements()) {
			if (in_array($statement, array(self::SQL_INSERT, self::SQL_INSERT_AUTOINCREMENT, self::SQL_UPDATE, self::SQL_SELECT_PK, self::SQL_DELETE_PK))) {
				$dbInstanceId=spl_object_hash($db);
				if (empty(self::$stmts[$statement][$dbInstanceId])) {
					self::$stmts[$statement][$dbInstanceId]=$db->prepare($statement);
				}
				return self::$stmts[$statement][$dbInstanceId];
			}
		}
		return $db->prepare($statement);
	}

	/**
	 * Enable statement cache
	 *
	 * @param bool $cache
	 */
	public static function setCacheStatements($cache) {
		self::$cacheStatements=true==$cache;
	}

	/**
	 * Check if statement cache is enabled
	 *
	 * @return bool
	 */
	public static function isCacheStatements() {
		return self::$cacheStatements;
	}
	
	/**
	 * check if this instance exists in the database
	 *
	 * @param PDO $db
	 * @return bool
	 */
	public function existsInDatabase(PDO $db) {
		$filter=array();
		foreach ($this->getPrimaryKeyValues() as $fieldId=>$value) {
			$filter[]=new DFC($fieldId, $value, DFC::EXACT_NULLSAFE);
		}
		return 0!=count(self::findByFilter($db, $filter, true));
	}
	
	/**
	 * Update to database if exists, otherwise insert
	 *
	 * @param PDO $db
	 * @return mixed
	 */
	public function updateInsertToDatabase(PDO $db) {
		if ($this->existsInDatabase($db)) {
			return $this->updateToDatabase($db);
		} else {
			return $this->insertIntoDatabase($db);
		}
	}

	/**
	 * Query by Example.
	 *
	 * Match by attributes of passed example instance and return matched rows as an array of Usuario instances
	 *
	 * @param PDO $db a PDO Database instance
	 * @param Usuario $example an example instance defining the conditions. All non-null properties will be considered a constraint, null values will be ignored.
	 * @param boolean $and true if conditions should be and'ed, false if they should be or'ed
	 * @param array $sort array of DSC instances
	 * @return Usuario[]
	 */
	public static function findByExample(PDO $db,Usuario $example, $and=true, $sort=null) {
		$exampleValues=$example->toArray();
		$filter=array();
		foreach ($exampleValues as $fieldId=>$value) {
			if (null!==$value) {
				$filter[$fieldId]=$value;
			}
		}
		return self::findByFilter($db, $filter, $and, $sort);
	}

	/**
	 * Query by filter.
	 *
	 * The filter can be either an hash with the field id as index and the value as filter value,
	 * or a array of DFC instances.
	 *
	 * Will return matched rows as an array of Usuario instances.
	 *
	 * @param PDO $db a PDO Database instance
	 * @param array $filter array of DFC instances defining the conditions
	 * @param boolean $and true if conditions should be and'ed, false if they should be or'ed
	 * @param array $sort array of DSC instances
	 * @return Usuario[]
	 */
	public static function findByFilter(PDO $db, $filter, $and=true, $sort=null) {
		if (!($filter instanceof DFCInterface)) {
			$filter=new DFCAggregate($filter, $and);
		}
		$sql='SELECT * FROM `usuario`'
		. self::buildSqlWhere($filter, $and, false, true)
		. self::buildSqlOrderBy($sort);

		$stmt=self::prepareStatement($db, $sql);
		self::bindValuesForFilter($stmt, $filter);
		return self::fromStatement($stmt);
	}

	/**
	 * Will execute the passed statement and return the result as an array of Usuario instances
	 *
	 * @param PDOStatement $stmt
	 * @return Usuario[]
	 */
	public static function fromStatement(PDOStatement $stmt) {
		$affected=$stmt->execute();
		if (false===$affected) {
			$stmt->closeCursor();
			throw new Exception($stmt->errorCode() . ':' . var_export($stmt->errorInfo(), true), 0);
		}
		return self::fromExecutedStatement($stmt);
	}

	/**
	 * returns the result as an array of Usuario instances without executing the passed statement
	 *
	 * @param PDOStatement $stmt
	 * @return Usuario[]
	 */
	public static function fromExecutedStatement(PDOStatement $stmt) {
		$resultInstances=array();
		while($result=$stmt->fetch(PDO::FETCH_ASSOC)) {
			$o=new Usuario();
			$o->assignByHash($result);
			$o->notifyPristine();
			$resultInstances[]=$o;
		}
		$stmt->closeCursor();
		return $resultInstances;
	}

	/**
	 * Get sql WHERE part from filter.
	 *
	 * @param array $filter
	 * @param bool $and
	 * @param bool $fullyQualifiedNames true if field names should be qualified by table name
	 * @param bool $prependWhere true if WHERE should be prepended to conditions
	 * @return string
	 */
	public static function buildSqlWhere($filter, $and, $fullyQualifiedNames=true, $prependWhere=false) {
		if (!($filter instanceof DFCInterface)) {
			$filter=new DFCAggregate($filter, $and);
		}
		return $filter->buildSqlWhere(new self::$CLASS_NAME, $fullyQualifiedNames, $prependWhere);
	}

	/**
	 * get sql ORDER BY part from DSCs
	 *
	 * @param array $sort array of DSC instances
	 * @return string
	 */
	protected static function buildSqlOrderBy($sort) {
		return DSC::buildSqlOrderBy(new self::$CLASS_NAME, $sort);
	}

	/**
	 * bind values from filter to statement
	 *
	 * @param PDOStatement $stmt
	 * @param DFCInterface $filter
	 */
	public static function bindValuesForFilter(PDOStatement &$stmt, DFCInterface $filter) {
		$filter->bindValuesForFilter(new self::$CLASS_NAME, $stmt);
	}

	/**
	 * Execute select query and return matched rows as an array of Usuario instances.
	 *
	 * The query should of course be on the table for this entity class and return all fields.
	 *
	 * @param PDO $db a PDO Database instance
	 * @param string $sql
	 * @return Usuario[]
	 */
	public static function findBySql(PDO $db, $sql) {
		$stmt=$db->query($sql);
		return self::fromExecutedStatement($stmt);
	}

	/**
	 * Delete rows matching the filter
	 *
	 * The filter can be either an hash with the field id as index and the value as filter value,
	 * or a array of DFC instances.
	 *
	 * @param PDO $db
	 * @param array $filter
	 * @param bool $and
	 * @return mixed
	 */
	public static function deleteByFilter(PDO $db, $filter, $and=true) {
		if (!($filter instanceof DFCInterface)) {
			$filter=new DFCAggregate($filter, $and);
		}
		if (0==count($filter)) {
			throw new InvalidArgumentException('refusing to delete without filter'); // just comment out this line if you are brave
		}
		$sql='DELETE FROM `usuario`'
		. self::buildSqlWhere($filter, $and, false, true);
		$stmt=self::prepareStatement($db, $sql);
		self::bindValuesForFilter($stmt, $filter);
		$affected=$stmt->execute();
		if (false===$affected) {
			$stmt->closeCursor();
			throw new Exception($stmt->errorCode() . ':' . var_export($stmt->errorInfo(), true), 0);
		}
		$stmt->closeCursor();
		return $affected;
	}

	/**
	 * Assign values from array with the field id as index and the value as value
	 *
	 * @param array $array
	 */
	public function assignByArray($array) {
		$result=array();
		foreach ($array as $fieldId=>$value) {
			$result[self::$FIELD_NAMES[$fieldId]]=$value;
		}
		$this->assignByHash($result);
	}

	/**
	 * Assign values from hash where the indexes match the tables field names
	 *
	 * @param array $result
	 */
	public function assignByHash($result) {
		$this->setId($result['id']);
		$this->setNome($result['nome']);
		$this->setUsuario($result['usuario']);
		$this->setSexo($result['sexo']);
		$this->setEmail($result['email']);
		$this->setTelefone($result['telefone']);
		$this->setSenha($result['senha']);
		$this->setFoto($result['foto']);
		$this->setDataCadastro($result['data_cadastro']);
		$this->setIdModulo($result['id_modulo']);
		$this->setEstado($result['estado']);
	}

	/**
	 * Get element instance by it's primary key(s).
	 * Will return null if no row was matched.
	 *
	 * @param PDO $db
	 * @return Usuario
	 */
	public static function findById(PDO $db,$id) {
		$stmt=self::prepareStatement($db,self::SQL_SELECT_PK);
		$stmt->bindValue(1,$id);
		$affected=$stmt->execute();
		if (false===$affected) {
			$stmt->closeCursor();
			throw new Exception($stmt->errorCode() . ':' . var_export($stmt->errorInfo(), true), 0);
		}
		$result=$stmt->fetch(PDO::FETCH_ASSOC);
		$stmt->closeCursor();
		if(!$result) {
			return null;
		}
		$o=new Usuario();
		$o->assignByHash($result);
		$o->notifyPristine();
		return $o;
	}

	/**
	 * Bind all values to statement
	 *
	 * @param PDOStatement $stmt
	 */
	protected function bindValues(PDOStatement &$stmt) {
		$stmt->bindValue(1,$this->getId());
		$stmt->bindValue(2,$this->getNome());
		$stmt->bindValue(3,$this->getUsuario());
		$stmt->bindValue(4,$this->getSexo());
		$stmt->bindValue(5,$this->getEmail());
		$stmt->bindValue(6,$this->getTelefone());
		$stmt->bindValue(7,$this->getSenha());
		$stmt->bindValue(8,$this->getFoto());
		$stmt->bindValue(9,$this->getDataCadastro());
		$stmt->bindValue(10,$this->getIdModulo());
		$stmt->bindValue(11,$this->getEstado());
	}


	/**
	 * Insert this instance into the database
	 *
	 * @param PDO $db
	 * @return mixed
	 */
	public function insertIntoDatabase(PDO $db) {
		if (null===$this->getId()) {
			$stmt=self::prepareStatement($db,self::SQL_INSERT_AUTOINCREMENT);
			$stmt->bindValue(1,$this->getNome());
			$stmt->bindValue(2,$this->getUsuario());
			$stmt->bindValue(3,$this->getSexo());
			$stmt->bindValue(4,$this->getEmail());
			$stmt->bindValue(5,$this->getTelefone());
			$stmt->bindValue(6,$this->getSenha());
			$stmt->bindValue(7,$this->getFoto());
			$stmt->bindValue(8,$this->getIdModulo());
		} else {
			$stmt=self::prepareStatement($db,self::SQL_INSERT);
			$this->bindValues($stmt);
		}
		$affected=$stmt->execute();
		if (false===$affected) {
			$stmt->closeCursor();
			throw new Exception($stmt->errorCode() . ':' . var_export($stmt->errorInfo(), true), 0);
		}
		$lastInsertId=$db->lastInsertId();
		if (false!==$lastInsertId) {
			$this->setId($lastInsertId);
		}
		$stmt->closeCursor();
		$this->notifyPristine();
		return $affected;
	}


	/**
	 * Update this instance into the database
	 *
	 * @param PDO $db
	 * @return mixed
	 */
	public function updateToDatabase(PDO $db) {
		$stmt=self::prepareStatement($db,self::SQL_UPDATE);
		$this->bindValues($stmt);
		$stmt->bindValue(12,$this->getId());
		$affected=$stmt->execute();
		if (false===$affected) {
			$stmt->closeCursor();
			throw new Exception($stmt->errorCode() . ':' . var_export($stmt->errorInfo(), true), 0);
		}
		$stmt->closeCursor();
		$this->notifyPristine();
		return $affected;
	}


	/**
	 * Delete this instance from the database
	 *
	 * @param PDO $db
	 * @return mixed
	 */
	public function deleteFromDatabase(PDO $db) {
		$stmt=self::prepareStatement($db,self::SQL_DELETE_PK);
		$stmt->bindValue(1,$this->getId());
		$affected=$stmt->execute();
		if (false===$affected) {
			$stmt->closeCursor();
			throw new Exception($stmt->errorCode() . ':' . var_export($stmt->errorInfo(), true), 0);
		}
		$stmt->closeCursor();
		return $affected;
	}


	/**
	 * get element as DOM Document
	 *
	 * @return DOMDocument
	 */
	public function toDOM() {
		return self::hashToDomDocument($this->toHash(), 'Usuario');
	}

	/**
	 * get single Usuario instance from a DOMElement
	 *
	 * @param DOMElement $node
	 * @return Usuario
	 */
	public static function fromDOMElement(DOMElement $node) {
		$o=new Usuario();
		$o->assignByHash(self::domNodeToHash($node, self::$FIELD_NAMES, self::$DEFAULT_VALUES, self::$FIELD_TYPES));
			$o->notifyPristine();
		return $o;
	}

	/**
	 * get all instances of Usuario from the passed DOMDocument
	 *
	 * @param DOMDocument $doc
	 * @return Usuario[]
	 */
	public static function fromDOMDocument(DOMDocument $doc) {
		$instances=array();
		foreach ($doc->getElementsByTagName('Usuario') as $node) {
			$instances[]=self::fromDOMElement($node);
		}
		return $instances;
	}

}
?>