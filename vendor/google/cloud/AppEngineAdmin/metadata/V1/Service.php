<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/appengine/v1/service.proto

namespace GPBMetadata\Google\Appengine\V1;

class Service
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Appengine\V1\NetworkSettings::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
!google/appengine/v1/service.protogoogle.appengine.v1"�
Service
name (	

id (	0
split (2!.google.appengine.v1.TrafficSplit8
labels (2(.google.appengine.v1.Service.LabelsEntry>
network_settings (2$.google.appengine.v1.NetworkSettings-
LabelsEntry
key (	
value (	:8"�
TrafficSplit;
shard_by (2).google.appengine.v1.TrafficSplit.ShardByG
allocations (22.google.appengine.v1.TrafficSplit.AllocationsEntry2
AllocationsEntry
key (	
value (:8":
ShardBy
UNSPECIFIED 

COOKIE
IP

RANDOMB�
com.google.appengine.v1BServiceProtoPZ<google.golang.org/genproto/googleapis/appengine/v1;appengine�Google.Cloud.AppEngine.V1�Google\\Cloud\\AppEngine\\V1�Google::Cloud::AppEngine::V1bproto3'
        , true);

        static::$is_initialized = true;
    }
}

