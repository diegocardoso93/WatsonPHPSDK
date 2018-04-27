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
 * Assistant CreateExample model
 */
class CreateExampleModel extends ServiceModel {

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
     * @name(text)
     * 
     * The text of a user input example. 
     * 
     * @var string
     */
    protected $_text;

    /**
     * Constructor.
     *
     * @param string $text
     */
    function __construct($workspace_id, $intent, $text) {
        
        $this->setWorkspaceId($workspace_id);
        $this->setIntent($intent);
        $this->setText($text);
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
     * Get the text of a user input example.
     * 
     * @return string
     */
    public function getText() {
        return $this->_text;
    }

    /**
     * Set the text of a user input example.
     * 
     * @param $val string
     */
    public function setText($val) {
        $this->_text = $val;
    }
}