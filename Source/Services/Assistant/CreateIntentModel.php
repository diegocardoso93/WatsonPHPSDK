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
 * Assistant IntentCreate model
 */
class CreateIntentModel extends ServiceModel {

    /**
     * @name(workspace_id)
     * 
     * The id of the workspace.
     * 
     * @var string
     */
    protected $_workspace_id;

    /**
     * @name(intent)
     * 
     * The name of the intent. 
     * 
     * @var string
     */
    protected $_intent;

    /**
     * @name(description)
     * 
     * The description of the intent. 
     * 
     * @var string
     */
    protected $_description;

    /**
     * @name(examples)
     * 
     * An array of user input examples for the intent.
     * 
     * @var array
     */
    protected $_examples;

    /**
     * Constructor.
     *
     * @param string $workspace_id
     * @param string $intent
     * @param string $description
     * @param array $examples
     */
    function __construct($workspace_id, $intent, $description = '', $examples = []) {

        $this->setWorkspaceId($workspace_id);
        $this->setIntent($intent);
        $this->setDescription($description);
        $this->setExamples($examples);
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
     * Get the name of the intent.
     * 
     * @return string
     */
    public function getIntent() {
        return $this->_intent;
    }

    /**
     * Set the name of the intent.
     * 
     * @param $val string
     */
    public function setIntent($val) {
        $this->_intent = $val;
    }

    /**
     * Get the description of the intent.
     * 
     * @return string
     */
    public function getDescription() {
        return $this->_description;
    }

    /**
     * Set the description of the intent.
     * 
     * @param $val string
     */
    public function setDescription($val) {
        $this->_description = $val;
    }

    /**
     * Set array of user input examples for the intent.
     * 
     * @param $val array
     */
    public function setExamples($val) {
        $this->_examples = $val;
    }

    /**
     * Get array of user input examples for the intent.
     * 
     * @return array
     */
    public function getExamples() {
        return $this->_examples;
    }

}