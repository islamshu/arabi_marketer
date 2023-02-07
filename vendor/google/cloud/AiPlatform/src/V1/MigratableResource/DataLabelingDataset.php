<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/aiplatform/v1/migratable_resource.proto

namespace Google\Cloud\AIPlatform\V1\MigratableResource;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Represents one Dataset in datalabeling.googleapis.com.
 *
 * Generated from protobuf message <code>google.cloud.aiplatform.v1.MigratableResource.DataLabelingDataset</code>
 */
class DataLabelingDataset extends \Google\Protobuf\Internal\Message
{
    /**
     * Full resource name of data labeling Dataset.
     * Format:
     * `projects/{project}/datasets/{dataset}`.
     *
     * Generated from protobuf field <code>string dataset = 1 [(.google.api.resource_reference) = {</code>
     */
    private $dataset = '';
    /**
     * The Dataset's display name in datalabeling.googleapis.com.
     *
     * Generated from protobuf field <code>string dataset_display_name = 4;</code>
     */
    private $dataset_display_name = '';
    /**
     * The migratable AnnotatedDataset in datalabeling.googleapis.com belongs to
     * the data labeling Dataset.
     *
     * Generated from protobuf field <code>repeated .google.cloud.aiplatform.v1.MigratableResource.DataLabelingDataset.DataLabelingAnnotatedDataset data_labeling_annotated_datasets = 3;</code>
     */
    private $data_labeling_annotated_datasets;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $dataset
     *           Full resource name of data labeling Dataset.
     *           Format:
     *           `projects/{project}/datasets/{dataset}`.
     *     @type string $dataset_display_name
     *           The Dataset's display name in datalabeling.googleapis.com.
     *     @type array<\Google\Cloud\AIPlatform\V1\MigratableResource\DataLabelingDataset\DataLabelingAnnotatedDataset>|\Google\Protobuf\Internal\RepeatedField $data_labeling_annotated_datasets
     *           The migratable AnnotatedDataset in datalabeling.googleapis.com belongs to
     *           the data labeling Dataset.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Aiplatform\V1\MigratableResource::initOnce();
        parent::__construct($data);
    }

    /**
     * Full resource name of data labeling Dataset.
     * Format:
     * `projects/{project}/datasets/{dataset}`.
     *
     * Generated from protobuf field <code>string dataset = 1 [(.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getDataset()
    {
        return $this->dataset;
    }

    /**
     * Full resource name of data labeling Dataset.
     * Format:
     * `projects/{project}/datasets/{dataset}`.
     *
     * Generated from protobuf field <code>string dataset = 1 [(.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setDataset($var)
    {
        GPBUtil::checkString($var, True);
        $this->dataset = $var;

        return $this;
    }

    /**
     * The Dataset's display name in datalabeling.googleapis.com.
     *
     * Generated from protobuf field <code>string dataset_display_name = 4;</code>
     * @return string
     */
    public function getDatasetDisplayName()
    {
        return $this->dataset_display_name;
    }

    /**
     * The Dataset's display name in datalabeling.googleapis.com.
     *
     * Generated from protobuf field <code>string dataset_display_name = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setDatasetDisplayName($var)
    {
        GPBUtil::checkString($var, True);
        $this->dataset_display_name = $var;

        return $this;
    }

    /**
     * The migratable AnnotatedDataset in datalabeling.googleapis.com belongs to
     * the data labeling Dataset.
     *
     * Generated from protobuf field <code>repeated .google.cloud.aiplatform.v1.MigratableResource.DataLabelingDataset.DataLabelingAnnotatedDataset data_labeling_annotated_datasets = 3;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getDataLabelingAnnotatedDatasets()
    {
        return $this->data_labeling_annotated_datasets;
    }

    /**
     * The migratable AnnotatedDataset in datalabeling.googleapis.com belongs to
     * the data labeling Dataset.
     *
     * Generated from protobuf field <code>repeated .google.cloud.aiplatform.v1.MigratableResource.DataLabelingDataset.DataLabelingAnnotatedDataset data_labeling_annotated_datasets = 3;</code>
     * @param array<\Google\Cloud\AIPlatform\V1\MigratableResource\DataLabelingDataset\DataLabelingAnnotatedDataset>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setDataLabelingAnnotatedDatasets($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\AIPlatform\V1\MigratableResource\DataLabelingDataset\DataLabelingAnnotatedDataset::class);
        $this->data_labeling_annotated_datasets = $arr;

        return $this;
    }

}


