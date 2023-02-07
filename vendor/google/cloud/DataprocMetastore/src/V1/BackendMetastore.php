<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/metastore/v1/metastore_federation.proto

namespace Google\Cloud\Metastore\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Represents a backend metastore for the federation.
 *
 * Generated from protobuf message <code>google.cloud.metastore.v1.BackendMetastore</code>
 */
class BackendMetastore extends \Google\Protobuf\Internal\Message
{
    /**
     * The relative resource name of the metastore that is being federated.
     * The formats of the relative resource names for the currently supported
     * metastores are listed below:
     * * Dataplex
     *   * `projects/{project_id}/locations/{location}/lakes/{lake_id}`
     * * BigQuery
     *   * `projects/{project_id}`
     * * Dataproc Metastore
     *   * `projects/{project_id}/locations/{location}/services/{service_id}`
     *
     * Generated from protobuf field <code>string name = 1;</code>
     */
    private $name = '';
    /**
     * The type of the backend metastore.
     *
     * Generated from protobuf field <code>.google.cloud.metastore.v1.BackendMetastore.MetastoreType metastore_type = 2;</code>
     */
    private $metastore_type = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $name
     *           The relative resource name of the metastore that is being federated.
     *           The formats of the relative resource names for the currently supported
     *           metastores are listed below:
     *           * Dataplex
     *             * `projects/{project_id}/locations/{location}/lakes/{lake_id}`
     *           * BigQuery
     *             * `projects/{project_id}`
     *           * Dataproc Metastore
     *             * `projects/{project_id}/locations/{location}/services/{service_id}`
     *     @type int $metastore_type
     *           The type of the backend metastore.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Metastore\V1\MetastoreFederation::initOnce();
        parent::__construct($data);
    }

    /**
     * The relative resource name of the metastore that is being federated.
     * The formats of the relative resource names for the currently supported
     * metastores are listed below:
     * * Dataplex
     *   * `projects/{project_id}/locations/{location}/lakes/{lake_id}`
     * * BigQuery
     *   * `projects/{project_id}`
     * * Dataproc Metastore
     *   * `projects/{project_id}/locations/{location}/services/{service_id}`
     *
     * Generated from protobuf field <code>string name = 1;</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * The relative resource name of the metastore that is being federated.
     * The formats of the relative resource names for the currently supported
     * metastores are listed below:
     * * Dataplex
     *   * `projects/{project_id}/locations/{location}/lakes/{lake_id}`
     * * BigQuery
     *   * `projects/{project_id}`
     * * Dataproc Metastore
     *   * `projects/{project_id}/locations/{location}/services/{service_id}`
     *
     * Generated from protobuf field <code>string name = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, True);
        $this->name = $var;

        return $this;
    }

    /**
     * The type of the backend metastore.
     *
     * Generated from protobuf field <code>.google.cloud.metastore.v1.BackendMetastore.MetastoreType metastore_type = 2;</code>
     * @return int
     */
    public function getMetastoreType()
    {
        return $this->metastore_type;
    }

    /**
     * The type of the backend metastore.
     *
     * Generated from protobuf field <code>.google.cloud.metastore.v1.BackendMetastore.MetastoreType metastore_type = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setMetastoreType($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\Metastore\V1\BackendMetastore\MetastoreType::class);
        $this->metastore_type = $var;

        return $this;
    }

}

