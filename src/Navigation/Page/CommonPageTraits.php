<?php
declare(strict_types =1);

namespace LRPHPT\Navigation\Page;

trait CommonPageTraits {
    protected $liClass = '';
    protected $slug = '';
    
    public function setliClass($liclass){
        $this->liClass = $liclass;
        return $this;
    }

    public function getliClass(){
        return $this->liClass;
    }

    public function setSlug($liclass){
        $this->slug = $liclass;
        return $this;
    }

    public function getSlug(){
        return $this->slug;
    }
}