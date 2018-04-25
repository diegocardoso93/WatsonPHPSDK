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

use WatsonSDK\Common\HttpClient;
use WatsonSDK\Common\HttpResponse;
use WatsonSDK\Common\HttpClientConfiguration;
use WatsonSDK\Common\HttpClientException;
use WatsonSDK\Common\WatsonService;
use WatsonSDK\Common\WatsonCredential;
use WatsonSDK\Common\InvalidParameterException;

use WatsonSDK\Services\Assistant\MessageRequestModel;
use WatsonSDK\Services\Assistant\WorkspaceRequestModel;
use WatsonSDK\Services\Assistant\IntentRequestModel;
use WatsonSDK\Services\Assistant\UpdateIntentModel;
use WatsonSDK\Services\Assistant\CreateIntentModel;
use WatsonSDK\Services\Assistant\CreateWorkspaceModel;
use WatsonSDK\Services\Assistant\UpdateWorkspaceModel;

/**
 * Assistant class
 */
class Assistant extends WatsonService {

    const BASE_URL = 'https://gateway.watsonplatform.net/assistant/api/v1';
    const VERSION = '2018-02-16';

    const SORT_BY_NAME_ASC = 'name';
    const SORT_BY_MODIFIED_ASC = 'modified';
    const SORT_BY_WORKSPACE_ID_ASC = 'workspace_id';

    const SORT_BY_NAME_DESC = '-name';
    const SORT_BY_MODIFIED_DESC = '-modified';
    const SORT_BY_WORKSPACE_ID_DESC = '-workspace_id';

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

        $url = self::BASE_URL."/workspaces/{$workspace_id}/message";

        $config->setURL($url);

        $response = $this->sendRequest($config);

        return $response;
    }

    /**
     * Send text message to Assistant service
     * 
     * @param $message string
     * @return HttpResponse
     */
    public function sendMessageByText($message, $workspace_id, $version = self::VERSION) {

        $model = new MessageRequestModel($message);
        return $this->sendMessageByModel($model, $workspace_id, $version);
    }

    /**
     * Send message to Assistant service
     * 
     * @param  $val MessageRequestModel | string
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
     * Create a workspace.
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
        
        $url = self::BASE_URL."/workspaces";
        
        $config->setURL($url);
        $response = $this->sendRequest($config);
        
        return $response;
    }
    
    /**
     * Update a workspace.
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
        
        $url = self::BASE_URL."/workspaces/".$workspace->getWorkspaceId();
        
        $config->setURL($url);
        $response = $this->sendRequest($config);
        
        return $response;
    }
    
    /**
     * Delete workspace associated with a Assistant service instance.
     *
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
     * Get intent associated with a workspace.
     *
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
     * Create intent.
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
        
        $url = self::BASE_URL."/workspaces/".$model->getWorkspaceId()."/intents";
        $config->setURL($url);
        
        $response = $this->sendRequest($config);
        
        return $response;
    }

    /**
     * Update a intent.
     *
     * @param $workspace UpdateIntentModel
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
        
        $url = self::BASE_URL."/workspaces/".$intent->getWorkspaceId()."/intents/".$model->getIntent();
        
        $config->setURL($url);
        $response = $this->sendRequest($config);
        
        return $response;
    }

    /**
     * List the intents associated with a Workspace.
     *
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

}