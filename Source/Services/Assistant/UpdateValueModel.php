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
 * Assistant UpdateValue model
 */
class UpdateValueModel extends ServiceModel {
    
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
     * The text of the entity value. This string must conform to the following restrictions:  - It cannot contain carriage return, newline, or tab characters.  - It cannot consist of only whitespace characters.  - It must be no longer than 64 characters. 
     * 
     * @var string
     */
    protected $_value;
    
    /**
     * @name(new_value)
     *
     * The text of the entity value. This string must conform to the following restrictions:  - It cannot contain carriage return, newline, or tab characters.  - It cannot consist of only whitespace characters.  - It must be no longer than 64 characters.
     *
     * @var string
     */
    protected $_new_value;
    
    /**
     * @name(new_metadata)
     *
     * Any metadata related to the entity.
     *
     * @var object
     */
    protected $_new_metadata;
    
    /**
     * @name(new_type)
     *
     * The new type of value.
     *
     * @var string
     */
    protected $_new_type;
    
    /**
     * @name(new_synonyms)
     * 
     * An array containing any synonyms for the entity value. You can provide either synonyms or patterns (as indicated by **type**), but not both. A synonym must conform to the following restrictions:  - It cannot contain carriage return, newline, or tab characters.  - It cannot consist of only whitespace characters.  - It must be no longer than 64 characters.
     * 
     * @var array
     */
    protected $_new_synonyms;

    /**
     * @name(new_patterns)
     * 
     * An array of patterns for the entity value. You can provide either synonyms or patterns (as indicated by **type**), but not both. A pattern is a regular expression no longer than 128 characters. For more information about how to specify a pattern, see the [documentation](https://console.bluemix.net/docs/services/conversation/entities.html#creating-entities).
     * 
     * @var array
     */
    protected $_new_patterns;
    
    /**
     * Constructor.
     *
     * @param string $workspace_id
     * @param string $entity
     * @param string $value
     * @param string $new_value
     * @param object $new_metadata
     * @param array $new_synonyms
     * @param array $new_patterns
     */
    function __construct($workspace_id, $entity, $value, $new_value = '', $new_metadata = NULL, $new_type = '', $new_synonyms = NULL, $new_patterns = NULL) {
        
        $this->setWorkspaceId($workspace_id);
        $this->setEntity($entity);
        $this->setValue($value);
        $this->setNewValue($new_value);
        $this->setNewMetadata($metadata ? $metadata : new \stdClass);
        $this->setNewType($new_type);
        $this->setNewSynonyms($new_synonyms);
        $this->setNewPatterns($new_patterns);
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
     * Get the new text of the value.
     *
     * @return string
     */
    public function getNewValue() {
        return $this->_new_value;
    }
    
    /**
     * Set the new text of the value.
     *
     * @param $val string
     */
    public function setNewValue($val) {
        $this->_new_value = $val;
    }
    
    /**
     * Get the metadata related to the entity.
     * 
     * @return array
     */
    public function getNewMetadata() {
        return $this->_new_metadata;
    }

    /**
     * Set the metadata related to the entity.
     * 
     * @param $val array
     */
    public function setNewMetadata($val) {
        $this->_new_metadata = $val;
    }

    /**
     * Get the new value type.
     *
     * @return boolean
     */
    public function getNewType() {
        return $this->_new_type;
    }
    
    /**
     * Set the new value type.
     *
     * @param boolean $val
     */
    public function setNewType($val) {
        $this->_new_type = $val;
    }
    
    /**
     * Get array of synonyms.
     *
     * @return array
     */
    public function getNewSynonyms() {
        return $this->_new_synonyms;
    }

    /**
     * Set array of synonyms.
     *
     * @param $val array
     */
    public function setNewSynonyms(array $val) {
        $this->_new_synonyms = $val;
    }

    /**
     * Get array of patterns.
     *
     * @return array
     */
    public function getNewPatterns() {
        return $this->_new_patterns;
    }
    
    /**
     * Set array of patterns.
     *
     * @param $val array
     */
    public function setNewPatterns(array $val) {
        $this->_new_patterns = $val;
    }

}