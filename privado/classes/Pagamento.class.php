<?php

/**
 * 
 *
 * @version 1.107
 * @package entity
 */
class Pagamento extends Db2PhpEntityBase implements Db2PhpEntityModificationTracking {
	private static $CLASS_NAME='Pagamento';
	const SQL_IDENTIFIER_QUOTE='`';
	const SQL_TABLE_NAME='pagamento';
	const SQL_INSERT='INSERT INTO `pagamento` (`id`,`encarregado_id`,`crianca_id`,`codigo`,`f_talao`,`data_emissao`,`mes`) VALUES (?,?,?,?,?,?,?)';
	const SQL_INSERT_AUTOINCREMENT='INSERT INTO `pagamento` (`encarregado_id`,`crianca_id`,`codigo`,`f_talao`,`data_emissao`,`mes`) VALUES (?,?,?,?,?,?)';
	const SQL_UPDATE='UPDATE `pagamento` SET `id`=?,`encarregado_id`=?,`crianca_id`=?,`codigo`=?,`f_talao`=?,`data_emissao`=?,`mes`=? WHERE `id`=?';
	const SQL_SELECT_PK='SELECT * FROM `pagamento` WHERE `id`=?';
	const SQL_DELETE_PK='DELETE FROM `pagamento` WHERE `id`=?';
	const FIELD_ID=467340515;
	const FIELD_ENCARREGADO_ID=-1162142529;
	const FIELD_CRIANCA_ID=-2001701571;
	const FIELD_CODIGO=1652612705;
	const FIELD_F_TALAO=1910373420;
	const FIELD_DATA_EMISSAO=716731650;
	const FIELD_MES=1602658067;
	private static $PRIMARY_KEYS=array(self::FIELD_ID);
	private static $AUTOINCREMENT_FIELDS=array(self::FIELD_ID);
	private static $FIELD_NAMES=array(
		self::FIELD_ID=>'id',
		self::FIELD_ENCARREGADO_ID=>'encarregado_id',
		self::FIELD_CRIANCA_ID=>'crianca_id',
		self::FIELD_CODIGO=>'codigo',
		self::FIELD_F_TALAO=>'f_talao',
		self::FIELD_DATA_EMISSAO=>'data_emissao',
		self::FIELD_MES=>'mes');
	private static $PROPERTY_NAMES=array(
		self::FIELD_ID=>'id',
		self::FIELD_ENCARREGADO_ID=>'encarregadoId',
		self::FIELD_CRIANCA_ID=>'criancaId',
		self::FIELD_CODIGO=>'codigo',
		self::FIELD_F_TALAO=>'fTalao',
		self::FIELD_DATA_EMISSAO=>'dataEmissao',
		self::FIELD_MES=>'mes');
	private static $PROPERTY_TYPES=array(
		self::FIELD_ID=>Db2PhpEntity::PHP_TYPE_INT,
		self::FIELD_ENCARREGADO_ID=>Db2PhpEntity::PHP_TYPE_INT,
		self::FIELD_CRIANCA_ID=>Db2PhpEntity::PHP_TYPE_INT,
		self::FIELD_CODIGO=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_F_TALAO=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_DATA_EMISSAO=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_MES=>Db2PhpEntity::PHP_TYPE_INT);
	private static $FIELD_TYPES=array(
		self::FIELD_ID=>array(Db2PhpEntity::JDBC_TYPE_INTEGER,10,0,false),
		self::FIELD_ENCARREGADO_ID=>array(Db2PhpEntity::JDBC_TYPE_INTEGER,10,0,false),
		self::FIELD_CRIANCA_ID=>array(Db2PhpEntity::JDBC_TYPE_INTEGER,10,0,false),
		self::FIELD_CODIGO=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,50,0,false),
		self::FIELD_F_TALAO=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,255,0,true),
		self::FIELD_DATA_EMISSAO=>array(Db2PhpEntity::JDBC_TYPE_DATE,10,0,false),
		self::FIELD_MES=>array(Db2PhpEntity::JDBC_TYPE_INTEGER,10,0,true));
	private static $DEFAULT_VALUES=array(
		self::FIELD_ID=>null,
		self::FIELD_ENCARREGADO_ID=>0,
		self::FIELD_CRIANCA_ID=>0,
		self::FIELD_CODIGO=>'',
		self::FIELD_F_TALAO=>null,
		self::FIELD_DATA_EMISSAO=>'',
		self::FIELD_MES=>null);
	private $id;
	private $encarregadoId;
	private $criancaId;
	private $codigo;
	private $fTalao;
	private $dataEmissao;
	private $mes;

	/**
	 * set value for id 
	 *
	 * type:INT,size:10,default:null,primary,unique,autoincrement
	 *
	 * @param mixed $id
	 * @return Pagamento
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
	 * set value for encarregado_id 
	 *
	 * type:INT,size:10,default:null,index
	 *
	 * @param mixed $encarregadoId
	 * @return Pagamento
	 */
	public function &setEncarregadoId($encarregadoId) {
		$this->notifyChanged(self::FIELD_ENCARREGADO_ID,$this->encarregadoId,$encarregadoId);
		$this->encarregadoId=$encarregadoId;
		return $this;
	}

	/**
	 * get value for encarregado_id 
	 *
	 * type:INT,size:10,default:null,index
	 *
	 * @return mixed
	 */
	public function getEncarregadoId() {
		return $this->encarregadoId;
	}

	/**
	 * set value for crianca_id 
	 *
	 * type:INT,size:10,default:null,index
	 *
	 * @param mixed $criancaId
	 * @return Pagamento
	 */
	public function &setCriancaId($criancaId) {
		$this->notifyChanged(self::FIELD_CRIANCA_ID,$this->criancaId,$criancaId);
		$this->criancaId=$criancaId;
		return $this;
	}

	/**
	 * get value for crianca_id 
	 *
	 * type:INT,size:10,default:null,index
	 *
	 * @return mixed
	 */
	public function getCriancaId() {
		return $this->criancaId;
	}

	/**
	 * set value for codigo 
	 *
	 * type:VARCHAR,size:50,default:null
	 *
	 * @param mixed $codigo
	 * @return Pagamento
	 */
	public function &setCodigo($codigo) {
		$this->notifyChanged(self::FIELD_CODIGO,$this->codigo,$codigo);
		$this->codigo=$codigo;
		return $this;
	}

	/**
	 * get value for codigo 
	 *
	 * type:VARCHAR,size:50,default:null
	 *
	 * @return mixed
	 */
	public function getCodigo() {
		return $this->codigo;
	}

	/**
	 * set value for f_talao 
	 *
	 * type:VARCHAR,size:255,default:null,nullable
	 *
	 * @param mixed $fTalao
	 * @return Pagamento
	 */
	public function &setFTalao($fTalao) {
		$this->notifyChanged(self::FIELD_F_TALAO,$this->fTalao,$fTalao);
		$this->fTalao=$fTalao;
		return $this;
	}

	/**
	 * get value for f_talao 
	 *
	 * type:VARCHAR,size:255,default:null,nullable
	 *
	 * @return mixed
	 */
	public function getFTalao() {
		return $this->fTalao;
	}

	/**
	 * set value for data_emissao 
	 *
	 * type:DATE,size:10,default:null
	 *
	 * @param mixed $dataEmissao
	 * @return Pagamento
	 */
	public function &setDataEmissao($dataEmissao) {
		$this->notifyChanged(self::FIELD_DATA_EMISSAO,$this->dataEmissao,$dataEmissao);
		$this->dataEmissao=$dataEmissao;
		return $this;
	}

	/**
	 * get value for data_emissao 
	 *
	 * type:DATE,size:10,default:null
	 *
	 * @return mixed
	 */
	public function getDataEmissao() {
		return $this->dataEmissao;
	}

	/**
	 * set value for mes 
	 *
	 * type:INT,size:10,default:null,nullable
	 *
	 * @param mixed $mes
	 * @return Pagamento
	 */
	public function &setMes($mes) {
		$this->notifyChanged(self::FIELD_MES,$this->mes,$mes);
		$this->mes=$mes;
		return $this;
	}

	/**
	 * get value for mes 
	 *
	 * type:INT,size:10,default:null,nullable
	 *
	 * @return mixed
	 */
	public function getMes() {
		return $this->mes;
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
			self::FIELD_ENCARREGADO_ID=>$this->getEncarregadoId(),
			self::FIELD_CRIANCA_ID=>$this->getCriancaId(),
			self::FIELD_CODIGO=>$this->getCodigo(),
			self::FIELD_F_TALAO=>$this->getFTalao(),
			self::FIELD_DATA_EMISSAO=>$this->getDataEmissao(),
			self::FIELD_MES=>$this->getMes());
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
	 * Match by attributes of passed example instance and return matched rows as an array of Pagamento instances
	 *
	 * @param PDO $db a PDO Database instance
	 * @param Pagamento $example an example instance defining the conditions. All non-null properties will be considered a constraint, null values will be ignored.
	 * @param boolean $and true if conditions should be and'ed, false if they should be or'ed
	 * @param array $sort array of DSC instances
	 * @return Pagamento[]
	 */
	public static function findByExample(PDO $db,Pagamento $example, $and=true, $sort=null) {
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
	 * Will return matched rows as an array of Pagamento instances.
	 *
	 * @param PDO $db a PDO Database instance
	 * @param array $filter array of DFC instances defining the conditions
	 * @param boolean $and true if conditions should be and'ed, false if they should be or'ed
	 * @param array $sort array of DSC instances
	 * @return Pagamento[]
	 */
	public static function findByFilter(PDO $db, $filter, $and=true, $sort=null) {
		if (!($filter instanceof DFCInterface)) {
			$filter=new DFCAggregate($filter, $and);
		}
		$sql='SELECT * FROM `pagamento`'
		. self::buildSqlWhere($filter, $and, false, true)
		. self::buildSqlOrderBy($sort);

		$stmt=self::prepareStatement($db, $sql);
		self::bindValuesForFilter($stmt, $filter);
		return self::fromStatement($stmt);
	}

	/**
	 * Will execute the passed statement and return the result as an array of Pagamento instances
	 *
	 * @param PDOStatement $stmt
	 * @return Pagamento[]
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
	 * returns the result as an array of Pagamento instances without executing the passed statement
	 *
	 * @param PDOStatement $stmt
	 * @return Pagamento[]
	 */
	public static function fromExecutedStatement(PDOStatement $stmt) {
		$resultInstances=array();
		while($result=$stmt->fetch(PDO::FETCH_ASSOC)) {
			$o=new Pagamento();
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
	 * Execute select query and return matched rows as an array of Pagamento instances.
	 *
	 * The query should of course be on the table for this entity class and return all fields.
	 *
	 * @param PDO $db a PDO Database instance
	 * @param string $sql
	 * @return Pagamento[]
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
		$sql='DELETE FROM `pagamento`'
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
		$this->setEncarregadoId($result['encarregado_id']);
		$this->setCriancaId($result['crianca_id']);
		$this->setCodigo($result['codigo']);
		$this->setFTalao($result['f_talao']);
		$this->setDataEmissao($result['data_emissao']);
		$this->setMes($result['mes']);
	}

	/**
	 * Get element instance by it's primary key(s).
	 * Will return null if no row was matched.
	 *
	 * @param PDO $db
	 * @return Pagamento
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
		$o=new Pagamento();
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
		$stmt->bindValue(2,$this->getEncarregadoId());
		$stmt->bindValue(3,$this->getCriancaId());
		$stmt->bindValue(4,$this->getCodigo());
		$stmt->bindValue(5,$this->getFTalao());
		$stmt->bindValue(6,$this->getDataEmissao());
		$stmt->bindValue(7,$this->getMes());
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
			$stmt->bindValue(1,$this->getEncarregadoId());
			$stmt->bindValue(2,$this->getCriancaId());
			$stmt->bindValue(3,$this->getCodigo());
			$stmt->bindValue(4,$this->getFTalao());
			$stmt->bindValue(5,$this->getDataEmissao());
			$stmt->bindValue(6,$this->getMes());
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
		$stmt->bindValue(8,$this->getId());
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
		return self::hashToDomDocument($this->toHash(), 'Pagamento');
	}

	/**
	 * get single Pagamento instance from a DOMElement
	 *
	 * @param DOMElement $node
	 * @return Pagamento
	 */
	public static function fromDOMElement(DOMElement $node) {
		$o=new Pagamento();
		$o->assignByHash(self::domNodeToHash($node, self::$FIELD_NAMES, self::$DEFAULT_VALUES, self::$FIELD_TYPES));
			$o->notifyPristine();
		return $o;
	}

	/**
	 * get all instances of Pagamento from the passed DOMDocument
	 *
	 * @param DOMDocument $doc
	 * @return Pagamento[]
	 */
	public static function fromDOMDocument(DOMDocument $doc) {
		$instances=array();
		foreach ($doc->getElementsByTagName('Pagamento') as $node) {
			$instances[]=self::fromDOMElement($node);
		}
		return $instances;
	}

}
?>