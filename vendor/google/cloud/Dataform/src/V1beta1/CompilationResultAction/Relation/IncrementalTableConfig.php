<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/dataform/v1beta1/dataform.proto

namespace Google\Cloud\Dataform\V1beta1\CompilationResultAction\Relation;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Contains settings for relations of type `INCREMENTAL_TABLE`.
 *
 * Generated from protobuf message <code>google.cloud.dataform.v1beta1.CompilationResultAction.Relation.IncrementalTableConfig</code>
 */
class IncrementalTableConfig extends \Google\Protobuf\Internal\Message
{
    /**
     * The SELECT query which returns rows which should be inserted into the
     * relation if it already exists and is not being refreshed.
     *
     * Generated from protobuf field <code>string incremental_select_query = 1;</code>
     */
    private $incremental_select_query = '';
    /**
     * Whether this table should be protected from being refreshed.
     *
     * Generated from protobuf field <code>bool refresh_disabled = 2;</code>
     */
    private $refresh_disabled = false;
    /**
     * A set of columns or SQL expressions used to define row uniqueness.
     * If any duplicates are discovered (as defined by `unique_key_parts`),
     * only the newly selected rows (as defined by `incremental_select_query`)
     * will be included in the relation.
     *
     * Generated from protobuf field <code>repeated string unique_key_parts = 3;</code>
     */
    private $unique_key_parts;
    /**
     * A SQL expression conditional used to limit the set of existing rows
     * considered for a merge operation (see `unique_key_parts` for more
     * information).
     *
     * Generated from protobuf field <code>string update_partition_filter = 4;</code>
     */
    private $update_partition_filter = '';
    /**
     * SQL statements to be executed before inserting new rows into the
     * relation.
     *
     * Generated from protobuf field <code>repeated string incremental_pre_operations = 5;</code>
     */
    private $incremental_pre_operations;
    /**
     * SQL statements to be executed after inserting new rows into the
     * relation.
     *
     * Generated from protobuf field <code>repeated string incremental_post_operations = 6;</code>
     */
    private $incremental_post_operations;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $incremental_select_query
     *           The SELECT query which returns rows which should be inserted into the
     *           relation if it already exists and is not being refreshed.
     *     @type bool $refresh_disabled
     *           Whether this table should be protected from being refreshed.
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $unique_key_parts
     *           A set of columns or SQL expressions used to define row uniqueness.
     *           If any duplicates are discovered (as defined by `unique_key_parts`),
     *           only the newly selected rows (as defined by `incremental_select_query`)
     *           will be included in the relation.
     *     @type string $update_partition_filter
     *           A SQL expression conditional used to limit the set of existing rows
     *           considered for a merge operation (see `unique_key_parts` for more
     *           information).
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $incremental_pre_operations
     *           SQL statements to be executed before inserting new rows into the
     *           relation.
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $incremental_post_operations
     *           SQL statements to be executed after inserting new rows into the
     *           relation.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Dataform\V1Beta1\Dataform::initOnce();
        parent::__construct($data);
    }

    /**
     * The SELECT query which returns rows which should be inserted into the
     * relation if it already exists and is not being refreshed.
     *
     * Generated from protobuf field <code>string incremental_select_query = 1;</code>
     * @return string
     */
    public function getIncrementalSelectQuery()
    {
        return $this->incremental_select_query;
    }

    /**
     * The SELECT query which returns rows which should be inserted into the
     * relation if it already exists and is not being refreshed.
     *
     * Generated from protobuf field <code>string incremental_select_query = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setIncrementalSelectQuery($var)
    {
        GPBUtil::checkString($var, True);
        $this->incremental_select_query = $var;

        return $this;
    }

    /**
     * Whether this table should be protected from being refreshed.
     *
     * Generated from protobuf field <code>bool refresh_disabled = 2;</code>
     * @return bool
     */
    public function getRefreshDisabled()
    {
        return $this->refresh_disabled;
    }

    /**
     * Whether this table should be protected from being refreshed.
     *
     * Generated from protobuf field <code>bool refresh_disabled = 2;</code>
     * @param bool $var
     * @return $this
     */
    public function setRefreshDisabled($var)
    {
        GPBUtil::checkBool($var);
        $this->refresh_disabled = $var;

        return $this;
    }

    /**
     * A set of columns or SQL expressions used to define row uniqueness.
     * If any duplicates are discovered (as defined by `unique_key_parts`),
     * only the newly selected rows (as defined by `incremental_select_query`)
     * will be included in the relation.
     *
     * Generated from protobuf field <code>repeated string unique_key_parts = 3;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getUniqueKeyParts()
    {
        return $this->unique_key_parts;
    }

    /**
     * A set of columns or SQL expressions used to define row uniqueness.
     * If any duplicates are discovered (as defined by `unique_key_parts`),
     * only the newly selected rows (as defined by `incremental_select_query`)
     * will be included in the relation.
     *
     * Generated from protobuf field <code>repeated string unique_key_parts = 3;</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setUniqueKeyParts($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->unique_key_parts = $arr;

        return $this;
    }

    /**
     * A SQL expression conditional used to limit the set of existing rows
     * considered for a merge operation (see `unique_key_parts` for more
     * information).
     *
     * Generated from protobuf field <code>string update_partition_filter = 4;</code>
     * @return string
     */
    public function getUpdatePartitionFilter()
    {
        return $this->update_partition_filter;
    }

    /**
     * A SQL expression conditional used to limit the set of existing rows
     * considered for a merge operation (see `unique_key_parts` for more
     * information).
     *
     * Generated from protobuf field <code>string update_partition_filter = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setUpdatePartitionFilter($var)
    {
        GPBUtil::checkString($var, True);
        $this->update_partition_filter = $var;

        return $this;
    }

    /**
     * SQL statements to be executed before inserting new rows into the
     * relation.
     *
     * Generated from protobuf field <code>repeated string incremental_pre_operations = 5;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getIncrementalPreOperations()
    {
        return $this->incremental_pre_operations;
    }

    /**
     * SQL statements to be executed before inserting new rows into the
     * relation.
     *
     * Generated from protobuf field <code>repeated string incremental_pre_operations = 5;</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setIncrementalPreOperations($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->incremental_pre_operations = $arr;

        return $this;
    }

    /**
     * SQL statements to be executed after inserting new rows into the
     * relation.
     *
     * Generated from protobuf field <code>repeated string incremental_post_operations = 6;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getIncrementalPostOperations()
    {
        return $this->incremental_post_operations;
    }

    /**
     * SQL statements to be executed after inserting new rows into the
     * relation.
     *
     * Generated from protobuf field <code>repeated string incremental_post_operations = 6;</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setIncrementalPostOperations($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->incremental_post_operations = $arr;

        return $this;
    }

}

