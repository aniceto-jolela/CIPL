<?php

/**
 * 
 *
 * @version 1.107
 * @package entity
 */
class Crianca extends Db2PhpEntityBase implements Db2PhpEntityModificationTracking {
	private static $CLASS_NAME='Crianca';
	const SQL_IDENTIFIER_QUOTE='`';
	const SQL_TABLE_NAME='crianca';
	const SQL_INSERT='INSERT INTO `crianca` (`id`,`nome`,`sexo`,`idade`,`foto`,`f_atestado_medico`,`f_c_cedula`,`f_c_cartao_vacina`,`f_ficha_matricula`,`f_comprova_pagamento`,`data_cadastro`,`estado`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)';
	const SQL_INSERT_AUTOINCREMENT='INSERT INTO `crianca` (`nome`,`sexo`,`idade`,`foto`,`f_atestado_medico`,`f_c_cedula`,`f_c_cartao_vacina`,`f_ficha_matricula`,`f_comprova_pagamento`) VALUES (?,?,?,?,?,?,?,?,?)';
	const SQL_UPDATE='UPDATE `crianca` SET `id`=?,`nome`=?,`sexo`=?,`idade`=?,`foto`=?,`f_atestado_medico`=?,`f_c_cedula`=?,`f_c_cartao_vacina`=?,`f_ficha_matricula`=?,`f_comprova_pagamento`=?,`data_cadastro`=?,`estado`=? WHERE `id`=?';
	const SQL_SELECT_PK='SELECT * FROM `crianca` WHERE `id`=?';
	const SQL_DELETE_PK='DELETE FROM `crianca` WHERE `id`=?';
	const FIELD_ID=-422771324;
	const FIELD_NOME=1738813762;
	const FIELD_SEXO=1738953458;
	const FIELD_IDADE=-1936304994;
	const FIELD_FOTO=1738575661;
	const FIELD_F_ATESTADO_MEDICO=627737485;
	const FIELD_F_C_CEDULA=1296129958;
	const FIELD_F_C_CARTAO_VACINA=879468439;
	const FIELD_F_FICHA_MATRICULA=-223199146;
	const FIELD_F_COMPROVA_PAGAMENTO=2000357056;
	const FIELD_DATA_CADASTRO=1805613349;
	const FIELD_ESTADO=3986767;
	private static $PRIMARY_KEYS=array(self::FIELD_ID);
	private static $AUTOINCREMENT_FIELDS=array(self::FIELD_ID);
	private static $FIELD_NAMES=array(
		self::FIELD_ID=>'id',
		self::FIELD_NOME=>'nome',
		self::FIELD_SEXO=>'sexo',
		self::FIELD_IDADE=>'idade',
		self::FIELD_FOTO=>'foto',
		self::FIELD_F_ATESTADO_MEDICO=>'f_atestado_medico',
		self::FIELD_F_C_CEDULA=>'f_c_cedula',
		self::FIELD_F_C_CARTAO_VACINA=>'f_c_cartao_vacina',
		self::FIELD_F_FICHA_MATRICULA=>'f_ficha_matricula',
		self::FIELD_F_COMPROVA_PAGAMENTO=>'f_comprova_pagamento',
		self::FIELD_DATA_CADASTRO=>'data_cadastro',
		self::FIELD_ESTADO=>'estado');
	private static $PROPERTY_NAMES=array(
		self::FIELD_ID=>'id',
		self::FIELD_NOME=>'nome',
		self::FIELD_SEXO=>'sexo',
		self::FIELD_IDADE=>'idade',
		self::FIELD_FOTO=>'foto',
		self::FIELD_F_ATESTADO_MEDICO=>'fAtestadoMedico',
		self::FIELD_F_C_CEDULA=>'fCCedula',
		self::FIELD_F_C_CARTAO_VACINA=>'fCCartaoVacina',
		self::FIELD_F_FICHA_MATRICULA=>'fFichaMatricula',
		self::FIELD_F_COMPROVA_PAGAMENTO=>'fComprovaPagamento',
		self::FIELD_DATA_CADASTRO=>'dataCadastro',
		self::FIELD_ESTADO=>'estado');
	private static $PROPERTY_TYPES=array(
		self::FIELD_ID=>Db2PhpEntity::PHP_TYPE_INT,
		self::FIELD_NOME=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_SEXO=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_IDADE=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_FOTO=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_F_ATESTADO_MEDICO=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_F_C_CEDULA=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_F_C_CARTAO_VACINA=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_F_FICHA_MATRICULA=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_F_COMPROVA_PAGAMENTO=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_DATA_CADASTRO=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_ESTADO=>Db2PhpEntity::PHP_TYPE_INT);
	private static $FIELD_TYPES=array(
		self::FIELD_ID=>array(Db2PhpEntity::JDBC_TYPE_INTEGER,10,0,false),
		self::FIELD_NOME=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,255,0,false),
		self::FIELD_SEXO=>array(Db2PhpEntity::JDBC_TYPE_CHAR,2,0,false),
		self::FIELD_IDADE=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,10,0,false),
		self::FIELD_FOTO=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,255,0,false),
		self::FIELD_F_ATESTADO_MEDICO=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,255,0,false),
		self::FIELD_F_C_CEDULA=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,255,0,false),
		self::FIELD_F_C_CARTAO_VACINA=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,255,0,false),
		self::FIELD_F_FICHA_MATRICULA=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,255,0,false),
		self::FIELD_F_COMPROVA_PAGAMENTO=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,255,0,false),
		self::FIELD_DATA_CADASTRO=>array(Db2PhpEntity::JDBC_TYPE_TIMESTAMP,19,0,false),
		self::FIELD_ESTADO=>array(Db2PhpEntity::JDBC_TYPE_INTEGER,10,0,false));
	private static $DEFAULT_VALUES=array(
		self::FIELD_ID=>null,
		self::FIELD_NOME=>'',
		self::FIELD_SEXO=>'',
		self::FIELD_IDADE=>'',
		self::FIELD_FOTO=>'',
		self::FIELD_F_ATESTADO_MEDICO=>'',
		self::FIELD_F_C_CEDULA=>'',
		self::FIELD_F_C_CARTAO_VACINA=>'',
		self::FIELD_F_FICHA_MATRICULA=>'',
		self::FIELD_F_COMPROVA_PAGAMENTO=>'',
		self::FIELD_DATA_CADASTRO=>'CURRENT_TIMESTAMP',
		self::FIELD_ESTADO=>0);
	private $id;
	private $nome;
	private $sexo;
	private $idade;
	private $foto;
	private $fAtestadoMedico;
	private $fCCedula;
	private $fCCartaoVacina;
	private $fFichaMatricula;
	private $fComprovaPagamento;
	private $dataCadastro;
	private $estado;

	/**
	 * set value for id 
	 *
	 * type:INT,size:10,default:null,primary,unique,autoincrement
	 *
	 * @param mixed $id
	 * @return Crianca
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
	 * @return Crianca
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
	 * set value for sexo 
	 *
	 * type:ENUM,size:2,default:null
	 *
	 * @param mixed $sexo
	 * @return Crianca
	 */
	public function &setSexo($sexo) {
		$this->notifyChanged(self::FIELD_SEXO,$this->sexo,$sexo);
		$this->sexo=$sexo;
		return $this;
	}

	/**
	 * get value for sexo 
	 *
	 * type:ENUM,size:2,default:null
	 *
	 * @return mixed
	 */
	public function getSexo() {
		return $this->sexo;
	}

	/**
	 * set value for idade 
	 *
	 * type:VARCHAR,size:10,default:null
	 *
	 * @param mixed $idade
	 * @return Crianca
	 */
	public function &setIdade($idade) {
		$this->notifyChanged(self::FIELD_IDADE,$this->idade,$idade);
		$this->idade=$idade;
		return $this;
	}

	/**
	 * get value for idade 
	 *
	 * type:VARCHAR,size:10,default:null
	 *
	 * @return mixed
	 */
	public function getIdade() {
		return $this->idade;
	}

	/**
	 * set value for foto 
	 *
	 * type:VARCHAR,size:255,default:null
	 *
	 * @param mixed $foto
	 * @return Crianca
	 */
	public function &setFoto($foto) {
		$this->notifyChanged(self::FIELD_FOTO,$this->foto,$foto);
		$this->foto=$foto;
		return $this;
	}

	/**
	 * get value for foto 
	 *
	 * type:VARCHAR,size:255,default:null
	 *
	 * @return mixed
	 */
	public function getFoto() {
		return $this->foto;
	}

	/**
	 * set value for f_atestado_medico 
	 *
	 * type:VARCHAR,size:255,default:null
	 *
	 * @param mixed $fAtestadoMedico
	 * @return Crianca
	 */
	public function &setFAtestadoMedico($fAtestadoMedico) {
		$this->notifyChanged(self::FIELD_F_ATESTADO_MEDICO,$this->fAtestadoMedico,$fAtestadoMedico);
		$this->fAtestadoMedico=$fAtestadoMedico;
		return $this;
	}

	/**
	 * get value for f_atestado_medico 
	 *
	 * type:VARCHAR,size:255,default:null
	 *
	 * @return mixed
	 */
	public function getFAtestadoMedico() {
		return $this->fAtestadoMedico;
	}

	/**
	 * set value for f_c_cedula 
	 *
	 * type:VARCHAR,size:255,default:null
	 *
	 * @param mixed $fCCedula
	 * @return Crianca
	 */
	public function &setFCCedula($fCCedula) {
		$this->notifyChanged(self::FIELD_F_C_CEDULA,$this->fCCedula,$fCCedula);
		$this->fCCedula=$fCCedula;
		return $this;
	}

	/**
	 * get value for f_c_cedula 
	 *
	 * type:VARCHAR,size:255,default:null
	 *
	 * @return mixed
	 */
	public function getFCCedula() {
		return $this->fCCedula;
	}

	/**
	 * set value for f_c_cartao_vacina 
	 *
	 * type:VARCHAR,size:255,default:null
	 *
	 * @param mixed $fCCartaoVacina
	 * @return Crianca
	 */
	public function &setFCCartaoVacina($fCCartaoVacina) {
		$this->notifyChanged(self::FIELD_F_C_CARTAO_VACINA,$this->fCCartaoVacina,$fCCartaoVacina);
		$this->fCCartaoVacina=$fCCartaoVacina;
		return $this;
	}

	/**
	 * get value for f_c_cartao_vacina 
	 *
	 * type:VARCHAR,size:255,default:null
	 *
	 * @return mixed
	 */
	public function getFCCartaoVacina() {
		return $this->fCCartaoVacina;
	}

	/**
	 * set value for f_ficha_matricula 
	 *
	 * type:VARCHAR,size:255,default:null
	 *
	 * @param mixed $fFichaMatricula
	 * @return Crianca
	 */
	public function &setFFichaMatricula($fFichaMatricula) {
		$this->notifyChanged(self::FIELD_F_FICHA_MATRICULA,$this->fFichaMatricula,$fFichaMatricula);
		$this->fFichaMatricula=$fFichaMatricula;
		return $this;
	}

	/**
	 * get value for f_ficha_matricula 
	 *
	 * type:VARCHAR,size:255,default:null
	 *
	 * @return mixed
	 */
	public function getFFichaMatricula() {
		return $this->fFichaMatricula;
	}

	/**
	 * set value for f_comprova_pagamento 
	 *
	 * type:VARCHAR,size:255,default:null
	 *
	 * @param mixed $fComprovaPagamento
	 * @return Crianca
	 */
	public function &setFComprovaPagamento($fComprovaPagamento) {
		$this->notifyChanged(self::FIELD_F_COMPROVA_PAGAMENTO,$this->fComprovaPagamento,$fComprovaPagamento);
		$this->fComprovaPagamento=$fComprovaPagamento;
		return $this;
	}

	/**
	 * get value for f_comprova_pagamento 
	 *
	 * type:VARCHAR,size:255,default:null
	 *
	 * @return mixed
	 */
	public function getFComprovaPagamento() {
		return $this->fComprovaPagamento;
	}

	/**
	 * set value for data_cadastro 
	 *
	 * type:TIMESTAMP,size:19,default:CURRENT_TIMESTAMP
	 *
	 * @param mixed $dataCadastro
	 * @return Crianca
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
	 * set value for estado 
	 *
	 * type:INT,size:10,default:0
	 *
	 * @param mixed $estado
	 * @return Crianca
	 */
	public function &setEstado($estado) {
		$this->notifyChanged(self::FIELD_ESTADO,$this->estado,$estado);
		$this->estado=$estado;
		return $this;
	}

	/**
	 * get value for estado 
	 *
	 * type:INT,size:10,default:0
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
			self::FIELD_SEXO=>$this->getSexo(),
			self::FIELD_IDADE=>$this->getIdade(),
			self::FIELD_FOTO=>$this->getFoto(),
			self::FIELD_F_ATESTADO_MEDICO=>$this->getFAtestadoMedico(),
			self::FIELD_F_C_CEDULA=>$this->getFCCedula(),
			self::FIELD_F_C_CARTAO_VACINA=>$this->getFCCartaoVacina(),
			self::FIELD_F_FICHA_MATRICULA=>$this->getFFichaMatricula(),
			self::FIELD_F_COMPROVA_PAGAMENTO=>$this->getFComprovaPagamento(),
			self::FIELD_DATA_CADASTRO=>$this->getDataCadastro(),
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
	 * Match by attributes of passed example instance and return matched rows as an array of Crianca instances
	 *
	 * @param PDO $db a PDO Database instance
	 * @param Crianca $example an example instance defining the conditions. All non-null properties will be considered a constraint, null values will be ignored.
	 * @param boolean $and true if conditions should be and'ed, false if they should be or'ed
	 * @param array $sort array of DSC instances
	 * @return Crianca[]
	 */
	public static function findByExample(PDO $db,Crianca $example, $and=true, $sort=null) {
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
	 * Will return matched rows as an array of Crianca instances.
	 *
	 * @param PDO $db a PDO Database instance
	 * @param array $filter array of DFC instances defining the conditions
	 * @param boolean $and true if conditions should be and'ed, false if they should be or'ed
	 * @param array $sort array of DSC instances
	 * @return Crianca[]
	 */
	public static function findByFilter(PDO $db, $filter, $and=true, $sort=null) {
		if (!($filter instanceof DFCInterface)) {
			$filter=new DFCAggregate($filter, $and);
		}
		$sql='SELECT * FROM `crianca`'
		. self::buildSqlWhere($filter, $and, false, true)
		. self::buildSqlOrderBy($sort);

		$stmt=self::prepareStatement($db, $sql);
		self::bindValuesForFilter($stmt, $filter);
		return self::fromStatement($stmt);
	}

	/**
	 * Will execute the passed statement and return the result as an array of Crianca instances
	 *
	 * @param PDOStatement $stmt
	 * @return Crianca[]
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
	 * returns the result as an array of Crianca instances without executing the passed statement
	 *
	 * @param PDOStatement $stmt
	 * @return Crianca[]
	 */
	public static function fromExecutedStatement(PDOStatement $stmt) {
		$resultInstances=array();
		while($result=$stmt->fetch(PDO::FETCH_ASSOC)) {
			$o=new Crianca();
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
	 * Execute select query and return matched rows as an array of Crianca instances.
	 *
	 * The query should of course be on the table for this entity class and return all fields.
	 *
	 * @param PDO $db a PDO Database instance
	 * @param string $sql
	 * @return Crianca[]
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
		$sql='DELETE FROM `crianca`'
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
		$this->setSexo($result['sexo']);
		$this->setIdade($result['idade']);
		$this->setFoto($result['foto']);
		$this->setFAtestadoMedico($result['f_atestado_medico']);
		$this->setFCCedula($result['f_c_cedula']);
		$this->setFCCartaoVacina($result['f_c_cartao_vacina']);
		$this->setFFichaMatricula($result['f_ficha_matricula']);
		$this->setFComprovaPagamento($result['f_comprova_pagamento']);
		$this->setDataCadastro($result['data_cadastro']);
		$this->setEstado($result['estado']);
	}

	/**
	 * Get element instance by it's primary key(s).
	 * Will return null if no row was matched.
	 *
	 * @param PDO $db
	 * @return Crianca
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
		$o=new Crianca();
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
		$stmt->bindValue(3,$this->getSexo());
		$stmt->bindValue(4,$this->getIdade());
		$stmt->bindValue(5,$this->getFoto());
		$stmt->bindValue(6,$this->getFAtestadoMedico());
		$stmt->bindValue(7,$this->getFCCedula());
		$stmt->bindValue(8,$this->getFCCartaoVacina());
		$stmt->bindValue(9,$this->getFFichaMatricula());
		$stmt->bindValue(10,$this->getFComprovaPagamento());
		$stmt->bindValue(11,$this->getDataCadastro());
		$stmt->bindValue(12,$this->getEstado());
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
			$stmt->bindValue(2,$this->getSexo());
			$stmt->bindValue(3,$this->getIdade());
			$stmt->bindValue(4,$this->getFoto());
			$stmt->bindValue(5,$this->getFAtestadoMedico());
			$stmt->bindValue(6,$this->getFCCedula());
			$stmt->bindValue(7,$this->getFCCartaoVacina());
			$stmt->bindValue(8,$this->getFFichaMatricula());
			$stmt->bindValue(9,$this->getFComprovaPagamento());
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
		$stmt->bindValue(13,$this->getId());
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
		return self::hashToDomDocument($this->toHash(), 'Crianca');
	}

	/**
	 * get single Crianca instance from a DOMElement
	 *
	 * @param DOMElement $node
	 * @return Crianca
	 */
	public static function fromDOMElement(DOMElement $node) {
		$o=new Crianca();
		$o->assignByHash(self::domNodeToHash($node, self::$FIELD_NAMES, self::$DEFAULT_VALUES, self::$FIELD_TYPES));
			$o->notifyPristine();
		return $o;
	}

	/**
	 * get all instances of Crianca from the passed DOMDocument
	 *
	 * @param DOMDocument $doc
	 * @return Crianca[]
	 */
	public static function fromDOMDocument(DOMDocument $doc) {
		$instances=array();
		foreach ($doc->getElementsByTagName('Crianca') as $node) {
			$instances[]=self::fromDOMElement($node);
		}
		return $instances;
	}

}
?>