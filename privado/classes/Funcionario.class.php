<?php

/**
 * 
 *
 * @version 1.107
 * @package entity
 */
class Funcionario extends Db2PhpEntityBase implements Db2PhpEntityModificationTracking {
	private static $CLASS_NAME='Funcionario';
	const SQL_IDENTIFIER_QUOTE='`';
	const SQL_TABLE_NAME='funcionario';
	const SQL_INSERT='INSERT INTO `funcionario` (`id`,`nome`,`sexo`,`foto`,`f_declaracao`,`f_iban`,`f_copia_bi`,`banco_id`,`iban_escrito`,`n_bi`,`data_validade`,`f_atestado_medico`,`f_boletim_sanidade`,`cargo_id`,`telefone`,`salario_base`,`data_cadastro`,`estado`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
	const SQL_INSERT_AUTOINCREMENT='INSERT INTO `funcionario` (`nome`,`sexo`,`foto`,`f_declaracao`,`f_iban`,`f_copia_bi`,`banco_id`,`iban_escrito`,`n_bi`,`data_validade`,`f_atestado_medico`,`f_boletim_sanidade`,`cargo_id`,`telefone`,`salario_base`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
	const SQL_UPDATE='UPDATE `funcionario` SET `id`=?,`nome`=?,`sexo`=?,`foto`=?,`f_declaracao`=?,`f_iban`=?,`f_copia_bi`=?,`banco_id`=?,`iban_escrito`=?,`n_bi`=?,`data_validade`=?,`f_atestado_medico`=?,`f_boletim_sanidade`=?,`cargo_id`=?,`telefone`=?,`salario_base`=?,`data_cadastro`=?,`estado`=? WHERE `id`=?';
	const SQL_SELECT_PK='SELECT * FROM `funcionario` WHERE `id`=?';
	const SQL_DELETE_PK='DELETE FROM `funcionario` WHERE `id`=?';
	const FIELD_ID=-715978226;
	const FIELD_NOME=-860144820;
	const FIELD_SEXO=-860005124;
	const FIELD_FOTO=-860382921;
	const FIELD_F_DECLARACAO=-1302111401;
	const FIELD_F_IBAN=2085587634;
	const FIELD_F_COPIA_BI=-1187996810;
	const FIELD_BANCO_ID=2038164946;
	const FIELD_IBAN_ESCRITO=-305311007;
	const FIELD_N_BI=-860160533;
	const FIELD_DATA_VALIDADE=-42412728;
	const FIELD_F_ATESTADO_MEDICO=2050857411;
	const FIELD_F_BOLETIM_SANIDADE=-1148931904;
	const FIELD_CARGO_ID=-395781327;
	const FIELD_TELEFONE=-1751603811;
	const FIELD_SALARIO_BASE=532900878;
	const FIELD_DATA_CADASTRO=967973467;
	const FIELD_ESTADO=2075755737;
	private static $PRIMARY_KEYS=array(self::FIELD_ID);
	private static $AUTOINCREMENT_FIELDS=array(self::FIELD_ID);
	private static $FIELD_NAMES=array(
		self::FIELD_ID=>'id',
		self::FIELD_NOME=>'nome',
		self::FIELD_SEXO=>'sexo',
		self::FIELD_FOTO=>'foto',
		self::FIELD_F_DECLARACAO=>'f_declaracao',
		self::FIELD_F_IBAN=>'f_iban',
		self::FIELD_F_COPIA_BI=>'f_copia_bi',
		self::FIELD_BANCO_ID=>'banco_id',
		self::FIELD_IBAN_ESCRITO=>'iban_escrito',
		self::FIELD_N_BI=>'n_bi',
		self::FIELD_DATA_VALIDADE=>'data_validade',
		self::FIELD_F_ATESTADO_MEDICO=>'f_atestado_medico',
		self::FIELD_F_BOLETIM_SANIDADE=>'f_boletim_sanidade',
		self::FIELD_CARGO_ID=>'cargo_id',
		self::FIELD_TELEFONE=>'telefone',
		self::FIELD_SALARIO_BASE=>'salario_base',
		self::FIELD_DATA_CADASTRO=>'data_cadastro',
		self::FIELD_ESTADO=>'estado');
	private static $PROPERTY_NAMES=array(
		self::FIELD_ID=>'id',
		self::FIELD_NOME=>'nome',
		self::FIELD_SEXO=>'sexo',
		self::FIELD_FOTO=>'foto',
		self::FIELD_F_DECLARACAO=>'fDeclaracao',
		self::FIELD_F_IBAN=>'fIban',
		self::FIELD_F_COPIA_BI=>'fCopiaBi',
		self::FIELD_BANCO_ID=>'bancoId',
		self::FIELD_IBAN_ESCRITO=>'ibanEscrito',
		self::FIELD_N_BI=>'nBi',
		self::FIELD_DATA_VALIDADE=>'dataValidade',
		self::FIELD_F_ATESTADO_MEDICO=>'fAtestadoMedico',
		self::FIELD_F_BOLETIM_SANIDADE=>'fBoletimSanidade',
		self::FIELD_CARGO_ID=>'cargoId',
		self::FIELD_TELEFONE=>'telefone',
		self::FIELD_SALARIO_BASE=>'salarioBase',
		self::FIELD_DATA_CADASTRO=>'dataCadastro',
		self::FIELD_ESTADO=>'estado');
	private static $PROPERTY_TYPES=array(
		self::FIELD_ID=>Db2PhpEntity::PHP_TYPE_INT,
		self::FIELD_NOME=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_SEXO=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_FOTO=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_F_DECLARACAO=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_F_IBAN=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_F_COPIA_BI=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_BANCO_ID=>Db2PhpEntity::PHP_TYPE_INT,
		self::FIELD_IBAN_ESCRITO=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_N_BI=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_DATA_VALIDADE=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_F_ATESTADO_MEDICO=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_F_BOLETIM_SANIDADE=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_CARGO_ID=>Db2PhpEntity::PHP_TYPE_INT,
		self::FIELD_TELEFONE=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_SALARIO_BASE=>Db2PhpEntity::PHP_TYPE_FLOAT,
		self::FIELD_DATA_CADASTRO=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_ESTADO=>Db2PhpEntity::PHP_TYPE_INT);
	private static $FIELD_TYPES=array(
		self::FIELD_ID=>array(Db2PhpEntity::JDBC_TYPE_INTEGER,10,0,false),
		self::FIELD_NOME=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,255,0,false),
		self::FIELD_SEXO=>array(Db2PhpEntity::JDBC_TYPE_CHAR,2,0,false),
		self::FIELD_FOTO=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,255,0,false),
		self::FIELD_F_DECLARACAO=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,255,0,false),
		self::FIELD_F_IBAN=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,255,0,false),
		self::FIELD_F_COPIA_BI=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,255,0,false),
		self::FIELD_BANCO_ID=>array(Db2PhpEntity::JDBC_TYPE_INTEGER,10,0,false),
		self::FIELD_IBAN_ESCRITO=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,30,0,false),
		self::FIELD_N_BI=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,14,0,false),
		self::FIELD_DATA_VALIDADE=>array(Db2PhpEntity::JDBC_TYPE_DATE,10,0,false),
		self::FIELD_F_ATESTADO_MEDICO=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,255,0,false),
		self::FIELD_F_BOLETIM_SANIDADE=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,255,0,false),
		self::FIELD_CARGO_ID=>array(Db2PhpEntity::JDBC_TYPE_INTEGER,10,0,false),
		self::FIELD_TELEFONE=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,18,0,true),
		self::FIELD_SALARIO_BASE=>array(Db2PhpEntity::JDBC_TYPE_DOUBLE,22,0,false),
		self::FIELD_DATA_CADASTRO=>array(Db2PhpEntity::JDBC_TYPE_TIMESTAMP,19,0,false),
		self::FIELD_ESTADO=>array(Db2PhpEntity::JDBC_TYPE_INTEGER,10,0,false));
	private static $DEFAULT_VALUES=array(
		self::FIELD_ID=>null,
		self::FIELD_NOME=>'',
		self::FIELD_SEXO=>'',
		self::FIELD_FOTO=>'',
		self::FIELD_F_DECLARACAO=>'',
		self::FIELD_F_IBAN=>'',
		self::FIELD_F_COPIA_BI=>'',
		self::FIELD_BANCO_ID=>0,
		self::FIELD_IBAN_ESCRITO=>'',
		self::FIELD_N_BI=>'',
		self::FIELD_DATA_VALIDADE=>'',
		self::FIELD_F_ATESTADO_MEDICO=>'',
		self::FIELD_F_BOLETIM_SANIDADE=>'',
		self::FIELD_CARGO_ID=>0,
		self::FIELD_TELEFONE=>null,
		self::FIELD_SALARIO_BASE=>0,
		self::FIELD_DATA_CADASTRO=>'CURRENT_TIMESTAMP',
		self::FIELD_ESTADO=>0);
	private $id;
	private $nome;
	private $sexo;
	private $foto;
	private $fDeclaracao;
	private $fIban;
	private $fCopiaBi;
	private $bancoId;
	private $ibanEscrito;
	private $nBi;
	private $dataValidade;
	private $fAtestadoMedico;
	private $fBoletimSanidade;
	private $cargoId;
	private $telefone;
	private $salarioBase;
	private $dataCadastro;
	private $estado;

	/**
	 * set value for id 
	 *
	 * type:INT,size:10,default:null,primary,unique,autoincrement
	 *
	 * @param mixed $id
	 * @return Funcionario
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
	 * @return Funcionario
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
	 * @return Funcionario
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
	 * set value for foto 
	 *
	 * type:VARCHAR,size:255,default:null
	 *
	 * @param mixed $foto
	 * @return Funcionario
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
	 * set value for f_declaracao 
	 *
	 * type:VARCHAR,size:255,default:null
	 *
	 * @param mixed $fDeclaracao
	 * @return Funcionario
	 */
	public function &setFDeclaracao($fDeclaracao) {
		$this->notifyChanged(self::FIELD_F_DECLARACAO,$this->fDeclaracao,$fDeclaracao);
		$this->fDeclaracao=$fDeclaracao;
		return $this;
	}

	/**
	 * get value for f_declaracao 
	 *
	 * type:VARCHAR,size:255,default:null
	 *
	 * @return mixed
	 */
	public function getFDeclaracao() {
		return $this->fDeclaracao;
	}

	/**
	 * set value for f_iban 
	 *
	 * type:VARCHAR,size:255,default:null
	 *
	 * @param mixed $fIban
	 * @return Funcionario
	 */
	public function &setFIban($fIban) {
		$this->notifyChanged(self::FIELD_F_IBAN,$this->fIban,$fIban);
		$this->fIban=$fIban;
		return $this;
	}

	/**
	 * get value for f_iban 
	 *
	 * type:VARCHAR,size:255,default:null
	 *
	 * @return mixed
	 */
	public function getFIban() {
		return $this->fIban;
	}

	/**
	 * set value for f_copia_bi 
	 *
	 * type:VARCHAR,size:255,default:null
	 *
	 * @param mixed $fCopiaBi
	 * @return Funcionario
	 */
	public function &setFCopiaBi($fCopiaBi) {
		$this->notifyChanged(self::FIELD_F_COPIA_BI,$this->fCopiaBi,$fCopiaBi);
		$this->fCopiaBi=$fCopiaBi;
		return $this;
	}

	/**
	 * get value for f_copia_bi 
	 *
	 * type:VARCHAR,size:255,default:null
	 *
	 * @return mixed
	 */
	public function getFCopiaBi() {
		return $this->fCopiaBi;
	}

	/**
	 * set value for banco_id 
	 *
	 * type:INT,size:10,default:null,index
	 *
	 * @param mixed $bancoId
	 * @return Funcionario
	 */
	public function &setBancoId($bancoId) {
		$this->notifyChanged(self::FIELD_BANCO_ID,$this->bancoId,$bancoId);
		$this->bancoId=$bancoId;
		return $this;
	}

	/**
	 * get value for banco_id 
	 *
	 * type:INT,size:10,default:null,index
	 *
	 * @return mixed
	 */
	public function getBancoId() {
		return $this->bancoId;
	}

	/**
	 * set value for iban_escrito 
	 *
	 * type:VARCHAR,size:30,default:null
	 *
	 * @param mixed $ibanEscrito
	 * @return Funcionario
	 */
	public function &setIbanEscrito($ibanEscrito) {
		$this->notifyChanged(self::FIELD_IBAN_ESCRITO,$this->ibanEscrito,$ibanEscrito);
		$this->ibanEscrito=$ibanEscrito;
		return $this;
	}

	/**
	 * get value for iban_escrito 
	 *
	 * type:VARCHAR,size:30,default:null
	 *
	 * @return mixed
	 */
	public function getIbanEscrito() {
		return $this->ibanEscrito;
	}

	/**
	 * set value for n_bi 
	 *
	 * type:VARCHAR,size:14,default:null
	 *
	 * @param mixed $nBi
	 * @return Funcionario
	 */
	public function &setNBi($nBi) {
		$this->notifyChanged(self::FIELD_N_BI,$this->nBi,$nBi);
		$this->nBi=$nBi;
		return $this;
	}

	/**
	 * get value for n_bi 
	 *
	 * type:VARCHAR,size:14,default:null
	 *
	 * @return mixed
	 */
	public function getNBi() {
		return $this->nBi;
	}

	/**
	 * set value for data_validade 
	 *
	 * type:DATE,size:10,default:null
	 *
	 * @param mixed $dataValidade
	 * @return Funcionario
	 */
	public function &setDataValidade($dataValidade) {
		$this->notifyChanged(self::FIELD_DATA_VALIDADE,$this->dataValidade,$dataValidade);
		$this->dataValidade=$dataValidade;
		return $this;
	}

	/**
	 * get value for data_validade 
	 *
	 * type:DATE,size:10,default:null
	 *
	 * @return mixed
	 */
	public function getDataValidade() {
		return $this->dataValidade;
	}

	/**
	 * set value for f_atestado_medico 
	 *
	 * type:VARCHAR,size:255,default:null
	 *
	 * @param mixed $fAtestadoMedico
	 * @return Funcionario
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
	 * set value for f_boletim_sanidade 
	 *
	 * type:VARCHAR,size:255,default:null
	 *
	 * @param mixed $fBoletimSanidade
	 * @return Funcionario
	 */
	public function &setFBoletimSanidade($fBoletimSanidade) {
		$this->notifyChanged(self::FIELD_F_BOLETIM_SANIDADE,$this->fBoletimSanidade,$fBoletimSanidade);
		$this->fBoletimSanidade=$fBoletimSanidade;
		return $this;
	}

	/**
	 * get value for f_boletim_sanidade 
	 *
	 * type:VARCHAR,size:255,default:null
	 *
	 * @return mixed
	 */
	public function getFBoletimSanidade() {
		return $this->fBoletimSanidade;
	}

	/**
	 * set value for cargo_id 
	 *
	 * type:INT,size:10,default:null,index
	 *
	 * @param mixed $cargoId
	 * @return Funcionario
	 */
	public function &setCargoId($cargoId) {
		$this->notifyChanged(self::FIELD_CARGO_ID,$this->cargoId,$cargoId);
		$this->cargoId=$cargoId;
		return $this;
	}

	/**
	 * get value for cargo_id 
	 *
	 * type:INT,size:10,default:null,index
	 *
	 * @return mixed
	 */
	public function getCargoId() {
		return $this->cargoId;
	}

	/**
	 * set value for telefone 
	 *
	 * type:VARCHAR,size:18,default:null,nullable
	 *
	 * @param mixed $telefone
	 * @return Funcionario
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
	 * set value for salario_base 
	 *
	 * type:DOUBLE,size:22,default:null
	 *
	 * @param mixed $salarioBase
	 * @return Funcionario
	 */
	public function &setSalarioBase($salarioBase) {
		$this->notifyChanged(self::FIELD_SALARIO_BASE,$this->salarioBase,$salarioBase);
		$this->salarioBase=$salarioBase;
		return $this;
	}

	/**
	 * get value for salario_base 
	 *
	 * type:DOUBLE,size:22,default:null
	 *
	 * @return mixed
	 */
	public function getSalarioBase() {
		return $this->salarioBase;
	}

	/**
	 * set value for data_cadastro 
	 *
	 * type:TIMESTAMP,size:19,default:CURRENT_TIMESTAMP
	 *
	 * @param mixed $dataCadastro
	 * @return Funcionario
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
	 * @return Funcionario
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
			self::FIELD_FOTO=>$this->getFoto(),
			self::FIELD_F_DECLARACAO=>$this->getFDeclaracao(),
			self::FIELD_F_IBAN=>$this->getFIban(),
			self::FIELD_F_COPIA_BI=>$this->getFCopiaBi(),
			self::FIELD_BANCO_ID=>$this->getBancoId(),
			self::FIELD_IBAN_ESCRITO=>$this->getIbanEscrito(),
			self::FIELD_N_BI=>$this->getNBi(),
			self::FIELD_DATA_VALIDADE=>$this->getDataValidade(),
			self::FIELD_F_ATESTADO_MEDICO=>$this->getFAtestadoMedico(),
			self::FIELD_F_BOLETIM_SANIDADE=>$this->getFBoletimSanidade(),
			self::FIELD_CARGO_ID=>$this->getCargoId(),
			self::FIELD_TELEFONE=>$this->getTelefone(),
			self::FIELD_SALARIO_BASE=>$this->getSalarioBase(),
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
	 * Match by attributes of passed example instance and return matched rows as an array of Funcionario instances
	 *
	 * @param PDO $db a PDO Database instance
	 * @param Funcionario $example an example instance defining the conditions. All non-null properties will be considered a constraint, null values will be ignored.
	 * @param boolean $and true if conditions should be and'ed, false if they should be or'ed
	 * @param array $sort array of DSC instances
	 * @return Funcionario[]
	 */
	public static function findByExample(PDO $db,Funcionario $example, $and=true, $sort=null) {
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
	 * Will return matched rows as an array of Funcionario instances.
	 *
	 * @param PDO $db a PDO Database instance
	 * @param array $filter array of DFC instances defining the conditions
	 * @param boolean $and true if conditions should be and'ed, false if they should be or'ed
	 * @param array $sort array of DSC instances
	 * @return Funcionario[]
	 */
	public static function findByFilter(PDO $db, $filter, $and=true, $sort=null) {
		if (!($filter instanceof DFCInterface)) {
			$filter=new DFCAggregate($filter, $and);
		}
		$sql='SELECT * FROM `funcionario`'
		. self::buildSqlWhere($filter, $and, false, true)
		. self::buildSqlOrderBy($sort);

		$stmt=self::prepareStatement($db, $sql);
		self::bindValuesForFilter($stmt, $filter);
		return self::fromStatement($stmt);
	}

	/**
	 * Will execute the passed statement and return the result as an array of Funcionario instances
	 *
	 * @param PDOStatement $stmt
	 * @return Funcionario[]
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
	 * returns the result as an array of Funcionario instances without executing the passed statement
	 *
	 * @param PDOStatement $stmt
	 * @return Funcionario[]
	 */
	public static function fromExecutedStatement(PDOStatement $stmt) {
		$resultInstances=array();
		while($result=$stmt->fetch(PDO::FETCH_ASSOC)) {
			$o=new Funcionario();
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
	 * Execute select query and return matched rows as an array of Funcionario instances.
	 *
	 * The query should of course be on the table for this entity class and return all fields.
	 *
	 * @param PDO $db a PDO Database instance
	 * @param string $sql
	 * @return Funcionario[]
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
		$sql='DELETE FROM `funcionario`'
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
		$this->setFoto($result['foto']);
		$this->setFDeclaracao($result['f_declaracao']);
		$this->setFIban($result['f_iban']);
		$this->setFCopiaBi($result['f_copia_bi']);
		$this->setBancoId($result['banco_id']);
		$this->setIbanEscrito($result['iban_escrito']);
		$this->setNBi($result['n_bi']);
		$this->setDataValidade($result['data_validade']);
		$this->setFAtestadoMedico($result['f_atestado_medico']);
		$this->setFBoletimSanidade($result['f_boletim_sanidade']);
		$this->setCargoId($result['cargo_id']);
		$this->setTelefone($result['telefone']);
		$this->setSalarioBase($result['salario_base']);
		$this->setDataCadastro($result['data_cadastro']);
		$this->setEstado($result['estado']);
	}

	/**
	 * Get element instance by it's primary key(s).
	 * Will return null if no row was matched.
	 *
	 * @param PDO $db
	 * @return Funcionario
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
		$o=new Funcionario();
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
		$stmt->bindValue(4,$this->getFoto());
		$stmt->bindValue(5,$this->getFDeclaracao());
		$stmt->bindValue(6,$this->getFIban());
		$stmt->bindValue(7,$this->getFCopiaBi());
		$stmt->bindValue(8,$this->getBancoId());
		$stmt->bindValue(9,$this->getIbanEscrito());
		$stmt->bindValue(10,$this->getNBi());
		$stmt->bindValue(11,$this->getDataValidade());
		$stmt->bindValue(12,$this->getFAtestadoMedico());
		$stmt->bindValue(13,$this->getFBoletimSanidade());
		$stmt->bindValue(14,$this->getCargoId());
		$stmt->bindValue(15,$this->getTelefone());
		$stmt->bindValue(16,$this->getSalarioBase());
		$stmt->bindValue(17,$this->getDataCadastro());
		$stmt->bindValue(18,$this->getEstado());
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
			$stmt->bindValue(3,$this->getFoto());
			$stmt->bindValue(4,$this->getFDeclaracao());
			$stmt->bindValue(5,$this->getFIban());
			$stmt->bindValue(6,$this->getFCopiaBi());
			$stmt->bindValue(7,$this->getBancoId());
			$stmt->bindValue(8,$this->getIbanEscrito());
			$stmt->bindValue(9,$this->getNBi());
			$stmt->bindValue(10,$this->getDataValidade());
			$stmt->bindValue(11,$this->getFAtestadoMedico());
			$stmt->bindValue(12,$this->getFBoletimSanidade());
			$stmt->bindValue(13,$this->getCargoId());
			$stmt->bindValue(14,$this->getTelefone());
			$stmt->bindValue(15,$this->getSalarioBase());
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
		$stmt->bindValue(19,$this->getId());
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
		return self::hashToDomDocument($this->toHash(), 'Funcionario');
	}

	/**
	 * get single Funcionario instance from a DOMElement
	 *
	 * @param DOMElement $node
	 * @return Funcionario
	 */
	public static function fromDOMElement(DOMElement $node) {
		$o=new Funcionario();
		$o->assignByHash(self::domNodeToHash($node, self::$FIELD_NAMES, self::$DEFAULT_VALUES, self::$FIELD_TYPES));
			$o->notifyPristine();
		return $o;
	}

	/**
	 * get all instances of Funcionario from the passed DOMDocument
	 *
	 * @param DOMDocument $doc
	 * @return Funcionario[]
	 */
	public static function fromDOMDocument(DOMDocument $doc) {
		$instances=array();
		foreach ($doc->getElementsByTagName('Funcionario') as $node) {
			$instances[]=self::fromDOMElement($node);
		}
		return $instances;
	}

}
?>