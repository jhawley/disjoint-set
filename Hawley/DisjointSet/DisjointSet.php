<?php

namespace Hawley\DisjointSet;

class DisjointSet implements IDisjointSet {
    protected $members = array();
    
    protected function changeParent(IDisjointSetMember $parent, 
      IDisjointSetMember $child) {
        $child->setParent($parent->getKey());
        $parent->incSize();
    }
    
    public function add(IDisjointSetMember $member) {
        $this->members[$member->getKey()] = $member;
    }
    
    public function find($key) {
        if(!isset($this->members[$key])) {
            throw new Exception("$key not found in disjoint set");
        }
        
        $parent = $this->members[$key]->getParent();
        if($parent === $key) {
            return $this->members[$key]->getParent();
        } else {
            return $this->find($parent);
        }
    }
    
    public function union($key1, $key2) {
        $parent1 = $this->members[$this->find($key1)];
        $parent2 = $this->members[$this->find($key2)];
        if($parent1->getSize() < $parent2->getSize()) {
            $this->changeParent($parent2, $parent1);
        } else {
            $this->changeParent($parent1, $parent2);
        }
    }
}