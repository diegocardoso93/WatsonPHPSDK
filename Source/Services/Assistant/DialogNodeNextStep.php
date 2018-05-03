<?php

namespace WatsonSDK\Services\Assistant;

/**
 * Assistant DialogNodeNextStep
 */
class DialogNodeNextStep {
    
    /**
     * @name(behavior)
     *
     * What happens after the dialog node completes. The valid values depend on the node type:  - The following values are valid for any node:    - `get_user_input`    - `skip_user_input`    - `jump_to`  - If the node is of type `event_handler` and its parent node is of type `slot` or `frame`, additional values are also valid:    - if **event_name**=`filled` and the type of the parent node is `slot`:      - `reprompt`      - `skip_all_slots`  - if **event_name**=`nomatch` and the type of the parent node is `slot`:      - `reprompt`      - `skip_slot`      - `skip_all_slots`  - if **event_name**=`generic` and the type of the parent node is `frame`:      - `reprompt`      - `skip_slot`      - `skip_all_slots`        If you specify `jump_to`, then you must also specify a value for the `dialog_node` property.
     *
     * @var string
     */
    protected $_behavior;
    
    /**
     * @name(dialog_node)
     *
     * The ID of the dialog node to process next. This parameter is required if **behavior**=`jump_to`.
     *
     * @var string
     */
    protected $_dialog_node;
    
    /**
     * @name(selector)
     *
     * Which part of the dialog node to process next.
     *
     * @var string
     */
    protected $_selector;
    
    /**
     * Constructor.
     *
     * @param string $behavior
     * @param string $dialog_node
     * @param string $selector
     */
    function __construct($behavior = '', $dialog_node = '', $selector = '') {
        
        $this->setBehavior($behavior);
        $this->setDialogNode($dialog_node);
        $this->setSelector($selector);
    }
    
    /**
     * Get what happens after the dialog node completes.
     *
     * @return string
     */
    public function getBehavior() {
        return $this->_behavior;
    }
    
    /**
     * Set what happens after the dialog node completes.
     *
     * @param $val string
     */
    public function setBehavior($val) {
        $this->_behavior = $val;
    }
    
    /**
     * Get the ID of the dialog node to process next.
     *
     * @return string
     */
    public function getDialogNode() {
        return $this->_dialog_node;
    }
    
    /**
     * Set the ID of the dialog node to process next.
     *
     * @param $val string
     */
    public function setDialogNode($val) {
        $this->_dialog_node = $val;
    }
    
    /**
     * Get which part of the dialog node to process next.
     *
     * @return string
     */
    public function getSelector() {
        return $this->_selector;
    }
    
    /**
     * Set which part of the dialog node to process next.
     *
     * @param $val string
     */
    public function setSelector($val) {
        $this->_selector = $val;
    }
    
}