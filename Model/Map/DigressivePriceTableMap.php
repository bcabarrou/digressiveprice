<?php

namespace DigressivePrice\Model\Map;

use DigressivePrice\Model\DigressivePrice;
use DigressivePrice\Model\DigressivePriceQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'digressive_price' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class DigressivePriceTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;
    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DigressivePrice.Model.Map.DigressivePriceTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'thelia';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'digressive_price';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\DigressivePrice\\Model\\DigressivePrice';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'DigressivePrice.Model.DigressivePrice';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 7;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 7;

    /**
     * the column name for the ID field
     */
    const ID = 'digressive_price.ID';

    /**
     * the column name for the PRODUCT_ID field
     */
    const PRODUCT_ID = 'digressive_price.PRODUCT_ID';

    /**
     * the column name for the PRODUCT_SALE_ELEMENTS_ID field
     */
    const PRODUCT_SALE_ELEMENTS_ID = 'digressive_price.PRODUCT_SALE_ELEMENTS_ID';

    /**
     * the column name for the PRICE field
     */
    const PRICE = 'digressive_price.PRICE';

    /**
     * the column name for the PROMO_PRICE field
     */
    const PROMO_PRICE = 'digressive_price.PROMO_PRICE';

    /**
     * the column name for the QUANTITY_FROM field
     */
    const QUANTITY_FROM = 'digressive_price.QUANTITY_FROM';

    /**
     * the column name for the QUANTITY_TO field
     */
    const QUANTITY_TO = 'digressive_price.QUANTITY_TO';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'ProductId', 'ProductSaleElementsId', 'Price', 'PromoPrice', 'QuantityFrom', 'QuantityTo', ),
        self::TYPE_STUDLYPHPNAME => array('id', 'productId', 'productSaleElementsId', 'price', 'promoPrice', 'quantityFrom', 'quantityTo', ),
        self::TYPE_COLNAME       => array(DigressivePriceTableMap::ID, DigressivePriceTableMap::PRODUCT_ID, DigressivePriceTableMap::PRODUCT_SALE_ELEMENTS_ID, DigressivePriceTableMap::PRICE, DigressivePriceTableMap::PROMO_PRICE, DigressivePriceTableMap::QUANTITY_FROM, DigressivePriceTableMap::QUANTITY_TO, ),
        self::TYPE_RAW_COLNAME   => array('ID', 'PRODUCT_ID', 'PRODUCT_SALE_ELEMENTS_ID', 'PRICE', 'PROMO_PRICE', 'QUANTITY_FROM', 'QUANTITY_TO', ),
        self::TYPE_FIELDNAME     => array('id', 'product_id', 'product_sale_elements_id', 'price', 'promo_price', 'quantity_from', 'quantity_to', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'ProductId' => 1, 'ProductSaleElementsId' => 2, 'Price' => 3, 'PromoPrice' => 4, 'QuantityFrom' => 5, 'QuantityTo' => 6, ),
        self::TYPE_STUDLYPHPNAME => array('id' => 0, 'productId' => 1, 'productSaleElementsId' => 2, 'price' => 3, 'promoPrice' => 4, 'quantityFrom' => 5, 'quantityTo' => 6, ),
        self::TYPE_COLNAME       => array(DigressivePriceTableMap::ID => 0, DigressivePriceTableMap::PRODUCT_ID => 1, DigressivePriceTableMap::PRODUCT_SALE_ELEMENTS_ID => 2, DigressivePriceTableMap::PRICE => 3, DigressivePriceTableMap::PROMO_PRICE => 4, DigressivePriceTableMap::QUANTITY_FROM => 5, DigressivePriceTableMap::QUANTITY_TO => 6, ),
        self::TYPE_RAW_COLNAME   => array('ID' => 0, 'PRODUCT_ID' => 1, 'PRODUCT_SALE_ELEMENTS_ID' => 2, 'PRICE' => 3, 'PROMO_PRICE' => 4, 'QUANTITY_FROM' => 5, 'QUANTITY_TO' => 6, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'product_id' => 1, 'product_sale_elements_id' => 2, 'price' => 3, 'promo_price' => 4, 'quantity_from' => 5, 'quantity_to' => 6, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('digressive_price');
        $this->setPhpName('DigressivePrice');
        $this->setClassName('\\DigressivePrice\\Model\\DigressivePrice');
        $this->setPackage('DigressivePrice.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('PRODUCT_ID', 'ProductId', 'INTEGER', 'product', 'ID', true, null, null);
        $this->addForeignKey('PRODUCT_SALE_ELEMENTS_ID', 'ProductSaleElementsId', 'INTEGER', 'product_sale_elements', 'ID', false, null, null);
        $this->addColumn('PRICE', 'Price', 'FLOAT', true, null, null);
        $this->addColumn('PROMO_PRICE', 'PromoPrice', 'FLOAT', true, null, null);
        $this->addColumn('QUANTITY_FROM', 'QuantityFrom', 'INTEGER', true, null, null);
        $this->addColumn('QUANTITY_TO', 'QuantityTo', 'INTEGER', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Product', '\\DigressivePrice\\Model\\Thelia\\Model\\Product', RelationMap::MANY_TO_ONE, array('product_id' => 'id', ), null, null);
        $this->addRelation('ProductSaleElements', '\\DigressivePrice\\Model\\Thelia\\Model\\ProductSaleElements', RelationMap::MANY_TO_ONE, array('product_sale_elements_id' => 'id', ), null, null);
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_STUDLYPHPNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_STUDLYPHPNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {

            return (int) $row[
                            $indexType == TableMap::TYPE_NUM
                            ? 0 + $offset
                            : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
                        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? DigressivePriceTableMap::CLASS_DEFAULT : DigressivePriceTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_STUDLYPHPNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     * @return array (DigressivePrice object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = DigressivePriceTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = DigressivePriceTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + DigressivePriceTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = DigressivePriceTableMap::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            DigressivePriceTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = DigressivePriceTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = DigressivePriceTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                DigressivePriceTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(DigressivePriceTableMap::ID);
            $criteria->addSelectColumn(DigressivePriceTableMap::PRODUCT_ID);
            $criteria->addSelectColumn(DigressivePriceTableMap::PRODUCT_SALE_ELEMENTS_ID);
            $criteria->addSelectColumn(DigressivePriceTableMap::PRICE);
            $criteria->addSelectColumn(DigressivePriceTableMap::PROMO_PRICE);
            $criteria->addSelectColumn(DigressivePriceTableMap::QUANTITY_FROM);
            $criteria->addSelectColumn(DigressivePriceTableMap::QUANTITY_TO);
        } else {
            $criteria->addSelectColumn($alias . '.ID');
            $criteria->addSelectColumn($alias . '.PRODUCT_ID');
            $criteria->addSelectColumn($alias . '.PRODUCT_SALE_ELEMENTS_ID');
            $criteria->addSelectColumn($alias . '.PRICE');
            $criteria->addSelectColumn($alias . '.PROMO_PRICE');
            $criteria->addSelectColumn($alias . '.QUANTITY_FROM');
            $criteria->addSelectColumn($alias . '.QUANTITY_TO');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(DigressivePriceTableMap::DATABASE_NAME)->getTable(DigressivePriceTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getServiceContainer()->getDatabaseMap(DigressivePriceTableMap::DATABASE_NAME);
      if (!$dbMap->hasTable(DigressivePriceTableMap::TABLE_NAME)) {
        $dbMap->addTableObject(new DigressivePriceTableMap());
      }
    }

    /**
     * Performs a DELETE on the database, given a DigressivePrice or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or DigressivePrice object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DigressivePriceTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \DigressivePrice\Model\DigressivePrice) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(DigressivePriceTableMap::DATABASE_NAME);
            $criteria->add(DigressivePriceTableMap::ID, (array) $values, Criteria::IN);
        }

        $query = DigressivePriceQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) { DigressivePriceTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) { DigressivePriceTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the digressive_price table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return DigressivePriceQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a DigressivePrice or Criteria object.
     *
     * @param mixed               $criteria Criteria or DigressivePrice object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DigressivePriceTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from DigressivePrice object
        }

        if ($criteria->containsKey(DigressivePriceTableMap::ID) && $criteria->keyContainsValue(DigressivePriceTableMap::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.DigressivePriceTableMap::ID.')');
        }


        // Set the correct dbName
        $query = DigressivePriceQuery::create()->mergeWith($criteria);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = $query->doInsert($con);
            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

} // DigressivePriceTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
DigressivePriceTableMap::buildTableMap();
