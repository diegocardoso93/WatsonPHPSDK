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

namespace WatsonSDK\Services\Assistant;

use WatsonSDK\Common\ServiceModel;

/**
 * Assistant CreateSynonym model
 */
class CreateSynonymModel extends ServiceModel {
    
    /**
     * @name(workspace_id)
     *
     * The id of the workspace.
     *
     * @var string
     */
    protected $_workspace_id;
    
    /**
     * @name(entity)
     * 
     * The name of the entity (for example, beverage).
     * 
     * @var string
     */
    protected $_entity;

    /**
     * @name(value)
     * 
     * The text of the entity value.
     * 
     * @var string
     */
    protected $_value;

    /**
     * @name(synonym)
     * 
     * The text of the synonym.
     * 
     * @var string
     */
    protected $_synonym;
    
    /**
     * Constructor.
     *
     * @param string $workspace_id
     * @param string $entity
     * @param string $value
     * @param string $synonym
     */
    function __construct($workspace_id, $entity, $value, $synonym) {
        
        $this->setWorkspaceId($workspace_id);
        $this->setEntity($entity);
        $this->setValue($value);
        $this->setSynonym($synonym);
    }
    
    /**
     * Get the id of the workspace.
     *
     * @return string
     */
    public function getWorkspaceId() {
        return $this->_workspace_id;
    }
    
    /**
     * Set the id of the workspace.
     *
     * @param $val string
     */
    public function setWorkspaceId($val) {
        $this->_workspace_id = $val;
    }
    
    /**
     * Get the name of the entity (for example, beverage).
     * 
     * @return string
     */
    public function getEntity() {
        return $this->_entity;
    }

    /**
     * Set the name of the entity (for example, beverage).
     * 
     * @param $val string
     */
    public function setEntity($val) {
        $this->_entity = $val;
    }

    /**
     * Get the text of the value.
     * 
     * @return string
     */
    public function getValue() {
        return $this->_value;
    }

    /**
     * Set the text of the value.
     * 
     * @param $val string
     */
    public function setValue($val) {
        $this->_value = $val;
    }

    /**
     * Get the text of the synonym.
     *
     * @return array
     */
    public function getSynonym() {
        return $this->_synonym;
    }

    /**
     * Set the text of the synonym.
     *
     * @param $val array
     */
    public function setSynonym($val) {
        $this->_synonym = $val;
    }

}