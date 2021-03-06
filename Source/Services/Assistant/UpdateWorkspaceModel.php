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
 * Assistant UpdateWorkspace model
 */
class UpdateWorkspaceModel extends ServiceModel {

    const LANGUAGE_ENGLISH = 'en';
    
    
    /**
     * @name(workspace_id)
     *
     * Unique identifier of the workspace. (for update purposes)
     *
     * @var string
     */
    protected $_workspace_id;
    /**
     * @name(name)
     * 
     * The name of the workspace.
     * 
     * @var string
     */
    protected $_name;

    /**
     * @name(description)
     * 
     * The description of the workspace. 
     * 
     * @var string
     */
    protected $_description;

    /**
     * @name(language)
     * 
     * The language of the workspace. 
     * 
     * @var string
     */
    protected $_language;

    /**
     * @name(metadata)
     * 
     * Any metadata that is required by the workspace.
     * 
     * @var object
     */
    protected $_metadata;

    /**
     * @name(counterexamples)
     * 
     * An array of CreateExample objects defining input examples that have been marked as irrelevant input.
     * 
     * @var array
     */
    protected $_counterexamples;

    /**
     * @name(dialog_nodes)
     * 
     * An array of CreateDialogNode objects defining the nodes in the workspace dialog.
     * 
     * @var array
     */
    protected $_dialog_nodes;

    /**
     * @name(entities)
     * 
     * An array of CreateEntity objects defining the entities for the workspace.
     * 
     * @var array
     */
    protected $_entities;

    /**
     * @name(intents)
     * 
     * An array of CreateIntent objects defining the intents for the workspace.
     * 
     * @var array
     */
    protected $_intents;

    /**
     * @name(learning_opt_out)
     *
     * Whether training data from the workspace can be used by IBM for general service improvements. `true` indicates that workspace training data is not to be used.
     *
     * @var boolean
     */
    protected $_learning_opt_out;
    
    /**
     * Constructor.
     *
     * @param $workspace_id string
     * @param $name string
     * @param string $description
     * @param string $language
     * @param array $metadata
     * @param array $counterexamples
     * @param array $dialog_nodes
     * @param array $entities
     * @param array $intents
     * @param boolean $learning_opt_out
     */
    function __construct($workspace_id, $name, $description = '', $language = self::LANGUAGE_ENGLISH, $metadata = NULL, $counterexamples = [], $dialog_nodes = [], $entities = [], $intents = [], $learning_opt_out = true) {

        $this->setWorkspaceId($workspace_id);
        $this->setName($name);
        $this->setDescription($description);
        $this->setLanguage($language);
        $this->setMetadata($metadata ? $metadata : new \stdClass);
        $this->setCounterExamples($counterexamples);
        $this->setDialogNodes($dialog_nodes);
        $this->setEntities($entities);
        $this->setIntents($intents);
        $this->setLearningOptOut((bool)$learning_opt_out);
    }

    /**
     * Get string of WorkspaceId.
     *
     * @return string
     */
    public function getWorkspaceId() {
        return $this->_workspace_id;
    }

    /**
     * Set string of WorkspaceId.
     *
     * @param $val string
     */
    public function setWorkspaceId($val) {
        $this->_workspace_id = $val;
    }

    /**
     * Get the name of the workspace.
     * 
     * @return string
     */
    public function getName() {
        return $this->_name;
    }

    /**
     * Set the name of the workspace.
     * 
     * @param $val string
     */
    public function setName($val) {
        $this->_name = $val;
    }

    /**
     * Get the description of the workspace.
     * 
     * @return string
     */
    public function getDescription() {
        return $this->_description;
    }

    /**
     * Set the description of the workspace.
     * 
     * @param $val string
     */
    public function setDescription($val) {
        $this->_description = $val;
    }

    /**
     * Get the language of the workspace.
     * 
     * @return string
     */
    public function getLanguage() {
        return $this->_language;
    }

    /**
     * Set the language of the workspace.
     * 
     * @param $val string
     */
    public function setLanguage($val) {
        $this->_language = $val;
    }

    /**
     * Get the metadata that is required by the workspace.
     * 
     * @return array
     */
    public function getMetadata() {
        return $this->_metadata;
    }

    /**
     * Set the metadata that is required by the workspace.
     * 
     * @param $val array
     */
    public function setMetadata($val) {
        $this->_metadata = $val;
    }

    /**
     * Get array of CreateExample objects defining input examples that have been marked as irrelevant input.
     * 
     * @return array
     */
    public function getCounterExamples() {
        return $this->_counterexamples;
    }

    /**
     * Set array of CreateExample objects defining input examples that have been marked as irrelevant input.
     * 
     * @param $val array
     */
    public function setCounterExamples($val) {
        $this->_counterexamples = $val;
    }

    /**
     * Get array of CreateDialogNode objects defining the nodes in the workspace dialog.
     * 
     * @return array
     */
    public function getDialogNodes() {
        return $this->_dialog_nodes;
    }

    /**
     * Set array of CreateDialogNode objects defining the nodes in the workspace dialog.
     * 
     * @param $val array
     */
    public function setDialogNodes($val) {
        $this->_dialog_nodes = $val;
    }

    /**
     * Get array of CreateEntity objects defining the entities for the workspace.
     * 
     * @return array
     */
    public function getEntities() {
        return $this->_entities;
    }

    /**
     * Set array of CreateEntity objects defining the entities for the workspace.
     * 
     * @param $val array
     */
    public function setEntities($val) {
        $this->_entities = $val;
    }

    /**
     * Get array of CreateIntent objects defining the intents for the workspace.
     * 
     * @return array
     */
    public function getIntents() {
        return $this->_intents;
    }

    /**
     * Set array of CreateIntent objects defining the intents for the workspace.
     * 
     * @param $val array
     */
    public function setIntents($val) {
        $this->_intents = $val;
    }

    /**
     * Set LearningOptOut. Whether training data from the workspace can be used by IBM for general service improvements. `true` indicates that workspace training data is not to be used.
     *
     * @param $val array
     */
    public function setLearningOptOut($val) {
        $this->_learning_opt_out = $val;
    }

    /**
     * Get LearningOptOut. Whether training data from the workspace can be used by IBM for general service improvements. `true` indicates that workspace training data is not to be used.
     *
     * @return array
     */
    public function getLearningOptOut() {
        return $this->_learning_opt_out;
    }

}