<?php

/**
 * 
 *
 * @version 1.107
 * @package entity
 */
class Presenca extends Db2PhpEntityBase implements Db2PhpEntityModificationTracking {
	private static $CLASS_NAME='Presenca';
	const SQL_IDENTIFIER_QUOTE='`';
	const SQL_TABLE_NAME='presenca';
	const SQL_INSERT='INSERT INTO `presenca` (`id`,`funcionario_id`,`data_entrada`,`data_saida`,`observacao`,`total_hora`,`falta`,`motivo_id`,`data_falta`) VALUES (?,?,?,?,?,?,?,?,?)';
	const SQL_INSERT_AUTOINCREMENT='INSERT INTO `presenca` (`funcionario_id`,`data_entrada`,`data_saida`,`observacao`,`total_hora`,`falta`,`motivo_id`,`data_falta`) VALUES (?,?,?,?,?,?,?,?)';
	const SQL_UPDATE='UPDATE `presenca` SET `id`=?,`funcionario_id`=?,`data_entrada`=?,`data_saida`=?,`observacao`=?,`total_hora`=?,`falta`=?,`motivo_id`=?,`data_falta`=? WHERE `id`=?';
	const SQL_SELECT_PK='SELECT * FROM `presenca` WHERE `id`=?';
	const SQL_DELETE_PK='DELETE FROM `presenca` WHERE `id`=?';
	const FIELD_ID=-1240210062;
	const FIELD_FUNCIONARIO_ID=-1561669674;
	const FIELD_DATA_ENTRADA=-2083370407;
	const FIELD_DATA_SAIDA=1954495002;
	const FIELD_OBSERVACAO=339314960;
	const FIELD_TOTAL_HORA=-370356504;
	const FIELD_FALTA=-1792029305;
	const FIELD_MOTIVO_ID=132615923;
	const FIELD_DATA_FALTA=1942492608;
	private static $PRIMARY_KEYS=array(self::FIELD_ID);
	private static $AUTOINCREMENT_FIELDS=array(self::FIELD_ID);
	private static $FIELD_NAMES=array(
		self::FIELD_ID=>'id',
		self::FIELD_FUNCIONARIO_ID=>'funcionario_id',
		self::FIELD_DATA_ENTRADA=>'data_entrada',
		self::FIELD_DATA_SAIDA=>'data_saida',
		self::FIELD_OBSERVACAO=>'observacao',
		self::FIELD_TOTAL_HORA=>'total_hora',
		self::FIELD_FALTA=>'falta',
		self::FIELD_MOTIVO_ID=>'motivo_id',
		self::FIELD_DATA_FALTA=>'data_falta');
	private static $PROPERTY_NAMES=array(
		self::FIELD_ID=>'id',
		self::FIELD_FUNCIONARIO_ID=>'funcionarioId',
		self::FIELD_DATA_ENTRADA=>'dataEntrada',
		self::FIELD_DATA_SAIDA=>'dataSaida',
		self::FIELD_OBSERVACAO=>'observacao',
		self::FIELD_TOTAL_HORA=>'totalHora',
		self::FIELD_FALTA=>'falta',
		self::FIELD_MOTIVO_ID=>'motivoId',
		self::FIELD_DATA_FALTA=>'dataFalta');
	private static $PROPERTY_TYPES=array(
		self::FIELD_ID=>Db2PhpEntity::PHP_TYPE_INT,
		self::FIELD_FUNCIONARIO_ID=>Db2PhpEntity::PHP_TYPE_INT,
		self::FIELD_DATA_ENTRADA=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_DATA_SAIDA=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_OBSERVACAO=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_TOTAL_HORA=>Db2PhpEntity::PHP_TYPE_INT,
		self::FIELD_FALTA=>Db2PhpEntity::PHP_TYPE_INT,
		self::FIELD_MOTIVO_ID=>Db2PhpEntity::PHP_TYPE_INT,
		self::FIELD_DATA_FALTA=>Db2PhpEntity::PHP_TYPE_STRING);
	private static $FIELD_TYPES=array(
		self::FIELD_ID=>array(Db2PhpEntity::JDBC_TYPE_INTEGER,10,0,false),
		self::FIELD_FUNCIONARIO_ID=>array(Db2PhpEntity::JDBC_TYPE_INTEGER,10,0,false),
		self::FIELD_DATA_ENTRADA=>array(Db2PhpEntity::JDBC_TYPE_TIMESTAMP,19,0,true),
		self::FIELD_DATA_SAIDA=>array(Db2PhpEntity::JDBC_TYPE_TIMESTAMP,19,0,true),
		self::FIELD_OBSERVACAO=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,255,0,true),
		self::FIELD_TOTAL_HORA=>array(Db2PhpEntity::JDBC_TYPE_INTEGER,10,0,true),
		self::FIELD_FALTA=>array(Db2PhpEntity::JDBC_TYPE_INTEGER,10,0,true),
		self::FIELD_MOTIVO_ID=>array(Db2PhpEntity::JDBC_TYPE_INTEGER,10,0,true),
		self::FIELD_DATA_FALTA=>array(Db2PhpEntity::JDBC_TYPE_DATE,10,0,true));
	private static $DEFAULT_VALUES=array(
		self::FIELD_ID=>null,
		self::FIELD_FUNCIONARIO_ID=>0,
		self::FIELD_DATA_ENTRADA=>null,
		self::FIELD_DATA_SAIDA=>null,
		self::FIELD_OBSERVACAO=>null,
		self::FIELD_TOTAL_HORA=>null,
		self::FIELD_FALTA=>null,
		self::FIELD_MOTIVO_ID=>null,
		self::FIELD_DATA_FALTA=>null);
	private $id;
	private $funcionarioId;
	private $dataEntrada;
	private $dataSaida;
	private $observacao;
	private $totalHora;
	private $falta;
	private $motivoId;
	private $dataFalta;

	/**
	 * set value for id 
	 *
	 * type:INT,size:10,default:null,primary,unique,autoincrement
	 *
	 * @param mixed $id
	 * @return Presenca
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
	 * set value for funcionario_id 
	 *
	 * type:INT,size:10,default:null,index
	 *
	 * @param mixed $funcionarioId
	 * @return Presenca
	 */
	public function &setFuncionarioId($funcionarioId) {
		$this->notifyChanged(self::FIELD_FUNCIONARIO_ID,$this->funcionarioId,$funcionarioId);
		$this->funcionarioId=$funcionarioId;
		return $this;
	}

	/**
	 * get value for funcionario_id 
	 *
	 * type:INT,size:10,default:null,index
	 *
	 * @return mixed
	 */
	public function getFuncionarioId() {
		return $this->funcionarioId;
	}

	/**
	 * set value for data_entrada 
	 *
	 * type:TIMESTAMP,size:19,default:null,nullable
	 *
	 * @param mixed $dataEntrada
	 * @return Presenca
	 */
	public function &setDataEntrada($dataEntrada) {
		$this->notifyChanged(self::FIELD_DATA_ENTRADA,$this->dataEntrada,$dataEntrada);
		$this->dataEntrada=$dataEntrada;
		return $this;
	}

	/**
	 * get value for data_entrada 
	 *
	 * type:TIMESTAMP,size:19,default:null,nullable
	 *
	 * @return mixed
	 */
	public function getDataEntrada() {
		return $this->dataEntrada;
	}

	/**
	 * set value for data_saida 
	 *
	 * type:DATETIME,size:19,default:null,nullable
	 *
	 * @param mixed $dataSaida
	 * @return Presenca
	 */
	public function &setDataSaida($dataSaida) {
		$this->notifyChanged(self::FIELD_DATA_SAIDA,$this->dataSaida,$dataSaida);
		$this->dataSaida=$dataSaida;
		return $this;
	}

	/**
	 * get value for data_saida 
	 *
	 * type:DATETIME,size:19,default:null,nullable
	 *
	 * @return mixed
	 */
	public function getDataSaida() {
		return $this->dataSaida;
	}

	/**
	 * set value for observacao 
	 *
	 * type:VARCHAR,size:255,default:null,nullable
	 *
	 * @param mixed $observacao
	 * @return Presenca
	 */
	public function &setObservacao($observacao) {
		$this->notifyChanged(self::FIELD_OBSERVACAO,$this->observacao,$observacao);
		$this->observacao=$observacao;
		return $this;
	}

	/**
	 * get value for observacao 
	 *
	 * type:VARCHAR,size:255,default:null,nullable
	 *
	 * @return mixed
	 */
	public function getObservacao() {
		return $this->observacao;
	}

	/**
	 * set value for total_hora 
	 *
	 * type:INT,size:10,default:null,nullable
	 *
	 * @param mixed $totalHora
	 * @return Presenca
	 */
	public function &setTotalHora($totalHora) {
		$this->notifyChanged(self::FIELD_TOTAL_HORA,$this->totalHora,$totalHora);
		$this->totalHora=$totalHora;
		return $this;
	}

	/**
	 * get value for total_hora 
	 *
	 * type:INT,size:10,default:null,nullable
	 *
	 * @return mixed
	 */
	public function getTotalHora() {
		return $this->totalHora;
	}

	/**
	 * set value for falta 
	 *
	 * type:INT,size:10,default:null,nullable
	 *
	 * @param mixed $falta
	 * @return Presenca
	 */
	public function &setFalta($falta) {
		$this->notifyChanged(self::FIELD_FALTA,$this->falta,$falta);
		$this->falta=$falta;
		return $this;
	}

	/**
	 * get value for falta 
	 *
	 * type:INT,size:10,default:null,nullable
	 *
	 * @return mixed
	 */
	public function getFalta() {
		return $this->falta;
	}

	/**
	 * set value for motivo_id 
	 *
	 * type:INT,size:10,default:null,index,nullable
	 *
	 * @param mixed $motivoId
	 * @return Presenca
	 */
	public function &setMotivoId($motivoId) {
		$this->notifyChanged(self::FIELD_MOTIVO_ID,$this->motivoId,$motivoId);
		$this->motivoId=$motivoId;
		return $this;
	}

	/**
	 * get value for motivo_id 
	 *
	 * type:INT,size:10,default:null,index,nullable
	 *
	 * @return mixed
	 */
	public function getMotivoId() {
		return $this->motivoId;
	}

	/**
	 * set value for data_falta 
	 *
	 * type:DATE,size:10,default:null,nullable
	 *
	 * @param mixed $dataFalta
	 * @return Presenca
	 */
	public function &setDataFalta($dataFalta) {
		$this->notifyChanged(self::FIELD_DATA_FALTA,$this->dataFalta,$dataFalta);
		$this->dataFalta=$dataFalta;
		return $this;
	}

	/**
	 * get value for data_falta 
	 *
	 * type:DATE,size:10,default:null,nullable
	 *
	 * @return mixed
	 */
	public function getDataFalta() {
		return $this->dataFalta;
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
			self::FIELD_FUNCIONARIO_ID=>$this->getFuncionarioId(),
			self::FIELD_DATA_ENTRADA=>$this->getDataEntrada(),
			self::FIELD_DATA_SAIDA=>$this->getDataSaida(),
			self::FIELD_OBSERVACAO=>$this->getObservacao(),
			self::FIELD_TOTAL_HORA=>$this->getTotalHora(),
			self::FIELD_FALTA=>$this->getFalta(),
			self::FIELD_MOTIVO_ID=>$this->getMotivoId(),
			self::FIELD_DATA_FALTA=>$this->getDataFalta());
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
	 * Match by attributes of passed example instance and return matched rows as an array of Presenca instances
	 *
	 * @param PDO $db a PDO Database instance
	 * @param Presenca $example an example instance defining the conditions. All non-null properties will be considered a constraint, null values will be ignored.
	 * @param boolean $and true if conditions should be and'ed, false if they should be or'ed
	 * @param array $sort array of DSC instances
	 * @return Presenca[]
	 */
	public static function findByExample(PDO $db,Presenca $example, $and=true, $sort=null) {
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
	 * Will return matched rows as an array of Presenca instances.
	 *
	 * @param PDO $db a PDO Database instance
	 * @param array $filter array of DFC instances defining the conditions
	 * @param boolean $and true if conditions should be and'ed, false if they should be or'ed
	 * @param array $sort array of DSC instances
	 * @return Presenca[]
	 */
	public static function findByFilter(PDO $db, $filter, $and=true, $sort=null) {
		if (!($filter instanceof DFCInterface)) {
			$filter=new DFCAggregate($filter, $and);
		}
		$sql='SELECT * FROM `presenca`'
		. self::buildSqlWhere($filter, $and, false, true)
		. self::buildSqlOrderBy($sort);

		$stmt=self::prepareStatement($db, $sql);
		self::bindValuesForFilter($stmt, $filter);
		return self::fromStatement($stmt);
	}

	/**
	 * Will execute the passed statement and return the result as an array of Presenca instances
	 *
	 * @param PDOStatement $stmt
	 * @return Presenca[]
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
	 * returns the result as an array of Presenca instances without executing the passed statement
	 *
	 * @param PDOStatement $stmt
	 * @return Presenca[]
	 */
	public static function fromExecutedStatement(PDOStatement $stmt) {
		$resultInstances=array();
		while($result=$stmt->fetch(PDO::FETCH_ASSOC)) {
			$o=new Presenca();
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
	 * Execute select query and return matched rows as an array of Presenca instances.
	 *
	 * The query should of course be on the table for this entity class and return all fields.
	 *
	 * @param PDO $db a PDO Database instance
	 * @param string $sql
	 * @return Presenca[]
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
		$sql='DELETE FROM `presenca`'
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
		$this->setFuncionarioId($result['funcionario_id']);
		$this->setDataEntrada($result['data_entrada']);
		$this->setDataSaida($result['data_saida']);
		$this->setObservacao($result['observacao']);
		$this->setTotalHora($result['total_hora']);
		$this->setFalta($result['falta']);
		$this->setMotivoId($result['motivo_id']);
		$this->setDataFalta($result['data_falta']);
	}

	/**
	 * Get element instance by it's primary key(s).
	 * Will return null if no row was matched.
	 *
	 * @param PDO $db
	 * @return Presenca
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
		$o=new Presenca();
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
		$stmt->bindValue(2,$this->getFuncionarioId());
		$stmt->bindValue(3,$this->getDataEntrada());
		$stmt->bindValue(4,$this->getDataSaida());
		$stmt->bindValue(5,$this->getObservacao());
		$stmt->bindValue(6,$this->getTotalHora());
		$stmt->bindValue(7,$this->getFalta());
		$stmt->bindValue(8,$this->getMotivoId());
		$stmt->bindValue(9,$this->getDataFalta());
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
			$stmt->bindValue(1,$this->getFuncionarioId());
			$stmt->bindValue(2,$this->getDataEntrada());
			$stmt->bindValue(3,$this->getDataSaida());
			$stmt->bindValue(4,$this->getObservacao());
			$stmt->bindValue(5,$this->getTotalHora());
			$stmt->bindValue(6,$this->getFalta());
			$stmt->bindValue(7,$this->getMotivoId());
			$stmt->bindValue(8,$this->getDataFalta());
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
		$stmt->bindValue(10,$this->getId());
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
		return self::hashToDomDocument($this->toHash(), 'Presenca');
	}

	/**
	 * get single Presenca instance from a DOMElement
	 *
	 * @param DOMElement $node
	 * @return Presenca
	 */
	public static function fromDOMElement(DOMElement $node) {
		$o=new Presenca();
		$o->assignByHash(self::domNodeToHash($node, self::$FIELD_NAMES, self::$DEFAULT_VALUES, self::$FIELD_TYPES));
			$o->notifyPristine();
		return $o;
	}

	/**
	 * get all instances of Presenca from the passed DOMDocument
	 *
	 * @param DOMDocument $doc
	 * @return Presenca[]
	 */
	public static function fromDOMDocument(DOMDocument $doc) {
		$instances=array();
		foreach ($doc->getElementsByTagName('Presenca') as $node) {
			$instances[]=self::fromDOMElement($node);
		}
		return $instances;
	}

}
?>