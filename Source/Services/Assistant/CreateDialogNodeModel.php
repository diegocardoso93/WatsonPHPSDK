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
 * Assistant CreateDialogNode model
 */
class CreateDialogNodeModel extends ServiceModel {
    
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
     * @name(description)
     * 
     * The description of the dialog node.
     * 
     * @var string
     */
    protected $_description;

    /**
     * @name(conditions)
     * 
     * The condition that will trigger the dialog node.
     * 
     * @var string
     */
    protected $_conditions;

    /**
     * @name(parent)
     * 
     * The ID of the parent dialog node.
     * 
     * @var array
     */
    protected $_parent;

    /**
     * @name(previous_sibling)
     * 
     * The ID of the previous dialog node.
     * 
     * @var string
     */
    protected $_previous_sibling;
    
    /**
     * @name(output)
     *
     * The output of the dialog node.
     *
     * @var object
     */
    protected $_output;
    
    /**
     * @name(context)
     *
     * The context for the dialog node.
     *
     * @var object
     */
    protected $_context;
    
    /**
     * @name(metadata)
     *
     * The metadata for the dialog node.
     *
     * @var object
     */
    protected $_metadata;
    
    /**
     * @name(next_step)
     *
     * The next step to be executed in dialog processing.
     *
     * @var DialogNodeNextStep
     */
    protected $_next_step;
    
    /**
     * @name(actions)
     *
     * An array of objects describing any actions to be invoked by the dialog node.
     *
     * @var DialogNodeAction
     */
    protected $_actions;
    
    /**
     * @name(title)
     *
     * The alias used to identify the dialog node.
     *
     * @var string
     */
    protected $_title;
    
    /**
     * @name(node_type)
     *
     * How the dialog node is processed.
     *
     * @var DialogNodeConstants.NodeType | string
     */
    protected $_node_type;
    
    /**
     * @name(event_name)
     *
     * How an `event_handler` node is processed.
     *
     * @var DialogNodeConstants.EventName | string
     */
    protected $_event_name;
    
    /**
     * @name(variable)
     *
     * The location in the dialog context where output is stored.
     *
     * @var string
     */
    protected $_variable;
    
    /**
     * @name(digress_in)
     *
     * Whether this to[params.headers] -level dialog node can be digressed into.
     *
     * @var DialogNodeConstants.NodeType | string
     */
    protected $_digress_in;
    
    /**
     * @name(digress_out)
     *
     * Whether this dialog node can be returned to after a digression.
     *
     * @var DialogNodeConstants.DigressOut | string
     */
    protected $_digress_out;
    
    /**
     * @name(digress_out_slots)
     *
     * Whether the user can digress to to[params.headers] -level nodes while filling out slots.
     *
     * @var DialogNodeConstants.DigressOut | string
     */
    protected $_digress_out_slots;
    
    /**
     * Constructor.
     *
     * @param string $workspace_id
     * @param string $dialog_node
     * @param string $description
     * @param string $conditions
     * @param string $parent
     * @param string $previous_sibling
     * @param object $output
     * @param object $context
     * @param object $metadata
     * @param DialogNodeNextStep $next_step
     * @param DialogNodeAction $actions
     * @param string $title
     * @param DialogNodeConstants.NodeType | string $node_type
     * @param DialogNodeConstants.EventName | string $event_name
     * @param string $variable
     * @param DialogNodeConstants.DigressIn | string $digress_in
     * @param DialogNodeConstants.DigressOut | string $digress_out
     * @param DialogNodeConstants.DigressOutSlots | string $digress_out_slots
     */
    function __construct($workspace_id, $dialog_node = '', $description = NULL, $conditions = NULL, $parent = NULL, $previous_sibling = NULL,
        $output = NULL, $context = NULL, $metadata = NULL, $next_step = NULL, $actions = NULL, $title = NULL, $node_type = NULL,
        $event_name = NULL, $variable = NULL, $digress_in = NULL, $digress_out = NULL, $digress_out_slots = NULL) {
        
        $this->setWorkspaceId($workspace_id);
        $this->setDialogNode($dialog_node);
        $this->setDescription($description);
        $this->setConditions($conditions);
        $this->setParent(empty($parent)?NULL:$parent);
        $this->setPreviousSibling(empty($previous_sibling)?NULL:$previous_sibling);
        $this->setOutput($output ? $output : new \stdClass);
        $this->setContext($context ? $context : new \stdClass);
        $this->setMetadata($metadata ? $metadata : new \stdClass);
        $this->setNextStep($next_step);
        $this->setActions($actions);
        $this->setTitle($title);
        $this->setNodeType(empty($node_type)?NULL:$node_type);
        $this->setEventName(empty($event_name)?NULL:$event_name);
        $this->setVariable($variable);
        $this->setDigressIn(empty($digress_in)?NULL:$digress_in);
        $this->setDigressOut(empty($digress_out)?NULL:$digress_out);
        $this->setDigressOutSlots(empty($digress_out_slots)?NULL:$digress_out_slots);
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
     * Get the description of the dialog node.
     * 
     * @return string
     */
    public function getDescription() {
        return $this->_description;
    }

    /**
     * Set the description of the dialog node.
     * 
     * @param $val string
     */
    public function setDescription($val) {
        $this->_description = $val;
    }

    /**
     * Get the condition that will trigger the dialog node.
     * 
     * @return string
     */
    public function getConditions() {
        return $this->_conditions;
    }

    /**
     * Set the condition that will trigger the dialog node.
     * 
     * @param $val string
     */
    public function setConditions($val) {
        $this->_conditions = $val;
    }


    /**
     * Get the ID of the parent dialog node.
     *
     * @return string
     */
    public function getParent() {
        return $this->_parent;
    }

    /**
     * Set the ID of the parent dialog node.
     *
     * @param $val string
     */
    public function setParent($val) {
        $this->_parent = $val;
    }

    /**
     * Get the ID of the previous dialog node.
     *
     * @return string
     */
    public function getPreviousSibling() {
        return $this->_previous_sibling;
    }

    /**
     * Set the ID of the previous dialog node.
     *
     * @param string $val
     */
    public function setPreviousSibling($val) {
        $this->_previous_sibling = $val;
    }
    
    /**
     * Get the output of the dialog node.
     *
     * @return object
     */
    public function getOutput() {
        return $this->_output;
    }
    
    /**
     * Set the output of the dialog node.
     *
     * @param object $val
     */
    public function setOutput($val) {
        $this->_output = $val;
    }
    
    /**
     * Get the context for the dialog node.
     *
     * @return object
     */
    public function getContext() {
        return $this->_context;
    }
    
    /**
     * Set the context for the dialog node.
     *
     * @param object $val
     */
    public function setContext($val) {
        $this->_context = $val;
    }
    
    /**
     * Get the metadata for the dialog node.
     *
     * @return object
     */
    public function getMetadata() {
        return $this->_metadata;
    }
    
    /**
     * Set the metadata for the dialog node.
     *
     * @param object $val
     */
    public function setMetadata($val) {
        $this->_metadata = $val;
    }
    
    /**
     * Get the next step to be executed in dialog processing.
     *
     * @return DialogNodeNextStep
     */
    public function getNextStep() {
        return $this->_next_step;
    }
    
    /**
     * Set the next step to be executed in dialog processing.
     *
     * @param DialogNodeNextStep $val
     */
    public function setNextStep($val) {
        $this->_next_step = $val;
    }
    
    /**
     * Get array of objects describing any actions to be invoked by the dialog node.
     *
     * @return DialogNodeAction
     */
    public function getActions() {
        return $this->_actions;
    }
    
    /**
     * Set array of objects describing any actions to be invoked by the dialog node.
     *
     * @param DialogNodeAction $val
     */
    public function setActions($val) {
        $this->_actions = $val;
    }
    
    /**
     * Get the alias used to identify the dialog node.
     *
     * @return string
     */
    public function getTitle() {
        return $this->_title;
    }
    
    /**
     * Set the alias used to identify the dialog node.
     *
     * @param string $val
     */
    public function setTitle($val) {
        $this->_title = $val;
    }
    
    /**
     * Get how the dialog node is processed.
     *
     * @return DialogNodeConstants.NodeType | string
     */
    public function getNodeType() {
        return $this->_node_type;
    }
    
    /**
     * Set how the dialog node is processed.
     *
     * @param DialogNodeConstants.NodeType | string $val
     */
    public function setNodeType($val) {
        $this->_node_type = $val;
    }
    
    /**
     * Get how an `event_handler` node is processed.
     *
     * @return DialogNodeConstants.EventName | string
     */
    public function getEventName() {
        return $this->_event_name;
    }
    
    /**
     * Set how an `event_handler` node is processed.
     *
     * @param DialogNodeConstants.EventName | string $val
     */
    public function setEventName($val) {
        $this->_event_name = $val;
    }
    
    /**
     * Get the location in the dialog context where output is stored.
     *
     * @return string
     */
    public function getVariable() {
        return $this->_variable;
    }
    
    /**
     * Set the location in the dialog context where output is stored.
     *
     * @param string $val
     */
    public function setVariable($val) {
        $this->_variable = $val;
    }
    
    /**
     * Get whether this to[params.headers] -level dialog node can be digressed into.
     *
     * @return DialogNodeConstants.NodeType | string
     */
    public function getDigressIn() {
        return $this->_digress_in;
    }
    
    /**
     * Set whether this to[params.headers] -level dialog node can be digressed into.
     *
     * @param DialogNodeConstants.NodeType | string $val
     */
    public function setDigressIn($val) {
        $this->_digress_in = $val;
    }
    
    /**
     * Get whether this dialog node can be returned to after a digression.
     *
     * @return DialogNodeConstants.NodeType | string
     */
    public function getDigressOut() {
        return $this->_digress_out;
    }
    
    /**
     * Set whether this to[params.headers] -level dialog node can be digressed into.
     *
     * @param DialogNodeConstants.NodeType | string $val
     */
    public function setDigressOut($val) {
        $this->_digress_out = $val;
    }
    
    /**
     * Get whether the user can digress to to[params.headers] -level nodes while filling out slots.
     *
     * @return DialogNodeConstants.DigressOut | string
     */
    public function getDigressOutSlots() {
        return $this->_digress_out_slots;
    }
    
    /**
     * Set whether the user can digress to to[params.headers] -level nodes while filling out slots.
     *
     * @param DialogNodeConstants.DigressOut | string $val
     */
    public function setDigressOutSlots($val) {
        $this->_digress_out_slots = $val;
    }
    
}