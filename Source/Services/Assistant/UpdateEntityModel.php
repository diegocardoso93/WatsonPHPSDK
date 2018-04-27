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
 * Assistant UpdateEntityModel model
 */
class UpdateEntityModel extends ServiceModel {
    
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
     * @name(new_entity)
     *
     * The name of the new entity (for example, beverage).
     *
     * @var string
     */
    protected $_new_entity;
    
    /**
     * @name(description)
     * 
     * The description of the entity.
     * 
     * @var string
     */
    protected $_new_description;

    /**
     * @name(metadata)
     * 
     * Any metadata related to the entity.
     * 
     * @var object
     */
    protected $_new_metadata;

    /**
     * @name(values)
     * 
     * An array of entity values.
     * 
     * @var array
     */
    protected $_new_values;

    /**
     * @name(fuzzy_match)
     * 
     * Whether to use fuzzy matching for the entity.
     * 
     * @var boolean
     */
    protected $_new_fuzzy_match;

    /**
     * Constructor.
     *
     * @param string $workspace_id
     * @param string $entity
     * @param string $new_entity
     * @param string $new_description
     * @param object $new_metadata
     * @param array $new_values
     * @param boolean $new_fuzzy_match
     */
    function __construct($workspace_id, $entity, $new_entity = '', $new_description = '', $new_metadata = NULL, $new_values = NULL, $new_fuzzy_match = NULL) {
        
        $this->setWorkspaceId($workspace_id);
        $this->setEntity($entity);
        $this->setNewEntity($new_entity);
        $this->setNewDescription($new_description);
        $this->setNewMetadata($new_metadata ? $metadata : new \stdClass);
        $this->setNewValues($new_values);
        $this->setNewFuzzyMatch((bool) $new_fuzzy_match);
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
     * Get the name of the new entity (for example, beverage).
     *
     * @return string
     */
    public function getNewEntity() {
        return $this->_new_entity;
    }
    
    /**
     * Set the name of the new entity (for example, beverage).
     *
     * @param $val string
     */
    public function setNewEntity($val) {
        $this->_new_entity = $val;
    }
    
    /**
     * Get the new description of the entity.
     * 
     * @return string
     */
    public function getNewDescription() {
        return $this->_description;
    }

    /**
     * Set the new description of the entity.
     * 
     * @param $val string
     */
    public function setNewDescription($val) {
        $this->_new_description = $val;
    }

    /**
     * Get the new metadata related to the entity.
     * 
     * @return array
     */
    public function getNewMetadata() {
        return $this->_new_metadata;
    }

    /**
     * Set the new metadata related to the entity.
     * 
     * @param $val array
     */
    public function setNewMetadata($val) {
        $this->_new_metadata = $val;
    }


    /**
     * Get array of new entity values.
     *
     * @return array
     */
    public function getNewValues() {
        return $this->_new_values;
    }

    /**
     * Set array of new entity values.
     *
     * @param $val array
     */
    public function setNewValues(array $val) {
        $this->_new_values = $val;
    }

    /**
     * Get the value indicates whether to use fuzzy matching for the entity. 
     *
     * @return boolean
     */
    public function getNewFuzzyMatch() {
        return $this->_new_fuzzy_match;
    }

    /**
     * Set the value indicates whether to use fuzzy matching for the entity. 
     *
     * @param boolean $val
     */
    public function setNewFuzzyMatch($val) {
        $this->_new_fuzzy_match = $val;
    }

}