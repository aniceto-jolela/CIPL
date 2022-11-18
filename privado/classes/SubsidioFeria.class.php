<?php

/**
 * 
 *
 * @version 1.107
 * @package entity
 */
class SubsidioFeria extends Db2PhpEntityBase implements Db2PhpEntityModificationTracking {
	private static $CLASS_NAME='SubsidioFeria';
	const SQL_IDENTIFIER_QUOTE='`';
	const SQL_TABLE_NAME='subsidio_feria';
	const SQL_INSERT='INSERT INTO `subsidio_feria` (`id`,`funcionario_id`,`subsidio`,`n_beneficiario`,`data_emissao`) VALUES (?,?,?,?,?)';
	const SQL_INSERT_AUTOINCREMENT='INSERT INTO `subsidio_feria` (`funcionario_id`,`subsidio`,`n_beneficiario`,`data_emissao`) VALUES (?,?,?,?)';
	const SQL_UPDATE='UPDATE `subsidio_feria` SET `id`=?,`funcionario_id`=?,`subsidio`=?,`n_beneficiario`=?,`data_emissao`=? WHERE `id`=?';
	const SQL_SELECT_PK='SELECT * FROM `subsidio_feria` WHERE `id`=?';
	const SQL_DELETE_PK='DELETE FROM `subsidio_feria` WHERE `id`=?';
	const FIELD_ID=332423593;
	const FIELD_FUNCIONARIO_ID=-67915379;
	const FIELD_SUBSIDIO=1612130882;
	const FIELD_N_BENEFICIARIO=-1570660359;
	const FIELD_DATA_EMISSAO=-1476982200;
	private static $PRIMARY_KEYS=array(self::FIELD_ID);
	private static $AUTOINCREMENT_FIELDS=array(self::FIELD_ID);
	private static $FIELD_NAMES=array(
		self::FIELD_ID=>'id',
		self::FIELD_FUNCIONARIO_ID=>'funcionario_id',
		self::FIELD_SUBSIDIO=>'subsidio',
		self::FIELD_N_BENEFICIARIO=>'n_beneficiario',
		self::FIELD_DATA_EMISSAO=>'data_emissao');
	private static $PROPERTY_NAMES=array(
		self::FIELD_ID=>'id',
		self::FIELD_FUNCIONARIO_ID=>'funcionarioId',
		self::FIELD_SUBSIDIO=>'subsidio',
		self::FIELD_N_BENEFICIARIO=>'nBeneficiario',
		self::FIELD_DATA_EMISSAO=>'dataEmissao');
	private static $PROPERTY_TYPES=array(
		self::FIELD_ID=>Db2PhpEntity::PHP_TYPE_INT,
		self::FIELD_FUNCIONARIO_ID=>Db2PhpEntity::PHP_TYPE_INT,
		self::FIELD_SUBSIDIO=>Db2PhpEntity::PHP_TYPE_FLOAT,
		self::FIELD_N_BENEFICIARIO=>Db2PhpEntity::PHP_TYPE_FLOAT,
		self::FIELD_DATA_EMISSAO=>Db2PhpEntity::PHP_TYPE_STRING);
	private static $FIELD_TYPES=array(
		self::FIELD_ID=>array(Db2PhpEntity::JDBC_TYPE_INTEGER,10,0,false),
		self::FIELD_FUNCIONARIO_ID=>array(Db2PhpEntity::JDBC_TYPE_INTEGER,10,0,false),
		self::FIELD_SUBSIDIO=>array(Db2PhpEntity::JDBC_TYPE_DOUBLE,22,0,true),
		self::FIELD_N_BENEFICIARIO=>array(Db2PhpEntity::JDBC_TYPE_DOUBLE,22,0,true),
		self::FIELD_DATA_EMISSAO=>array(Db2PhpEntity::JDBC_TYPE_DATE,10,0,true));
	private static $DEFAULT_VALUES=array(
		self::FIELD_ID=>null,
		self::FIELD_FUNCIONARIO_ID=>0,
		self::FIELD_SUBSIDIO=>0,
		self::FIELD_N_BENEFICIARIO=>0,
		self::FIELD_DATA_EMISSAO=>null);
	private $id;
	private $funcionarioId;
	private $subsidio;
	private $nBeneficiario;
	private $dataEmissao;

	/**
	 * set value for id 
	 *
	 * type:INT,size:10,default:null,primary,unique,autoincrement
	 *
	 * @param mixed $id
	 * @return SubsidioFeria
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
	 * type:INT,size:10,default:null
	 *
	 * @param mixed $funcionarioId
	 * @return SubsidioFeria
	 */
	public function &setFuncionarioId($funcionarioId) {
		$this->notifyChanged(self::FIELD_FUNCIONARIO_ID,$this->funcionarioId,$funcionarioId);
		$this->funcionarioId=$funcionarioId;
		return $this;
	}

	/**
	 * get value for funcionario_id 
	 *
	 * type:INT,size:10,default:null
	 *
	 * @return mixed
	 */
	public function getFuncionarioId() {
		return $this->funcionarioId;
	}

	/**
	 * set value for subsidio 
	 *
	 * type:DOUBLE,size:22,default:0,nullable
	 *
	 * @param mixed $subsidio
	 * @return SubsidioFeria
	 */
	public function &setSubsidio($subsidio) {
		$this->notifyChanged(self::FIELD_SUBSIDIO,$this->subsidio,$subsidio);
		$this->subsidio=$subsidio;
		return $this;
	}

	/**
	 * get value for subsidio 
	 *
	 * type:DOUBLE,size:22,default:0,nullable
	 *
	 * @return mixed
	 */
	public function getSubsidio() {
		return $this->subsidio;
	}

	/**
	 * set value for n_beneficiario 
	 *
	 * type:DOUBLE,size:22,default:0,nullable
	 *
	 * @param mixed $nBeneficiario
	 * @return SubsidioFeria
	 */
	public function &setNBeneficiario($nBeneficiario) {
		$this->notifyChanged(self::FIELD_N_BENEFICIARIO,$this->nBeneficiario,$nBeneficiario);
		$this->nBeneficiario=$nBeneficiario;
		return $this;
	}

	/**
	 * get value for n_beneficiario 
	 *
	 * type:DOUBLE,size:22,default:0,nullable
	 *
	 * @return mixed
	 */
	public function getNBeneficiario() {
		return $this->nBeneficiario;
	}

	/**
	 * set value for data_emissao 
	 *
	 * type:DATE,size:10,default:null,nullable
	 *
	 * @param mixed $dataEmissao
	 * @return SubsidioFeria
	 */
	public function &setDataEmissao($dataEmissao) {
		$this->notifyChanged(self::FIELD_DATA_EMISSAO,$this->dataEmissao,$dataEmissao);
		$this->dataEmissao=$dataEmissao;
		return $this;
	}

	/**
	 * get value for data_emissao 
	 *
	 * type:DATE,size:10,default:null,nullable
	 *
	 * @return mixed
	 */
	public function getDataEmissao() {
		return $this->dataEmissao;
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
			self::FIELD_SUBSIDIO=>$this->getSubsidio(),
			self::FIELD_N_BENEFICIARIO=>$this->getNBeneficiario(),
			self::FIELD_DATA_EMISSAO=>$this->getDataEmissao());
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
	 * Match by attributes of passed example instance and return matched rows as an array of SubsidioFeria instances
	 *
	 * @param PDO $db a PDO Database instance
	 * @param SubsidioFeria $example an example instance defining the conditions. All non-null properties will be considered a constraint, null values will be ignored.
	 * @param boolean $and true if conditions should be and'ed, false if they should be or'ed
	 * @param array $sort array of DSC instances
	 * @return SubsidioFeria[]
	 */
	public static function findByExample(PDO $db,SubsidioFeria $example, $and=true, $sort=null) {
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
	 * Will return matched rows as an array of SubsidioFeria instances.
	 *
	 * @param PDO $db a PDO Database instance
	 * @param array $filter array of DFC instances defining the conditions
	 * @param boolean $and true if conditions should be and'ed, false if they should be or'ed
	 * @param array $sort array of DSC instances
	 * @return SubsidioFeria[]
	 */
	public static function findByFilter(PDO $db, $filter, $and=true, $sort=null) {
		if (!($filter instanceof DFCInterface)) {
			$filter=new DFCAggregate($filter, $and);
		}
		$sql='SELECT * FROM `subsidio_feria`'
		. self::buildSqlWhere($filter, $and, false, true)
		. self::buildSqlOrderBy($sort);

		$stmt=self::prepareStatement($db, $sql);
		self::bindValuesForFilter($stmt, $filter);
		return self::fromStatement($stmt);
	}

	/**
	 * Will execute the passed statement and return the result as an array of SubsidioFeria instances
	 *
	 * @param PDOStatement $stmt
	 * @return SubsidioFeria[]
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
	 * returns the result as an array of SubsidioFeria instances without executing the passed statement
	 *
	 * @param PDOStatement $stmt
	 * @return SubsidioFeria[]
	 */
	public static function fromExecutedStatement(PDOStatement $stmt) {
		$resultInstances=array();
		while($result=$stmt->fetch(PDO::FETCH_ASSOC)) {
			$o=new SubsidioFeria();
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
	 * Execute select query and return matched rows as an array of SubsidioFeria instances.
	 *
	 * The query should of course be on the table for this entity class and return all fields.
	 *
	 * @param PDO $db a PDO Database instance
	 * @param string $sql
	 * @return SubsidioFeria[]
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
		$sql='DELETE FROM `subsidio_feria`'
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
		$this->setSubsidio($result['subsidio']);
		$this->setNBeneficiario($result['n_beneficiario']);
		$this->setDataEmissao($result['data_emissao']);
	}

	/**
	 * Get element instance by it's primary key(s).
	 * Will return null if no row was matched.
	 *
	 * @param PDO $db
	 * @return SubsidioFeria
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
		$o=new SubsidioFeria();
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
		$stmt->bindValue(3,$this->getSubsidio());
		$stmt->bindValue(4,$this->getNBeneficiario());
		$stmt->bindValue(5,$this->getDataEmissao());
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
			$stmt->bindValue(2,$this->getSubsidio());
			$stmt->bindValue(3,$this->getNBeneficiario());
			$stmt->bindValue(4,$this->getDataEmissao());
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
		$stmt->bindValue(6,$this->getId());
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
		return self::hashToDomDocument($this->toHash(), 'SubsidioFeria');
	}

	/**
	 * get single SubsidioFeria instance from a DOMElement
	 *
	 * @param DOMElement $node
	 * @return SubsidioFeria
	 */
	public static function fromDOMElement(DOMElement $node) {
		$o=new SubsidioFeria();
		$o->assignByHash(self::domNodeToHash($node, self::$FIELD_NAMES, self::$DEFAULT_VALUES, self::$FIELD_TYPES));
			$o->notifyPristine();
		return $o;
	}

	/**
	 * get all instances of SubsidioFeria from the passed DOMDocument
	 *
	 * @param DOMDocument $doc
	 * @return SubsidioFeria[]
	 */
	public static function fromDOMDocument(DOMDocument $doc) {
		$instances=array();
		foreach ($doc->getElementsByTagName('SubsidioFeria') as $node) {
			$instances[]=self::fromDOMElement($node);
		}
		return $instances;
	}

}
?>