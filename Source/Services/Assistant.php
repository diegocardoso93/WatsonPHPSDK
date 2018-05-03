<?php
/**
 * Copyright 2017 IBM Corp. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace WatsonSDK\Services;

use WatsonSDK\Common\HttpResponse;
use WatsonSDK\Common\HttpClientConfiguration;
use WatsonSDK\Common\WatsonService;
use WatsonSDK\Common\InvalidParameterException;

use WatsonSDK\Services\Assistant\MessageRequestModel;
use WatsonSDK\Services\Assistant\UpdateIntentModel;
use WatsonSDK\Services\Assistant\CreateIntentModel;
use WatsonSDK\Services\Assistant\CreateWorkspaceModel;
use WatsonSDK\Services\Assistant\UpdateWorkspaceModel;
use WatsonSDK\Services\Assistant\CreateExampleModel;
use WatsonSDK\Services\Assistant\UpdateExampleModel;
use WatsonSDK\Services\Assistant\CreateEntityModel;
use WatsonSDK\Services\Assistant\UpdateEntityModel;
use WatsonSDK\Services\Assistant\CreateValueModel;
use WatsonSDK\Services\Assistant\UpdateValueModel;
use WatsonSDK\Services\Assistant\CreateCounterexampleModel;
use WatsonSDK\Services\Assistant\UpdateCounterexampleModel;
use WatsonSDK\Services\Assistant\CreateDialogNodeModel;
use WatsonSDK\Services\Assistant\UpdateDialogNodeModel;
use WatsonSDK\Services\Assistant\CreateSynonymModel;
use WatsonSDK\Services\Assistant\UpdateSynonymModel;

/**
 * Assistant class
 */
class Assistant extends WatsonService {

    const BASE_URL = 'https://gateway.watsonplatform.net/assistant/api/v1';
    const VERSION = '2018-02-16';

    /**
     * Send message to Assistant service by using the MessageRequestModel instance
     * 
     * @param MessageRequestModel $model
     * @param $workspace_id string
     * @param $version string
     * @return HttpResponse
     */
    public function sendMessageByModel(MessageRequestModel $model, $workspace_id, $version = self::VERSION) {

        $config = $this->initConfig();
        $config->addHeaders($model->getData('header'));

        $config->setData($model->getData());

        $config->setQuery( [ 'version' => $version ] );
        $config->setMethod(HttpClientConfiguration::METHOD_POST);
        $config->setType(HttpClientConfiguration::DATA_TYPE_JSON);
        $config->setURL(self::BASE_URL."/workspaces/{$workspace_id}/message");

        return $this->sendRequest($config);
    }

    /**
     * Send text message to Assistant service
     * 
     * @param $message string
     * @param $workspace_id string
     * @return HttpResponse
     */
    public function sendMessageByText($message, $workspace_id, $version = self::VERSION) {

        $model = new MessageRequestModel($message);
        return $this->sendMessageByModel($model, $workspace_id, $version);
    }

    /**
     * Send message to Assistant service
     * 
     * @param $val MessageRequestModel | string
     * @param $workspace_id string
     * @return HttpResponse
     */
    public function sendMessage($val, $workspace_id, $version = self::VERSION) {

        if($val instanceof MessageRequestModel) {
            return $this->sendMessageByModel($val, $workspace_id, $version);
        }
        if(is_string($val)) {
            return $this->sendMessageByText($val, $workspace_id, $version);
        }

        throw new InvalidParameterException();
    }

    
    /**
     * List the workspaces associated with a Assistant service instance.
     * 
     * @return HttpResponse
     */
    public function listWorkspaces($page_limit = NULL, $include_count = NULL, $sort = NULL, $cursor = NULL, $version = self::VERSION) {

        $config = $this->initConfig();

        $config->setQuery([ 'version' => $version ]);

        if(is_null($page_limit) === FALSE && is_integer($page_limit)) {
            $config->addQuery('page_limit', $page_limit);
        }

        if(is_null($include_count) === FALSE) {
            $config->addQuery('include_count', $include_count);
        }

        if(is_null($sort) === FALSE) {
            $config->addQuery('sort', $sort);
        }

        if(is_null($cursor) === FALSE) {
            $config->addQuery('cursor', $cursor);
        }

        $config->setMethod(HttpClientConfiguration::METHOD_GET);
        $config->setType(HttpClientConfiguration::DATA_TYPE_JSON);
        $config->setURL(self::BASE_URL."/workspaces");

        return $this->sendRequest($config);
    }

    /**
     * Get workspace associated with a Assistant service instance.
     *
     * @param $workspace_id string
     * @return HttpResponse
     */
    public function getWorkspace($workspace_id, $export = NULL, $include_audit = NULL, $version = self::VERSION) {
        
        $config = $this->initConfig();
        
        $config->setQuery([ 'version' => $version ]);
        
        if(is_null($export) === FALSE) {
            $config->addQuery('export', $export);
        }
        if(is_null($include_audit) === FALSE) {
            $config->addQuery('include_audit', $include_audit);
        }
        
        $config->setMethod(HttpClientConfiguration::METHOD_GET);
        $config->setType(HttpClientConfiguration::DATA_TYPE_JSON);
        $config->setURL(self::BASE_URL."/workspaces/".$workspace_id);
        
        return $this->sendRequest($config);
    }
    
    /**
     * Create a workspace associated with a Assistant service instance.
     * 
     * @param $workspace CreateWorkspaceModel
     * @return HttpResponse
     */
    public function createWorkspace($workspace, $version = self::VERSION) {
        
        if($workspace instanceof CreateWorkspaceModel) {
            $model = $workspace;
        } else {
            throw new InvalidParameterException();
        }
        
        $config = $this->initConfig();
        $config->addHeaders($model->getData('header'));
        
        $config->setData($model->getData());
        
        $config->setQuery( [ 'version' => $version ] );
        $config->setMethod(HttpClientConfiguration::METHOD_POST);
        $config->setType(HttpClientConfiguration::DATA_TYPE_JSON);
        $config->setURL(self::BASE_URL."/workspaces");

        return $this->sendRequest($config);
    }
    
    /**
     * Update a workspace associated with a Assistant service instance.
     *
     * @param $workspace UpdateWorkspaceModel
     * @return HttpResponse
     */
    public function updateWorkspace($workspace, $version = self::VERSION) {
        if($workspace instanceof UpdateWorkspaceModel) {
            $model = $workspace;
        } else {
            throw new InvalidParameterException();
        }
        
        $config = $this->initConfig();
        $config->addHeaders($model->getData('header'));
        
        $config->setData($model->getData());
        
        $config->setQuery( [ 'version' => $version ] );
        $config->setMethod(HttpClientConfiguration::METHOD_POST);
        $config->setType(HttpClientConfiguration::DATA_TYPE_JSON);
        $config->setURL(self::BASE_URL."/workspaces/".$model->getWorkspaceId());

        return $this->sendRequest($config);
    }
    
    /**
     * Delete workspace associated with a Assistant service instance.
     *
     * @param $workspace_id string
     * @return HttpResponse
     */
    public function deleteWorkspace($workspace_id, $version = self::VERSION) {
        
        $config = $this->initConfig();
        
        $config->setQuery([ 'version' => $version ]);
        
        $config->setMethod(HttpClientConfiguration::METHOD_DELETE);
        $config->setType(HttpClientConfiguration::DATA_TYPE_JSON);
        $config->setURL(self::BASE_URL."/workspaces/".$workspace_id);
        
        return $this->sendRequest($config);
    }

    
    /**
     * List the intents associated with a Workspace.
     *
     * @param $workspace_id string
     * @return HttpResponse
     */
    public function listIntents($workspace_id, $export = NULL, $page_limit = NULL, $include_count = NULL, $sort = NULL, $cursor = NULL, $include_audit = true, $version = self::VERSION) {
        
        $config = $this->initConfig();
        
        $config->setQuery([ 'version' => $version ]);
        
        if(is_null($export) === FALSE && is_integer($export)) {
            $config->addQuery('export', $export);
        }
        if(is_null($page_limit) === FALSE && is_integer($page_limit)) {
            $config->addQuery('page_limit', $page_limit);
        }
        if(is_null($include_count) === FALSE) {
            $config->addQuery('include_count', $include_count);
        }
        if(is_null($sort) === FALSE) {
            $config->addQuery('sort', $sort);
        }
        if(is_null($cursor) === FALSE) {
            $config->addQuery('cursor', $cursor);
        }
        if(is_null($include_audit) === FALSE) {
            $config->addQuery('include_audit', $include_audit);
        }
        
        $config->setMethod(HttpClientConfiguration::METHOD_GET);
        $config->setType(HttpClientConfiguration::DATA_TYPE_JSON);
        $config->setURL(self::BASE_URL."/workspaces/".$workspace_id."/intents");
        
        return $this->sendRequest($config);
    }
    
    /**
     * Get intent associated with a workspace.
     *
     * @param $workspace_id string
     * @param $intent string
     * @return HttpResponse
     */
    public function getIntent($workspace_id, $intent, $export = NULL, $include_audit = NULL, $version = self::VERSION) {
        
        $config = $this->initConfig();
        
        $config->setQuery([ 'version' => $version ]);
        
        if(is_null($export) === FALSE) {
            $config->addQuery('export', $export);
        }
        if(is_null($include_audit) === FALSE) {
            $config->addQuery('include_audit', $include_audit);
        }
        
        $config->setMethod(HttpClientConfiguration::METHOD_GET);
        $config->setType(HttpClientConfiguration::DATA_TYPE_JSON);
        $config->setURL(self::BASE_URL."/workspaces/".$workspace_id."/intents/".$intent);
        
        return $this->sendRequest($config);
    }

    /**
     * Create intent associated with a workspace.
     *
     * @param $intent CreateIntentModel
     * @return HttpResponse
     */
    public function createIntent($intent, $version = self::VERSION) {
        
        if($intent instanceof CreateIntentModel) {
            $model = $intent;
        } else {
            throw new InvalidParameterException();
        }
        
        $config = $this->initConfig();
        $config->addHeaders($model->getData('header'));
        
        $config->setData($model->getData());
        
        $config->setQuery( [ 'version' => $version ] );
        $config->setMethod(HttpClientConfiguration::METHOD_POST);
        $config->setType(HttpClientConfiguration::DATA_TYPE_JSON);
        
        $config->setURL(self::BASE_URL."/workspaces/".$model->getWorkspaceId()."/intents");
        
        return $this->sendRequest($config);
    }

    /**
     * Update a intent associated with a workspace.
     *
     * @param $intent UpdateIntentModel
     * @return HttpResponse
     */
    public function updateIntent($intent, $version = self::VERSION) {
        
        if($intent instanceof UpdateIntentModel) {
            $model = $intent;
        } else {
            throw new InvalidParameterException();
        }
        
        $config = $this->initConfig();
        $config->addHeaders($model->getData('header'));
        
        $config->setData($model->getData());
        
        $config->setQuery( [ 'version' => $version ] );
        $config->setMethod(HttpClientConfiguration::METHOD_POST);
        $config->setType(HttpClientConfiguration::DATA_TYPE_JSON);
        $config->setURL(self::BASE_URL."/workspaces/".$model->getWorkspaceId()."/intents/".$model->getIntent());

        return $this->sendRequest($config);
    }

    /**
     * Delete intent associated with a workspace.
     *
     * @param $workspace_id string
     * @param $intent string
     * @return HttpResponse
     */
    public function deleteIntent($workspace_id, $intent, $version = self::VERSION) {
        
        $config = $this->initConfig();
        
        $config->setQuery([ 'version' => $version ]);
        
        $config->setMethod(HttpClientConfiguration::METHOD_DELETE);
        $config->setType(HttpClientConfiguration::DATA_TYPE_JSON);
        $config->setURL(self::BASE_URL."/workspaces/".$workspace_id."/intents/".$intent);
        
        return $this->sendRequest($config);
    }
    
    
    /**
     * List the examples associated with a intent.
     *
     * @param $workspace_id string
     * @param $intent string
     * @return HttpResponse
     */
    public function listExamples($workspace_id, $intent, $page_limit = NULL, $include_count = NULL, $sort = NULL, $cursor = NULL, $include_audit = true, $version = self::VERSION) {
        
        $config = $this->initConfig();
        
        $config->setQuery([ 'version' => $version ]);
        
        if(is_null($page_limit) === FALSE && is_integer($page_limit)) {
            $config->addQuery('page_limit', $page_limit);
        }
        if(is_null($include_count) === FALSE) {
            $config->addQuery('include_count', $include_count);
        }
        if(is_null($sort) === FALSE) {
            $config->addQuery('sort', $sort);
        }
        if(is_null($cursor) === FALSE) {
            $config->addQuery('cursor', $cursor);
        }
        if(is_null($include_audit) === FALSE) {
            $config->addQuery('include_audit', $include_audit);
        }
        
        $config->setMethod(HttpClientConfiguration::METHOD_GET);
        $config->setType(HttpClientConfiguration::DATA_TYPE_JSON);
        $config->setURL(self::BASE_URL."/workspaces/".$workspace_id."/intents/".$intent."/examples");
        
        return $this->sendRequest($config);
    }
    
    /**
     * Get example associated with a intent.
     *
     * @param $workspace_id string
     * @param $intent string
     * @return HttpResponse
     */
    public function getExample($workspace_id, $intent, $text, $include_audit = NULL, $version = self::VERSION) {
        
        $config = $this->initConfig();
        
        $config->setQuery([ 'version' => $version ]);
        
        if(is_null($include_audit) === FALSE) {
            $config->addQuery('include_audit', $include_audit);
        }
        
        $config->setMethod(HttpClientConfiguration::METHOD_GET);
        $config->setType(HttpClientConfiguration::DATA_TYPE_JSON);
        $config->setURL(self::BASE_URL."/workspaces/".$workspace_id."/intents/".$intent."/examples/".$text);
        
        return $this->sendRequest($config);
    }
    
    /**
     * Create example associated with a intent.
     *
     * @param $example CreateExampleModel
     * @return HttpResponse
     */
    public function createExample($example, $version = self::VERSION) {
        
        if($example instanceof CreateExampleModel) {
            $model = $example;
        } else {
            throw new InvalidParameterException();
        }
        
        $config = $this->initConfig();
        $config->addHeaders($model->getData('header'));
        
        $config->setData($model->getData());
        
        $config->setQuery( [ 'version' => $version ] );
        $config->setMethod(HttpClientConfiguration::METHOD_POST);
        $config->setType(HttpClientConfiguration::DATA_TYPE_JSON);
        $config->setURL(self::BASE_URL."/workspaces/".$model->getWorkspaceId()."/intents/".$model->getIntent()."/examples");
        
        return $this->sendRequest($config);
    }
    
    /**
     * Update a example associated with a intent.
     *
     * @param $example UpdateExampleModel
     * @return HttpResponse
     */
    public function updateExample($example, $version = self::VERSION) {
        
        if($example instanceof UpdateExampleModel) {
            $model = $example;
        } else {
            throw new InvalidParameterException();
        }
        
        $config = $this->initConfig();
        $config->addHeaders($model->getData('header'));
        
        $config->setData($model->getData());
        
        $config->setQuery( [ 'version' => $version ] );
        $config->setMethod(HttpClientConfiguration::METHOD_POST);
        $config->setType(HttpClientConfiguration::DATA_TYPE_JSON);
        $config->setURL(self::BASE_URL."/workspaces/".$model->getWorkspaceId()."/intents/".$model->getIntent()."/examples/".$model->getText());
        
        return $this->sendRequest($config);
    }
    
    /**
     * Delete example associated with a intent.
     *
     * @param $workspace_id string
     * @param $intent string
     * @return HttpResponse
     */
    public function deleteExample($workspace_id, $intent, $text, $version = self::VERSION) {
        
        $config = $this->initConfig();
        
        $config->setQuery([ 'version' => $version ]);
        
        $config->setMethod(HttpClientConfiguration::METHOD_DELETE);
        $config->setType(HttpClientConfiguration::DATA_TYPE_JSON);
        $config->setURL(self::BASE_URL."/workspaces/".$workspace_id."/intents/".$intent."/examples/".$text);
        
        return $this->sendRequest($config);
    }
    
    
    /**
     * List the entities associated with a Workspace.
     *
     * @param $workspace_id string
     * @return HttpResponse
     */
    public function listEntities($workspace_id, $export = NULL, $page_limit = NULL, $include_count = NULL, $sort = NULL, $cursor = NULL, $include_audit = true, $version = self::VERSION) {
        
        $config = $this->initConfig();
        
        $config->setQuery([ 'version' => $version ]);
        
        if(is_null($export) === FALSE && is_integer($export)) {
            $config->addQuery('export', $export);
        }
        if(is_null($page_limit) === FALSE && is_integer($page_limit)) {
            $config->addQuery('page_limit', $page_limit);
        }
        if(is_null($include_count) === FALSE) {
            $config->addQuery('include_count', $include_count);
        }
        if(is_null($sort) === FALSE) {
            $config->addQuery('sort', $sort);
        }
        if(is_null($cursor) === FALSE) {
            $config->addQuery('cursor', $cursor);
        }
        if(is_null($include_audit) === FALSE) {
            $config->addQuery('include_audit', $include_audit);
        }
        
        $config->setMethod(HttpClientConfiguration::METHOD_GET);
        $config->setType(HttpClientConfiguration::DATA_TYPE_JSON);
        $config->setURL(self::BASE_URL."/workspaces/".$workspace_id."/entities");
        
        return $this->sendRequest($config);
    }
    
    /**
     * Get entity associated with a workspace.
     *
     * @param $workspace_id string
     * @param $entity string
     * @return HttpResponse
     */
    public function getEntity($workspace_id, $entity, $include_audit = NULL, $version = self::VERSION) {
        
        $config = $this->initConfig();
        
        $config->setQuery([ 'version' => $version ]);
        
        if(is_null($include_audit) === FALSE) {
            $config->addQuery('include_audit', $include_audit);
        }
        
        $config->setMethod(HttpClientConfiguration::METHOD_GET);
        $config->setType(HttpClientConfiguration::DATA_TYPE_JSON);
        $config->setURL(self::BASE_URL."/workspaces/".$workspace_id."/entities/".$entity);
        
        return $this->sendRequest($config);
    }
    
    /**
     * Create entity associated with a workspace.
     *
     * @param $entity CreateEntityModel
     * @return HttpResponse
     */
    public function createEntity($entity, $version = self::VERSION) {
        
        if($entity instanceof CreateEntityModel) {
            $model = $entity;
        } else {
            throw new InvalidParameterException();
        }
        
        $config = $this->initConfig();
        $config->addHeaders($model->getData('header'));
        
        $config->setData($model->getData());
        
        $config->setQuery( [ 'version' => $version ] );
        $config->setMethod(HttpClientConfiguration::METHOD_POST);
        $config->setType(HttpClientConfiguration::DATA_TYPE_JSON);
        $config->setURL(self::BASE_URL."/workspaces/".$model->getWorkspaceId()."/entities");
        
        $response = $this->sendRequest($config);
        
        return $response;
    }
    
    /**
     * Update a entity associated with a workspace.
     *
     * @param $example UpdateEntityModel
     * @return HttpResponse
     */
    public function updateEntity($entity, $version = self::VERSION) {
        
        if($entity instanceof UpdateEntityModel) {
            $model = $entity;
        } else {
            throw new InvalidParameterException();
        }
        
        $config = $this->initConfig();
        $config->addHeaders($model->getData('header'));
        
        $config->setData($model->getData());
        
        $config->setQuery( [ 'version' => $version ] );
        $config->setMethod(HttpClientConfiguration::METHOD_POST);
        $config->setType(HttpClientConfiguration::DATA_TYPE_JSON);
        $config->setURL(self::BASE_URL."/workspaces/".$model->getWorkspaceId()."/entities/".$model->getEntity());
        
        return $this->sendRequest($config);
    }
    
    /**
     * Delete entity associated with a workspace.
     *
     * @param $workspace_id string
     * @param $entity string
     * @return HttpResponse
     */
    public function deleteEntity($workspace_id, $entity, $version = self::VERSION) {
        
        $config = $this->initConfig();
        
        $config->setQuery([ 'version' => $version ]);
        
        $config->setMethod(HttpClientConfiguration::METHOD_DELETE);
        $config->setType(HttpClientConfiguration::DATA_TYPE_JSON);
        $config->setURL(self::BASE_URL."/workspaces/".$workspace_id."/entities/".$entity);
        
        return $this->sendRequest($config);
    }
    
    
    /**
     * List the values associated with a entity.
     *
     * @param $workspace_id string
     * @param $entity_id string
     * @return HttpResponse
     */
    public function listValues($workspace_id, $entity_id, $export = NULL, $page_limit = NULL, $include_count = NULL, $sort = NULL, $cursor = NULL, $include_audit = true, $version = self::VERSION) {
        
        $config = $this->initConfig();
        
        $config->setQuery([ 'version' => $version ]);
        
        if(is_null($export) === FALSE && is_integer($export)) {
            $config->addQuery('export', $export);
        }
        if(is_null($page_limit) === FALSE && is_integer($page_limit)) {
            $config->addQuery('page_limit', $page_limit);
        }
        if(is_null($include_count) === FALSE) {
            $config->addQuery('include_count', $include_count);
        }
        if(is_null($sort) === FALSE) {
            $config->addQuery('sort', $sort);
        }
        if(is_null($cursor) === FALSE) {
            $config->addQuery('cursor', $cursor);
        }
        if(is_null($include_audit) === FALSE) {
            $config->addQuery('include_audit', $include_audit);
        }
        
        $config->setMethod(HttpClientConfiguration::METHOD_GET);
        $config->setType(HttpClientConfiguration::DATA_TYPE_JSON);
        $config->setURL(self::BASE_URL."/workspaces/".$workspace_id."/entities/".$entity_id."/values");
        
        return $this->sendRequest($config);
    }
    
    /**
     * Get value associated with a entity.
     *
     * @param $workspace_id string
     * @param $entity string
     * @param $value string
     * @return HttpResponse
     */
    public function getValue($workspace_id, $entity, $value, $export = NULL, $include_audit = NULL, $version = self::VERSION) {
        
        $config = $this->initConfig();
        
        $config->setQuery([ 'version' => $version ]);
        
        if(is_null($export) === FALSE && is_integer($export)) {
            $config->addQuery('export', $export);
        }
        if(is_null($include_audit) === FALSE) {
            $config->addQuery('include_audit', $include_audit);
        }
        
        $config->setMethod(HttpClientConfiguration::METHOD_GET);
        $config->setType(HttpClientConfiguration::DATA_TYPE_JSON);
        $config->setURL(self::BASE_URL."/workspaces/".$workspace_id."/entities/".$entity."/values/".$value);
        
        return $this->sendRequest($config);
    }
    
    /**
     * Create value associated with a entity.
     *
     * @param $value CreateValueModel
     * @return HttpResponse
     */
    public function createValue($value, $version = self::VERSION) {
        
        if($value instanceof CreateValueModel) {
            $model = $value;
        } else {
            throw new InvalidParameterException();
        }
        
        $config = $this->initConfig();
        $config->addHeaders($model->getData('header'));
        
        $config->setData($model->getData());
        
        $config->setQuery( [ 'version' => $version ] );
        $config->setMethod(HttpClientConfiguration::METHOD_POST);
        $config->setType(HttpClientConfiguration::DATA_TYPE_JSON);
        $config->setURL(self::BASE_URL."/workspaces/".$model->getWorkspaceId()."/entities/".$model->getEntity()."/values");
        
        return $this->sendRequest($config);
    }
    
    /**
     * Update a value associated with a entity.
     *
     * @param $value UpdateValueModel
     * @return HttpResponse
     */
    public function updateValue($value, $version = self::VERSION) {
        
        if($value instanceof UpdateValueModel) {
            $model = $value;
        } else {
            throw new InvalidParameterException();
        }
        
        $config = $this->initConfig();
        $config->addHeaders($model->getData('header'));
        
        $config->setData($model->getData());
        
        $config->setQuery( [ 'version' => $version ] );
        $config->setMethod(HttpClientConfiguration::METHOD_POST);
        $config->setType(HttpClientConfiguration::DATA_TYPE_JSON);
        $config->setURL(self::BASE_URL."/workspaces/".$model->getWorkspaceId()."/entities/".$model->getEntity()."/values/".$model->getValue());
        
        return $this->sendRequest($config);
    }
    
    /**
     * Delete value associated with a entity.
     *
     * @param $workspace_id string
     * @param $entity string
     * @param $value string
     * @return HttpResponse
     */
    public function deleteValue($workspace_id, $entity, $value, $version = self::VERSION) {
        
        $config = $this->initConfig();
        
        $config->setQuery([ 'version' => $version ]);
        
        $config->setMethod(HttpClientConfiguration::METHOD_DELETE);
        $config->setType(HttpClientConfiguration::DATA_TYPE_JSON);
        $config->setURL(self::BASE_URL."/workspaces/".$workspace_id."/entities/".$entity."/values/".$value);
        
        return $this->sendRequest($config);
    }
    
    
    /**
     * List the synonyms associated with a value.
     *
     * @param $workspace_id string
     * @param $entity_id string
     * @return HttpResponse
     */
    public function listSynonyms($workspace_id, $entity, $value, $export = NULL, $page_limit = NULL, $include_count = NULL, $sort = NULL, $cursor = NULL, $include_audit = true, $version = self::VERSION) {
        
        $config = $this->initConfig();
        
        $config->setQuery([ 'version' => $version ]);
        
        if(is_null($export) === FALSE && is_integer($export)) {
            $config->addQuery('export', $export);
        }
        if(is_null($page_limit) === FALSE && is_integer($page_limit)) {
            $config->addQuery('page_limit', $page_limit);
        }
        if(is_null($include_count) === FALSE) {
            $config->addQuery('include_count', $include_count);
        }
        if(is_null($sort) === FALSE) {
            $config->addQuery('sort', $sort);
        }
        if(is_null($cursor) === FALSE) {
            $config->addQuery('cursor', $cursor);
        }
        if(is_null($include_audit) === FALSE) {
            $config->addQuery('include_audit', $include_audit);
        }
        
        $config->setMethod(HttpClientConfiguration::METHOD_GET);
        $config->setType(HttpClientConfiguration::DATA_TYPE_JSON);
        $config->setURL(self::BASE_URL."/workspaces/".$workspace_id."/entities/".$entity."/values/".$value."/synonyms");
        
        return $this->sendRequest($config);
    }
    
    /**
     * Get synonym associated with a value.
     *
     * @param $workspace_id string
     * @param $entity string
     * @param $value string
     * @param $synonym string
     * @return HttpResponse
     */
    public function getSynonym($workspace_id, $entity, $value, $synonym, $include_audit = NULL, $version = self::VERSION) {
        
        $config = $this->initConfig();
        
        $config->setQuery([ 'version' => $version ]);
        
        if(is_null($include_audit) === FALSE) {
            $config->addQuery('include_audit', $include_audit);
        }
        
        $config->setMethod(HttpClientConfiguration::METHOD_GET);
        $config->setType(HttpClientConfiguration::DATA_TYPE_JSON);
        $config->setURL(self::BASE_URL."/workspaces/".$workspace_id."/entities/".$entity."/values/".$value."/synonyms/".$synonym);
        
        return $this->sendRequest($config);
    }
    
    /**
     * Create synonym associated with a value.
     *
     * @param $value CreateSynonymModel
     * @return HttpResponse
     */
    public function createSynonym($synonym, $version = self::VERSION) {
        
        if($synonym instanceof CreateSynonymModel) {
            $model = $synonym;
        } else {
            throw new InvalidParameterException();
        }
        
        $config = $this->initConfig();
        $config->addHeaders($model->getData('header'));
        
        $config->setData($model->getData());
        
        $config->setQuery( [ 'version' => $version ] );
        $config->setMethod(HttpClientConfiguration::METHOD_POST);
        $config->setType(HttpClientConfiguration::DATA_TYPE_JSON);
        $config->setURL(self::BASE_URL."/workspaces/".$model->getWorkspaceId()."/entities/".$model->getEntity()."/values/".$model->getValue()."/synonyms");
        
        return $this->sendRequest($config);
    }
    
    /**
     * Update a synonym associated with a entity.
     *
     * @param $value UpdateSynonymModel
     * @return HttpResponse
     */
    public function updateSynonym($value, $version = self::VERSION) {
        
        if($value instanceof UpdateSynonymModel) {
            $model = $value;
        } else {
            throw new InvalidParameterException();
        }
        
        $config = $this->initConfig();
        $config->addHeaders($model->getData('header'));
        
        $config->setData($model->getData());
        
        $config->setQuery( [ 'version' => $version ] );
        $config->setMethod(HttpClientConfiguration::METHOD_POST);
        $config->setType(HttpClientConfiguration::DATA_TYPE_JSON);
        $config->setURL(self::BASE_URL."/workspaces/".$model->getWorkspaceId()."/entities/".$model->getEntity()."/values/".$model->getValue()."/synonyms/".$model->getSynonym());
        
        return $this->sendRequest($config);
    }
    
    /**
     * Delete synonym associated with a value.
     *
     * @param $workspace_id string
     * @param $entity string
     * @param $value string
     * @param $synonym string
     * @return HttpResponse
     */
    public function deleteSynonym($workspace_id, $entity, $value, $synonym, $version = self::VERSION) {
        
        $config = $this->initConfig();
        
        $config->setQuery([ 'version' => $version ]);
        
        $config->setMethod(HttpClientConfiguration::METHOD_DELETE);
        $config->setType(HttpClientConfiguration::DATA_TYPE_JSON);
        $config->setURL(self::BASE_URL."/workspaces/".$workspace_id."/entities/".$entity."/values/".$value."/synonyms/".$synonym);
        
        return $this->sendRequest($config);
    }
    
    
    /**
     * List the counterexamples for a workspace.
     *
     * @param $workspace_id string
     * @return HttpResponse
     */
    public function listCounterexamples($workspace_id, $page_limit = NULL, $include_count = NULL, $sort = NULL, $cursor = NULL, $include_audit = true, $version = self::VERSION) {
        
        $config = $this->initConfig();
        
        $config->setQuery([ 'version' => $version ]);
        
        if(is_null($page_limit) === FALSE && is_integer($page_limit)) {
            $config->addQuery('page_limit', $page_limit);
        }
        if(is_null($include_count) === FALSE) {
            $config->addQuery('include_count', $include_count);
        }
        if(is_null($sort) === FALSE) {
            $config->addQuery('sort', $sort);
        }
        if(is_null($cursor) === FALSE) {
            $config->addQuery('cursor', $cursor);
        }
        if(is_null($include_audit) === FALSE) {
            $config->addQuery('include_audit', $include_audit);
        }
        
        $config->setMethod(HttpClientConfiguration::METHOD_GET);
        $config->setType(HttpClientConfiguration::DATA_TYPE_JSON);
        $config->setURL(self::BASE_URL."/workspaces/".$workspace_id."/counterexamples");
        
        return $this->sendRequest($config);
    }
    
    /**
     * Create counterexample associated with a workspace.
     *
     * @param $counterexample CreateCounterexampleModel
     * @return HttpResponse
     */
    public function createCounterexample($counterexample, $version = self::VERSION) {
        
        if($counterexample instanceof CreateCounterexampleModel) {
            $model = $counterexample;
        } else {
            throw new InvalidParameterException();
        }
        
        $config = $this->initConfig();
        $config->addHeaders($model->getData('header'));
        
        $config->setData($model->getData());
        
        $config->setQuery( [ 'version' => $version ] );
        $config->setMethod(HttpClientConfiguration::METHOD_POST);
        $config->setType(HttpClientConfiguration::DATA_TYPE_JSON);
        $config->setURL(self::BASE_URL."/workspaces/".$model->getWorkspaceId()."/counterexamples");
        
        return $this->sendRequest($config);
    }
    
    /**
     * Get Counterexample associated with a workspace.
     *
     * @param $workspace_id string
     * @param $text string
     * @return HttpResponse
     */
    public function getCounterexample($workspace_id, $text, $include_audit = NULL, $version = self::VERSION) {
        
        $config = $this->initConfig();
        
        $config->setQuery([ 'version' => $version ]);
        
        if(is_null($include_audit) === FALSE) {
            $config->addQuery('include_audit', $include_audit);
        }
        
        $config->setMethod(HttpClientConfiguration::METHOD_GET);
        $config->setType(HttpClientConfiguration::DATA_TYPE_JSON);
        $config->setURL(self::BASE_URL."/workspaces/".$workspace_id."/counterexamples/".rawurlencode($text));
        
        return $this->sendRequest($config);
    }
    
    /**
     * Update a counterexample associated with a workspace.
     *
     * @param $example UpdateCounterexampleModel
     * @return HttpResponse
     */
    public function updateCounterexample($counterexample, $version = self::VERSION) {
        
        if($counterexample instanceof UpdateCounterexampleModel) {
            $model = $counterexample;
        } else {
            throw new InvalidParameterException();
        }
        
        $config = $this->initConfig();
        $config->addHeaders($model->getData('header'));
        
        $config->setData($model->getData());
        
        $config->setQuery( [ 'version' => $version ] );
        $config->setMethod(HttpClientConfiguration::METHOD_POST);
        $config->setType(HttpClientConfiguration::DATA_TYPE_JSON);
        $config->setURL(self::BASE_URL."/workspaces/".$model->getWorkspaceId()."/counterexamples/".rawurlencode($model->getText()));
        
        return $this->sendRequest($config);
    }
    
    /**
     * Delete counterexample associated with a workspace.
     *
     * @param $workspace_id string
     * @param $text string
     * @return HttpResponse
     */
    public function deleteCounterexample($workspace_id, $text, $version = self::VERSION) {
        
        $config = $this->initConfig();
        
        $config->setQuery([ 'version' => $version ]);
        
        $config->setMethod(HttpClientConfiguration::METHOD_DELETE);
        $config->setType(HttpClientConfiguration::DATA_TYPE_JSON);
        $config->setURL(self::BASE_URL."/workspaces/".$workspace_id."/counterexamples/".rawurlencode($text));
        
        return $this->sendRequest($config);
    }
    
    
    /**
     * List the dialog nodes for a workspace.
     *
     * @param $workspace_id string
     * @return HttpResponse
     */
    public function listDialogNodes($workspace_id, $page_limit = NULL, $include_count = NULL, $sort = NULL, $cursor = NULL, $include_audit = true, $version = self::VERSION) {
        
        $config = $this->initConfig();
        
        $config->setQuery([ 'version' => $version ]);
        
        if(is_null($page_limit) === FALSE && is_integer($page_limit)) {
            $config->addQuery('page_limit', $page_limit);
        }
        if(is_null($include_count) === FALSE) {
            $config->addQuery('include_count', $include_count);
        }
        if(is_null($sort) === FALSE) {
            $config->addQuery('sort', $sort);
        }
        if(is_null($cursor) === FALSE) {
            $config->addQuery('cursor', $cursor);
        }
        if(is_null($include_audit) === FALSE) {
            $config->addQuery('include_audit', $include_audit);
        }
        
        $config->setMethod(HttpClientConfiguration::METHOD_GET);
        $config->setType(HttpClientConfiguration::DATA_TYPE_JSON);
        $config->setURL(self::BASE_URL."/workspaces/".$workspace_id."/dialog_nodes");
        
        return $this->sendRequest($config);
    }
    
    /**
     * Create dialog_node associated with a workspace.
     *
     * @param $dialog_node CreateDialogNodeModel
     * @return HttpResponse
     */
    public function createDialogNode($dialog_node, $version = self::VERSION) {
        
        if($dialog_node instanceof CreateDialogNodeModel) {
            $model = $dialog_node;
        } else {
            throw new InvalidParameterException();
        }
        
        $config = $this->initConfig();
        $config->addHeaders($model->getData('header'));
        
        $config->setData($model->getData());
        
        $config->setQuery( [ 'version' => $version ] );
        $config->setMethod(HttpClientConfiguration::METHOD_POST);
        $config->setType(HttpClientConfiguration::DATA_TYPE_JSON);
        $config->setURL(self::BASE_URL."/workspaces/".$model->getWorkspaceId()."/dialog_nodes");
        
        return $this->sendRequest($config);
    }
    
    /**
     * Get dialog_node associated with a workspace.
     *
     * @param $workspace_id string
     * @param $dialog_node string
     * @return HttpResponse
     */
    public function getDialogNode($workspace_id, $dialog_node, $include_audit = NULL, $version = self::VERSION) {
        
        $config = $this->initConfig();
        
        $config->setQuery([ 'version' => $version ]);
        
        if(is_null($include_audit) === FALSE) {
            $config->addQuery('include_audit', $include_audit);
        }
        
        $config->setMethod(HttpClientConfiguration::METHOD_GET);
        $config->setType(HttpClientConfiguration::DATA_TYPE_JSON);
        $config->setURL(self::BASE_URL."/workspaces/".$workspace_id."/dialog_nodes/".$dialog_node);
        
        return $this->sendRequest($config);
    }
    
    /**
     * Update a dialog_node associated with a workspace.
     *
     * @param $dialog_node UpdateDialogNodeModel
     * @return HttpResponse
     */
    public function updateDialogNode($dialog_node, $version = self::VERSION) {
        
        if($dialog_node instanceof UpdateDialogNodeModel) {
            $model = $dialog_node;
        } else {
            throw new InvalidParameterException();
        }
        
        $config = $this->initConfig();
        $config->addHeaders($model->getData('header'));
        
        $config->setData($model->getData());
        
        $config->setQuery( [ 'version' => $version ] );
        $config->setMethod(HttpClientConfiguration::METHOD_POST);
        $config->setType(HttpClientConfiguration::DATA_TYPE_JSON);
        $config->setURL(self::BASE_URL."/workspaces/".$model->getWorkspaceId()."/dialog_nodes/".$model->getDialogNode());
        
        return $this->sendRequest($config);
    }
    
    /**
     * Delete dialog_node associated with a workspace.
     *
     * @param $workspace_id string
     * @param $dialog_node string
     * @return HttpResponse
     */
    public function deleteDialogNode($workspace_id, $dialog_node, $version = self::VERSION) {
        
        $config = $this->initConfig();
        
        $config->setQuery([ 'version' => $version ]);
        
        $config->setMethod(HttpClientConfiguration::METHOD_DELETE);
        $config->setType(HttpClientConfiguration::DATA_TYPE_JSON);
        $config->setURL(self::BASE_URL."/workspaces/".$workspace_id."/dialog_nodes/".$dialog_node);
        
        return $this->sendRequest($config);
    }
    
    /**
     * List the logs for a workspace.
     *
     * @param $workspace_id string
     * @return HttpResponse
     */
    public function listLogs($workspace_id, $sort = NULL, $filter = NULL, $page_limit = NULL, $cursor = NULL, $version = self::VERSION) {
        
        $config = $this->initConfig();
        
        $config->setQuery([ 'version' => $version ]);
        
        if(is_null($sort) === FALSE) {
            $config->addQuery('sort', $sort);
        }
        if(is_null($filter) === FALSE) {
            $config->addQuery('filter', $filter);
        }
        if(is_null($page_limit) === FALSE && is_integer($page_limit)) {
            $config->addQuery('page_limit', $page_limit);
        }
        if(is_null($cursor) === FALSE) {
            $config->addQuery('cursor', $cursor);
        }
        
        $config->setMethod(HttpClientConfiguration::METHOD_GET);
        $config->setType(HttpClientConfiguration::DATA_TYPE_JSON);
        $config->setURL(self::BASE_URL."/workspaces/".$workspace_id."/logs");
        
        return $this->sendRequest($config);
    }
}