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
 * Assistant UpdateDialogNode model
 */
class UpdateDialogNodeModel extends ServiceModel {
    
    /**
     * @name(workspace_id)
     *
     * The id of the workspace.
     *
     * @var string
     */
    protected $_workspace_id;
    
    /**
     * @name(dialog_node)
     * 
     * The dialog node ID.
     * 
     * @var string
     */
    protected $_dialog_node;
    
    /**
     * @name(new_dialog_node)
     *
     * The new dialog node ID.
     *
     * @var string
     */
    protected $_new_dialog_node;
    
    /**
     * @name(new_description)
     * 
     * The new description of the dialog node.
     * 
     * @var string
     */
    protected $_new_description;

    /**
     * @name(new_conditions)
     * 
     * The new condition that will trigger the dialog node.
     * 
     * @var string
     */
    protected $_new_conditions;

    /**
     * @name(new_parent)
     * 
     * The ID of the new parent dialog node.
     * 
     * @var array
     */
    protected $_new_parent;

    /**
     * @name(new_previous_sibling)
     * 
     * The ID of the new previous dialog node.
     * 
     * @var string
     */
    protected $_new_previous_sibling;
    
    /**
     * @name(new_output)
     *
     * The new output of the dialog node.
     *
     * @var object
     */
    protected $_new_output;
    
    /**
     * @name(new_context)
     *
     * The new context for the dialog node.
     *
     * @var object
     */
    protected $_new_context;
    
    /**
     * @name(new_metadata)
     *
     * The new metadata for the dialog node.
     *
     * @var object
     */
    protected $_new_metadata;
    
    /**
     * @name(new_next_step)
     *
     * The new next step to be executed in dialog processing.
     *
     * @var DialogNodeNextStep
     */
    protected $_new_next_step;
    
    /**
     * @name(new_title)
     *
     * The alias used to identify the dialog node.
     *
     * @var string
     */
    protected $_new_title;
    
    /**
     * @name(new_type)
     *
     * How the dialog node is processed.
     *
     * @var DialogNodeConstants.NodeType | string
     */
    protected $_new_type;
    
    /**
     * @name(new_event_name)
     *
     * How an `event_handler` node is processed.
     *
     * @var DialogNodeConstants.EventName | string
     */
    protected $_new_event_name;
    
    /**
     * @name(new_variable)
     *
     * The location in the dialog context where output is stored.
     *
     * @var string
     */
    protected $_new_variable;
    
    /**
     * @name(new_actions)
     *
     * An array of objects describing any actions to be invoked by the dialog node.
     *
     * @var DialogNodeAction
     */
    protected $_new_actions;
    
    /**
     * @name(new_digress_in)
     *
     * Whether this to[params.headers] -level dialog node can be digressed into.
     *
     * @var DialogNodeConstants.NodeType | string
     */
    protected $_new_digress_in;
    
    /**
     * @name(new_digress_out)
     *
     * Whether this dialog node can be returned to after a digression.
     *
     * @var DialogNodeConstants.DigressOut | string
     */
    protected $_new_digress_out;
    
    /**
     * @name(new_digress_out_slots)
     *
     * Whether the user can digress to to[params.headers] -level nodes while filling out slots.
     *
     * @var DialogNodeConstants.DigressOut | string
     */
    protected $_new_digress_out_slots;
    
    /**
     * Constructor.
     *
     * @param string $workspace_id
     * @param string $dialog_node
     * @param string $new_dialog_node
     * @param string $new_description
     * @param string $new_conditions
     * @param string $new_parent
     * @param string $new_previous_sibling
     * @param object $new_output
     * @param object $new_context
     * @param object $new_metadata
     * @param DialogNodeNextStep $new_next_step
     * @param string $new_title
     * @param DialogNodeConstants.NodeType | string $new_type
     * @param DialogNodeConstants.EventName | string $new_event_name
     * @param string $new_variable
     * @param DialogNodeAction $new_actions
     * @param DialogNodeConstants.DigressIn | string $new_digress_in
     * @param DialogNodeConstants.DigressOut | string $new_digress_out
     * @param DialogNodeConstants.DigressOutSlots | string $new_digress_out_slots
     */
    function __construct($workspace_id, $dialog_node = '', $new_dialog_node = NULL, $new_description = NULL, $new_conditions = NULL,
        $new_parent = NULL, $new_previous_sibling = NULL, $new_output = NULL, $new_context = NULL, $new_metadata = NULL,
        $new_next_step = NULL, $new_title = NULL, $new_type = NULL, $new_event_name = NULL, $new_variable = NULL, $new_actions = NULL,
        $new_digress_in = NULL, $new_digress_out = NULL, $new_digress_out_slots = NULL) {
        
        $this->setWorkspaceId($workspace_id);
        $this->setDialogNode($dialog_node);
        $this->setNewDialogNode($dialog_node);
        $this->setNewDescription($description);
        $this->setNewConditions($conditions);
        $this->setNewParent(empty($parent)?NULL:$parent);
        $this->setNewPreviousSibling(empty($previous_sibling)?NULL:$previous_sibling);
        $this->setNewOutput($output ? $output : new \stdClass);
        $this->setNewContext($context ? $context : new \stdClass);
        $this->setNewMetadata($metadata ? $metadata : new \stdClass);
        $this->setNewNextStep($next_step);
        $this->setNewTitle($title);
        $this->setNewType(empty($node_type)?NULL:$node_type);
        $this->setNewEventName(empty($event_name)?NULL:$event_name);
        $this->setNewVariable($variable);
        $this->setNewActions($actions);
        $this->setNewDigressIn(empty($digress_in)?NULL:$digress_in);
        $this->setNewDigressOut(empty($digress_out)?NULL:$digress_out);
        $this->setNewDigressOutSlots(empty($digress_out_slots)?NULL:$digress_out_slots);
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
     * Get dialog node ID.
     * 
     * @return string
     */
    public function getDialogNode() {
        return $this->_dialog_node;
    }

    /**
     * Set dialog node ID.
     * 
     * @param $val string
     */
    public function setDialogNode($val) {
        $this->_dialog_node = $val;
    }
    
    /**
     * Get new dialog node ID.
     *
     * @return string
     */
    public function getNewDialogNode() {
        return $this->_new_dialog_node;
    }
    
    /**
     * Set new dialog node ID.
     *
     * @param $val string
     */
    public function setNewDialogNode($val) {
        $this->_new_dialog_node = $val;
    }
    /**
     * Get the description of the dialog node.
     * 
     * @return string
     */
    public function getNewDescription() {
        return $this->_new_description;
    }

    /**
     * Set the description of the dialog node.
     * 
     * @param $val string
     */
    public function setNewDescription($val) {
        $this->_new_description = $val;
    }

    /**
     * Get the condition that will trigger the dialog node.
     * 
     * @return string
     */
    public function getNewConditions() {
        return $this->_new_conditions;
    }

    /**
     * Set the condition that will trigger the dialog node.
     * 
     * @param $val string
     */
    public function setNewConditions($val) {
        $this->_new_conditions = $val;
    }


    /**
     * Get the ID of the parent dialog node.
     *
     * @return string
     */
    public function getNewParent() {
        return $this->_new_parent;
    }

    /**
     * Set the ID of the parent dialog node.
     *
     * @param $val string
     */
    public function setNewParent($val) {
        $this->_new_parent = $val;
    }

    /**
     * Get the ID of the previous dialog node.
     *
     * @return string
     */
    public function getNewPreviousSibling() {
        return $this->_new_previous_sibling;
    }

    /**
     * Set the ID of the previous dialog node.
     *
     * @param string $val
     */
    public function setNewPreviousSibling($val) {
        $this->_new_previous_sibling = $val;
    }
    
    /**
     * Get the output of the dialog node.
     *
     * @return object
     */
    public function getNewOutput() {
        return $this->_new_output;
    }
    
    /**
     * Set the output of the dialog node.
     *
     * @param object $val
     */
    public function setNewOutput($val) {
        $this->_new_output = $val;
    }
    
    /**
     * Get the context for the dialog node.
     *
     * @return object
     */
    public function getNewContext() {
        return $this->_new_context;
    }
    
    /**
     * Set the context for the dialog node.
     *
     * @param object $val
     */
    public function setNewContext($val) {
        $this->_new_context = $val;
    }
    
    /**
     * Get the metadata for the dialog node.
     *
     * @return object
     */
    public function getNewMetadata() {
        return $this->_new_metadata;
    }
    
    /**
     * Set the metadata for the dialog node.
     *
     * @param object $val
     */
    public function setNewMetadata($val) {
        $this->_new_metadata = $val;
    }
    
    /**
     * Get the next step to be executed in dialog processing.
     *
     * @return DialogNodeNextStep
     */
    public function getNewNextStep() {
        return $this->_new_next_step;
    }
    
    /**
     * Set the next step to be executed in dialog processing.
     *
     * @param DialogNodeNextStep $val
     */
    public function setNewNextStep($val) {
        $this->_new_next_step = $val;
    }
    
    /**
     * Get the alias used to identify the dialog node.
     *
     * @return string
     */
    public function getNewTitle() {
        return $this->_new_title;
    }
    
    /**
     * Set the alias used to identify the dialog node.
     *
     * @param string $val
     */
    public function setNewTitle($val) {
        $this->_new_title = $val;
    }
    
    /**
     * Get how the dialog node is processed.
     *
     * @return DialogNodeConstants.NodeType | string
     */
    public function getNewType() {
        return $this->_new__type;
    }
    
    /**
     * Set how the dialog node is processed.
     *
     * @param DialogNodeConstants.NodeType | string $val
     */
    public function setNewType($val) {
        $this->_new__type = $val;
    }
    
    /**
     * Get how an `event_handler` node is processed.
     *
     * @return DialogNodeConstants.EventName | string
     */
    public function getNewEventName() {
        return $this->_new_event_name;
    }
    
    /**
     * Set how an `event_handler` node is processed.
     *
     * @param DialogNodeConstants.EventName | string $val
     */
    public function setNewEventName($val) {
        $this->_new_event_name = $val;
    }
    
    /**
     * Get the location in the dialog context where output is stored.
     *
     * @return string
     */
    public function getNewVariable() {
        return $this->_new_variable;
    }
    
    /**
     * Set the location in the dialog context where output is stored.
     *
     * @param string $val
     */
    public function setNewVariable($val) {
        $this->_new_variable = $val;
    }
    
    /**
     * Get array of objects describing any actions to be invoked by the dialog node.
     *
     * @return DialogNodeAction
     */
    public function getNewActions() {
        return $this->_new_actions;
    }
    
    /**
     * Set array of objects describing any actions to be invoked by the dialog node.
     *
     * @param DialogNodeAction $val
     */
    public function setNewActions($val) {
        $this->_new_actions = $val;
    }
    
    /**
     * Get whether this to[params.headers] -level dialog node can be digressed into.
     *
     * @return DialogNodeConstants.NodeType | string
     */
    public function getNewDigressIn() {
        return $this->_new_digress_in;
    }
    
    /**
     * Set whether this to[params.headers] -level dialog node can be digressed into.
     *
     * @param DialogNodeConstants.NodeType | string $val
     */
    public function setNewDigressIn($val) {
        $this->_new_digress_in = $val;
    }
    
    /**
     * Get whether this dialog node can be returned to after a digression.
     *
     * @return DialogNodeConstants.NodeType | string
     */
    public function getNewDigressOut() {
        return $this->_new_digress_out;
    }
    
    /**
     * Set whether this to[params.headers] -level dialog node can be digressed into.
     *
     * @param DialogNodeConstants.NodeType | string $val
     */
    public function setNewDigressOut($val) {
        $this->_new_digress_out = $val;
    }
    
    /**
     * Get whether the user can digress to to[params.headers] -level nodes while filling out slots.
     *
     * @return DialogNodeConstants.DigressOut | string
     */
    public function getNewDigressOutSlots() {
        return $this->_new_digress_out_slots;
    }
    
    /**
     * Set whether the user can digress to to[params.headers] -level nodes while filling out slots.
     *
     * @param DialogNodeConstants.DigressOut | string $val
     */
    public function setNewDigressOutSlots($val) {
        $this->_new_digress_out_slots = $val;
    }
    
}