<?php
require_once ROOT . 'app/interfaces/viewInterface.php';

class View implements viewInterface
{
    // Properties
    private $template;
    private $snippet;
    private $content;
    
    // Constructor
    public function __construct($content = '')
    {
        $this->setContent($content);
    }
    
    public function getTemplate()
    {
        return $this->template;
    }

    public function setTemplate($template)
    {
        $this->template = $template;
    }

    public function getSnippet()
    {
        return $this->snippet;
    }

    public function setSnippet($snippet)
    {
        $this->snippet = $snippet;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }
        
    public function display()
    {
        $output = $this->loadTemplate();
        return $output;
    }

    public function displaySnippet()
    {
        $output = $this->loadSnippet();
        return $output;
    }

/**
 *  LOADER FOR TEMPLATE FILES
 *  
 *  loads a template file given in $this->template, 
 *  checks if it is really really there, and writes
 *  it into an output buffer
 *
 *  @author     Michael Reichart <reichart@michaelreichart.de>
 *  @version    1.0
 *  @since      Method available since Release 1.0.0
 *  
 *  @return     string
 */
    private function loadTemplate()
    {
        $content = $this->getContent();
        $exists = file_exists($this->getTemplate());
        
        if ($exists === TRUE){
            
            // creating an output buffer
            ob_start();

            // grabbing the template file
            // and transfering its contents into
            // an variable instead of a process
            require $this->getTemplate();
            $output = ob_get_contents();
            
            // clear the output buffer
            ob_end_clean();
            
            return $output;
            
        } else {
            return '<p>Sorry, there is no template called "' . $this->getTemplate() . '".';
        }
    }

    private function loadSnippet()
    {
        $content = $this->getContent();
        $exists = file_exists($this->getSnippet());
        
        if ($exists === TRUE){
            
            // creating an output buffer
            ob_start();

            // grabbing the template file
            // and transfering its contents into
            // an variable instead of a process
            require $this->getSnippet();

            $output = ob_get_contents();
            
            // clear the output buffer
            ob_end_clean();
            
            return $output;
            
        } else {
            return '<p>Sorry, there is no snippet called "' . $this->getSnippet() . '".';
        }
    }

}

?>