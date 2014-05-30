<?php

namespace Hawley\DisjointSet;

class DisjointSet implements IDisjointSet {
    protected $members = array();
    
    protected function changeParent(IDisjointSetMember $parent, 
      IDisjointSetMember $child) {
        $child->setParent($parent->getKey());
        if($parent->getRank() == $child->getRank()) {
            $parent->increaseRank();
        }
    }
    
    public function add(IDisjointSetMember $member) {
        $this->members[$member->getKey()] = $member;
    }
    
    public function find($key) {
        if(!isset($this->members[$key])) {
            throw new Exception("Key not found in disjoint set");
        }
        
        $parent = $this->members[$key]->getParent();
        if($parent === $key) {
            return $parent;
        } else {
            $newParent = $this->find($parent);
            echo "set $key's parent to $newParent\n";
            $this->members[$key]->setParent($newParent);
            return $newParent;
        }
    }
    
    public function union($key1, $key2) {
        if(!isset($this->members[$this->members[$key1]->getParent()]) || 
          !isset($this->members[$this->members[$key1]->getParent()])) {
            throw new Exception("Parent not found:  disjoint set corrupt");
        }
        $parent1 = $this->members[$this->members[$key1]->getParent()];
        $parent2 = $this->members[$this->members[$key2]->getParent()];
        if($parent1->getRank() < $parent2->getRank()) {
            $this->changeParent($parent2, $parent1);
        } else {
            $this->changeParent($parent1, $parent2);
        }
    }
}