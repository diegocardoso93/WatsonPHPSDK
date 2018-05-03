<?php

namespace WatsonSDK\Services\Assistant;

/**
 * Assistant DialogNodeAction
 */
class DialogNodeAction {
    
    /**
     * @name(name)
     *
     * The name of the action.
     *
     * @var string
     */
    protected $_name;
    
    /**
     * @name(action_type)
     *
     * The type of action to invoke.
     *
     * @var string
     */
    protected $_action_type;
    
    /**
     * @name(parameters)
     *
     * A map of key/value pairs to be provided to the action.
     *
     * @var object
     */
    protected $_parameters;
    
    /**
     * @name(parameters)
     *
     * The location in the dialog context where the result of the action is stored.
     *
     * @var string
     */
    protected $_result_variable;
    
    /**
     * @name(parameters)
     *
     * The name of the context variable that the client application will use to pass in credentials for the action.
     *
     * @var string
     */
    protected $_credentials;
    
    /**
     * Constructor.
     *
     * @param string $name
     * @param string $action_type
     * @param object $parameters
     * @param string $result_variable
     * @param string $credentials
     */
    function __construct($name = '', $action_type = '', $parameters = '', $result_variable = '', $credentials = '') {
        
        $this->setName($name);
        $this->setActionType($action_type);
        $this->setParameters($parameters);
        $this->setResultVariable($result_variable);
        $this->setCredentials($credentials);
    }
    
    /**
     * Get the name of the action.
     *
     * @return string
     */
    public function getName() {
        return $this->_name;
    }
    
    /**
     * Set the name of the action.
     *
     * @param $val string
     */
    public function setName($val) {
        $this->_name = $val;
    }
    
    /**
     * Get the type of action to invoke.
     *
     * @return string
     */
    public function getActionType() {
        return $this->_action_type;
    }
    
    /**
     * Set the type of action to invoke.
     *
     * @param $val string
     */
    public function setActionType($val) {
        $this->_action_type = $val;
    }
    
    /**
     * Get a map of key/value pairs to be provided to the action.
     *
     * @return string
     */
    public function getParameters() {
        return $this->_parameters;
    }
    
    /**
     * Set a map of key/value pairs to be provided to the action.
     *
     * @param $val string
     */
    public function setParameters($val) {
        $this->_parameters = $val;
    }
    
    /**
     * Get the location in the dialog context where the result of the action is stored.
     *
     * @return string
     */
    public function getResultVariable() {
        return $this->_result_variable;
    }
    
    /**
     * Set the location in the dialog context where the result of the action is stored.
     *
     * @param $val string
     */
    public function setResultVariable($val) {
        $this->_result_variable = $val;
    }
    
    /**
     * Get the name of the context variable that the client application will use to pass in credentials for the action.
     *
     * @return string
     */
    public function getCredentials() {
        return $this->_credentials;
    }
    
    /**
     * Set the name of the context variable that the client application will use to pass in credentials for the action.
     *
     * @param $val string
     */
    public function setCredentials($val) {
        $this->_credentials = $val;
    }
    
}