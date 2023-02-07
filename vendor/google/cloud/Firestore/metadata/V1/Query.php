<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/firestore/v1/query.proto

namespace GPBMetadata\Google\Firestore\V1;

class Query
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Firestore\V1\Document::initOnce();
        \GPBMetadata\Google\Protobuf\Wrappers::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
google/firestore/v1/query.protogoogle.firestore.v1"google/firestore/v1/document.protogoogle/protobuf/wrappers.proto"�
StructuredQuery?
select (2/.google.firestore.v1.StructuredQuery.ProjectionE
from (27.google.firestore.v1.StructuredQuery.CollectionSelector:
where (2+.google.firestore.v1.StructuredQuery.Filter<
order_by (2*.google.firestore.v1.StructuredQuery.Order-
start_at (2.google.firestore.v1.Cursor+
end_at (2.google.firestore.v1.Cursor
offset (*
limit (2.google.protobuf.Int32ValueD
CollectionSelector
collection_id (	
all_descendants (�
FilterP
composite_filter (24.google.firestore.v1.StructuredQuery.CompositeFilterH H
field_filter (20.google.firestore.v1.StructuredQuery.FieldFilterH H
unary_filter (20.google.firestore.v1.StructuredQuery.UnaryFilterH B
filter_type�
CompositeFilterI
op (2=.google.firestore.v1.StructuredQuery.CompositeFilter.Operator<
filters (2+.google.firestore.v1.StructuredQuery.Filter"-
Operator
OPERATOR_UNSPECIFIED 
AND�
FieldFilterB
field (23.google.firestore.v1.StructuredQuery.FieldReferenceE
op (29.google.firestore.v1.StructuredQuery.FieldFilter.Operator)
value (2.google.firestore.v1.Value"�
Operator
OPERATOR_UNSPECIFIED 
	LESS_THAN
LESS_THAN_OR_EQUAL
GREATER_THAN
GREATER_THAN_OR_EQUAL	
EQUAL
	NOT_EQUAL
ARRAY_CONTAINS
IN
ARRAY_CONTAINS_ANY	

NOT_IN
�
UnaryFilterE
op (29.google.firestore.v1.StructuredQuery.UnaryFilter.OperatorD
field (23.google.firestore.v1.StructuredQuery.FieldReferenceH "^
Operator
OPERATOR_UNSPECIFIED 

IS_NAN
IS_NULL

IS_NOT_NAN
IS_NOT_NULLB
operand_type�
OrderB
field (23.google.firestore.v1.StructuredQuery.FieldReferenceA
	direction (2..google.firestore.v1.StructuredQuery.Direction$
FieldReference

field_path (	Q

ProjectionC
fields (23.google.firestore.v1.StructuredQuery.FieldReference"E
	Direction
DIRECTION_UNSPECIFIED 
	ASCENDING

DESCENDING"�
StructuredAggregationQuery@
structured_query (2$.google.firestore.v1.StructuredQueryH V
aggregations (2;.google.firestore.v1.StructuredAggregationQuery.AggregationB�A�
AggregationR
count (2A.google.firestore.v1.StructuredAggregationQuery.Aggregation.CountH 
alias (	B�A8
Count/
up_to (2.google.protobuf.Int64ValueB�AB

operatorB

query_type"D
Cursor*
values (2.google.firestore.v1.Value
before (B�
com.google.firestore.v1B
QueryProtoPZ<google.golang.org/genproto/googleapis/firestore/v1;firestore�GCFS�Google.Cloud.Firestore.V1�Google\\Cloud\\Firestore\\V1�Google::Cloud::Firestore::V1bproto3'
        , true);

        static::$is_initialized = true;
    }
}

