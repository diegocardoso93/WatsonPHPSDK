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
use WatsonSDK\Services\Discovery\DiscoveryQueryCollectionModel;

/**
 * Discovery class
 */
class Discovery extends WatsonService {

    const BASE_URL = 'https://gateway.watsonplatform.net/discovery/api/v1';
    const VERSION = '2018-03-05';

    /**
     * After your content is uploaded and enriched by the Discovery service, you can build queries to search your content.
     *
     * @return HttpResponse
     */
    public function queryCollection($queryCollectionModel, $version = self::VERSION) {
        
        $config = $this->initConfig();
        
        $config->setQuery([ 'version' => $version ]);
        
        if(!$queryCollectionModel instanceof DiscoveryQueryCollectionModel) {
            throw new InvalidParameterException();
        }
        foreach($queryCollectionModel->getAttributesIterator() as $value) {
            if(is_null(current($value)) === FALSE && is_array($value)) {
                if (current($value) === true) {
                    $bind = 'true';
                } else {
                    $bind = current($value);
                }
                $config->addQuery(substr(key($value), 1, strlen(key($value))-1), $bind);
            }
        }
        $config->setMethod(HttpClientConfiguration::METHOD_GET);
        $config->setType(HttpClientConfiguration::DATA_TYPE_JSON);
        $config->setURL(self::BASE_URL."/environments/".$queryCollectionModel->getEnvironmentId()."/collections/".$queryCollectionModel->getCollectionId()."/query");

        return $this->sendRequest($config);
    }

}