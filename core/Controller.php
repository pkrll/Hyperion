<?php
/**
 * The base controller creates an instance of both
 * the View and the Model classes, acting as the
 * link between the presentation and data layer.
 *
 * @author Ardalan Samimi
 * @version 1.1.2
 */
namespace hyperion\core;

class Controller {

    /**
     * Name of the controller.
     *
     * @var string
     * @access private
     **/
     private $name;

     /**
      * Holds an instance
      * the View object.
      *
      * @var View
      * @access private
      **/
     private $view;

     /**
      * Holds an instance
      * the Model object.
      *
      * @var Model
      * @access private
      **/
     private $model;

     /**
 	 * Load the Model and the View, and call
     * eventual methods that were requested.
     *
 	 * @param   string  Optional. The requested method.
 	 * @param   array   Optional. Additional arguments.
 	 */
    public function __construct($method, $arguments = NULL, $name) {
        $this->setName($name);
        $this->loadview();
        $this->loadModel();

        if (!is_null($arguments)) {
            $this->setArguments($arguments);
        } else {
            $this->setArguments(Array());
        }

        if (!method_exists($this, $method)) {
          if (is_null($this->arguments)) {
            $this->arguments = Array();
          }
          array_unshift($this->arguments, $method);
          $method = DEFAULT_METHOD;
        }

        $this->$method();
    }

    /**
	 * Load the View belonging to the
	 * requested controller, or if it
     * does not exist the default one.
	 */
    private function loadView() {
        // The view must have the same
        // name as requested controller.
        $name = $this->name.'View';
        $path = VIEWS.'/'.$name.'.php';

        if (!file_exists($path)) {
            $this->setView(new View());
        } else {
            if (!class_exists($name));
                include $path;
            $this->setView(new $name());
        }
    }

    /**
	 * Load the Model belonging to the
	 * requested controller, or if it
     * does not exist the default one.
	 */
    private function loadModel() {
        // The model must have the same
        // name as requested controller.
        $name = $this->name.'Model';
        $path = MODELS.'/'.$name.'.php';

        if (!file_exists($path)) {
            $this->setModel(new Model());
        } else {
            if (!class_exists($name));
                include $path;
            $this->setModel(new $name());
        }
    }

    /**
     * Setter method for $model object.
     *
     * @param   string  Model class name.
     */
    private function setModel($model) {
        $this->model = new $model();
    }

    /**
     * Setter method for $view object.
     *
     * @param   string  View class name.
     */
    private function setView($view) {
        $this->view = new $view();
    }

    /**
     * Setter method for $arguments.
     *
     * @param   array   Arguments array.
     */
    private function setArguments($arguments) {
        $this->arguments = $arguments;
    }

    /**
     * Setter method for $name.
     *
     * @param   string  The name of the class.
     */
    private function setName($name) {
        $this->name = str_replace('Controller', '', $name);
    }

    /**
     * Getter method for $model object.
     *
     * @return  string
     */
    protected function model() {
        return $this->model;
    }

    /**
     * Getter method for $view object.
     *
     * @return  string
     */
    protected function view() {
        return $this->view;
    }

    /**
     * Getter method for $name.
     *
     * @return  string
     */
    protected function name() {
        return $this->name;
    }

    /**
	 * Returns the necessary includes-files.
	 * If no values are given, the defaults
	 * are the class name.
     *
     * @param   string  Optional. Method name.
     * @param   string  Optional. Class name.
	 * @return	string
	 */
    protected function getIncludes($method = NULL, $class = NULL) {
        $method = (empty($method)) ? $this->name() : $method;
        $class  = (empty($class)) ? $this->name() : $class;
        return INCLUDES.'/'.$class.'/'.$method.'.inc';
    }

}
