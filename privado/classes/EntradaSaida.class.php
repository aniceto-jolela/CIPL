<?php

/**
 * 
 *
 * @version 1.107
 * @package entity
 */
class EntradaSaida extends Db2PhpEntityBase implements Db2PhpEntityModificationTracking {
	private static $CLASS_NAME='EntradaSaida';
	const SQL_IDENTIFIER_QUOTE='`';
	const SQL_TABLE_NAME='entrada_saida';
	const SQL_INSERT='INSERT INTO `entrada_saida` (`id`,`crianca_id`,`encarregado_entrada`,`data_entrada`,`f_bi_1`,`encarregado_saida`,`data_saida`,`f_bi_2`) VALUES (?,?,?,?,?,?,?,?)';
	const SQL_INSERT_AUTOINCREMENT='INSERT INTO `entrada_saida` (`crianca_id`,`encarregado_entrada`,`f_bi_1`,`encarregado_saida`,`data_saida`,`f_bi_2`) VALUES (?,?,?,?,?,?)';
	const SQL_UPDATE='UPDATE `entrada_saida` SET `id`=?,`crianca_id`=?,`encarregado_entrada`=?,`data_entrada`=?,`f_bi_1`=?,`encarregado_saida`=?,`data_saida`=?,`f_bi_2`=? WHERE `id`=?';
	const SQL_SELECT_PK='SELECT * FROM `entrada_saida` WHERE `id`=?';
	const SQL_DELETE_PK='DELETE FROM `entrada_saida` WHERE `id`=?';
	const FIELD_ID=1086943769;
	const FIELD_CRIANCA_ID=634995827;
	const FIELD_ENCARREGADO_ENTRADA=-1381930307;
	const FIELD_DATA_ENTRADA=590967360;
	const FIELD_F_BI_1=-152444816;
	const FIELD_ENCARREGADO_SAIDA=-677174402;
	const FIELD_DATA_SAIDA=-1618137151;
	const FIELD_F_BI_2=-152444815;
	private static $PRIMARY_KEYS=array(self::FIELD_ID);
	private static $AUTOINCREMENT_FIELDS=array(self::FIELD_ID);
	private static $FIELD_NAMES=array(
		self::FIELD_ID=>'id',
		self::FIELD_CRIANCA_ID=>'crianca_id',
		self::FIELD_ENCARREGADO_ENTRADA=>'encarregado_entrada',
		self::FIELD_DATA_ENTRADA=>'data_entrada',
		self::FIELD_F_BI_1=>'f_bi_1',
		self::FIELD_ENCARREGADO_SAIDA=>'encarregado_saida',
		self::FIELD_DATA_SAIDA=>'data_saida',
		self::FIELD_F_BI_2=>'f_bi_2');
	private static $PROPERTY_NAMES=array(
		self::FIELD_ID=>'id',
		self::FIELD_CRIANCA_ID=>'criancaId',
		self::FIELD_ENCARREGADO_ENTRADA=>'encarregadoEntrada',
		self::FIELD_DATA_ENTRADA=>'dataEntrada',
		self::FIELD_F_BI_1=>'fBi1',
		self::FIELD_ENCARREGADO_SAIDA=>'encarregadoSaida',
		self::FIELD_DATA_SAIDA=>'dataSaida',
		self::FIELD_F_BI_2=>'fBi2');
	private static $PROPERTY_TYPES=array(
		self::FIELD_ID=>Db2PhpEntity::PHP_TYPE_INT,
		self::FIELD_CRIANCA_ID=>Db2PhpEntity::PHP_TYPE_INT,
		self::FIELD_ENCARREGADO_ENTRADA=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_DATA_ENTRADA=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_F_BI_1=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_ENCARREGADO_SAIDA=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_DATA_SAIDA=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_F_BI_2=>Db2PhpEntity::PHP_TYPE_STRING);
	private static $FIELD_TYPES=array(
		self::FIELD_ID=>array(Db2PhpEntity::JDBC_TYPE_INTEGER,10,0,false),
		self::FIELD_CRIANCA_ID=>array(Db2PhpEntity::JDBC_TYPE_INTEGER,10,0,true),
		self::FIELD_ENCARREGADO_ENTRADA=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,100,0,true),
		self::FIELD_DATA_ENTRADA=>array(Db2PhpEntity::JDBC_TYPE_TIMESTAMP,19,0,true),
		self::FIELD_F_BI_1=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,255,0,true),
		self::FIELD_ENCARREGADO_SAIDA=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,100,0,true),
		self::FIELD_DATA_SAIDA=>array(Db2PhpEntity::JDBC_TYPE_TIMESTAMP,19,0,true),
		self::FIELD_F_BI_2=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,255,0,true));
	private static $DEFAULT_VALUES=array(
		self::FIELD_ID=>null,
		self::FIELD_CRIANCA_ID=>null,
		self::FIELD_ENCARREGADO_ENTRADA=>null,
		self::FIELD_DATA_ENTRADA=>'CURRENT_TIMESTAMP',
		self::FIELD_F_BI_1=>null,
		self::FIELD_ENCARREGADO_SAIDA=>null,
		self::FIELD_DATA_SAIDA=>null,
		self::FIELD_F_BI_2=>null);
	private $id;
	private $criancaId;
	private $encarregadoEntrada;
	private $dataEntrada;
	private $fBi1;
	private $encarregadoSaida;
	private $dataSaida;
	private $fBi2;

	/**
	 * set value for id 
	 *
	 * type:INT,size:10,default:null,primary,unique,autoincrement
	 *
	 * @param mixed $id
	 * @return EntradaSaida
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
	 * set value for crianca_id 
	 *
	 * type:INT,size:10,default:null,index,nullable
	 *
	 * @param mixed $criancaId
	 * @return EntradaSaida
	 */
	public function &setCriancaId($criancaId) {
		$this->notifyChanged(self::FIELD_CRIANCA_ID,$this->criancaId,$criancaId);
		$this->criancaId=$criancaId;
		return $this;
	}

	/**
	 * get value for crianca_id 
	 *
	 * type:INT,size:10,default:null,index,nullable
	 *
	 * @return mixed
	 */
	public function getCriancaId() {
		return $this->criancaId;
	}

	/**
	 * set value for encarregado_entrada 
	 *
	 * type:VARCHAR,size:100,default:null,nullable
	 *
	 * @param mixed $encarregadoEntrada
	 * @return EntradaSaida
	 */
	public function &setEncarregadoEntrada($encarregadoEntrada) {
		$this->notifyChanged(self::FIELD_ENCARREGADO_ENTRADA,$this->encarregadoEntrada,$encarregadoEntrada);
		$this->encarregadoEntrada=$encarregadoEntrada;
		return $this;
	}

	/**
	 * get value for encarregado_entrada 
	 *
	 * type:VARCHAR,size:100,default:null,nullable
	 *
	 * @return mixed
	 */
	public function getEncarregadoEntrada() {
		return $this->encarregadoEntrada;
	}

	/**
	 * set value for data_entrada 
	 *
	 * type:TIMESTAMP,size:19,default:CURRENT_TIMESTAMP,nullable
	 *
	 * @param mixed $dataEntrada
	 * @return EntradaSaida
	 */
	public function &setDataEntrada($dataEntrada) {
		$this->notifyChanged(self::FIELD_DATA_ENTRADA,$this->dataEntrada,$dataEntrada);
		$this->dataEntrada=$dataEntrada;
		return $this;
	}

	/**
	 * get value for data_entrada 
	 *
	 * type:TIMESTAMP,size:19,default:CURRENT_TIMESTAMP,nullable
	 *
	 * @return mixed
	 */
	public function getDataEntrada() {
		return $this->dataEntrada;
	}

	/**
	 * set value for f_bi_1 
	 *
	 * type:VARCHAR,size:255,default:null,nullable
	 *
	 * @param mixed $fBi1
	 * @return EntradaSaida
	 */
	public function &setFBi1($fBi1) {
		$this->notifyChanged(self::FIELD_F_BI_1,$this->fBi1,$fBi1);
		$this->fBi1=$fBi1;
		return $this;
	}

	/**
	 * get value for f_bi_1 
	 *
	 * type:VARCHAR,size:255,default:null,nullable
	 *
	 * @return mixed
	 */
	public function getFBi1() {
		return $this->fBi1;
	}

	/**
	 * set value for encarregado_saida 
	 *
	 * type:VARCHAR,size:100,default:null,nullable
	 *
	 * @param mixed $encarregadoSaida
	 * @return EntradaSaida
	 */
	public function &setEncarregadoSaida($encarregadoSaida) {
		$this->notifyChanged(self::FIELD_ENCARREGADO_SAIDA,$this->encarregadoSaida,$encarregadoSaida);
		$this->encarregadoSaida=$encarregadoSaida;
		return $this;
	}

	/**
	 * get value for encarregado_saida 
	 *
	 * type:VARCHAR,size:100,default:null,nullable
	 *
	 * @return mixed
	 */
	public function getEncarregadoSaida() {
		return $this->encarregadoSaida;
	}

	/**
	 * set value for data_saida 
	 *
	 * type:DATETIME,size:19,default:null,nullable
	 *
	 * @param mixed $dataSaida
	 * @return EntradaSaida
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
	 * set value for f_bi_2 
	 *
	 * type:VARCHAR,size:255,default:null,nullable
	 *
	 * @param mixed $fBi2
	 * @return EntradaSaida
	 */
	public function &setFBi2($fBi2) {
		$this->notifyChanged(self::FIELD_F_BI_2,$this->fBi2,$fBi2);
		$this->fBi2=$fBi2;
		return $this;
	}

	/**
	 * get value for f_bi_2 
	 *
	 * type:VARCHAR,size:255,default:null,nullable
	 *
	 * @return mixed
	 */
	public function getFBi2() {
		return $this->fBi2;
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
			self::FIELD_CRIANCA_ID=>$this->getCriancaId(),
			self::FIELD_ENCARREGADO_ENTRADA=>$this->getEncarregadoEntrada(),
			self::FIELD_DATA_ENTRADA=>$this->getDataEntrada(),
			self::FIELD_F_BI_1=>$this->getFBi1(),
			self::FIELD_ENCARREGADO_SAIDA=>$this->getEncarregadoSaida(),
			self::FIELD_DATA_SAIDA=>$this->getDataSaida(),
			self::FIELD_F_BI_2=>$this->getFBi2());
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
	 * Match by attributes of passed example instance and return matched rows as an array of EntradaSaida instances
	 *
	 * @param PDO $db a PDO Database instance
	 * @param EntradaSaida $example an example instance defining the conditions. All non-null properties will be considered a constraint, null values will be ignored.
	 * @param boolean $and true if conditions should be and'ed, false if they should be or'ed
	 * @param array $sort array of DSC instances
	 * @return EntradaSaida[]
	 */
	public static function findByExample(PDO $db,EntradaSaida $example, $and=true, $sort=null) {
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
	 * Will return matched rows as an array of EntradaSaida instances.
	 *
	 * @param PDO $db a PDO Database instance
	 * @param array $filter array of DFC instances defining the conditions
	 * @param boolean $and true if conditions should be and'ed, false if they should be or'ed
	 * @param array $sort array of DSC instances
	 * @return EntradaSaida[]
	 */
	public static function findByFilter(PDO $db, $filter, $and=true, $sort=null) {
		if (!($filter instanceof DFCInterface)) {
			$filter=new DFCAggregate($filter, $and);
		}
		$sql='SELECT * FROM `entrada_saida`'
		. self::buildSqlWhere($filter, $and, false, true)
		. self::buildSqlOrderBy($sort);

		$stmt=self::prepareStatement($db, $sql);
		self::bindValuesForFilter($stmt, $filter);
		return self::fromStatement($stmt);
	}

	/**
	 * Will execute the passed statement and return the result as an array of EntradaSaida instances
	 *
	 * @param PDOStatement $stmt
	 * @return EntradaSaida[]
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
	 * returns the result as an array of EntradaSaida instances without executing the passed statement
	 *
	 * @param PDOStatement $stmt
	 * @return EntradaSaida[]
	 */
	public static function fromExecutedStatement(PDOStatement $stmt) {
		$resultInstances=array();
		while($result=$stmt->fetch(PDO::FETCH_ASSOC)) {
			$o=new EntradaSaida();
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
	 * Execute select query and return matched rows as an array of EntradaSaida instances.
	 *
	 * The query should of course be on the table for this entity class and return all fields.
	 *
	 * @param PDO $db a PDO Database instance
	 * @param string $sql
	 * @return EntradaSaida[]
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
		$sql='DELETE FROM `entrada_saida`'
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
		$this->setCriancaId($result['crianca_id']);
		$this->setEncarregadoEntrada($result['encarregado_entrada']);
		$this->setDataEntrada($result['data_entrada']);
		$this->setFBi1($result['f_bi_1']);
		$this->setEncarregadoSaida($result['encarregado_saida']);
		$this->setDataSaida($result['data_saida']);
		$this->setFBi2($result['f_bi_2']);
	}

	/**
	 * Get element instance by it's primary key(s).
	 * Will return null if no row was matched.
	 *
	 * @param PDO $db
	 * @return EntradaSaida
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
		$o=new EntradaSaida();
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
		$stmt->bindValue(2,$this->getCriancaId());
		$stmt->bindValue(3,$this->getEncarregadoEntrada());
		$stmt->bindValue(4,$this->getDataEntrada());
		$stmt->bindValue(5,$this->getFBi1());
		$stmt->bindValue(6,$this->getEncarregadoSaida());
		$stmt->bindValue(7,$this->getDataSaida());
		$stmt->bindValue(8,$this->getFBi2());
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
			$stmt->bindValue(1,$this->getCriancaId());
			$stmt->bindValue(2,$this->getEncarregadoEntrada());
			$stmt->bindValue(3,$this->getFBi1());
			$stmt->bindValue(4,$this->getEncarregadoSaida());
			$stmt->bindValue(5,$this->getDataSaida());
			$stmt->bindValue(6,$this->getFBi2());
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
		$stmt->bindValue(9,$this->getId());
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
		return self::hashToDomDocument($this->toHash(), 'EntradaSaida');
	}

	/**
	 * get single EntradaSaida instance from a DOMElement
	 *
	 * @param DOMElement $node
	 * @return EntradaSaida
	 */
	public static function fromDOMElement(DOMElement $node) {
		$o=new EntradaSaida();
		$o->assignByHash(self::domNodeToHash($node, self::$FIELD_NAMES, self::$DEFAULT_VALUES, self::$FIELD_TYPES));
			$o->notifyPristine();
		return $o;
	}

	/**
	 * get all instances of EntradaSaida from the passed DOMDocument
	 *
	 * @param DOMDocument $doc
	 * @return EntradaSaida[]
	 */
	public static function fromDOMDocument(DOMDocument $doc) {
		$instances=array();
		foreach ($doc->getElementsByTagName('EntradaSaida') as $node) {
			$instances[]=self::fromDOMElement($node);
		}
		return $instances;
	}

}
?>